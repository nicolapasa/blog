<?php 


class Middleware
{


    public function __construct(){


        if(!$_SESSION['username'])   {

            header("Location: ".URL_GEN."auth/login", true, 301);
        } 
        else{
            $fields=   User::where('username', $_SESSION['username'])->first();
            if($fields->username=='')    header("Location: ".URL_GEN."auth/login", true, 301);
        }
    }

}