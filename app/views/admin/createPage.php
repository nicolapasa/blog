

<?php  include_once(__ROOT__.'views/layouts/header.php'); ?>

<section class="mt-12 border-slate-500 border-b-2 py-8">
           <h1 class="text-6xl font-bold text-center">Create Page</h1>





<div class="w-4/5 m-auto pt-20">

    <form action="<?php echo URL_GEN;?>admin/storePage" 
          method="POST"
          enctype="multipart/form-data"
          >


          <input type="text" name="title" placeholder="title" class="block bg-transparent border-b-2 w-full  outline-none">

          <textarea name="content" placeholder="content page... "  class="py-5 bg-transparent border-b-2 w-full h-60   outline-none"></textarea>
          <input type="file" name="image" placeholder="url image" class="block bg-transparent border-b-2 w-full  outline-none">
         
     
          <button type="submit" class="uppercase mt-15 bg-blue-500 text-gray-100  font-extrabold rounded px-3 py-2">Save</button>
    </form>
</div>

<script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    });
  </script>

<?php  include_once(__ROOT__.'views/layouts/footer.php'); ?>