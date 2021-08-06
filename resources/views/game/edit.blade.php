	@extends('layout.main')

	@section('title_page')

	        {{ 'Actualizar juego: ' . $game->name_game }}

	@endsection

	@section('content')

	    {!! Form::open(['route' => array('games.update', $game->id), 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

	        {{ csrf_field() }}

	        {{ method_field('PUT') }}

	        @include('game.form')

	    {!! Form::close() !!}
	    
	@endsection