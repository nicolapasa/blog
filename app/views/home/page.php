<?php  include_once(__ROOT__.'views/layouts/header.php'); ?>

<section class="mt-12 border-slate-100 border-b-2 py-8">
           <h1 class="text-6xl font-bold text-center"><?php echo $data['page']->title;?> </h1>
          
        </section>
        <section class="mt-6 mb-6 p-8 lg:w-3/5 mx-auto text-center ">
        <div class=" w-full mx-auto text-center ">
         
         <img src="<?php echo URL_IMAGES.$data['page']->image; ?>" alt="" class="lg:w-4/5  mx-auto" />
         <div class=" lg:text-justify py-2 text-center">
             <div class="prose  text-justify">
             <?php echo $data['page']->content;?>     
             </div>
             
         </div>
         </div>
        </section>
        

<?php  include_once(__ROOT__.'views/layouts/footer.php'); ?>