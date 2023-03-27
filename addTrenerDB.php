<?php

$con = mysqli_connect("localhost", "root", "", "fitnes_kushneruk");
if(!empty($_POST)){
    $surname = $_POST["surname"];
    $name = $_POST["name"];
    $patronymic = !empty ($_POST["patronymic"])?$_POST["patronymic"]:"null";
    $birthday = $_POST["birthday"];
    $gender = $_POST["gender"];
    $phone = $_POST["phone"];
    $pass = $_POST["pass"];
    $awards = !empty ($_POST["awards"])?$_POST["awards"]:"-";
    
    $photo = $_FILES["photo"]["name"];
    $tmp_name = $_FILES["photo"]["tmp_name"];
    $created_at = date("Y-m-d h:i:s");



    $query = "insert into users (id_user, surname, name, patronymic, birthday, phone, gender, pasword, role, awards, created_at, photo) values (null,'$surname','$name','$patronymic','$birthday','$phone','$gender','$pass','3','$awards','$created_at','$photo')";
    
    $result = mysqli_query($con,$query);
    if($result){
        move_uploaded_file($tmp_name,"img/".$photo);
        echo "<script>location.href='/';</script>";
        
    }
    else{
        echo  "<script>alert('Ошибка добавления, попробуйте снова!');</script>";
echo mysqli_error($con);
}
}   
?>