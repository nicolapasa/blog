<?php 



class Home extends Controller{
     
      //call method middleware
      public $pages;
      public $categories;
      public $recent_posts;
      public $title='Redrum... a minimalistic horror blog by Nicola Pasa';
      public function __construct(){

    
           
        $this->pages=$this->model('Pages')->all();
       
           
        $this->categories=$this->model('Categories')->all();
        
    }

  
    public function index($page=1){
        
   
      
           
       

        $postPerPage = 5;
        $page = max(1, (int) $page);
        $offset = ($page-1) * $postPerPage;
        $total_pages= max(1, (int) ceil($this->model('Post')->count()/$postPerPage));
         
        

        $posts=$this->model('Post')->offset($offset)
        ->limit($postPerPage)
        ->orderby('created_at', 'DESC')
        ->get();


       

     $this->view('home/index', ['blogs'=>$posts, 'pages'=>$this->pages, 'categories'=> $this->categories,  'pagination'=>[$page, $total_pages], 'title'=>$this->title]);

  
    }

    public function search(){
    

        $result=$this->model('Post')->where('content', 'like', '%'.($_GET['search'] ?? $_POST['search'] ?? '').'%')->orwhere('title', 'like', '%'.($_GET['search'] ?? $_POST['search'] ?? '').'%')->get();

        $this->view('home/search', ['result'=>$result,   'pages'=>$this->pages, 'categories'=>$this->categories, 'recent_posts'=>$this->recent_posts, 'title'=>$this->title." pagina ricerca"]);

    }
    public function pages($slug=''){
        
        
        $page=$this->model('Pages')->where('slug',$slug)->first();
       

     $this->view('home/page', ['page'=>$page, 'pages'=>$this->pages, 'categories'=> $this->categories, 'title'=>$this->title." ".$page->title]);

  
    }
    public function categories($category='', $page=1){
        
        
        $postPerPage = 5;
        $page = max(1, (int) $page);
        $offset = ($page-1) * $postPerPage;
        $total_pages= max(1, (int) ceil($this->model('Post')->where('category',$category)->count()/$postPerPage));
         
        

        $posts=$this->model('Post')->where('category',$category)->offset($offset)
        ->limit($postPerPage)
        ->orderby('created_at', 'DESC')
        ->get();
       
     //var_dump($posts);
     $this->view('home/categories', ['category'=>$category, 'posts'=>$posts, 'pages'=>$this->pages, 'categories'=>$this->categories, 'recent_posts'=>$this->recent_posts, 'pagination'=>[$page, $total_pages] , 'title'=>$this->title." ".$category]);

  
    }
    public function static($page)
    {
        $this->view('home/'.$page, ['pages'=>$this->pages, 'categories'=> $this->categories, 'title'=>$this->title." ".$page]);

        
    }
    public function create()
    {
        $this->view('home/create', []);

        
    }
    public function store()
    {
        $user=$_POST;
      //  print_r($user);
         User::create([
            'username'=>$user['username'],
            'email'=>$user['email']
         ]);
        

         //redirect 
         $users=User::all();

       

         $this->view('home/index', ['users'=>$users]);
    }
 

}