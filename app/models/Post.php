<?php 

use Illuminate\Database\Eloquent\Model as Eloquent;


class Post extends Eloquent
{
   public $name;

 
   protected $fillable=['slug', 'title', 'content', 'category', 'image'];
}