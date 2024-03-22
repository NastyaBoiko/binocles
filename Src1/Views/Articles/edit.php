<?php
// var_dump($article);
?>
<h1>Редактирование статьи</h1><br>
<?php if (!empty($error)) : ?>
        <div class="alert alert-danger" role="alert"><?= $error;?></div>
<?php endif;?>
<form action="/binocles/articles/<?= $article->getId();?>/edit" method="post">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Название статьи:</label>
        <input type="text" class="form-control" id="name" name="name" value="<?= $_POST['name'] ?? $article->getName(); ?>">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Текст статьи:</label>
        <textarea class="form-control" id="text" rows="3" name="text"><?= $_POST['text'] ?? $article->getText(); ?></textarea>
    </div>
    <input type="submit" class="btn btn-primary mb-3" value="Обновить"></input>
</form>