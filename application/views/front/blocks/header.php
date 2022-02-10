<body>
    <header>
        <div class="upper-navbar">
            <div class="upper-navbar-padding-box">
                <h2 class="upper-navbar-leftside"><?= $header_desc->title ?></h1>
            </div>
            <div class="upper-navbar-outer-rightside">
                <h1 class="upper-navbar-calltext">Zadzwoń: <a href="tel:<?= $contact_settings->phone_header ?>"><?= $contact_settings->phone_header ?></a><?php if ($contact_settings->phone_header2) : ?>,
                    <a href="tel:<?= $contact_settings->phone_header2 ?>"><?= $contact_settings->phone_header2 ?></a>
                <?php endif; ?>
                </h1>
                <h1 class="upper-navbar-calltext">Napisz do nas: <a href="mailto:<?= $contact_settings->email_header ?>"><?= $contact_settings->email_header ?></a>
                </h1>
                <div class="upper-navbar-rightside">
                    <a href="tel:<?= $contact_settings->phone_header ?>">
                        <div class="upper-navbar-callicon lazy" title="zadzwoń" data-bg="<?= assets() ?>assets/icons/call-icon.svg"></div>
                    </a>
                    <a target="_blank" href="<?= $settings->fb_link ?>">
                        <div class="upper-navbar-facebook lazy" title="facebook icon" data-bg="<?= assets() ?>assets/icons/facebook-icon.svg"></div>
                    </a>
                    <a target="_blank" href="<?= $settings->ig_link ?>">
                        <div class="upper-navbar-instagram lazy" title="instagram icon" data-bg="<?= assets() ?>assets/icons/instagram-icon.svg"></div>
                    </a>
                    <div class="upper-navbar-language">
                        <?php if ($_SESSION['lang'] === 'pl') : ?>
                            <a href="<?= base_url('set_lang/de') ?>">
                                <div class="upper-navbar-deutsch lazy" title="german" data-bg="<?= assets() ?>assets/img/germany-flag.png"></div>
                            </a>
                        <?php endif; ?>
                        <?php if ($_SESSION['lang'] === 'de') : ?>
                            <a href="<?= base_url('set_lang/pl') ?>">
                                <div class="upper-navbar-polish lazy" title="polish" data-bg="<?= assets() ?>assets/img/poland-flag.png"></div>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-xxl navbar-light custom-navbar" style="padding-right: 0 !important;background-color: #fff;">
            <div class="navbar-container container-fluid">
                <a class="navbar-brand" href="<?= base_url() ?>">
                    <div class="navbar-brand-image lazy" data-bg="<?= uploads($settings->logo) ?>"></div>
                </a>
                <button class="navbar-toggler custom-navbar-toggler p-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse custom-navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav pt-2">
                        <?php foreach ($subpages as $subpage) : ?>
                            <?php if (!$subpage->menu) continue; ?>
                            <li class="nav-item custom-nav-item">
                                <a class="nav-link active" aria-current="page" style="color: <?= $subpage->text_color ?> !important" href="<?= cmsButtonLink($subpage->page) ?>"><?= $subpage->title ?></a>
                            </li>
                        <?php endforeach; ?>

                    </ul>
                </div>
            </div>
        </nav>
        <?php if (getUriSegment(1)) : ?>
            <section class="banner">
                <style>
                    .banner-bg {
                        background-position-y: <?= $banner_position ?? "" ?>
                    }
                </style>
                <div class="banner-bg lazy" title="<?= $banner_photo_alt ?>" data-bg="<?= uploads($banner_photo) ?>">
                    <div class="banner-mask"></div>
                    <div class="banner-text">
                        <?php if ($created) echo "<div class=\"banner-text-created\">", date('d.m.Y', strtotime($created)), "</div>"; ?><?= $banner_title ?>
                    </div>
                    <?php if ($back_button_name) : ?>
                        <a class="banner-back-button" href="<?= $_SERVER['HTTP_REFERER'] ?? base_url(getUriSegment(1)) ?>"><?= $back_button_name ?></a>
                    <?php endif; ?>
                </div>

            </section>
        <?php endif; ?>
    </header>
    <main>

        <?php if ($success = $this->session->flashdata('success')) :  ?>
            <div role="alert" class="alert alert-success mb-0 alert-dismissible position-fixed" style="max-width: 280px">
                <p class="text-white font-weight-bold mb-0"><?= $success ?></p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <script>
                let successInputs = [...document.querySelectorAll('input'), ...document.querySelectorAll('textarea')];
                successInputs.forEach(input => localStorage.removeItem(`input-${input.name}`));
            </script>
        <?php endif; ?>
        <?php if ($error = $this->session->flashdata('error')) :  ?>
            <div role="alert" class="alert alert-danger mb-0 alert-dismissible position-fixed" style="max-width: 280px">
                <p class="text-white font-weight-bold mb-0"><?= $error ?></p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
        <?php endif; ?>
        <div class="fixed-call-main-container">
            <div class="fixed-call-box">
                <div class="fixed-arrow"></div>
                <div class="fixed-call-padding-box">
                    <div class="fixed-call-left-box">
                        <h1 class="fixed-call-title"><?= $call_box_desc->title ?></h1>
                        <a class="fixed-call-no-button">
                            <!-- <div class="fixed-call-leftline-icon fixed-call-icon-no lazy" data-bg="<?= assets() ?>assets/icons/fixed-call-left-line.svg"></div> -->
                            <svg class="fixed-call-leftline-icon fixed-call-icon-no" xmlns="http://www.w3.org/2000/svg" width="19.328" height="19.328" viewBox="0 0 19.328 19.328">
                                <line id="Line_3" data-name="Line 3" x2="16.5" y2="16.5" transform="translate(1.414 1.414)" fill="none" stroke="#8bd8ed" stroke-linecap="round" stroke-width="2" />
                            </svg>
                            <!-- <div class="fixed-call-rightline-icon fixed-call-icon-no lazy" data-bg="<?= assets() ?>assets/icons/fixed-call-right-line.svg"></div> -->
                            <svg class="fixed-call-rightline-icon fixed-call-icon-no" xmlns="http://www.w3.org/2000/svg" width="19.328" height="19.328" viewBox="0 0 19.328 19.328">
                                <line id="Line_4" data-name="Line 4" x1="16.5" y2="16.5" transform="translate(1.414 1.414)" fill="none" stroke="#8bd8ed" stroke-linecap="round" stroke-width="2" />
                            </svg>
                        </a>
                    </div>
                    <div class="fixed-call-right-box">
                        <h2 class="fixed-call-text"><?= $call_box_desc->subtitle ?></h2>
                        <a data-subject="" data-toggle="modal" data-target="#modal" class="fixed-call-yes-button"><?= $call_box_desc->modal_button_name ?></a>
                    </div>
                </div>
            </div>
            <a class="fixed-call-phone">
                <div class="fixed-call-square-button">
                    <!-- <div class="fixed-call-icon lazy" data-bg="<?= assets() ?>assets/icons/blue-call-icon.svg"></div> -->
                    <svg class="fixed-call-icon" xmlns="http://www.w3.org/2000/svg" width="27.01" height="27.008" viewBox="0 0 27.01 27.008">
                        <path id="Icon_ionic-ios-call" data-name="Icon ionic-ios-call" d="M30.72,25.65a22.686,22.686,0,0,0-4.739-3.171c-1.42-.682-1.941-.668-2.946.056-.837.6-1.378,1.167-2.341.956s-2.862-1.645-4.7-3.48-3.277-3.741-3.48-4.7.359-1.5.956-2.341c.724-1.005.745-1.526.056-2.946A22.238,22.238,0,0,0,10.35,5.28c-1.034-1.034-1.266-.809-1.835-.6a10.443,10.443,0,0,0-1.68.893A5.069,5.069,0,0,0,4.816,7.7c-.4.865-.865,2.475,1.5,6.68a37.272,37.272,0,0,0,6.553,8.74h0l.007.007.007.007h0a37.418,37.418,0,0,0,8.74,6.553c4.2,2.362,5.815,1.9,6.68,1.5a4.983,4.983,0,0,0,2.13-2.018,10.443,10.443,0,0,0,.893-1.68C31.528,26.916,31.76,26.684,30.72,25.65Z" transform="translate(-4.49 -4.503)" fill="#024c88" />
                    </svg>

                </div>
            </a>
        </div>

        <div class="go-top">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-up" class="svg-inline--fa fa-arrow-up fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                <path fill="currentColor" d="M34.9 289.5l-22.2-22.2c-9.4-9.4-9.4-24.6 0-33.9L207 39c9.4-9.4 24.6-9.4 33.9 0l194.3 194.3c9.4 9.4 9.4 24.6 0 33.9L413 289.4c-9.5 9.5-25 9.3-34.3-.4L264 168.6V456c0 13.3-10.7 24-24 24h-32c-13.3 0-24-10.7-24-24V168.6L69.2 289.1c-9.3 9.8-24.8 10-34.3.4z">
                </path>
            </svg>
        </div>

        <script>
            let phone = document.querySelector('.fixed-call-phone');
            let box = document.querySelector('.fixed-call-box');
            let yesButton = document.querySelector('.fixed-call-yes-button');

            phone.addEventListener('click', () => {
                box.classList.toggle('d-none')
            })
            yesButton.addEventListener('click', () => {
                box.classList.add('d-none')
            })
        </script>