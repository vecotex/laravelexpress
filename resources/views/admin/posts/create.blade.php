@extends('template')
@section('content')
    <h1>Create new post</h1>

    @if($errors->any())

        <ul class="alert"></ul>
            @foreach ($errors->all() as $error)
                <li> {{ $error }} </li>
            @endforeach
        </ul>
    @endif
    
    {!! Form::open(['route' => 'admin.posts.store']) !!}

    @include('admin.posts._form')

    <div class="form-group">
        {!! Form::label('tags', 'Tags:',['class'=>'control-label']) !!}
        {!! Form::textarea('tags', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!} {{-- não entendi como este botão inseri no banco --}}
    </div>
    
    {!! Form::close() !!}
    
@endsection