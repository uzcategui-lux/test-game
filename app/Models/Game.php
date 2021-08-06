<?php

namespace App\Models;

use App\Models\StatusGame;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'games';

    /**
     * Game belongs to StatusGame.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function statusGame()
    {
        // belongsTo(RelatedModel, foreignKey = statusGame_id, keyOnRelatedModel = id)
        return $this->belongsTo(StatusGame::class, 'status_game_id', 'id');
    }
    
}
