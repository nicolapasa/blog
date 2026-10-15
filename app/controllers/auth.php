<?php 



class Auth extends Controller{
     
  
  

    public function login()
    {
     
        $this->view('auth/login', []);
        
    }
    public function register()
    {
        $this->view('auth/register', []);
    }
 
    public function signup(){


        $user=$_POST;
    $image=  Upload::upload_file($_FILES['image']);
      //@check se username esistente
           User::create([
              'username'=>$user['username'],
              'email'=>$user['email'],
              'password'=>password_hash($user['password'], PASSWORD_BCRYPT),
              'image'=>$image
           ]);
          
            
            //redirect 
            header("Location: ".URL_GEN."admin/users", true, 301);

    }


    public function signin(){
        $user=$_POST;
      
     $fields=   User::where('username', $user['username'])->first();

    if($fields){
       $password=$fields->password;
        if( password_verify($user['password'], $password) ){
              $_SESSION["username"] = $user['username'];
              header("Location: ".URL_GEN."home/index", true, 301);
        } 
        else{
          
            $this->view('auth/login', ['message'=>'password non valida']);
        }
    }
    else{
        //@todo messaggi in vista login 
    
        $this->view('auth/login', ['message'=>'username inesistente']);
    }
       

        
    }
    public function logout()
    {
        // remove all session variables
        session_unset();

        // destroy the session
        session_destroy();
        $this->view('auth/login', []);
        
    }

    public function contact(){

       $mail_field=$_POST;
        
        //sanitaze input
         $message='A message from '. $mail_field['name'].'  email: '.$mail_field['email']. ' message:'. $mail_field['message'];

        @mail('nicola.pasa@gmail.com', 'request from website', $message);

       // $this->view('pages/contact', ['message'=>'message sent']);
        header("Location: ".URL_GEN."home/static/contact", true, 301);

    }

    public function updateProfile($id){


        
        $post=$this->model('User');

        $user=$_POST;
        if($_FILES['image']['name']!=''){
            $image=  Upload::upload_file($_FILES['image']);
           }
           else{
          $image =$user['image_value'];
           }

          if($user['new_password'] !='')  {
            $password=password_hash($user['new_password'], PASSWORD_BCRYPT);
          }
          else{
            $profile=$post->where('id', $id)->first();
            $password=$profile->password;
          }
       
      //@check se username esistente
      $post
      ->where('id', $id)
      ->update([
              'username'=>$user['username'],
              'email'=>$user['email'],
              'password'=>$password,
              'image'=>$image
           ]);
          
            
            //redirect 
            header("Location: ".URL_GEN."admin/users", true, 301);

    }

    public function destroyProfile($id=0)
    {
        $user=$this->model('User');
     
        $profile =$user->where('id', $id);
        $profile->delete();

        header("Location: ".URL_GEN."admin/users", true, 301);
        
    }

}