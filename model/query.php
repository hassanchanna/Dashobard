<?php
include("dashmin/php/connection.php");
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
?>