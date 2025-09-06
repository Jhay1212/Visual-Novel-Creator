<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Game;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Scene extends Model
{
    use HasUuids;
    protected $keyType = "string";
    public $incrementing = false;
     
    public function game() {
        return $this->belongsTo(Game::class, "games_id", "id");
    }
}
