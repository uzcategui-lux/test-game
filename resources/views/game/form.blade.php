<div class="row col-sm-6 col-lg-6 col-xl-6 my-4">

	<input type="hidden" name="gameId" value={{ isset($game->id) ? $game->id : ''}}>

	<div class="form-group col-sm-12">
		<label for="labelContac">Nombre del Juego: </label>
		<input type="text" class="form-control" id="nameGameId" name="name" placeholder="Nombre del juego" value="{{ (old('name') != '') ? old('name') : (isset($game->name_game) ? $game->name_game : '') }}" >
		@error('name')
			<span class="error-msg">{{ $message }}</span>
		@enderror
	</div>

	<div class="form-group col-sm-12">
		<label for="labelContac">Url del juego: </label>
		<input type="text" class="form-control" id="urlGameId" name="url" placeholder="Url del juego" value="{{ (old('url') != '') ? old('url') : (isset($game->url_game) ? $game->url_game : '') }}" >
		@error('url')
			<span class="error-msg">{{ $message }}</span>
		@enderror				
	</div>	

	<div class="form-group col-sm-12">
		<label for="labelContac">Descripción del juego: </label>
		<textarea class="form-control" id="descriptionId" name="description" rows="3">{{ (old('description') != '') ? old('description') : (isset($game->description_game) ? $game->description_game : '') }}</textarea>
	</div>	

	<div class="form-group col-sm-12">
		<label for="labelContac">Url imagen juego: </label>
		<input type="text" class="form-control" id="urlImageId" name="urlImage" placeholder="Url del juego" value="{{ (old('urlImage') != '') ? old('urlImage') : (isset($game->url_game_image) ? $game->url_game_image : '') }}" >
		@error('urlImage')
			<span class="error-msg">{{ $message }}</span>
		@enderror		
	</div>

	<div class="form-group col-sm-12">
		<label for="labelContac">Estatus del juego: </label>
		<select name="statusId" id="statusId" class="form-control" >
			<option value="">Seleccione</option>

				@foreach ($status as $statusx)

					@php
						$selected = (isset($game) && ($game->status_game_id == $statusx->id)) ? 'selected' : '';
						if (old('statusId') != '') {
							if (old('statusId') == $statusx->id)
								$selected = 'selected';
						}

					@endphp

					<option value="{{ $statusx->id }}" {{ $selected }}>{{ $statusx->description }}</option>
					

				@endforeach

		</select>
		@error('statusId')
			<span class="error-msg">{{ $message }}</span>
		@enderror		
			
	</div>	

	<div class="form-group col-sm-12">
		<div id="previewImageId" class="float-right">
			@php
				$urlImage  = '';
				$tileImage = '';
				if (isset($game) && ($game->url_game_image != '')) {
					$urlImage  = $game->url_game_image;
					$tileImage = $game->name_game;
				}
			@endphp
			<img src="{{ $urlImage }}" alt="{{ $tileImage }}">
		</div>
	</div>	

	<div class="form-group col-sm-12 my-3">
		<div class="float-right">
			<button type="submit" class="btn btn-primary mr-1">Guardar</button>
			<a href="{{ route('games.index') }}" class="btn btn-secondary">Cancelar</a>			
		</div>
	</div>

</div>

@section('page_script')

	<script>

		$(document).ready(function() {

			$("#urlImageId").on('blur', function() {
				$('#previewImageId').html('No disponible')
				let imagePreview = $("#urlImageId").val();
				let html = '<img src="'+imagePreview+'" alt="'+$('#name').val()+'">'
				$('#previewImageId').html(html);
			});			

		});

	</script>

@endsection	