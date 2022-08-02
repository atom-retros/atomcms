<nav class="bg-white border-b border-gray-100 relative">
    <!-- Primary Navigation Menu -->
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 text-gray-700 hover:text-gray-900 text-sm font-medium leading-5  uppercase font-bold text-[14px]">
            <div class="flex">
                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:flex">
                    <a href="{{ route('home') }}"
                       class="{{ request()->routeIs('welcome') ? 'border-yellow-500 text-gray-900 focus:border-indigo-700' : 'border-transparent hover:border-gray-300 focus:text-gray-700 focus:border-gray-300' }} inline-flex items-center px-1 pt-1 border-b-4 focus:outline-none">
                        {{ __('Home') }}
                    </a>

                    <a href="{{ route('home') }}"
                       class="{{ false ? 'border-indigo-400 text-gray-900 focus:border-indigo-700' : 'border-transparent hover:border-gray-300 focus:text-gray-700 focus:border-gray-300' }} inline-flex items-center px-1 pt-1 border-b-2 focus:outline-none">
                        {{ __('Community') }}
                    </a>

                    <a href="{{ route('home') }}"
                       class="{{ false ? 'border-indigo-400 text-gray-900 focus:border-indigo-700' : 'border-transparent hover:border-gray-300 focus:text-gray-700 focus:border-gray-300' }} inline-flex items-center px-1 pt-1 border-b-2 focus:outline-none">
                        {{ __('Highscores') }}
                    </a>

                    <a href="{{ route('home') }}"
                       class="{{ false ? 'border-indigo-400 text-gray-900 focus:border-indigo-700' : 'border-transparent hover:border-gray-300 focus:text-gray-700 focus:border-gray-300' }} inline-flex items-center px-1 pt-1 border-b-2 focus:outline-none">
                        {{ __('Shop') }}
                    </a>

                    <a href="{{ route('home') }}"
                       class="{{ false ? 'border-indigo-400 text-gray-900 focus:border-indigo-700' : 'border-transparent hover:border-gray-300 focus:text-gray-700 focus:border-gray-300' }} inline-flex items-center px-1 pt-1 border-b-2 focus:outline-none">
                        {{ __('Rules') }}
                    </a>

                    <a href="{{ route('home') }}"
                       class="{{ false ? 'border-indigo-400 text-gray-900 focus:border-indigo-700' : 'border-transparent hover:border-gray-300 focus:text-gray-700 focus:border-gray-300' }} inline-flex items-center px-1 pt-1 border-b-2 focus:outline-none">
                        {{ __('Discord') }}
                    </a>
                </div>
            </div>

            <!-- Settings -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                @auth
                    <div>{{ Auth::user()->username }}</div>

                    <a href="{{ route('logout') }}"
                        class="h-16 ml-4 border-transparent hover:border-gray-300 focus:text-gray-700 focus:border-gray-300 inline-flex items-center px-1 pt-1 border-b-2 focus:outline-none -mt-[2px]"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                @endauth
            </div>
        </div>
    </div>
</nav>
