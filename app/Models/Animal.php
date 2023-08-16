<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Animal extends Model implements Searchable
{
    use HasFactory;
    use softDeletes;
    protected $fillable = ['animal_name', 'animal_gender', 'animal_age', 'animal_breed', 'animal_health','animal_picture', 'category_id'];



    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function adopters(){
        return $this->belongsToMany('App\Models\Adopter')->withPivot('created_at','status','code');
    }

    public function rescuers(){
        return $this->belongsToMany('App\Models\Rescuer');
    }
    
     public function diseases(){
        return $this->belongsToMany('App\Models\Disease');
    }

    public function veterenarians(){
        return $this->belongsToMany('App\Models\Veterinarian');
    }

    public function comments(){
        return $this->hasMany('App\Models\Comment', 'animal_id');
    }

    public $searchableType = 'List Of Animals';

    public function getSearchResult(): SearchResult
     { 
        $url = route('landing.view', $this->id);
     
         return new \Spatie\Searchable\SearchResult(
            $this,
            $this->animal_name,
            $url,
         );
     }
}
