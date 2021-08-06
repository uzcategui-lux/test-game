<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\StatusGame;

use App\Http\Requests\GameRequest;

use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $games = Game::all();

        return view ('game.index')
        ->with('games', $games);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $data = $this->loadDataController();

        return view('game.create')
            ->with('status', $data['status']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GameRequest $request)
    {

        $game = new Game;
        $game->name_game        = $request->name;
        $game->url_game         = $request->url;
        $game->description_game = $request->description;
        $game->url_game_image   = $request->urlImage;
        $game->status_game_id   = $request->statusId;
        $game->save();

        return redirect(action('App\Http\Controllers\GameController@index'))
            ->with('success', $this->messageSucces('post', $game));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $game = Game::find($id);

        return view('game.show')
            ->with('game', $game);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $data = $this->loadDataController();

        $game = Game::find($id);

        return view('game.edit')
            ->with('game', $game)
            ->with('status', $data['status']);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GameRequest $request, $id)
    {

        $game = Game::find($id);
        $game->name_game        = $request->name;
        $game->url_game         = $request->url;
        $game->description_game = $request->description;
        $game->url_game_image   = $request->urlImage;
        $game->status_game_id   = $request->statusId;
        $game->save();

        return redirect(action('App\Http\Controllers\GameController@index'))
            ->with('success', $this->messageSucces('put', $game));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $class   = '';
        $message = '';

        if (Game::find($id)) {

            $result = Game::find($id);
            if ($result->delete()) {

                $class   = 'success';
                $message = 'Se elimino juego satisfactoriamente';                

            }
            else {

                $class   = 'warning';
                $message = 'Problemas al eliminar '.$result->name_game;                

            }           

        }
        else {

            $class   = 'danger';
            $message = 'Juego no existe';            

        }   

        return redirect(action('App\Http\Controllers\GameController@index'))
            ->with($class, $message);                     

    }

    /**
     * Loading data collection 
     * 
     * @return array 
     */
    protected function loadDataController()
    {

        $statusGame = StatusGame::orderBy('description', 'ASC')
            ->get();

        return ['status' => $statusGame];

    }

    /**
     * Generate message created or updated successfully
     * 
     * @param  string $method  [POST, PUT]
     * @param  \Illuminate\Http\Request  $request resource o collection
     * @return string message created or updated successfully
     */
    protected function messageSucces($method, $request)
    {

        switch (strtoupper($method)) {
            case 'POST':
                $typex = 'creado';
                break;
            case 'PUT':
                $typex = 'actualizado';
                break;            
            default:
                $typex = '';
                break;
        }

        $message = "Juego <a href='games/".$request->id."/edit'>".$request->name_game."</a> ".$typex." correctamente";
        return $message;

    }    

}
