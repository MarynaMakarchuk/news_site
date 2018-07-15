<?php
	if(isset($_POST['name']) and isset($_POST['description'])){
		print_r($result['message']);
	}
?>
<h3>Добавить новость</h3>
<form action="" method="post" name="img" enctype="multipart/form-data">
    <input type="text" placeholder="Название новости" name="name"><br>
    <input type="text" placeholder="Описание" name="description"><br>
    <select name="parent">
        <option value="">Выберите категорию</option>
        <?php foreach ($result['category_list'] as $category){ ?>
            <option value="<?php echo $category['id_cat'];?>"> <?php echo $category['name_cat'];?> </option>
        <?php } ?>
    </select><br>
	
    <input type="file" name="file-input" placeholder="Фото">
    <select name="status">
            <option value="1">Включено</option>
            <option value="0">Выключено</option>
    </select><br>
    <input type="submit" name="submit" value="Submit">
</form>