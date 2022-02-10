<section class="abouts">
    <?php foreach ($abouts as $about) : ?>
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

<section class="references">


    <h3 class="title-section-title"><?= $references_desc->title ?></h3>
    <div class="title-section-subtitle"><?= $references_desc->subtitle ?></div>
    <div class="title-section-description"><?= $references_desc->description ?></div>

    <div class="owl-carousel references-carousel owl-theme">
        <?php foreach ($references_list as $i => $ref) : ?>
            <div class="reference">
                <div class="bg lazy" style="height: 400px" title="<?= $ref->alt ?>" data-bg="<?= uploads($ref->photo) ?>"></div>

                <h5 class="our-team-name references-title"><?= "$ref->title" ?></h5>
                <div class="abouts-description references-description"><?= $ref->description ?></div>
            </div>
        <?php endforeach; ?>
    </div>

    <a style="width: fit-content; height: unset;padding: .8rem 2.5rem" data-subject="Aplikacja" data-toggle="modal" data-tab-href="#message" data-target="#modal" class="button button-secondary"><?= $references_desc->button_name ?></a>
</section>

<section class="articles">


    <h3 class="title-section-title"><?= $about_articles_desc->title ?></h3>
    <div class="title-section-subtitle"><?= $about_articles_desc->subtitle ?></div>
    <div class="title-section-description"><?= $about_articles_desc->description ?></div>


    <div class="owl-carousel articles-carousel owl-theme">
        <?php foreach ($articles as $i => $article) : ?>
            <div class="article">
                <div class="bg lazy article-bg" style="height: 300px" title="<?= $article->alt ?>" data-bg="<?= uploads($article->photo) ?>">
                    <div class="article-date"><?= date('d.m.Y', strtotime($article->created)) ?></div>
                    <div class="article-mask"></div>
                    <div class="article-title"><?= "$article->title" ?></div>
                </div>

                <div class="abouts-description references-description article-description"><?= $article->carousel_description ?></div>

                <div class="article-button-container"><a href="<?= base_url("aktualnosci/" . slug($article->title) . "/$article->id") ?>" class="article-button"><?= $article->carousel_button_name ?></a></div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<section class="contests">
    <h3 class="title-section-title"><?= $contests_desc->title ?></h3>
    <div class="title-section-subtitle"><?= $contests_desc->subtitle ?></div>
    <div class="title-section-description"><?= $contests_desc->description ?></div>

    <?php foreach ($contests as $contest) : ?>
        <section class="banner contest">
            <div class="banner-bg lazy contest-content" title="<?= $contest->alt ?>" data-bg="<?= uploads($contest->photo) ?>">
                <div class="banner-mask"></div>
                <div class="banner-text"><?= $contest->title ?></div>
                <a href="<?= base_url("konkurs/" . slug($contest->title) . "/$contest->id") ?>" class="button contest-button"><?= $contest->listing_button_name ?></a>
            </div>

        </section>
    <?php endforeach; ?>
</section>