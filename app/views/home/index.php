

<?php  include_once(__ROOT__.'views/layouts/header.php'); ?>

 


        <?php foreach ($data['blogs'] as $post) { ?>
             
        <section class="mt-6  p-8 lg:w-3/5 mx-auto mb-32 ">
            <h1 class="text-4xl text-slate-700 text-center">
            <?php echo $post->title; ?>
                 </h1>
                 <p class="prose text-sm py-4 text-slate-700/60 text-center">
                     <span class="text-slate-700"><?php echo $post->category; ?></span> <?php echo date(' F j, Y  ',strtotime($post->created_at)); ?>  <span class="text-slate-700">Nicola Pasa</span>
                 </p>
                       <img src="<?php echo URL_IMAGES.$post->image; ?>" alt="<?php echo $post->title; ?>" class="mx-auto w-[400px]">
      <div class="prose p-8 text-justify mb-8">
      <?php 
      $helpers=new Helpers;


      
      echo $helpers->cut_text($post->content, 650); ?>  
      </div>
            <a href="<?php echo URL_GEN.'blogs/show/'.$post->slug; ?>" class=" text-sm px-12 text-slate-500 border-slate-600/10 border-b-2 hover:bg-slate-700/10">
            Continua a leggere <i class="fa-solid fa-arrow-right"></i></a>

            

            </section>
            <?php }     ?>      
            <ul class="flex gap-4 mt-4  justify-center">
        <li><a href="<?php echo URL_GEN.'home/index/1';?>">First</a></li>
        <li class="<?php if($data['pagination'][0] <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($data['pagination'][0]  <= 1){ echo '#'; } else { echo URL_GEN.'home/index/'.($data['pagination'][0]  - 1); } ?>">Prev</a>
        </li>
        <li class="<?php if($data['pagination'][0]  >= $data['pagination'][1]){ echo 'disabled'; } ?>">
            <a href="<?php if($data['pagination'][0]  >= $data['pagination'][1]){ echo '#'; } else { echo URL_GEN.'home/index/'.($data['pagination'][0] + 1); } ?>">Next</a>
        </li>
        <li><a href="<?php echo URL_GEN.'home/index/'.$data['pagination'][1];?>">Last</a></li>
         </ul>    
         

  <?php  include_once(__ROOT__.'views/layouts/footer.php'); ?>


