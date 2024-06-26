<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Dashboard</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <script defer src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" />
</head>
<body>
<main class="min-h-screen w-full bg-gray-100 text-gray-700" x-data="layout">
    <header class="flex w-full items-center justify-between border-b-2 border-gray-200 bg-white p-2">
        <div class="flex items-center space-x-2">
            <button type="button" class="text-3xl" @click="asideOpen = !asideOpen"><i class="bx bx-menu"></i></button>
            <div>Logo</div>
        </div>
        <div>
            <button type="button" @click="profileOpen = !profileOpen" @click.outside="profileOpen = false"
                    class="h-9 w-9 overflow-hidden rounded-full">
                <img src="{{ asset('images/find_user.png') }}" alt="plchldr.co" />
            </button>
            <div class="absolute right-2 mt-1 w-48 divide-y divide-gray-200 rounded-md border border-gray-200 bg-white shadow-md"
                 x-show="profileOpen" x-transition>
                <div class="flex items-center space-x-2 p-2">
                    <img src="{{ asset('images/find_user.png') }}" alt="plchldr.co" class="h-9 w-9 rounded-full" />
                    <div class="font-medium">{{ auth()->user()->name }}</div>
                </div>
                <div class="p-2">
                    @if(Auth::check())
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="flex items-center space-x-2 transition hover:text-blue-600">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                </svg>
                                <div>Logout</div>
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </header>
    <div class="flex">
        <!-- aside -->
        <aside class="flex w-72 flex-col space-y-2 border-r-2 border-gray-200 bg-white p-2"  x-show="asideOpen">
            <div x-data="{ open: false }">
                <button @click="open = !open" class="flex items-center space-x-1 rounded-md px-2 py-3 hover:bg-gray-100 hover:text-blue-600 w-full">
                    <span class="text-2xl"><i class="bx bx-file"></i></span>
                    <span>Pages</span>
                    <i :class="open ? 'bx bx-chevron-up' : 'bx bx-chevron-down'" class="ml-auto"></i>
                </button>
                <div x-show="open" x-transition class="pl-4">
                    <a href="{{ route('pages.index') }}" class="block px-2 py-1 hover:bg-gray-100">All Pages</a>
                    <a href="{{ route('pages.create') }}" class="block px-2 py-1 hover:bg-gray-100">Add Page</a>
                </div>
            </div>
            <div x-data="{ open: false }">
                <button @click="open = !open" class="flex items-center space-x-1 rounded-md px-2 py-3 hover:bg-gray-100 hover:text-blue-600 w-full">
                    <span class="text-2xl"><i class="bx bx-category"></i></span>
                    <span>Categories</span>
                    <i :class="open ? 'bx bx-chevron-up' : 'bx bx-chevron-down'" class="ml-auto"></i>
                </button>
                <div x-show="open" x-transition class="pl-4">
                    <a href="{{ route('categories.index') }}" class="block px-2 py-1 hover:bg-gray-100">All Categories</a>
                    <a href="{{ route('categories.create') }}" class="block px-2 py-1 hover:bg-gray-100">Add Category</a>
                </div>
            </div>
            <div x-data="{ open: false }">
                <button @click="open = !open" class="flex items-center space-x-1 rounded-md px-2 py-3 hover:bg-gray-100 hover:text-blue-600 w-full">
                    <span class="text-2xl"><i class="bx bx-cart"></i></span>
                    <span>Products</span>
                    <i :class="open ? 'bx bx-chevron-up' : 'bx bx-chevron-down'" class="ml-auto"></i>
                </button>
                <div x-show="open" x-transition class="pl-4">
                    <a href="{{ route('products.index') }}" class="block px-2 py-1 hover:bg-gray-100">All Products</a>
                    <a href="{{ route('products.create') }}" class="block px-2 py-1 hover:bg-gray-100">Add Product</a>
                </div>
            </div>
        </aside>
        <div class="w-full p-4">
            @yield('content')
        </div>
    </div>
</main>

<script>
    document.addEventListener("alpine:init", () => {
        Alpine.data("layout", () => ({
            profileOpen: false,
            asideOpen: true,
        }));
    });
</script>
</body>
</html>
