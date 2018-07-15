<?php
foreach($result['news'] as $row){
        $id = $row['id'];
        $name = $row['name'];
        $description = $row['description'];
        $parent = $row['parent'];
        $image = $row['image'];
        $status = $row['status'];
}

$i = 0;
foreach($result['category_list'] as $row) {
        $categoryList[$i]['id'] = $row['id_cat'];
        $categoryList[$i]['name'] = $row['name_cat'];
        $i++;
}
?>
<form action="index.php?route=news&action=update_news" method="post" name = "img" enctype="multipart/form-data" >
    <h3>Отредактировать новость</h3>
    <input type="hidden"  name="id" value="<?php echo $id;?>"><br>
    <input type="text" placeholder="Имя категории" name="name" value="<?php echo $name;?>"><br>
    <textarea type="text" placeholder="Описание" name="description" ><?php echo $description; ?></textarea><br>
    <select name="parent">
        <option value="">Выберите категорию</option>
        <?php foreach ($categoryList as $category): ?>	
            <option value="<?php echo $category['id'];?>" <?php if($category['id'] == $parent){echo 'selected';}?>> <?php echo $category['name'];?> </option>		
        <?php endforeach; ?>
    </select><br>
    <input type="text" name="old_image" placeholder="Фото" value="<?php echo $image;?>"><br>
	<input type="file" name="file-input" placeholder="Фото">
    <select name="status">
        <option value="1" <?php if($status == 1){echo 'selected';}?> >Включено</option>
        <option value="0" <?php if($status == 0){echo 'selected';}?> >Выключено</option>
    </select><br>
    <input type="submit" name="submit">
</form>


