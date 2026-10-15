<?php
use Illuminate\Database\Eloquent\Model as Eloquent;


class Categories extends Eloquent
{
   public $name;

 
   protected $fillable=['title'];
}