<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'slug'];

    //slug Mutator
    public function setNameAttribute($name){
        $this->attributes['name'] = $name;
        $this->attributes['slug'] = $this->uniqueCategorySlug($name);
    }

    //unique slug genaretor
    private function uniqueCategorySlug($name){
        $slug = Str::of($name)->slug('-');
        $count = Category::where('slug', 'LIKE', "{$slug}%")->count();
       // $newCount = $count > 0 ? ++$count : '';
        return $count > 0 ? "$slug-$count" : $slug;
    }
}
