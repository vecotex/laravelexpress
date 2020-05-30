@extends('template')
@section('content')
    <h1>Edit post: {{ $post->title }}</h1>

    @if($errors->any())
        <ul class="alert"></ul>
            @foreach ($errors->all() as $error)
                <li> {{ $error }} </li>
            @endforeach
        </ul>
    @endif
    {{-- , 'method'=>'put' --}}
    {!! Form::model($post, ['route' => ['admin.posts.update', $post->id], 'method'=>'put']) !!}

    @include('admin.posts._form')
    
    <div class="form-group">
        {!! Form::label('tags', 'Tags:',['class'=>'control-label']) !!}
        {!! Form::textarea('tags', $post->tagList, ['class'=>'form-control']) !!}
    </div>
    
    <div class="form-group">
        {!! Form::submit('Save', ['class'=>'btn btn-primary']) !!} {{-- não entendi como este botão inseri no banco --}}
    </div>
    
    {!! Form::close() !!}    
@endsection