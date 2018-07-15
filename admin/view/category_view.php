<table class="table">
    <tr>
        <th>ID категории</th>
        <th>Название категории</th>
        <th>Описание</th>
        <th>Статус</th>
        <th>Дата</th>
        <th>Удалить категорию</th>
        <th>Редактировать категорию</th>
    </tr>
    <?php foreach ($result as $category): ?>
        <tr>
            <td><?php echo $category['id_cat']; ?></td>
            <td><?php echo $category['name_cat']; ?></td>
            <td><?php echo $category['description_cat']; ?></td>
            <td><?php echo $category['status_cat']; ?></td>
            <td><?php echo $category['date_cat']; ?></td>
            <td><a href="index.php?route=category&action=delete_category&id=<?php echo $category['id_cat']; ?>">X</a></td>
            <td><a href="index.php?route=category&action=edit_category&id=<?php echo $category['id_cat']; ?>">Редактировать</a></td>
        </tr>
    <?php endforeach; ?>
</table>


