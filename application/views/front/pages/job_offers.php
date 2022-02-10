<section class="job-offers">
    <section class="offer-section">
        <div class="offer-main-container">
            <div class="background-offer-container"></div>
            <div class="background-little-offer-container"></div>
            <div class="offer-container">

                <div class="offer-tiles-container">
                    <?php foreach ($job_offers as $job) : ?>
                        <div class="offer-tile-1 offer-tiles">
                            <div class="offer-tile-top">
                                <div class="offer-tile-top-titles">
                                    <h4>Miasto</h4>
                                    <h2><?= $job->city ?></h2>
                                </div>
                                <div class="offer-tile-top-titles">
                                    <h4>Język</h4>
                                    <h2><?= $job->lang ?></h2>
                                </div>
                                <div class="offer-tile-top-titles">
                                    <h4>Wynagrodzenie</h4>
                                    <h2><?= $job->salary ?></h2>
                                </div>
                                <div class="offer-tile-top-titles">
                                    <h4>Data rozpoczęcia</h4>
                                    <h2><?= $job->start_date ?></h2>
                                </div>
                                <div class="offer-tile-top-titles">
                                    <h4>Numer oferty</h4>
                                    <h2><?= $job->number ?></h2>
                                </div>
                                <div class="offer-tile-top-button">
                                    <a class="modal-trigger" data-subject="Oferta pracy #<?= $job->number ?>" data-toggle="modal" data-target="#modal">
                                        <div class="offer-button">
                                            <h1><?= $job_offers_desc->button_name1 ?></h1>
                                        </div>
                                    </a>
                                </div>
                                <div class="offer-tile-top-button-text">
                                    <a href="<?= base_url('oferta/' . slug($job->city) . "/$job->id") ?>">
                                        <h1><?= $job_offers_desc->button_name2 ?></h1>
                                    </a>
                                </div>
                            </div>
                            <div class="offer-tile-middle">
                                <div class="offer-middle-tile-text"><?= $job->description ?></div>
                            </div>
                            <div class="offer-tile-bottom">
                                <ul>
                                    <?php foreach (explode(',', $job->attributes) as $attr) : ?>
                                        <li class="offer-listitem"><?= $attr ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="pagination">
        <?= $this->pagination->create_links(); ?>
    </section>

    <section class="job-offers-desc">
        <div class="title"><?= $job_offers_desc->description_title ?></div>
        <div class="description"><?= $job_offers_desc->description ?></div>
    </section>
</section>