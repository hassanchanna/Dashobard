<?php
include("dashmin/php/connection.php");

$catImageAddress = 'dashmin/img/categories/';
$proImageAddress = 'dashmin/img/products/';

if(isset($_POST['registration'])){
    $name = $_POST['uname'];
    $email = $_POST['uemail'];
    $password = $_POST['upassword'];
    $hshPassword = sha1($password);
    $number = $_POST['unumber'];
    // checkEmail 
    $checkEmail= $pdo->prepare("select * from users where userEmail = :pe");
    $checkEmail ->bindParam("pe",$email);
    $checkEmail->execute();
    $mailTest = $checkEmail->fetch(PDO::FETCH_ASSOC);
    if(!empty($mailTest['userEmail'])){
echo "<script>alert('email already exist')</script>";
    }else{

    
    $query = $pdo->prepare("INSERT INTO `users`(`userName`, `userEmail`, `userPassword`, `userNumber`) VALUES(:un,:ue,:up,:unum)");
    $query->bindParam("un",$name);
    $query->bindParam("ue",$email);
    $query->bindParam("up",$hshPassword);
    $query->bindParam("unum",$number);
$query->execute();
echo "<script>alert('submitted');
location.assign('login.php');
</script>";
    }
}
// logIn
if(isset($_POST['logIn'])){
    $email = $_POST['uemail'];
    $password = $_POST['upassword'];
    $hshPassword = sha1($password);
    $query= $pdo->prepare("select * from users where userEmail =:pe && userPassword =:pp");
    $query->bindParam("pe",$email);
    $query->bindParam("pp",$hshPassword);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    if($result){
        
        $_SESSION['userId']=$result['userId'];
        $_SESSION['userName']=$result['userName'];
        $_SESSION['userEmail']=$result['userEmail'];
        $_SESSION['userPassword']=$result['userPassword'];
        $_SESSION['userRole']=$result['userRole'];
echo "<script>
alert('logged in successfully');
</script>";
if($_SESSION['userRole']=="admin"){
    echo "<script>
location.assign('dashmin/index.php');
</script>";
}else{
    echo "<script>
    location.assign('profile.php');
    </script>";
}
        // print_r($result);
    }else{
        echo "<script>alert('data not exist')</script>";

    }
}
// session_unset();
if(isset($_POST['addToCart'])){
    $pId = $_POST['pId'];
    $pName = $_POST['pName'];
    $pPrice = $_POST['pPrice'];
    $pQuantity = $_POST['pQuantity'];
    $pImage = $_POST['pImage'];

    if(isset($_SESSION['cart'])){
        $cartQuantity = false;
        foreach($_SESSION['cart'] as $key => $values){
            if($values['proId']==$pId){
                $cartQuantity=true;
                      unset($_SESSION['cart'][$key][$values['proQuantity']]);
                $values['proQuantity'] = $values['proQuantity']+$pQuantity;
          
                print_r( $values['proQuantity']);
                // die();
                // echo "<script>location.assign('shoping-cart.php')</script>";
               
            }

        }
    }else{
        $_SESSION['cart'][0]=array("proId"=>$pId,"proName"=>$pName,"proPrice"=>$pPrice,"proQuantity"=>$pQuantity,"proImage"=>$pImage);
        echo "<script>alert('product add into cart')</script>";
    }
}
?>