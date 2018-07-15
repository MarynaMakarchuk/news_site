<table class="table">
    <tr>
        <th>ID новости</th>
        <th>Загаловок</th>
        <th>Описание новости</th>
        <th>Категория новости</th>
        <th>Фото</th>
        <th>Статус</th>
        <th>Дата</th>
        <th>Удалить</th>
        <th>Редактировать</th>
    </tr>
    <?php foreach ($result as $news): ?>
        <tr>
            <td><?php echo $news['id']; ?></td>
            <td><?php echo $news['name']; ?></td>
            <td><?php echo $news['description']; ?></td>
            <td><?php echo $news['name_cat']; ?></td>
            <td><?php echo $news['image']; ?></td>
            <td><?php echo $news['status']; ?></td>
            <td><?php echo $news['date']; ?></td>
            <td><a href="index.php?route=news&action=delete_news&id=<?php echo $news['id']; ?>">X</a></td>
            <td><a href="index.php?route=news&action=edit_news&id=<?php echo $news['id']; ?>">Редактировать новость</a></td>
        </tr>
    <?php endforeach; ?>
</table>


