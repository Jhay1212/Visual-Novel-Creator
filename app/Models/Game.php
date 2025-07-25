<?php

namespace App\Models;

use App;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Scene;
use App\Models\Character;
class Game extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function scene(){
        return $this->hasMany(Scene::class);
    }

    public function character() {
        return $this->belongsTo(Character::class);
    }
}
