<?php
include ("header.php");
$con = mysqli_connect("localhost", "root", "", "fitnes_kushneruk");
$sql_query = "select surname, name, patronymic, phone, photo, awards from users where role=3";
$result = mysqli_query($con, $sql_query);
?>
<div class = "cards">

<?php
while ($trener = mysqli_fetch_assoc($result)){?>
    <div class = "card">
        <img src = "/img/<?=$trener["photo"];?>" alt="<?=$trener["name"];?>">
        <h2>
            <?=$trener["surname"]. " ".$trener["name"]. " ".$trener["patronymic"]; ?>
        </h2>
        <p><?=$trener["phone"];?></p>
        <p><?=$trener["awards"];?></p>
    </div>
    <?php
}

?>
  </div>
</div>