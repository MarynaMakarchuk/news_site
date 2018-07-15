<?php
foreach ($result as $key => $row){
		$id = $row['id_cat'];
        $name = $row['name_cat'];
        $description = $row['description_cat'];
        $status = $row['status_cat'];
}
?>
<form action="index.php?route=category&action=update_category" method="post">
    <h3>Отредактировать категорию</h3>
    <input type="hidden" name="id" value="<?php echo $id; ?>"><br>
    <input type="text" placeholder="Имя категории" name="name" value="<?php echo $name; ?>"><br>
    <input type="text" placeholder="Описание" name="description" value="<?php echo $description; ?>"><br>
    <select name="status">
        <option value="1" <?php if($status == 1){echo 'selected';}?> >Включено</option>
        <option value="0" <?php if($status == 0){echo 'selected';}?> >Выключено</option>
    </select><br>
    <input type="submit" name="submit">
</form>

