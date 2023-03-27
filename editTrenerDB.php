<?php

$con = mysqli_connect("localhost", "root", "", "fitnes_kushneruk");
    $trener_id = $_POST["trenerId"];
    $query = "SELECT * FROM users WHERE `id_user=`".$trener_id;
    $trenerInfo = mysqli_query($con,$query);
    $trenerInfo = mysqli_fetch_array($trenerInfo);

    $query_params = "";
    if(!empty($_POST)){
        $query_params.= ($trenerInfo["surname"]!=$_POST["surname"])?"`surname` ='".$_POST["surname"]."',":null; 
        $query_params.= ($trenerInfo["name"]!=$_POST["name"])?"`name` ='".$_POST["name"]."',":null; 
        $query_params.= ($trenerInfo["patronymic"]!=$_POST["patronymic"])?"`patronymic` ='".$_POST["patronymic"]."',":null; 
        $query_params.= ($trenerInfo["birthday"]!=$_POST["birthday"])?"`birthday` ='".$_POST["birthday"]."',":null; 
        $query_params.= ($trenerInfo["gender"]!=$_POST["gender"])?"`gender` ='".$_POST["gender"]."',":null; 
        $query_params.= ($trenerInfo["gender"]!=$_POST["gender"])?"`gender` ='".$_POST["gender"]."',":null; 
        $query_params.= ($trenerInfo["phone"]!=$_POST["phone"])?"`phone` ='".$_POST["phone"]."',":null; 
        $query_params.= ($trenerInfo["pass"]!=$_POST["pass"])?"`pasword` ='".$_POST["pass"]."',":null; 
        $query_params.= ($trenerInfo["awards"]!=$_POST["awards"])?"`awards` ='".$_POST["awards"]."',":null;
        if(!empty($_FILES["photo"]["tmp_name"])){
            $query_params.=($trenerInfo["photo"] != $_FILES["photo"]["name"])?"photo = '".$_FILES["photo"]["name"]."', ":null;
        }

        if($query_params!=""){
            $query_params = mb_substr($query_paramsy,0,mb_strlen($query_params)-2);
            $query_update = "UPDATE users SET ".$query_params." Where id_user=".$idTrener;

            $result_update = mysqli_query($con,$query_update);
            
            id($result_update){
                if(!empty($_FILES["photo"]["tmp_name"])){
                    move_uploaded_file($_FILES["photo"]["tmp_name"],"img/".$_FILES['photo']['name']);
                }

                echo "<script>alert('Запись отредактирована успешно!');location.href='/editTrener.php';</script>";
            }else{
                echo "<script>alert('Ошибка редактирования! Попробуйте снова.')</script>";
                echo mysqli_error($con),"<br>",$query_update;
            }
        }
    }
?>