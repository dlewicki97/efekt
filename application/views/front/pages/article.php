<section class="article">

    <div class="article-description"><?= $article->description ?></div>

    <div class="d-flex flex-wrap">
        <a href="<?= cmsButtonLink($article->link1) ?>" class="button button-primary"><?= $article->button_name1 ?></a>
        <a href="<?= cmsButtonLink($article->link2) ?>" class="button button-secondary" style="margin-left: 0"><?= $article->button_name2 ?></a>
    </div>
</section>