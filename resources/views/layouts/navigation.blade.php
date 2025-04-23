<nav x-data="{ open: false }" class="bg-gray-800 border-b border-gray-700 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <div class="flex items-center">
                <a href="{{ route('dashboard') }}" class="text-xl font-semibold text-white hover:text-gray-300">
                    Inventory System
                </a>
                <div class="hidden space-x-6 sm:flex ml-10">
                    <a href="{{ route('dashboard') }}" class="hover:text-gray-300">Dashboard</a>
                    <a href="{{ route('products.index') }}" class="hover:text-gray-300">Products</a>
                    <a href="{{ route('stock.reports') }}" class="hover:text-gray-300">Stock Reports</a>
                    <a href="{{ route('feedBack') }}" class="hover:text-gray-300">Feedback</a>
                </div>
            </div>
            <div class="hidden sm:flex items-center space-x-4">
                <div class="relative">
                    <button @click="open = !open"
                        class="flex items-center text-white hover:text-gray-300 focus:outline-none">
                        <span class="mr-2">{{ Auth::user()->name }}</span>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                    <div x-show="open" class="absolute right-0 mt-2 w-48 bg-gray-700 rounded-md shadow-lg z-50">
                        <a href="{{ route('profile.edit') }}"
                            class="block px-4 py-2 text-sm text-white hover:bg-gray-600">Profile</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="block w-full text-left px-4 py-2 text-sm text-white hover:bg-gray-600">Log
                                Out</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
