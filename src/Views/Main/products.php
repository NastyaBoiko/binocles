
<?php 
foreach ($products as $product):
?>
<h1>Продукт <?= $product['name']?> из категории <?= $product['category']?></h1>
<p>Цена: <?= $product['price']?>$, количество: <?= $product['quantity']?></p>
<p>Стоимость (цена * количество): <?= $product['price'] * $product['quantity']?>$</p>
<?php endforeach;?>