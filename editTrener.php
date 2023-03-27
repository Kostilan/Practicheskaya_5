<?php
include ("header.php");
$con = mysqli_connect("localhost", "root", "", "fitnes_kushneruk");
$sql_query = "select id_user, surname, name, patronymic from users where role=3";
$result = mysqli_query($con, $sql_query);

$query_first_id = "select id_user from users where role=3 limit 1";
$result_first_id = mysqli_fetch_array(mysqli_query($con,$query_first_id));

$idTrener = !empty($_GET["idTrener"])?$_GET["idTrener"]:$result_first_id["id_user"];

$query = "select * from users where id_user=".$idTrener;
    $trenerInfo = mysqli_query($con, $query);
    $trenerInfo = mysqli_fetch_array($trenerInfo);

?>

<div class="container flex">
    <div class="trener-list">
        <h2>Список тренеров</h2>
    <?php
while ($trener = mysqli_fetch_assoc($result)){?>
    <div class = "trener-item flex">
        
        <p>
            <?=$trener["surname"]. " ".$trener["name"]. " ".$trener["patronymic"]; ?>
        </p>
       <a href="?idTrener=<?=$trener["id_user"];?>"><button class = "btn btn-edit">&#9998;</button></a>
       <a href="/deleteTrenerDB.php?trenerId=<?=$trener["id_user"];?>"><button class = "btn btn-delete">&#128465;</button></a>
    </div>
    <?php } ?>

    </div>

    <div class="form-edit">
    <div class="container flex flex-column-center">
    <h2>Редактирование тренера</h2>
     
    <form action="./editTrenerDB.php" method="POST"  enctype="multipart/form-data">
        <input type="text" value="<?=$idTrener; ?>" name="trenerId" style="display:none;">
        <div class="input-group"><label for="surname">Введите фамилию</label><input id="surname"  name="surname" type="text" value="<?=$trenerInfo['surname'];?>"></div>
        <div class="input-group"><label for="name">Введите имя</label><input id="name" name="name" type="text" value="<?=$trenerInfo['name'];?>"></div>
        <div class="input-group"><label for="patronymic">Введите отчество</label><input id="patronymic" name="patronymic" type="text" value="<?=$trenerInfo['patronymic'];?>"></div>
        <div class="input-group"><label for="birthday">Введите дату рождения </label><input id="birthday" name="birthday" type="date" value="<?=$trenerInfo['birthday'];?>"></div>
        <div class="input-group"><label for="phone">Введите номер телефона</label><input id="phone" name="phone" type="text" value="<?=$trenerInfo['phone'];?>"></div>
        <div class="input-group"><label for="photo">Выберите изображение</label><input id="photo" name="photo" type="file"></div>
        <label for="gender-m" style="margin: 5px;">Выберите пол</label> 
        <div class="input-group ig-radio">
            <label for="gender-m">М</label><input id="gender-m" name="gender" value= "M" type="radio" <?=($trenerInfo['gender']=='M')?'checked':"";?>>
            <label for="gender-w">Ж</label><input id="gender-w" name="gender" value= "W" type="radio" <?=($trenerInfo['gender']=='W')?'checked':"";?>>
        </div>
        <div class="input-group"><label for="pass">Введите пароль</label><input id="pass" name="pass" type="password" value="<?=$trenerInfo['pasword'];?>"></div>
        <div class="input-group"><label for="awards">Введите награды</label><input id="awards" name="awards" type="text" value="<?=$trenerInfo['awards'];?>"></div>
        <div class="input-group"><input type="submit" value="Редактирование"></div>
    </form>
</div>

    </div>
</div>


</body>
</html>
