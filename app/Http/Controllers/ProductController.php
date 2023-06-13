<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductLinkRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Amazon;
use App\Models\Ebay;
use App\Models\User;
use GuzzleHttp\Client;
use Hamcrest\Type\IsNumeric;
use Hamcrest\Type\IsString;
use Symfony\Component\DomCrawler\Crawler;

class ProductController extends Controller
{
    public function create(){
        return view('products.create');
    }

    public function store(ProductLinkRequest $request){
        $amazon = Amazon::create([
            'url' => $request->amazon_url,
            'price' => 0,
            'img_url' => '',
            'user_id' => auth()->user()->id
        ]);

        $ebay = Ebay::create([
            'url' => $request->ebay_url,
            'price' => 0,
            'img_url' => '',
            'user_id' => auth()->user()->id
        ]);

        $amazon->save();
        $ebay->save();

        return view('home')->with('msg', 'Product was added successfully!');


    }

    public function generatePrices(){
        $client = new Client([
            'headers' => [
                'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36',
                'Accept-Language' => 'en-US,en;q=0.5',
                'Accept-Encoding' => 'gzip, deflate, br',
                'Connection' => 'keep-alive',
                'Upgrade-Insecure-Requests' => '1',
            ]
        ]);

        $users = User::get();

        foreach($users as $user){
            $amazonUrls = Amazon::where('user_id', $user->id)->get();
            $ebayUrls = Ebay::where('user_id', $user->id)->get();

            foreach ($amazonUrls as $url) {
                $response = $client->request('GET', $url->url);
                $body = $response->getBody()->getContents();
                $crawler = new Crawler($body);
                
                //$title = $crawler->filter('#productTitle')->text();
                $price = $crawler->filter('.a-offscreen')->text();
                $price = ltrim($price, '$');
                $image = $crawler->filter('#landingImage')->attr('src');

                $amazon = Amazon::where('url', $url->url)->first();

                $amazon->price = $price;
                $amazon->img_url = $image;
                $amazon->save();
            }
    
            foreach($ebayUrls as $url){
                $response = $client->request('GET', $url->url);
                $body = $response->getBody()->getContents();
                $crawler = new Crawler($body);
                
                $price = $crawler->filter('span[itemprop="price"]')->attr('content');
                
                $ebay = Ebay::where('url', $url->url)->first();

                $ebay->price = $price;
                $ebay->save();
            }   
        }
    }

    public function list(){
        $ebay = Ebay::where('user_id', auth()->user()->id)->get();
        $amazon = Amazon::where('user_id', auth()->user()->id)->get();
        return view('products.list',[
            'ebay' => $ebay,
            'amazon' => $amazon
        ]);
    }
}
