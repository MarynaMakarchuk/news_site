<table class="table">
    <tr>
        <th>ID сообщения</th>
        <th>Название новости</th>
        <th>Имя пользователя</th>
        <th>Комментарий</th>
        <th>Рейтинг</th>
        <th>Статус</th>
        <th>Дата</th>
        <th>Удалить</th>
        <th>Редактировать комментарий</th>
    </tr>
    <?php foreach ($result as $comment): ?>
    <tr>
        <td><?php echo $comment['id_comm']; ?></td>
        <td><?php echo $comment['name']; ?></td>
        <td><?php echo $comment['user_name']; ?></td>
        <td><?php echo $comment['message_comm']; ?></td>
        <td><?php echo $comment['rating_comm']; ?></td>
        <td><?php echo $comment['status_comm']; ?></td>
        <td><?php echo $comment['date_comm']; ?></td>
        <td><a href="index.php?route=users_comments&action=delete_comment&id=<?php echo $comment['id_comm']; ?>">X</a></td>
        <td><a href="index.php?route=users_comments&action=edit_comment&id=<?php echo $comment['id_comm']; ?>">Редактировать комментарий</a></td>
    </tr>
    <?php endforeach; ?>
</table>


