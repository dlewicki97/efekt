<section class="abouts">
    <?php foreach ($working_conditions as $about) : ?>
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

<section class="dot-carousel-section">
    <div class="dot-carousel-main-container">
        <div class="background-dot-container"></div>
        <div class="background-little-dot-container"></div>
        <div class="owlcarousel-container">
            <div class="owl-carousel owl-theme init-dot-carousel">
                <?php foreach ($attributes as $i => $row) : ?>
                    <div class="item custom-item-dot">
                        <div class="owl-opinion-box">
                            <div class="owl-title-dot">
                                <img width="auto" height="72px" data-src="<?= uploads($row->photo) ?>" alt="<?= $row->alt ?>" class="lazy">
                                <div class="owl-profilename-box">
                                    <h3 class="owl-profilename"><?= $row->title ?></h3>
                                </div>
                            </div>
                            <div class="owl-opinion-text"><?= $row->description ?></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<section class="recruit-section">
    <div class="recruit-main-container">
        <div class="background-recruit-container-one"></div>
        <div class="background-little-recruit-container-one"></div>
        <div class="background-recruit-container-two"></div>
        <div class="background-little-recruit-container-two"></div>
        <div class="recruit-title-main-container">
            <div class="recruit-title-box">
                <h1><?= $recruitment_desc->title ?></h1>
                <h2><?= $recruitment_desc->subtitle ?></h2>
            </div>
            <div class="recruit-alert-box">
                <div class="recruit-alert-icon">
                    <svg fill="#000000" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" width="30px" height="30px">
                        <path d="M15,3C8.373,3,3,8.373,3,15c0,6.627,5.373,12,12,12s12-5.373,12-12C27,8.373,21.627,3,15,3z M16,21h-2v-7h2V21z M15,11.5 c-0.828,0-1.5-0.672-1.5-1.5s0.672-1.5,1.5-1.5s1.5,0.672,1.5,1.5S15.828,11.5,15,11.5z" />
                    </svg>
                </div>
                <div class="recruit-alert-box-text"><?= $recruitment_desc->notification ?></div>
            </div>
        </div>
        <div class="d-flex flex-wrap w-100">
            <?php foreach ($recruitment_steps as $i => $row) : ?>
                <div class="recruit-bottom-box d-flex flex-column justify-content-between col-12 col-lg-3">
                    <div>
                        <div class="recruit-middle-box w-100">
                            <h1>0<?= $i + 1 ?></h1>
                            <div class="recruit-corner-dot"></div>
                        </div>
                        <h2 class="recruit-bottom-title"><?= $row->title ?></h2>
                    </div>
                    <div>
                        <div class="recruit-text-box"><?= $row->description ?></div>
                        <a href="<?= cmsButtonLink($row->link) ?>" class="recruit-button"><?= $row->button_name ?></a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>
<section class="form-section">
    <div class="form-section-wrapper">
        <h3 class="title-section-title"><?= $form_desc->title ?></h3>
        <?php $this->load->view('front/elements/modal', ['title' => 'working_conditions']); ?>
    </div>
</section>

<section class="abouts">

    <h3 class="title-section-title"><?= $bonuses_desc->title ?></h3>
    <div class="title-section-subtitle"><?= $bonuses_desc->subtitle ?></div>
    <?php foreach ($bonuses as $about) : ?>
        <div class="d-flex flex-wrap abouts-row">
            <div class="col-12 col-lg-5 photo-col">
                <div class="bg lazy" title="<?= $about->alt ?>" data-bg="<?= uploads($about->photo) ?>"></div>
            </div>
            <div class="col-12 col-lg-7 desc-col">
                <h3 class="abouts-title"><?= $about->title ?></h3>
                <div class="abouts-description"><?= $about->listing_description ?></div>
                <div class="d-flex flex-wrap">
                    <a href="<?= base_url('premia/' . slug($about->title) . "/$about->id") ?>" class="button button-primary" style="width: unset; height: unset;padding: .7rem 2.1rem"><?= $bonuses_desc->listing_button_name ?></a>

                </div>
            </div>
        </div>

    <?php endforeach; ?>
</section>