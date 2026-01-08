<?php

$dbhost = 'localhost';
$dbuser = 'cebromco_aswebx';
$dbpass = 'As*131316';
$dbname = 'cebromco_asweb';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);

$imageids_arr = array();

if(isset($_POST['imageids'])){
   $imageids_arr = $_POST['imageids'];
}

if(count($imageids_arr) > 0){
   // Update sort position of images
   $position = 1;
   foreach($imageids_arr as $id){
      mysqli_query($conn,"UPDATE fotos_filiais SET posicao=".$position." WHERE id=".$id);
      $position ++;
   }
   echo 1;
   exit;
}else{
   echo 0;
   exit;
} ?>