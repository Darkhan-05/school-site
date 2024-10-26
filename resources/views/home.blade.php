<x-app-layout>

    @include('home-header')
    @include('hero-section')


    <div class="max-w-[1280px] mx-auto">

        @foreach ($categories as $category)
            <div class="flex gap-6 group items-center mb-4">
                <a href="{{ route('category.show', $category->id) }}" id="category-{{ $category->id }}"
                    class="text-xl font-semibold transition-colors duration-300 hover:text-blue-500">
                    {{ $category->__('name') }}
                </a>
                <svg class="group-hover:translate-x-1 group-hover:scale-110 transition-transform duration-300 transform -rotate-90"
                    width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M15.101 5.5V23.1094L9.40108 17.4095L8.14807 18.6619L15.9862 26.5L23.852 18.6342L22.5996 17.3817L16.8725 23.1094V5.5H15.101Z"
                        fill="currentColor"></path>
                </svg>
            </div>

            <div
                class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mx-auto max-w-[1280px] mb-20 overflow-hidden">

                @foreach ($category->posts as $post)
                    <a href="{{ route('post.show', $post->id) }}">
                        <div class="item rounded-lg p-4 bg-gray-800 hover:bg-gray-700 transition duration-300">
                            <div class="relative">
                                <div
                                    class="focus:outline-none hover:ring-2 ring-blue-500 rounded-xl ease-in-out duration-300 transition">

                                    <img src="{{ $post->image ? asset('storage/' . $post->image) : asset('images/default_image.jpg') }}"
                                        class="w-full h-64 object-cover rounded-xl" alt="Post Image" />

                                </div>
                            </div>

                            <div class="mt-4">
                                <p class="text-gray-400 text-right">
                                    {{ $post->created_at->locale(app()->getLocale())->translatedFormat('F jS, Y') }}</p>
                                <h2 class="text-xl">{{ $post->__('name') }}</h2>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @endforeach


        <hr>
        <p class="my-8 text-center">Developed By <a href="https://t.me/ggdarkhan">Darkhan</a></p>
        {{-- <div class="flex justify-center my-8">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/-7K_0NRLCu4" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen
                class="rounded-lg shadow-lg transition-transform transform hover:scale-105 duration-300"></iframe>
        </div> --}}
    </div>
</x-app-layout>
