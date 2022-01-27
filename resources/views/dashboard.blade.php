<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-10">                
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Dashboard') }}
                </h2>
            </div>
            <div class="col-2">                
                <a href="{{ route('posts.create') }}" class="btn btn-dark bg-dark pull-right">
                    New Post
                </a>
            </div>
        </div>
    </x-slot>
    
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
                        <div class="p-6 bg-white border-b border-gray-200 row">
                            <div class="row">
                                <div class="col-1">                                    
                                    @if(!empty($post->image))
                                        <img  src="{{asset( $post->image )}}" alt="{{$post->image}}" class="img-responsive"/>
                                    @else
                                        <img  src="/images/placeholder.png" alt="{{$post->image}}" class="img-responsive"/>
                                    @endif
                                </div>
                                <div class="col-7">                                    
                                    {{$post->title}}
                                </div>
                                <div class="col-4">
                                    <a href="{{ route('posts.create') }}" class="btn btn-dark bg-dark pull-right">
                                        Edit
                                    </a>
                                    <a href="{{ route('posts.create') }}" class="btn btn-dark bg-dark pull-right">
                                        Delete
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach                    
                </div>
            </div>
        </div>
    @endif

</x-app-layout>
