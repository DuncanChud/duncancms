<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class BlogPosts extends Model
{
    protected $guarded = [];  // NEEDS TO BE HERE OR NO FIELDS CAN BE UPDATED

    protected $fillable = ['title','slug','body','author_id','is_active','image_path'];
    protected $connection = 'sqlite';
    protected $table = 'blogposts';
    


    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }


    /*
    However, before using the create method, you will need to specify either a 
    fillable or guarded property on your model class. These properties are 
    required because all Eloquent models are protected against mass assignment 
    vulnerabilities by default.
    */

   
}
