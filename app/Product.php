<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use Searchable;
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable  = ['name','slug','price','details','description'];

    public function categories(){
        return $this->belongsToMany('App\category');
    }
    
    public function orders(){
        return $this->belongsToMany('App\Order');
    }

    public function uploadImg($path){
        return ($path != null ) && file_exists('storage/'.$path) ? asset('storage/'.$path) : asset('img/not-found.jpg');
    }
 
}
