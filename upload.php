<?php

if(!empty($_FILES['images'])){

    $targetDir = "./uploads/";
    $allowTypes = array('jpg','png','jpeg','gif');

    $images_arr = array();
    foreach($_FILES['images']['name'] as $key=>$val){
        $image_name = $_FILES['images']['name'][$key];
        $tmp_name   = $_FILES['images']['tmp_name'][$key];
        $size       = $_FILES['images']['size'][$key];
        $type       = $_FILES['images']['type'][$key];
        $error      = $_FILES['images']['error'][$key];

        $fileName = basename($_FILES['images']['name'][$key]);
        $targetFilePath = $targetDir . $fileName;
        
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
        if(in_array($fileType, $allowTypes)){    

            if(move_uploaded_file($_FILES['images']['tmp_name'][$key],$targetFilePath)){
                $images_arr[] = $targetFilePath;
            }
        }
    }
    
    if(!empty($images_arr)){ ?>
        <?php foreach($images_arr as $image_src){ ?>
            <img src="<?php echo $image_src; ?>" alt="изображение" class="user-images">
        <?php } ?>
    <?php }
}
?>