<?php

namespace App\Models;

use App;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Scene;
use App\Models\Character;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
class Game extends Model
{
    use HasUuids;
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function scenes(){
        return $this->hasMany(Scene::class);
    }

    public function characters() {
        return $this->hasMany(Character::class);
    }
}
