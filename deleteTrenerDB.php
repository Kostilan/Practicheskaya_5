<?php

$con = mysqli_connect("localhost", "root", "", "fitnes_kushneruk");

if(!empty($_GET)){
    $id_trener = $_GET["trenerId"];
    $query = "DELETE FROM `users` WHERE `id_user` = '$id_trener'";
    $result = mysqli_query($con, $query);
    if($result){
        header('location: editTrener.php');
    }
    else{
        
        echo 'Ошибка , попробуйте снова!';
}
 
}