<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;


class Rescuer extends Model
{
    use HasFactory;
    use softDeletes;
     protected $guarded = ['id'];

    public function animals(){
        return $this->belongsToMany('App\Models\Animal');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

}
