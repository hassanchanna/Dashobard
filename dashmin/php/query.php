<?php
include("connection.php");
$catImageAddress = 'img/categories/';
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
// update category
if(isset($_POST['updateCategory'])){
    $categoryName = $_POST['cName'];
    $categoryId = $_POST['cId'];
    if(!empty($categoryImageName = $_FILES['cImage']['name'])){
        $categoryImageName = $_FILES['cImage']['name'];
        $categoryTmpImage =  $_FILES['cImage']['tmp_name'];
        $extension  = pathinfo($categoryImageName,PATHINFO_EXTENSION);
        $filePath = 'img/categories/'.$categoryImageName;
        if($extension == "jpg" || $extension == "jpeg" || $extension == "png" || $extension == "webp"){
    if(move_uploaded_file($categoryTmpImage,$filePath)){
        $query = $pdo->prepare("update categories set catName= :pn , catImage = :pi where catId =:pid");
        $query->bindParam("pid",$categoryId);
        $query->bindParam('pn',$categoryName);
        $query->bindParam("pi",$categoryImageName);
        $query->execute();
        echo "<script>alert('category update into table')</script>";
    }
        }else{
            echo "<script>alert('you may use only jpg,png,webp or jpeg format ')</script>";
        }
    }else{
        $query = $pdo->prepare("update categories set catName= :pn  where catId =:pid");
        $query->bindParam("pid",$categoryId);
        $query->bindParam('pn',$categoryName);
        $query->execute();
        echo "<script>alert('category update into table')</script>";
    }
}
// ddeleteCategory
if(isset($_POST['deleteCategory'])){
    $categoryId = $_POST['cId'];
    $query = $pdo ->prepare("delete from categories where catId = :cid");
    $query->bindParam("cid",$categoryId);
    $query->execute();
    echo "<script>alert('category dalete from table')</script>";
}
?>                                                                         