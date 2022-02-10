<section class="opinion-section">
    <div class="title-section-description"><?= $opinions_desc->description ?></div>
    <div class="owl-carousel-main-container">
        <div class="background-opinion-container"></div>
        <div class="background-little-opinion-container"></div>
        <div class="opinion-text-container">
            <h2 class="opinion-title"><?= $opinions_desc->title ?></h2>
            <h3 class="opinion-subtitle"><?= $opinions_desc->subtitle ?></h3>
        </div>
        <div class="owlcarousel-container">
            <div class="owl-carousel owl-theme init-opinions-carousel">
                <?php foreach ($opinions as $i => $row) : ?>
                    <div class="item custom-item-opinion">
                        <div class="owl-opinion-box">
                            <div class="owl-cornerdate"><?= date('d.m.Y', strtotime($row->created)) ?></div>
                            <div class="owl-profile">
                                <div class="owl-iconbox">
                                    <div class="owl-profile-icon lazy" title="<?= $row->alt ?>" data-bg="<?= uploads($row->photo) ?>"></div>
                                </div>
                                <div class="owl-profilename-box">
                                    <h3 class="owl-profilename"><?= $row->name ?></h3>
                                    <h4 class="owl-city"><?= $row->city ?></h4>
                                </div>
                            </div>
                            <div class="owl-opinion-text"><?= $row->description ?></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <section class="banner contest">
        <div class="banner-bg lazy contest-content" title="<?= $opinions_desc->alt ?>" data-bg="<?= uploads($opinions_desc->photo) ?>">
            <div class="banner-mask"></div>
            <div class="banner-text"><?= $opinions_desc->banner_text ?></div>
            <a data-subject="" data-toggle="modal" data-target="#modal" class="button contest-button"><?= $opinions_desc->banner_button_name ?></a>
        </div>

    </section>
</section>