<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Comment extends Model
{  
    use HasFactory;
    use softDeletes;
    protected $guarded = ['id'];
    
    public function animal(){
        return $this->belongsTo(Animal::class, 'animal_id');
    }

     public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }


}
