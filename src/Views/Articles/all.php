<?php
foreach($articles as $article) : ?>
    <h2><a href="/binocles/articles/<?= $article['id']?>"><?= $article['name']?></a></h2>
    <p><?= $article['text']?></p>
    <hr>
<?php endforeach;?>
