<?php  include_once(__ROOT__.'views/layouts/header.php'); ?>

<section class="mt-12 border-slate-500 border-b-2 py-8">
           <h1 class="text-6xl font-bold text-center">Sign in</h1>

           <?php   
   
           if(isset($data)) {
        echo ($data['message']);        
}
?>
<div class="w-2/5 mx-auto shadow rounded bg-slate-50 p-4 mt-4 flex justify-center">

<form action="<?php echo URL_GEN;?>auth/signin/" method="post" enctype="multipart/form-data">

<input type="text" name="username" class="block border-b-2 w-full h-5 py-2 rounded   outline-none mb-4">
<input type="password" name="password" class="block border-b-2 w-full h-5 py-2 rounded   outline-none mb-4">
<input type="submit" value="enter" class="uppercase mt-15 bg-slate-900 text-gray-100 font-extrabold rounded px-4 py-2">


</form>
</div>

        </section>

<?php  include_once(__ROOT__.'views/layouts/footer.php'); ?>

