<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'description', 'image', 'category_id', 'posted_by'];

    //Mutator
    public function setDescriptionAttribute($value){
        $this->attributes['description'] = htmlspecialchars($value);
    }
}
