<?php foreach($articles as $article) : ?>
    <h2><a href="/binocles/articles/<?= $article->getId() ?>"><?= $article->getName()?></a></h2>
    <p><?= $article->getName()?></p>
    <hr>
<?php endforeach;?>
