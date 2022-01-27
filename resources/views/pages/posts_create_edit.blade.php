<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if (empty($post))
                {{ __('Create a new post') }}
            @else
                {{ __('Edit post') }}   
            @endif
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(empty($post))
                        {!! Form::open(['route' => 'posts.create', 'method' => 'POST', 'files' => true]) !!}
                    @else
                        {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT','files' => true]) !!}
                    @endif
                    @csrf
                        <div class="row">
                            @if (!empty($post))
                                {{Form::hidden('id', $post->id)}}
                            @endif
                            <div class="form-group col-8">
                                {{Form::label('title', 'Title')}}
                                {{Form::text('title', empty($post)?'':$post->title, ['class' => 'form-control', 'placeholder' => 'e.g ....','required'])}}
                            </div>
                                    

                            <div class="form-group col-4">
                                {{ Form::label('image', 'Featured Image', array('class' => 'col-form-label', 'for' => 'file-input')) }}                                
                                {{ Form::file('image', ['id' => 'file-input']) }}   
                            </div>
                        </div>
                                

                        <div class="form-group">
                            {{Form::label('content', 'Content')}}
                            {{Form::textarea('content', empty($post)?'':$post->title, ['class' => 'form-control', 'placeholder' => '...','rows' => '10', 'required'])}}
                        </div>
                        
                        <div class="form-row">
                            {{Form::submit('Create', ['class' => 'btn btn-dark w-100 bg-dark'])}}
                        </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
