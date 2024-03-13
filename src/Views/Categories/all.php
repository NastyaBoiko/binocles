<h1 class="my-5">Товары всех категорий</h1>

<?php foreach($products as $item) : ?>
    <h2><?= $item->getTitle()?></a></h2>
    <p><?= $item->getContent()?></p>
    <hr>
<?php endforeach;?>