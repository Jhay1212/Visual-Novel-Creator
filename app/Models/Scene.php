<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Game;

class Scene extends Model
{
    public function game() {
        return $this->belongsTo(Game::class);
    }
}
