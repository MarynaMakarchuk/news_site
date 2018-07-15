<?php
	if(isset($_POST['name']) and isset($_POST['description'])){
		print_r($result);
		//print_r($message);
	} 
?>
<h3>Добавить категорию</h3>
<form action="" method="post">
    <input type="text" placeholder="Имя категории" name="name"><br>
    <input type="text" placeholder="Описание" name="description"><br>
    <select name="status">
        <option value="1">Включено</option>
        <option value="0">Выключено</option>
    </select><br>
    <input type="submit" value="Submit">
</form>