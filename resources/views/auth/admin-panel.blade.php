<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold flex justify-center text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('ADMIN PANEL') }}
        </h2>
    </x-slot>

        @foreach ($users as $user)
        <div class="w-64 h-64 mb-4 ml-4 mt-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="flex flex-col items-center pt-4">
                <img src="https://static.vecteezy.com/system/resources/thumbnails/002/534/006/small/social-media-chatting-online-blank-profile-picture-head-and-body-icon-people-standing-icon-grey-background-free-vector.jpg" class="w-24 h-24 mb-3 rounded-full shadow-lg" alt="pro"/>
                @if($user->role == 'admin')
                    <h5 class="mb-1 text-xl font-medium text-red-400 dark:text-red">{{$user->name}}</h5>
                    <span class="text-sm text-gray-500 dark:text-gray-400">Administrator</span>
                @else
                    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{$user->name}}</h5>
                    <span class="text-sm text-gray-500 dark:text-gray-400">User</span>
                @endif
                <form method="post" action="{{route('user.delete')}}">
                    @csrf
                    <input class="hidden" name="user_id" value="{{$user->id}}">
                    <div class="flex mt-4 space-x-3 md:mt-6">
                        <button type="submit" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Delete User</button>
                    </div>
                    <div>
                        
                    </div>
                </form>
            </div>
        </div>
        @endforeach
</x-app-layout>