
<h1>Создание новой статьи</h1><br>
<?php if (!empty($error)) : ?>
        <div class="alert alert-danger" role="alert"><?= $error;?></div>
<?php endif;?>
<form action="/binocles/articles/add" method="post">
    <input type="hidden" name="csrf" value="<?= $csrf ?>">
    <label>
        Название статьи <input type="text" name="name" id="name" value="<?= $_POST['name'] ?? '' ?>" size="50">
    </label>
    <br><br>
    <label></label>
        Текст статьи <textarea name="text" id="text" rows="10" cols="80" value="<?= $_POST['text'] ?? '' ?>"></textarea>
    <br><br>

    <input type="submit" class="btn btn-primary mb-3" value="Создать">
</form>