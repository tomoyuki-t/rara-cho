@extends('layout')

@section('content')
    <h1>Edit: {{$article->title}}</h1>
    <hr/>
    {{--
        @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
    --}}

    @include('errors.form_errors')

    {!! Form::model($article, ['method' => 'PATCH', 'route' => ['articles.update', $article->id]]) !!}
        @include('articles.form', ['published_at' => $article->published_at->format('Y-m-d'), 'submitButton' => 'Edit Article'])
    {!! Form::close() !!}
@endsection