<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\Amazon;
use App\Models\Ebay;
use App\Models\User;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule)
    {
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
                $response = $client->request('GET', $url);
                $body = $response->getBody()->getContents();
                $crawler = new Crawler($body);
                
                //$title = $crawler->filter('#productTitle')->text();
                $price = $crawler->filter('.a-offscreen')->text();
                $image = $crawler->filter('#landingImage')->attr('src');
                
                $amazon = Amazon::where('url', $url)->get();

                $amazon->price = $price;
                $amazon->img_url = $image;
                $amazon->save();
            }
    
            foreach($ebayUrls as $url){
                $response = $client->request('GET', $url);
                $body = $response->getBody()->getContents();
                $crawler = new Crawler($body);
                
                $price = $crawler->filter('span[itemprop="price"]')->attr('content');
                
                $ebay = Ebay::where('url', $url)->get();

                $ebay->price = $price;
                $ebay->save();
            }
        }
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
