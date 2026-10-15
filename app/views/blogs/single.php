

<?php  include_once(__ROOT__.'views/layouts/header.php'); ?>



<section class="mt-12 border-slate-100 border-b-2 py-8">
           <h1 class="text-6xl font-bold text-center">  <?php echo $data['post']->title; ?> </h1>
            <p class="prose text-center py-2">      <span class="text-slate-700"><?php echo $data['post']->category; ?></span>  <?php echo date(' F j, Y  ',strtotime($data['post']->created_at)); ?>  <span class="text-slate-700">by Nicola Pasa</span>
               </p>
        </section>
 
        <section class="mt-6 mb-6 p-8 lg:w-3/5 mx-auto  ">

     
            
                       <img src="<?php echo URL_IMAGES.$data['post']->image; ?>" alt="<?php echo $data['post']->title; ?>" class="mx-auto w-[400px]">
      <div class="prose p-8 text-justify">
      <?php    echo $data['post']->content; ?>  
</div>
        


 

            </section>

  <?php  include_once(__ROOT__.'views/layouts/footer.php'); ?>