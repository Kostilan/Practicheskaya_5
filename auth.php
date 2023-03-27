<?php
include("header.php");
?>
<div class="container flex-column-center">
    
<form id="form_auth" action="">
<div class="input-group"><label for="phone">Введите номер телефона</label><input required id="phone" name="phone" type="text"></div>
<div class="input-group"><label for="password">Введите пароль</label><input required id="password" name="password" type="password"></div>
<div class="input-group"><label for="password_conf">Введите пароль</label><input required id="password_conf" name="password_conf" type="password"><span class="error_form" id="error_pass"></span></div>

<div class="input-group"><input type="submit" value="Добавить"></div>
</form>
</div>

<script>

let pass = document.getElementById("password");
    let confirm_pass = document.getElementById("password_conf");
    let form = document.getElementById("form_auth");

    form.addEventListener("submit",function (event){
        if(pass.value != confirm_pass.value){
            event.preventDefault();
            document.getElementById("error_pass").innerText = "Пароли не совпадают!"
        }
    })

</script>


</body>
</html>