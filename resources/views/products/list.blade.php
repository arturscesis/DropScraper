<x-app-layout>
    @if($amazon)
    @foreach($amazon as $am)
        @php
        $eb = $ebay->shift(); // Get the next eBay model item
        @endphp
        <div class="flex flex-col ml-4 mt-4 items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
            <a href="{{$am->url}}"><img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="{{$am->img_url}}" alt=""></a>
            <div class="flex flex-col justify-between p-4 leading-normal">
                <h1 class="text-white font-bold">Amazon price:</h1>
                <p class="text-white">${{$am->price}}</p>
            </div>
            <div class="flex flex-col justify-between p-4 leading-normal">
                <h1 class="text-white font-bold">Ebay price:</h1>
                <p class="text-white">${{$eb->price}}</p>
            </div>
            <?php
                $ebayFeePercentage = 12.5; // eBay fee percentage
                $additionalCost = 0.70; // Additional cost
                $taxPercentage = 21; // Tax percentage

                // Calculate eBay fee
                $ebayFee = ($ebayFeePercentage / 100) * $eb->price;

                // Calculate price after eBay fee
                $priceAfterFee = $eb->price - $ebayFee;

                // Add additional cost
                $priceWithAdditionalCost = $priceAfterFee + $additionalCost;

                // Calculate tax
                $tax = ($taxPercentage / 100) * $priceWithAdditionalCost;

                // Calculate final profit
                $profit = $priceWithAdditionalCost - $tax;
            ?>
            <div class="flex flex-col justify-between p-4 leading-normal">
                @if($profit < $am->price)
                    <h1 class="text-white font-bold">Loss:</h1>
                    <p class="text-red-300">${{number_format($profit - $am->price, 2)}}</p>
                @else
                    <h1 class="text-white font-bold">Profit:</h1>
                    <p class="text-green-300">${{number_format($profit - $am->price, 2)}}</p>
                @endif
            </div>
            <div>
                <form method="post" action="{{ route('product.delete')}}">
                    @csrf
                    <input class="hidden" value="{{$am->id}}" name="amazon_id">
                    <input class="hidden" value="{{$eb->id}}" name="ebay_id">
                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold mt-4 py-2 px-4 rounded-full mr-4" type="submit">DELETE PRODUCT</button>
                </form>
            </div>
        </div>
    @endforeach
    @else

    @endif
</x-app-layout>