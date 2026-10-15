<?php  include_once(__ROOT__.'views/layouts/header.php'); ?>



<section class="mt-12 border-slate-500 border-b-2 py-8">
           <h1 class="text-6xl font-bold text-center">Edit profile</h1>

           <div class="w-2/5 mx-auto shadow rounded bg-slate-50 p-4 mt-4 flex justify-center">
           <form action="<?php echo URL_GEN;?>auth/updateProfile/<?php echo $data['user']->id; ?>" method="post" enctype="multipart/form-data">


            <input type="text" placeholder="username"  value="<?php echo $data['user']->username; ?>" name="username" class="block border-b-2 w-full h-5 py-2 rounded   outline-none mb-4">
            <input type="password"  placeholder="nuova password" value="" name="new_password" class="block border-b-2 w-full h-5 py-2 rounded   outline-none mb-4" autocomplete="off">
            <input type="email" placeholder="email" value="<?php echo $data['user']->email; ?>" name="email" class="block border-b-2 w-full h-5 py-2 rounded   outline-none mb-4">
            <input type="hidden" name="image_value" id="image_value" value="<?php echo $data['user']->image; ?>">
          <button id="preview" type="button"> change <img src="<?php echo URL_IMAGES.$data['user']->image; ?>"  class="h-20" ></button>
          <input type="file" name="image" placeholder="url image" class=" bg-transparent border-b-2 w-full  outline-none hidden" id="image_field">
            <input type="submit" value="update" class="uppercase mt-4 bg-slate-900 text-gray-100 font-extrabold rounded px-4 py-2">
            </form>
           </div>
        </section>
        <script>
    let btn =document.getElementById('preview');
    let image_field =document.getElementById('image_field');

    btn.addEventListener('click', function(){

        image_field.classList.toggle("hidden");
    })

  </script>
<?php  include_once(__ROOT__.'views/layouts/footer.php'); ?>