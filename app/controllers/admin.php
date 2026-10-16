<?php 



class Admin extends Controller{

    public $pages;
    public $categories;
     //method to autorize access to a page without login if not auth you are redirect
     public function __construct(){
        $middleware=new Middleware();

       
           
        $this->pages=$this->model('Pages')->all();
           
        $this->categories=$this->model('Categories')->all();
    }


    public function index(){
        
        $post=$this->model('Post');
           
        $blogs=$post->all();
  
         
  
        $this->view('admin/index', ['blogs'=>$blogs, 'pages'=>$this->pages, 'categories'=> $this->categories]);

  
    }
  

    public function create()
    {
     
        $this->view('admin/create', ['pages'=>$this->pages, 'categories'=> $this->categories]);
        
    }


    public function store()
    {
        Middleware::verifyPost();
     $post=$this->model('Post');
        
        $request=$_POST;
        $image= Upload::upload_file($_FILES['image'] ?? []);
      //@check se username esistente
          $post->create([
              'title'=>$request['title'],
              'slug'=>Helpers::slugify($request['title']),
              'content'=>$request['content'],
              'category'=>$request['category'],
              'image'=>$image
           ]);
          
            
           header("Location: ".URL_GEN."admin/index", true, 303);
      
    }


    public function edit($id)
    {
        
            
        $post=$this->model('Post');
           
        $blog=$post->where('id',$id)->first();
        if (!$blog) { http_response_code(404); $this->view('home/not-found', ['pages'=>$this->pages, 'categories'=>$this->categories, 'title'=>'Contenuto non trovato | Redrum']); return; }

    

        $this->view('admin/edit', ['post'=>$blog, 'pages'=>$this->pages, 'categories'=> $this->categories]);
        
    }

    public function update($id)
    {
        Middleware::verifyPost();
     
        $post=$this->model('Post');
        
        $request=$_POST;

       if(!empty($_FILES['image']['name'])){
        $image= Upload::upload_file($_FILES['image'] ?? []);
       }
       else{
      $image = $post->findOrFail($id)->image;
       }
        
      //@check se username esistente
          $post
          ->where('id', $id)
          ->update([
              'title'=>$request['title'],
              'slug'=>Helpers::slugify($request['title']),
              'content'=>$request['content'],
              'category'=>$request['category'],
              'image'=>$image
           ]);
          
            
         header("Location: ".URL_GEN."admin/index", true, 303);
        
    }

    public function destroy($id=0)
    {
        Middleware::verifyPost();
        $post=$this->model('Post');
     
        $blog =$post->where('id', $id);
        $blog->delete();

        header("Location: ".URL_GEN."admin/index", true, 303);
        
    }

    public function users(){

        $user=$this->model('User');
           
        $users=$user->all();
  
         
  
        $this->view('admin/profileAll', ['users'=>$users, 'pages'=>$this->pages, 'categories'=> $this->categories]);


    }
    public function editProfile($id){

        $user=$this->model('User');
       
       $profile=$user->where('id', $id)->first();
        if (!$profile) { http_response_code(404); $this->view('home/not-found', ['pages'=>$this->pages, 'categories'=>$this->categories, 'title'=>'Contenuto non trovato | Redrum']); return; }
  
         // var_dump($profile);         
  
        $this->view('admin/profileSingle', ['user'=>$profile, 'pages'=>$this->pages, 'categories'=> $this->categories]);




    }

    public function indexPages(){
        
        $page=$this->model('Pages');
           
        $pages=$page->all();
  
         
  
        $this->view('admin/pages', ['pages'=>$pages, 'categories'=>$this->categories, 'title'=>'Pagine | Redrum']);

  
    }
  

    public function createPage()
    {
     
        $this->view('admin/createPage', ['pages'=>$this->pages, 'categories'=> $this->categories]);
        
    }

    
    public function storePage()
    {
        Middleware::verifyPost();
        $page=$this->model('Pages');
        
        $request=$_POST;
        $image= Upload::upload_file($_FILES['image'] ?? []);
      //@check se username esistente
          $page->create([
              'title'=>$request['title'],
              'content'=>$request['content'],
              'slug'=>Helpers::slugify($request['title']),
              'image'=>$image
           ]);
          
            
           header("Location: ".URL_GEN."admin/indexPages", true, 303);
      
    }

    public function editPage($id)
    {
        
            
        $page=$this->model('Pages');
           
        $page=$page->where('id',$id)->first();
        if (!$page) { http_response_code(404); $this->view('home/not-found', ['pages'=>$this->pages, 'categories'=>$this->categories, 'title'=>'Contenuto non trovato | Redrum']); return; }

    

        $this->view('admin/editPage', ['page'=>$page, 'pages'=>$this->pages, 'categories'=> $this->categories]);
        
    }

    public function updatePage($id)
    {
        Middleware::verifyPost();
     
        $page=$this->model('Pages');
        
        $request=$_POST;

       if(!empty($_FILES['image']['name'])){
        $image= Upload::upload_file($_FILES['image'] ?? []);
       }
       else{
      $image = $page->findOrFail($id)->image;
       }
        
 
          $page
          ->where('id', $id)
          ->update([
              'title'=>$request['title'],
              'content'=>$request['content'],
              'slug'=>Helpers::slugify($request['title']),
              'image'=>$image
           ]);
          
            
         header("Location: ".URL_GEN."admin/indexPages", true, 303);
        
    }


    public function destroyPage($id=0)
    {
        Middleware::verifyPost();
        $page=$this->model('Pages');
     
        $blog =$page->where('id', $id);
        $blog->delete();

        header("Location: ".URL_GEN."admin/indexPages", true, 303);
        
    }
}