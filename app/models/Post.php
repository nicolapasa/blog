<?php 

use Illuminate\Database\Eloquent\Model as Eloquent;


class Post extends Eloquent
{
   public $name;

 
   protected $fillable=['title', 'content', 'category', 'image'];
}