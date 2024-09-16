<?php
include("connection.php");
if(isset($_POST['addCategory'])){
    $categoryName = $_POST['cName'];
    $categoryImageName = $_FILES['cImage']['name'];
    $categoryTmpImage =  $_FILES['cImage']['tmp_name'];
    $extension  = pathinfo($categoryImageName,PATHINFO_EXTENSION);
    $filePath = 'img/categories/'.$categoryImageName;
    if($extension == "jpg" || $extension == "jpeg" || $extension == "png" || $extension == "webp"){
if(move_uploaded_file($categoryTmpImage,$filePath)){
    $query = $pdo->prepare("insert into categories(catName,catImage) values(:pn,:pi)");
    $query->bindParam('pn',$categoryName);
    $query->bindParam("pi",$categoryImageName);
    $query->execute();
    echo "<script>alert('category added into table')</script>";
}
    }else{
        echo "<script>alert('you may use only jpg,png,webp or jpeg format ')</script>";
    }
}


?>