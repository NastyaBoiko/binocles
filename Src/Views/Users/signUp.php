
<h1>Регистрация</h1><br>
<?php if (!empty($error)) : ?>
        <div class="alert alert-danger" role="alert"><?= $error;?></div>
<?php endif;?>
<form action="/binocles/users/register" method="post">
    <label>
        Nickname <input type="text" name="nickname" value="<?= $_POST['nickname'] ?? '' ?>">
    </label>
    <br><br>
    <label>
        Email <input type="text" name="email" value="<?= $_POST['email'] ?? '' ?>">
    </label>
    <br><br>
    <label>
        Password <input type="password" name="password" value="<?= $_POST['password'] ?? '' ?>">
    </label>
    <br><br>
    <label>
        Password repeat <input type="password" name="password_repeat" value="<?= $_POST['password_repeat'] ?? '' ?>">
    </label>
    <br><br>
    <input type="submit" value="Зарегистрироваться">
</form>