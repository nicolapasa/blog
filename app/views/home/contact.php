<?php  include_once(__ROOT__.'views/layouts/header.php'); ?>

<section class="mt-12 border-slate-100 border-b-2 py-8">
           <h1 class="text-6xl font-bold text-center">Contact </h1>
        
        </section>


<div class="flex py-4 w-1/5 mx-auto justify-center">


      <a class="text-lg px-4" href="https://www.instagram.com/lazonamorta9/"> <i class="fa-brands fa-instagram fa-lg"></i></a>
      <a class="text-lg px-4" href="https://www.facebook.com/zonamorta.it"> <i class="fa-brands fa-facebook fa-lg"></i></a>

      <a class="text-lg px-4" href="https://www.linkedin.com/in/nicola-pasa-83087215/"> <i class="fa-brands fa-linkedin fa-lg"></i></a>



</div>



        <?php   
   
   if(isset($data)) {
echo ($data['message']);        
}
?>
<div class="w-2/5 mx-auto shadow rounded bg-slate-50 p-4 mt-4 flex justify-center">

<form action="<?php echo URL_GEN;?>auth/contact/" method="post" enctype="multipart/form-data">

<input type="text" name="name" placeholder="[your name]" class="block border-b-2 w-full h-5 py-2 rounded   outline-none mb-4">
<input type="email" name="email" placeholder="[your email" class="block border-b-2 w-full h-5 py-2 rounded   outline-none mb-4">
<input type="text" name="message" placeholder="[your message]" class="block border-b-2 w-full h-5 py-2 rounded   outline-none mb-4">

<input id="submit" type="submit" disabled value="Invia" class="uppercase mt-15 bg-slate-400 text-gray-100 font-extrabold rounded px-4 py-2">

<div class="text-center">
      <p>per inviare il messaggio dimostra che sei umano cliccando qui sotto </p>
        <span class="font-bold" id="enableButton" onclick="enableBtn()">clicca qui</span>
</div>
</form>
</div>

<script>
const submitBtn=document.querySelector('#submit')
const spanArea= document.querySelector('#enableButton')
   function enableBtn() {
         submitBtn.disabled=false
         submitBtn.classList.remove('bg-slate-400')
         submitBtn.classList.add('bg-slate-900')
      
   }

 

</script>
<?php  include_once(__ROOT__.'views/layouts/footer.php'); ?>