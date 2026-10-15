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

       

     $this->view('blogs/single',['post'=>$blog, 'pages'=>$this->pages, 'categories'=> $this->categories, 'title'=>$this->title." ".$blog->title]);

  
    }

 

}