<section class="abouts">
    <?php foreach ($vademecums as $about) : ?>
        <div class="d-flex flex-wrap abouts-row">
            <div class="col-12 col-lg-5 photo-col">
                <div class="bg lazy" title="<?= $about->alt ?>" data-bg="<?= uploads($about->photo) ?>"></div>
            </div>
            <div class="col-12 col-lg-7 desc-col">
                <h3 class="abouts-title"><?= $about->title ?></h3>
                <div class="abouts-description"><?= $about->description ?></div>
                <div class="d-flex flex-wrap">
                    <a href="<?= cmsButtonLink($about->link1) ?>" class="button button-primary"><?= $about->button_name1 ?></a>
                    <a href="<?= cmsButtonLink($about->link2) ?>" class="button button-secondary"><?= $about->button_name2 ?></a>
                </div>
            </div>
        </div>


    <?php endforeach; ?>
</section>

<section class="phrases">
    <h3 class="title-section-title"><?= $phrases_desc->title ?></h3>
    <div class="title-section-subtitle"><?= $phrases_desc->subtitle ?></div>
    <div>
        <?php foreach ($phrases as $phrase) : ?>
            <div class="phrase">
                <div class="phrase-german"><?= $phrase->german ?></div>
                <div class="phrase-polish"><?= $phrase->polish ?></div>
            </div>
        <?php endforeach; ?>
    </div>
</section>