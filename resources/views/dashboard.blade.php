<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <a href="{{ route('posts.create') }}">
        New Post
    </a>
    {{-- Prompt if no posts found --}}
    @if ($posts->count()==0)
        
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        No Posts Found!
                    </div>
                </div>
            </div>
        </div>
    @else

        {{-- Listing Posts --}}
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    @foreach ($posts as $post)
                        <div class="p-6 bg-white border-b border-gray-200">
                            {{$post->title}}
                        </div>
                    @endforeach                    
                </div>
            </div>
        </div>
    @endif

</x-app-layout>
