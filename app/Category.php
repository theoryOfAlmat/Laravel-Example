<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
	
		public function products()
    {
        return $this->hasMany('App\Product');
    }
	
		public function children()
    {
        return $this->hasMany('App\Category', 'parent_id');
    }
	
		public static function boot() {
				parent::boot();
				
				static::deleting(function($category) {
             $category->products()->delete();
             $category->children()->delete();
        });
		}
}
