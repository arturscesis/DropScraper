<x-app-layout>
    <body class="font-sans text-gray-900 antialiased">
        <form method="POST" action="{{ route('product.store')}}">
            @csrf
            <div class="flex flex-col sm:justify-center items-center pt-24 bg-gray-100 dark:bg-gray-900">
                <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                    <h1 class="pb-10 text-white font-bold flex text-3xl sm:justify-center ">ADD PRODUCT</h1>
                    <label for="large-input" class="pb-6 text-xl font-medium text-gray-900 dark:text-white">AMAZON PRODUCT LINK</label>
                    <input type="text" required name="amazon_url" id="large-input" class="w-full mb-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="https://www.amazon.com/KAIWEETS-Non-Contact-Electrical-Breakpoint-Finder-HT100B/dp/B09FX5GC12/">
                    
                    <label for="large-input" class=" text-xl font-medium text-gray-900 dark:text-white">EBAY PRODUCT LINK</label>
                    <input type="text" required name="ebay_url" id="large-input" class=" w-full mb-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="https://www.ebay.com/itm/234928213849">
                    <button type="submit" class="ml-28 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                        ADD PRODUCT
                    </button>
                </div>
            </div>
        </form>
    </body>
</x-app-layout>