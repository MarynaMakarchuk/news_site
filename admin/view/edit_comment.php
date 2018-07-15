<?php
foreach ($result as $row){
        $id = $row['id_comm'];
        $news_id = $row['news_id_comm'];
        $user_id = $row['user_id_comm'];
        $message = $row['message_comm'];
        $rating = $row['rating_comm'];
        $status = $row['status_comm'];
}
?>
<form action="index.php?route=users_comments&action=update_comment" method="post">
    <h3>Отредактировать коментарий</h3>
    <input type="hidden" name="id" value="<?php echo $id; ?>"><br>
    <input type="text" placeholder="ID новости" name="news_id" value="<?php echo $news_id; ?>"><br>
    <input type="text" placeholder="ID пользователя" name="user_id" value="<?php echo $user_id; ?>"><br>
    <textarea type="text" placeholder="Комментарий" name="message" ><?php echo $message; ?></textarea><br>
    <input type="text" placeholder="Рейтинг комментария" name="rating" value="<?php echo $rating; ?>"><br>
    <select name="status">
        <option value="1" <?php if($status == 1){echo 'selected';}?> >Включено</option>
        <option value="0" <?php if($status == 0){echo 'selected';}?> >Выключено</option>
    </select><br>
    <input type="submit" name="submit">
</form>