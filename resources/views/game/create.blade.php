@extends('layout.main')

@section('title_page')

        {{ 'Nuevo Juego' }}

@endsection

@section('content')

    {!! Form::open(['action' => ['App\Http\Controllers\GameController@store'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

        {{ csrf_field() }}

        @include('game.form')

    {!! Form::close() !!}
    
@endsection