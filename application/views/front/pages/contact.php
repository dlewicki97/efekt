<section class="contact">
    <h3 class="title-section-title mb-3"><?= $contact_desc->title ?></h3>
    <div class="d-flex flex-wrap">
        <div class="col-12 col-lg-6 pr-0 pr-lg-3">
            <div class="company"><?= $contact_settings->company ?></div>
            <a target="_blank" href="https://www.google.com/maps/place/<?= "$contact_settings->address,+$contact_settings->zip_code+$contact_settings->city" ?>" class="contact-anchor">

                <?= "$contact_settings->address, $contact_settings->zip_code $contact_settings->city" ?>
            </a>
            <a href="tel:<?= $contact_desc->phone_tel ?>" class="contact-anchor">
                tel. <?= $contact_desc->phone_tel ?>
            </a>
            <a href="tel:<?= $contact_desc->phone_mobile ?>" class="contact-anchor">
                kom. <?= $contact_desc->phone_mobile ?>
            </a>
            <a href="mailto:<?= $contact_desc->email ?>" class="contact-anchor">
                <?= $contact_desc->email ?>
            </a>

            <div class="d-flex flex-wrap mt-3">
                <a data-subject="" data-tab-href="#phone" data-toggle="modal" data-target="#modal" class="button button-primary"><?= $contact_desc->button_name1 ?></a>
                <a data-subject="" data-tab-href="#message" data-toggle="modal" data-target="#modal" class="button button-secondary"><?= $contact_desc->button_name2 ?></a>
            </div>
        </div>
        <div class="col-12 col-lg-6 position-relative">
            <div class="contact-square"></div>
            <div class="contact-description"><?= $contact_desc->description ?></div>
        </div>
    </div>
</section>

<section class="our-team">
    <h3 class="our-team-title text-center"><?= $our_team_desc->title ?></h3>
    <?php foreach ($our_team_employee_groups as $group) : ?>
        <div class="our-team-group">
            <h4 class="our-team-group-title text-center"><?= $group->title ?></h4>

            <div class="owl-carousel team-group-carousel-<?= $group->id ?>">
                <?php foreach (array_filter($our_team_employees, function ($employee) use ($group) {
                    return $employee->our_team_employee_group_id == $group->id;
                }) as $employee) : ?>
                    <div class="p-2">
                        <div class="our-team-bg bg lazy" title="<?= $employee->alt ?>" data-bg="<?= uploads($employee->photo) ?>"></div>
                        <div class="our-team-name-wrapper">
                            <div class="our-team-name"><?= $employee->name ?></div>
                            <div class="our-team-work-place"><?= $employee->work_place ?></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endforeach; ?>
</section>

<section class="coordinator-support">
    <h3 class="title-section-title"><?= $coordinator_support_desc->title ?></h3>
    <div class="title-section-subtitle"><?= $coordinator_support_desc->subtitle ?></div>

    <div class="tiles">
        <?php foreach ($coordinator_support_tiles as $tile) : ?>
            <div class="tile d-flex flex-wrap">
                <div class="col-12 col-lg-6">
                    <div class="bg lazy tile-bg" title="<?= $tile->alt ?>" data-bg="<?= uploads($tile->photo) ?>">
                        <img data-src="<?= uploads($tile->photo2) ?>" alt="<?= $tile->alt2 ?>" class="tile-flag lazy">
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="tile-title"><?= $tile->title ?></div>
                    <div class="tile-description"><?= $tile->description ?></div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<section id="formularz" class="form-section">
    <div class="form-section-wrapper">
        <h3 class="title-section-title"><?= $form_desc->title ?></h3>
        <?php $this->load->view('front/elements/modal', ['title' => 'contact_page']); ?>
    </div>
</section>

<iframe src="<?= $contact_settings->map ?>" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>