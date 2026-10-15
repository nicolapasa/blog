<?php 



class Blogs extends Controller{
       //call method middleware
       public $pages;
       public $categories;
       public $title='Redrum... a minimalistic horror blog by Nicola Pasa';
       public function __construct(){
 
    
            
         $this->pages=$this->model('Pages')->all();
         $this->categories=$this->model('Categories')->all();
         
     }
  
    public function index(){
        
   
        $post=$this->model('Post');
           
        $blogs=$post->all();

       

     $this->view('blogs/index',['blogs'=>$blogs]);

  
    }
    public function show($slug){
        
       
        $post=$this->model('Post');
           
        $blog=$post->where('slug',$slug)->first();

       

     if (!$blog) {
        http_response_code(404);
        $this->view('home/search', ['result'=>[], 'pages'=>$this->pages, 'categories'=>$this->categories, 'title'=>'Articolo non trovato | Redrum']);
        return;
     }
     $related = $this->model('Post')->where('category', $blog->category)->where('id', '!=', $blog->id)->orderBy('created_at', 'DESC')->limit(3)->get();
     $this->view('blogs/single',['related'=>$related, 'post'=>$blog, 'pages'=>$this->pages, 'categories'=> $this->categories, 'title'=>$this->title." ".$blog->title]);

  
    }

 

}