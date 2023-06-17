<x-app-layout>
    <div class="block flex  w-100% p-6 ml-4 mt-4 mb-4 mr-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
        <img class="w-1/2 h-1/2" src="https://scrape-it.cloud/assets/cache_image/assets/components/images/blog/web-scraping_2560x1067_819.webp">
        <div class="flex flex-col">
            <h5 class="mb-2 text-3xl justify-center flex font-bold tracking-tight text-gray-900 dark:text-white">WHAT IS DropScraper</h5>
            <p class="font-bold text-xl text-white ml-4">DropScraper is an innovative web application built on Laravel, designed to simplify your online business experience. With this powerful Amazon-eBay price scraper, you can effortlessly track product prices.</p>
            @auth
                <a href="{{route ('product.add')}}"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 ml-72 mt-4 justify-center rounded-full">ADD PRODUCT</button></a>
            @else
            <a href="{{route ('register')}}"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 ml-72 mt-4 justify-center rounded-full">CREATE AN ACCOUNT</button></a>
            @endauth
        </div>
    </div>
    <div class="block flex  w-100% p-6 ml-4 mt-4 mb-4 mr-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
        <div class="flex flex-col">
            <h5 class="mb-2 text-3xl justify-center flex font-bold tracking-tight text-gray-900 dark:text-white">ITS FREE TO USE</h5>
            <p class="font-bold text-xl text-white ml-4">By providing DropScraper for free, I aim to make other sellers life a bit easier, because there really isn't a free solution to this problem.</p>
        </div>
        <img class="w-1/2 h-full" src="https://blog.formilla.com/wp-content/uploads/2017/02/5-tools-piggy-final-e1486366885281.png">
    </div>
    <div class="block flex  w-100% p-6 ml-4 mt-4 mb-4 mr-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
        <img class="w-1/2 h-1/2" src="https://wallpapers.com/images/featured/avfu043y2kv52wha.jpg">
        <div class="flex flex-col">
            <h5 class="mb-2 text-3xl justify-center flex font-bold tracking-tight text-gray-900 dark:text-white">HOW IT WORKS</h5>
            <p class="font-bold text-xl text-white ml-4 mb-4">DropScraper is a cutting-edge web application that simplifies the process of tracking product prices for online businesses. Through its intuitive interface, users can input two important links: one from Amazon and another from eBay. The app's advanced web crawler then seamlessly extracts the relevant pricing information and images from both platforms.</p>
            <p class="font-bold text-xl text-white ml-4 mb-4">Using sophisticated scraping techniques, DropScraper retrieves the current prices of the specified products from Amazon and eBay, ensuring that users have up-to-date and accurate data at their fingertips. This information serves as a crucial resource for making informed pricing decisions and staying competitive in the online marketplace.</p>
            <p class="font-bold text-xl text-white ml-4 mb-4">Once the data is extracted, DropScraper securely stores it in a robust and efficient database system. The app's architecture ensures that the information is properly organized and easily accessible for users to analyze and leverage in their business strategies. With this powerful feature, users can conveniently track the historical pricing trends of their chosen products, allowing for data-driven decision-making.</p>
            <p class="font-bold text-xl text-white ml-4 mb-4">In summary, DropScraper streamlines the process of tracking product prices for online businesses. Its advanced web crawling capabilities extract pricing information and images from Amazon and eBay, which are then securely stored in a database for easy access and analysis. With regular hourly updates, users can confidently rely on DropScraper for accurate and timely data, empowering them to make informed pricing decisions and stay competitive in the dynamic online marketplace.</p>
        </div>
    </div>
</x-app-layout>