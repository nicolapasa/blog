<?php 

use Illuminate\Database\Eloquent\Model as Eloquent;


class Pages extends Eloquent
{
   public $name;

 
   protected $fillable=['title', 'content', 'image'];
}