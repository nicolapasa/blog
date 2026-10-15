<?php  include_once(__ROOT__.'views/layouts/header.php'); ?>

<section class="mt-12 border-slate-500 border-b-2 py-8">
           <h1 class="text-6xl font-bold text-center">Create User</h1>

           <div class="w-2/5 mx-auto shadow rounded bg-slate-50 p-4 mt-4 flex justify-center">
           <form action="<?php echo URL_GEN;?>auth/signup/" method="post" enctype="multipart/form-data">


            <input type="text" placeholder="username" name="username" class="block border-b-2 w-full h-5 py-2 rounded   outline-none mb-4">
            <input type="password"  placeholder="password" name="password" class="block border-b-2 w-full h-5 py-2 rounded   outline-none mb-4">
            <input type="email" placeholder="email" name="email" class="block border-b-2 w-full h-5 py-2 rounded   outline-none mb-4">
            <input type="file" name="image" class=" outline-none mb-4 w-full">
            <input type="submit" value="save" class="uppercase mt-4 bg-slate-900 text-gray-100 font-extrabold rounded px-4 py-2">
            </form>
           </div>
        </section>

<?php  include_once(__ROOT__.'views/layouts/footer.php'); ?>