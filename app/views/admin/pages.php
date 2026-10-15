<?php  include_once(__ROOT__.'views/layouts/header.php'); ?>

<section class="mt-12 border-slate-500 border-b-2 py-8">
           <h1 class="text-6xl font-bold text-center">Admin Dashboard</h1>
      



           <div class="w-4/5  mx-auto text-center">
        <div class="text-left mt-2"><a href="<?php echo URL_GEN;?>admin/createPage" class="inline-block px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
            New Page
        </a></div>    
 
        
          <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
              <div class="overflow-hidden">
              <table class="min-w-full text-center">
                  <thead class="border-b bg-gray-800">
                <tr>
                    <th class="text-sm font-medium text-white px-6 py-4">id</th>
                    <th class="text-sm font-medium text-white px-6 py-4">title</th>
                    <th class="text-sm font-medium text-white px-6 py-4">preview</th>
                    <th class="text-sm font-medium text-white px-6 py-4">slug</th>
                    <th class="text-sm font-medium text-white px-6 py-4">edit</th>
                    <th class="text-sm font-medium text-white px-6 py-4">delete</th>
                </tr>
            </thead>
            <tbody>
           
        <?php foreach ($data['pages'] as $page) { ?>
          
   
          <tr class="bg-white border-b">
                <td  class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                <?php echo $page->id ; ?>
                    </td>
                    <td  class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    <?php echo $page->title; ?>
                    </td>
                    <td  class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                   <img src="<?php echo URL_IMAGES.$page->image; ?>" alt="" class="block object-cover object-center w-20 h-20 rounded-lg"> 
                    </td>
                    <td  class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    <?php echo $page->slug; ?>
                    </td>
                    <td  class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        <a href="<?php echo URL_GEN;?>admin/editPage/<?php echo $page->id ; ?>"  class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">edit</a>
                    </td>
                    <td  class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    <form action="<?php echo URL_GEN;?>admin/destroyPage/<?php echo $page->id; ?>" method="post">
                            
        
                              <button class="inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out" type="submit">Delete</button>
                              </form>
                    </td>
                </tr>
                <?php }     ?>   
            </tbody>
          </table>  
          </div>
            </div>
          </div>
        </div>

      </div>
        </section>

<?php  include_once(__ROOT__.'views/layouts/footer.php'); ?>