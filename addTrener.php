<?php
include("header.php");
?>   

<div class="container">
    <h2>Добавление тренера</h2>
    <form action="./addTrenerDB.php" method="POST" enctype="multipart/form-data">
        <div class="input-group"><label for="surname">Введите фамилию</label><input id="surname"  name="surname" type="text"></div>
        <div class="input-group"><label for="name">Введите имя</label><input id="name" name="name" type="text"></div>
        <div class="input-group"><label for="patronymic">Введите отчество</label><input id="patronymic" name="patronymic" type="text"></div>
        <div class="input-group"><label for="birthday">Введите дату рождения </label><input id="birthday" name="birthday" type="date"></div>
        <div class="input-group"><label for="phone">Введите номер телефона</label><input id="phone" name="phone" type="text"></div>
        <div class="input-group"><label for="photo">Выберите изображение</label><input id="photo" name="photo" type="file"></div>
        <label for="gender-m" style="margin: 5px;">Выберите пол</label> 
        <div class="input-group ig-radio">
            <label for="gender-m">М</label><input id="gender-m" name="gender" value= "M" type="radio">
            <label for="gender-w">Ж</label><input id="gender-w" name="gender" value= "W" type="radio">
        </div>
        <div class="input-group"><label for="pass">Введите пароль</label><input id="pass" name="pass" type="password"></div>
        <div class="input-group"><label for="awards">Введите награды</label><input id="awards" name="awards" type="text"></div>
        <div class="input-group"><input type="submit" value="Добавить"></div>
    </form>
</div>