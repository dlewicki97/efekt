<section class="contest">

    <div class="contest-description"><?= $blog->description ?></div>

    <div class="d-flex flex-wrap">
        <a href="<?= $_SERVER['HTTP_REFERER'] ?? base_url("blogs") ?>" class="button button-primary mr-0"><?= $blog->back_button_name ?></a>


    </div>

</section>
<section class="banner2">
    <div class="banner2-bg lazy" title="<?= $blog->alt3 ?>" data-bg="<?= uploads($blog->photo3) ?>">
        <div class="banner2-mask"></div>
        <div class="banner2-text"><?= $blog->banner_title ?></div>
        <a data-subject="Aplikacja" data-tab-href="#message" data-toggle="modal" data-target="#modal" class="button"><?= $blog->banner_button_name ?></a>
    </div>

</section>