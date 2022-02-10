<style>
    .offer-tile-top {
        margin-top: 2rem;
        justify-content: flex-start;
    }

    .offer-tile-top-titles h4 {

        color: #1b8f8e;
        font-weight: 500;
        font-size: 1.1rem;
    }

    .offer-tile-top,
    .offer-middle-tile-text,
    .buttons {
        padding: 0 var(--global-padding-x);
    }

    .buttons {
        margin-bottom: 2rem;
    }

    .buttons .button {
        width: unset;
        height: unset;
        padding: 0.7rem 1.7rem;
    }

    @media(max-width: 350px) {
        .buttons .button {
            width: 100%;
            padding-left: 0;
            padding-right: 0;
            margin-right: 0;
            margin-left: 0;
            margin-top: 1rem;
        }
    }
</style>
<section class="job-offer">

    <div class="offer-tile-top">
        <div class="offer-tile-top-titles">
            <h4>Miasto</h4>
            <h2><?= $job_offer->city ?></h2>
        </div>
        <div class="offer-tile-top-titles">
            <h4>Język</h4>
            <h2><?= $job_offer->lang ?></h2>
        </div>
        <div class="offer-tile-top-titles">
            <h4>Wynagrodzenie</h4>
            <h2><?= $job_offer->salary ?></h2>
        </div>
        <div class="offer-tile-top-titles">
            <h4>Data rozpoczęcia</h4>
            <h2><?= $job_offer->start_date ?></h2>
        </div>
        <div class="offer-tile-top-titles">
            <h4>Numer oferty</h4>
            <h2><?= $job_offer->number ?></h2>
        </div>
        <div class="offer-tile-top-button">
            <a class="button button-primary mt-0" data-subject="Oferta pracy #<?= $job_offer->number ?>" data-toggle="modal" data-target="#modal">
                <?= $job_offers_desc->button_name1 ?>
            </a>
        </div>

    </div>

    <div class="offer-tile-middle job-offers-desc">
        <div class="offer-middle-tile-text description"><?= $job_offer->description ?></div>
    </div>
    <div class="offer-tile-bottom" style="box-shadow: 0 0.5rem var(--offer_attributes), 0 0 4rem rgb(0 0 0 / 8%);border-radius: 12px;">
        <ul>
            <?php foreach (explode(',', $job_offer->attributes) as $attr) : ?>
                <li class="offer-listitem"><?= $attr ?></li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="offer-tile-middle job-offers-desc mt-5">
        <div class="offer-middle-tile-text description"><?= $job_offer->description2 ?></div>
    </div>

    <div class="d-flex flex-wrap buttons">
        <a class="button button-primary" data-subject="Oferta pracy #<?= $job_offer->number ?>" data-toggle="modal" data-target="#modal">
            <?= $job_offers_desc->button_name1 ?>
        </a>
        <a class="button button-secondary" href="<?= $_SERVER['HTTP_REFERER'] ?? base_url('oferty') ?>">
            <img data-src="<?= assets("assets/img/back-arrow.svg") ?>" height="15px" width="auto" alt="" class="lazy" style="margin-right: .5rem">
            <?= $job_offers_desc->back_button_name ?>
        </a>
    </div>
</section>