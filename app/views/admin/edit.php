

<?php  include_once(__ROOT__.'views/layouts/header.php'); ?>

<section class="mt-12 border-slate-500 border-b-2 py-8">
           <h1 class="text-6xl font-bold text-center">Update Post</h1>





<div class="w-4/5 m-auto pt-20">

    <form action="<?php echo URL_GEN;?>admin/update/<?php echo $data['post']->id; ?>" 
          method="POST"
          enctype="multipart/form-data"
          >


          <input type="text" name="title" placeholder="title" class="block bg-transparent border-b-2 w-full  outline-none" value="<?php echo $data['post']->title; ?>">

          <textarea name="content" placeholder="content blog... "  class="py-5 bg-transparent border-b-2 w-full h-60   outline-none">
          <?php    echo $data['post']->content; ?>  
          </textarea>
          <input type="hidden" name="image_value" id="image_value" value="<?php echo $data['post']->image; ?>">
          <button id="preview" type="button"> change <img src="<?php echo URL_IMAGES.$data['post']->image; ?>"  class="h-20" ></button>
          <input type="file" name="image" placeholder="url image" class=" bg-transparent border-b-2 w-full  outline-none hidden" id="image_field">
          <select name="category" class="py-5 bg-transparent border-b-2 w-full  outline-none">
                  <option value="<?php    echo $data['post']->category; ?>" selected><?php    echo $data['post']->category; ?></option>
                  <option value="racconti">racconti</option>
                  <option value="saggi">saggi</option>
                  <option value="recensioni">recensioni</option>

        </select>
     
          <button type="submit" class="uppercase mt-15 bg-blue-500 text-gray-100  font-extrabold rounded px-3 py-2">Update</button>
    </form>
</div>

<script>
    let btn =document.getElementById('preview');
    let image_field =document.getElementById('image_field');

    btn.addEventListener('click', function(){

        image_field.classList.toggle("hidden");
    })


    tinymce.init({
      selector: 'textarea',
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    });
  </script>

<?php  include_once(__ROOT__.'views/layouts/footer.php'); ?>