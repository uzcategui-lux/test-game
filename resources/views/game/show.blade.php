    @extends('layout.main')

    @section('title_page')

          {{ 'Juego - ' . $game->name_game }}

    @endsection

    @section('content')

        <div class="container">
            
            <div class="row align-items-start my-5">
                <div class="col-sm-2">
                    <label for="lblName">Nombre del juego</label>
                </div>
                <div class="col-sm-10">
                    <label for="lblName">{{ $game->name_game }}</label>
                </div>
                <div class="col-sm-2">
                    <label for="lblUrl">Url del juego</label>
                </div>
                <div class="col-sm-10">
                    <a href="{{ $game->url_game }}" target="_blank">{{ $game->url_game }}</a>
                </div>                        
                <div class="col-sm-2">
                    <label for="lbDescription">Description</label>
                </div>
                <div class="col-sm-10">
                    <label for="lbDescriptionValue">{{ $game->description_game }}</label>
                </div>
                <div class="col-sm-2">
                    <label for="lblUrlImg">Url imagen juego</label>
                </div>
                <div class="col-sm-10">
                    <a href="{{ $game->url_game_image }}" target="_blank">{{ $game->url_game_image }}</a>
                </div>                        
                <div class="col-sm-2">
                    <label for="lblStatus">Estatus del juego</label>
                </div>
                <div class="col-sm-10">
                    <label for="lbStatusValue">{{ $game->statusGame->description }}</label>
                </div>
                <div class="col-sm-2">
                    <label for="lblStatus">Imagen</label>
                </div>
                <div class="col-sm-10">
                    <div id="previewImageId" class="float-sm-left">
                        <img src="{{ $game->url_game_image }}" alt="{{ $game->url_game_image }}">
                    </div>
                </div>                             
            </div>    

            <div class="form-group col-sm-6 my-3">
                <div class="float-right">
                    <a href="{{ route('games.index') }}" class="btn btn-secondary">Cancelar</a>         
                </div>
            </div>            

        </div>

    @endsection

