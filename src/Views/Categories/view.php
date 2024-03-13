<h1 class="my-5">Товары из категории <?= $category->getTitle()?></h1>

<?php foreach($products as $item) : ?>
    <h2><?= $item->getTitle()?></h2>
    <p><?= $item->getContent()?></p>
    <hr>
<?php endforeach;?>