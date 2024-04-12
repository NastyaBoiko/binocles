<h1>Результаты поиска</h1>
<p>по запросу <?= $q ?? '' ?></p>
<?php if (isset($searchProducts)): ?>
    <?php foreach($searchProducts as $k => $val): ?>
        <h3><?= $val->title ?></h3>
        <img src="/img/<?= $val->img ?>" alt="Фото продукта">
        <p><?= $val->content ?></p>
        <p><?= $val->price ?></p>
    <?php endforeach; ?>
<?php else: ?>
    <p>Ничего не найдено</p>
<?php endif; ?>