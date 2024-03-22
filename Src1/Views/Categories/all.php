<h1 class="my-5">Товары всех категорий</h1>

<?php foreach($categories as $item) : ?>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title"><?= $item->getTitle()?></h5>
        <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> -->
        <a href="/binocles/categories/<?= $item->getId()?>" class="btn btn-primary my-3">Посмотреть товары категории</a>
      </div>
    </div>
<?php endforeach;?>