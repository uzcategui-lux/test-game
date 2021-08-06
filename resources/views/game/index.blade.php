	@extends('layout.main')
	
	@section('title_page')
		
	@endsection

	@section('page_message')
		@include('include.message')
	@endsection	

	@section('content')

	<div class="row">

		<div class="col-12 col-xs-12 col-lg-12 col-xl-12 d-flex">
	        <div class="card flex-fill">
	            <div class="card-header">
	                <h5 class="card-title">

	                    Listado de Juegos <a href="{{ route('games.create') }}"><i class="fas fa-plus-circle ml-1" style="color: #28a745;" title="Crear nuevo usuario"></i></a>

	                </h5>
	                
	            </div>
	            <div class="card-body">

					<table id="tableUserId" class="table table-striped dataTable">
						<thead>
							<tr>
								<th>id</th>
								<th>Nombre del Juego</th>
								<th>Ir al juego</th>
								<th>Descripción del juego</th>
								<th>Estatus del juego</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>

							@foreach($games as $game)

								<tr>
									<td>{{ $game->id }}</td>
									<td>{{ $game->name_game }}</td>
									<td>
										<a href="{{ $game->url_game }}" target="_blank" title="Ir al site {{ $game->name_game }}"><img src="{{ $game->url_game_image }}" style="width: 130px; height: 70px" alt="Ir a {{ $game->name_game }}"></i></a>
									</td>
									<td>
										{{ $game->description_game }}</td>
									</td>									
									<td>
										{{ $game->statusGame->description }}</td>
									</td>
									<td>
										<a href="{{ route('games.show', [$game->id]) }}" class="mr-1"><i class="far fa-eye" title="Ver {{  $game->name_game }}"></i></a>										
										<a href="{{ route('games.edit', [$game->id]) }}" class="mr-1"><i class="fas fa-edit" style="color: #ffc107;" title="Editar {{ $game->name_game }}"></i></a>
										<a href="{{ route('games.destroy', $game->id) }}" class=""><i class="fas fa-trash" onclick="event.preventDefault();document.getElementById('frmId_{{ $game->id }}').submit();"style="color: #dc3545;" title="Eliminar {{ $game->name_game }}"></i></a>
										<form id="frmId_{{ $game->id }}" action="{{ route('games.destroy', $game->id) }}" method="POST" style="display: none;">
											@csrf
											@method('DELETE')
										</form>
									</td>
								</tr>

							@endforeach

						</tbody>
					</table>

	            </div>
	        </div>
	    </div>

	</div>
		
	@endsection

	@section('page_script')


		<script>
			
			$(document).ready(function() {
				
				$('.dataTable').DataTable({

					"language": {
						"lengthMenu": "Mostrar _MENU_ registros por pagina",
						"zeroRecords": "Nada encontrado - sorry",
						"info": "Mostrando pagina _PAGE_ de _PAGES_",
						"infoEmpty": "No hay datos",
						"infoFiltered": "(filtrando desde _MAX_ total registros)",
						"search":"Buscar:",
						"paginate": {
							"first":      "Primero",
							"last":       "Ultimo",
							"next":       "Siguiente",
							"previous":   "Anterior"
						}
					},
					"responsive": "true"
				});

			});

		</script>


	@endsection	