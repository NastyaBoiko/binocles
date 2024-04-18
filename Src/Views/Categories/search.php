<h1>Результаты поиска</h1>
<p>по запросу <?= $q ?? '' ?></p>
<?php if (isset($searchProducts)): ?>
    <p>Количество совпадаений: <?= count($searchProducts) ?></p>
    <?php foreach($searchProducts as $k => $val): ?>
        <h3><?= $val->getTitle() ?></h3>
        <img height="150px" src="/binocles/img/<?= $val->getImg() ?>" alt="Фото продукта">
        <p><?= $val->getContent() ?></p>
        <p><?= $val->getPrice() ?></p>
    <?php endforeach; ?>
<?php else: ?>
    <p>Ничего не найдено</p>
<?php endif; ?>