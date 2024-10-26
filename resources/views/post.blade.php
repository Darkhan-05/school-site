<x-app-layout>
    @include('header')

    <div class="max-w-xl mx-auto mt-12">
        <div class="flex justify-between mb-8">
            <div class="flex gap-4 group items-center">
                <svg class="group-hover:-translate-x-1 group-hover:scale-110 transition-transform duration-300 transform rotate-90"
                    width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M15.101 5.5V23.1094L9.40108 17.4095L8.14807 18.6619L15.9862 26.5L23.852 18.6342L22.5996 17.3817L16.8725 23.1094V5.5H15.101Z"
                        fill="currentColor"></path>
                </svg>
                <a href="{{ route('home') }}"
                    class="text-sm font-semibold transition-colors duration-300 hover:text-blue-500">
                    {{ __('post.Назад на главную') }}</a>
            </div>

        </div>


    </div>

    <img src="{{ $post->image ? asset('storage/' . $post->image) : asset('images/default_image.jpg') }}"
            class="max-w-2xl mx-auto max-h-[600px] object-cover rounded-xl mb-8" alt="Post Image" />

    <div class="max-w-xl mx-auto mb-12">
        <p class="text-gray-200">{!! nl2br(e($post->__('description'))) !!}</p>

        {{-- <p class="text-gray-200">{{ $post->__('description') }}</p> --}}

        <p class="text-gray-400 text-right">
            {{ $post->created_at->locale(app()->getLocale())->translatedFormat('F jS, Y') }}</p>
    </div>
</x-app-layout>
