
<footer class="mt-12 mx-auto w-4/5 text-center mb-8">

<p class="text-slate-500 border-gray-300 border-b border-dotted py-4 px-12">
        copyright Nicola Pasa 2023
    

        <?php    if(isset($_SESSION["username"]))    {           ?>

         <a href="<?php echo URL_GEN.'auth/logout';?>" class="capitalize text-slate-600 hover:text-black">logout</a>
         <a href="<?php echo URL_GEN.'admin/index';?>" class="capitalize text-slate-600 hover:text-black">admin dashboard</a>

         <?php } else{ ?>  
        <a href="<?php echo URL_GEN.'auth/login';?>" class="uppercase text-slate-600 hover:text-black">login</a>
 
       <!-- <a href="<?php echo URL_GEN.'auth/register';?>" class="uppercase text-slate-600 hover:text-black">register</a>-->
        <?php }  ?>  
     </p>
     <a id="scroll-to-top" href="#">Back to top</a>
      </footer>
      </main> 
      <script>
        const toggle_btn=document.querySelector('.mobile-btn')
        const toggle_btnIcon=document.querySelector('.mobile-btn i')
        const dropDownMenu=document.querySelector('#dropmenu')
     toggle_btn.onclick=function () {
         dropDownMenu.classList.toggle('open')
         const isOpen= dropDownMenu.classList.contains('open')
        //  toggle_btnIcon.classList=isOpen
        //  ? 'fa-solid fa-x'
        //  : 'fa-solid fa-bars'
     }

     const scrollToTopButton = document.getElementById('scroll-to-top');

// Add a click event listener to the arrow link
scrollToTopButton.addEventListener('click', () => {
  // Scroll to the top of the page smoothly
  window.scrollTo({
    top: 0,
    behavior: 'smooth'
  });
});

     </script>
</body>
</html>