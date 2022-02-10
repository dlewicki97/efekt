<section class="blogs">
    <div class="d-flex flex-wrap">
        <?php foreach ($blogs as $blog) : ?>
            <div class="col-12 col-lg-4">
                <div class="blog">
                    <div>
                        <div class="bg blog-bg lazy" title="<?= $blog->alt ?>" data-bg="<?= uploads($blog->photo) ?>">
                            <div class="blog-date"><?= date('d.m.Y', strtotime($blog->created)) ?></div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-title"><?= $blog->title ?></div>
                            <div class="blog-listing-description"><?= $blog->listing_description ?></div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <a href="<?= base_url("blog/" . slug($blog->title) . "/$blog->id") ?>" class="blog-button"><?= $blog->listing_button_name ?></a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<section class="pagination">
    <?= $this->pagination->create_links(); ?>
</section>


<section class="banner2">
    <div class="banner2-bg lazy" title="<?= $blogs_desc->alt ?>" data-bg="<?= uploads($blogs_desc->photo) ?>">
        <div class="banner2-mask"></div>
        <div class="banner2-text"><?= $blogs_desc->banner_title ?></div>
        <a data-subject="Aplikacja" data-tab-href="#message" data-toggle="modal" data-target="#modal" class="button"><?= $blogs_desc->banner_button_name ?></a>
    </div>

</section>