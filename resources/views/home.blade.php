<x-app-layout>



    @include('header')

    @include('hero-section')

    <div class="max-w-[1280px] mx-auto">
        <a>
            <h3 id="tests" class="text-2xl mb-4">Тесттер, анкеталар</h3>
        </a>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mx-auto max-w-[1280px] mb-64 overflow-hidden">
            <!-- Card Item -->
            <a href="">
                <div class="item rounded-lg p-4 bg-gray-800 hover:bg-gray-700 transition duration-300">
                    <div class="relative">
                        <div
                            class="focus:outline-none hover:ring-2 ring-blue-500 rounded-xl ease-in-out duration-300 transition">
                            <img src="{{ asset('images/default_image.jpg') }}" alt="Main Image"
                                class="w-full h-64 object-cover rounded-xl" />
                        </div>

                    </div>

                    <!-- Date and Read Time -->
                    <p class="mt-4 text-gray-400">March 14th, 2023 — 15 min read</p>

                    <!-- Title -->
                    <h2 class="mt-2 text-lg font-semibold">RSC with Dan Abramov and Joe Savona Live Stream</h2>
                </div>
            </a>

        </div>
        <hr>
        <div class="flex justify-center my-8">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/-7K_0NRLCu4" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen
                class="rounded-lg shadow-lg transition-transform transform hover:scale-105 duration-300"></iframe>
        </div>
    </div>
</x-app-layout>
