<?php 


class Upload{



    public function upload_file($file=[]){
           
   
        $target_file =UPLOAD_DIR . basename($file["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

      // Check file size
        if ($file["size"] > 2000000) {
            echo "Sorry, your file is too large.";
            return false;
        }
        
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            return false;

        }
     
        move_uploaded_file($file["tmp_name"], $target_file);
          return htmlspecialchars( basename( $file["name"]));
    }
}