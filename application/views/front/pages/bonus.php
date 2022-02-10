<section class="contest">

    <div class="contest-description"><?= $bonus->description ?></div>

    <div class="d-flex flex-wrap">
        <a data-subject='Zgłoszenie do premii "<?= $bonus->title ?>"' data-toggle="modal" data-target="#modal" class="button button-secondary mr-0 mr-md-3"><?= $bonuses_desc->report_button_name ?></a>
        <a download href="<?= uploads($bonus->file_1) ?>" class="button button-primary"><?= $bonuses_desc->regulations_button_name ?></a>

    </div>

</section>
<section class="banner2">
    <div class="banner2-bg lazy" title="<?= $bonuses_desc->alt ?>" data-bg="<?= uploads($bonuses_desc->photo) ?>">
        <div class="banner2-mask"></div>
        <div class="banner2-text"><?= $bonuses_desc->banner_title ?></div>
        <a data-subject="Aplikacja" data-tab-href="#message" data-toggle="modal" data-target="#modal" class="button"><?= $bonuses_desc->banner_button_name ?></a>
    </div>

</section>