<h1>Продукт <?= $product->getTitle();?></h1>
<p class="h6">Категория <?= $category->getTitle();?></p>

<img src="/binocles/img/<?= $product->getImg();?>" class="img-thumbnail img-fluid mx-auto d-block" style="width:50%;" alt="Картинка">
<h3>Описание</h3>
<p><?= $product->getDescription();?></p>

<h3>Цена </h3>
<h5 class="card-title pricing-card-title"><s><?= $product->getOldPrice();?></s> <?= $product->getPrice();?></h5>

<a href="/binocles/categories/<?= $category->getId()?>" class="btn btn-primary my-3">Вернуться к категории</a>
