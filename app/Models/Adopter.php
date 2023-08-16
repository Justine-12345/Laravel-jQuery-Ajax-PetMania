<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Adopter extends Model
{
    use HasFactory;
    use softDeletes;
    protected $guarded = ['id'];

    public function animals(){
        return $this->belongsToMany('App\Models\Animal')->withPivot('created_at','status','code');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
