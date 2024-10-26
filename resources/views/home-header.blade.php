<header x-data="{ showBurger: false }" class="px-5 py-9 lg:py-12">

    <nav class="p-4 flex md:block">
        <div class="mr-auto md:mx-auto flex justify-between items-center">
            <a href="{{ route('home') }}" wire:navigate
                class="text-white text-lg font-bold">{{ __('header.Кабинет профориентации') }}</a>
            <div class="hidden md:flex space-x-4 text-gray-300">
                @foreach ($categories as $category)
                    <a href="#category-{{ $category->id }}"
                        class="line hover:text-white transition duration-300 relative group">{{ $category->__('name') }}</a>
                @endforeach
            </div>
        </div>
        <div @click="showBurger = true" class="md:hidden">
            <button class="flex items-center text-blue-600 p-3">
                <svg class="block h-4 w-4 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <title>Mobile menu</title>
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                </svg>
            </button>
        </div>
    </nav>

    <!-- Бургер-меню -->
    <div :class="showBurger ? 'block' : 'hidden'" class="relative z-40">
        <div @click.self="showBurger = false" class="fixed inset-0 bg-gray-800 opacity-25"></div>
        <nav
            class="fixed top-0 right-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-gray-800 border-r overflow-y-auto">
            <button class="ml-auto" @click="showBurger = false">
                <svg class="h-6 w-6 text-gray-400 cursor-pointer hover:text-gray-500" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
            <div>
                <ul>
                    @foreach ($categories as $category)
                        <li @click="showBurger = false" class="mb-1 line">
                            <a class="block p-4 text-sm font-semibold text-gray-300 hover:bg-gray-600 hover:text-white rounded"
                                href="#category-{{$category->id}}">{{$category->__('name')}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </nav>
    </div>
</header>
