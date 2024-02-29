
<h1>Вход</h1><br>
<?php if (!empty($error)) : ?>
        <div class="alert alert-danger" role="alert"><?= $error;?></div>
<?php endif;?>
<form action="/binocles/users/login" method="post">
    <label>
        Email <input type="text" name="email" value="<?= $_POST['email'] ?? '' ?>">
    </label>
    <br><br>
    <label>
        Password <input type="password" name="password" value="<?= $_POST['password'] ?? '' ?>">
    </label>
    <br><br>
    <input type="submit" value="Войти">
</form>