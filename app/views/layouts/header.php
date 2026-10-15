


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['title'];?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Coustard:wght@400;900&family=Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&family=UnifrakturMaguntia&display=swap" rel="stylesheet">

       <!-- Scripts -->
       <script src="https://cdn.tiny.cloud/1/bvd9c7l707a61o6ecrwwobfnj29yan9dsr1xgl52wshmyk98/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
       <link rel="stylesheet" href="<?php echo PUBLIC_DIR.'css/main.css';?>">
</head>
<body>

<header class="w-4/5 mx-auto text-center py-8 relative">
<img src="<?php echo URL_IMAGES.'logodesign2.png'; ?>"  class="mx-auto h-48 mt-2 py-3">
<a id="logo" href="<?php echo URL_GEN;?>" 
class="mb-4 text-8xl font-extrabold text-slate-700 tracking-wider border-gray-300 border-b border-dotted" >
    Redrum
</a>

<h2 class=" italic mt-6"> Ex Ignorantia Ad Sapientiam<br>Ex Luce Ad Tenebras </h2>


<ul class="lg:flex justify-center items-center  border-slate-600/10 border-b-2 border-t-2 mt-8">
    <li class="px-4 py-3"><a class="text-slate-700 capitalize border-slate-600/10 hover:border-b-2" href="<?php echo URL_GEN;?>">Home</a></li>
    <?php foreach ($data['categories'] as $category) { ?>
     

           <li class="px-4 py-3"><a class="text-slate-700 capitalize border-slate-600/10 hover:border-b-2" href="<?php echo URL_GEN.'home/categories/'.$category->title;?>"><?php echo $category->title;?></a></li>
    
     <?php } ?> 
    <?php foreach ($data['pages'] as $page) { ?>
        <li class="px-4 py-3"><a class="text-slate-700 capitalize border-slate-600/10 hover:border-b-2" href="<?php echo URL_GEN.'home/pages/'.$page->slug;?>"><?php echo $page->title;?></a></li>
     <?php } ?>   

    <li class="px-4 py-3"><a class="text-slate-700 capitalize border-slate-600/10 hover:border-b-2" href="<?php echo URL_GEN.'home/static/contact';?>">Contatti</a></li>
    <form action="<?php echo URL_GEN.'home/search/';?>" method="post">
          <input type="text" name="search" placeholder="cerca..." class="border-2 rounded w-32 ml-6">
          <button type="submit" class=""><i class="fa-solid fa-magnifying-glass"></i></button>
    </form> 

</ul>



<h2 class="text-sm text-slate-700  mt-6">
    Benvenuti in Redrum, sono uno scrittore horror indipendente, in questo blog troverete i miei racconti e i miei libri
    <br> oltre a qualche mia riflessione sulla scrittura e sulla società. 
   <br> 
</h2>
</header>


    
