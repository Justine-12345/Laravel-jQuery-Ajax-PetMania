<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Disease extends Model
{
    use HasFactory;
    use softDeletes;
    protected $guarded = ['id'];

    public function animals(){
        return $this->belongsToMany('App\Models\Animal');
    }
}
