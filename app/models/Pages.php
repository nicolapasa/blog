<?php 

use Illuminate\Database\Eloquent\Model as Eloquent;


class Pages extends Eloquent
{
   public $name;

 
   protected $fillable=['slug', 'title', 'content', 'image'];
}