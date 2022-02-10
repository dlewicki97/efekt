<section class="contest">

    <div class="contest-description"><?= $contest->description ?></div>

    <div class="d-flex flex-wrap">
        <a data-subject='Zapisy do konkursu "<?= $contest->title ?>"' data-toggle="modal" data-target="#modal" class="button button-primary"><?= $contest->take_part_button_name ?></a>
        <a download href="<?= uploads($contest->file_1) ?>" class="button button-primary"><?= $contest->regulations_button_name ?></a>
        <a data-subject='Aplikacja' data-toggle="modal" data-target="#modal" class="button button-secondary" style="margin-left: 0"><?= $contest->application_button_name ?></a>
    </div>
</section>