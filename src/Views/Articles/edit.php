<?php
// var_dump($_POST);
?>

<form action="" method="post">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Название статьи:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $article->getName(); ?>" name="name">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Текст статьи:</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="text"><?= $article->getText(); ?></textarea>
    </div>
    <input type="submit" class="btn btn-primary mb-3"></input>
  <!-- <label for="name">Название статьи:</label>
  <input id="name" type="text" name="name" /><br>
  <label class="mt-3" for="text">Текст статьи:</label>
  <input id="text" type="text" name="text" />
  <input type="submit" value="Save" /> -->
</form>