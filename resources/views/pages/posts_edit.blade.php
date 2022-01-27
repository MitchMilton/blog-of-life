<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create a new post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {!! Form::open(['route' => 'posts.store', 'method' => 'POST', 'data-parsley-validate' => '', 'files' => true]) !!}
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
                            {{Form::textarea('content', '', ['class' => 'form-control', 'placeholder' => '...','rows' => '10', 'required'])}}
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
