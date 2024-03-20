<h1 class="my-5">Товары из категории <?= $category->getTitle()?></h1>
<div class="container text-center">
  <div class="row">
    <?php foreach($products as $item) :?>
        <div class="card mx-3" style="width: 18rem;">
          <img src="/binocles/img/<?= $item->getImg();?>" class="card-img-top my-3" alt="...">
          <div class="card-body">
            <h5 class="card-title"><?= $item->getTitle()?></h5>
            <p class="card-text"><?= $item->getContent()?></p>
            <a href="/binocles/products/<?= $item->getId()?>" class="btn btn-primary">Подробнее</a>
          </div>
        </div>  
    <?php endforeach;?>
  </div>
  <a href="/binocles/categories/all" class="btn btn-primary my-3">Назад к категориям</a>
</div>