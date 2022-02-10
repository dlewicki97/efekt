<footer>
    <div class="footer-main-container">
        <div class="footer-logo-box">
            <a href="<?= base_url() ?>">
                <img class="footer-logo lazy" alt="footer logo" data-src="<?= uploads($settings->footer_logo) ?>" />
            </a>
        </div>
        <div class="footer-main-box">
            <div class="footer-left-info-side">
                <h1><?= $contact_settings->company ?></h1>
                <h5><?= $settings->footer_description ?></h5>
                <a target="_blank" href="https://www.google.com/maps/place/<?= "$contact_settings->address,+$contact_settings->zip_code+$contact_settings->city" ?>" class="footer-anchor">
                    <h3 class="mt-3">ul. Wyzwolenia 4, 66-500 Strzelce Krajeńskie</h3>
                </a>
                <a href="tel:<?= $contact_settings->phone_footer_tel ?>" class="footer-anchor">
                    <h3>tel. <?= $contact_settings->phone_footer_tel ?></h3>
                </a>
                <a href="tel:<?= $contact_settings->phone_footer_mobile ?>" class="footer-anchor">
                    <h3>kom. <?= $contact_settings->phone_footer_mobile ?></h3>
                </a>
                <a href="mailto:<?= $contact_settings->email1 ?>" class="footer-anchor">
                    <h3><?= $contact_settings->email1 ?></h3>
                </a>
            </div>
            <div class="footer-anchor-box">
                <?php foreach ($footer_links_1 as $link) : ?>
                    <a href="<?= cmsButtonLink($link->link) ?>" class="footer-anchor"><?= $link->title ?></a>
                <?php endforeach; ?>
            </div>
            <div class="footer-anchor-box">
                <?php foreach ($footer_links_2 as $link) : ?>
                    <a href="<?= cmsButtonLink($link->link) ?>" class="footer-anchor"><?= $link->title ?></a>
                <?php endforeach; ?>
            </div>
            <div class="footer-anchor-box">
                <?php foreach ($footer_links_3 as $link) : ?>
                    <a href="<?= cmsButtonLink($link->link) ?>" class="footer-anchor"><?= $link->title ?></a>
                <?php endforeach; ?>
            </div>

            <div class="footer-right-social-side">
                <?php foreach ($footer_buttons as $row) : ?>
                    <a target="_blank" href="<?= cmsButtonLink($row->link) ?>" class="footer-button">
                        <div style="width: 40px;"><img class="footer-icon lazy" width="auto" height="29px" alt="<?= $row->alt ?>" data-src="<?= uploads($row->photo) ?>" /></div>
                        <h5 class="footer-social-text"><?= $row->title ?></h5>
                    </a>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
    <div class="copyright-box">
        <h1>Copyright © 2021 by Agencja Zatrudnienia EFEKT Sp. z o.o. Sp. k.</h1>
        <div class="text-white" style="font-weight: 100">Created with love by <a target="_blank" class="copyright-anchor" href="https://agencjamedialna.pro/"><b>Ad Awards</b></a></div>
    </div>
</footer>
<div class="cookies-alert">
    <div class="pr-5">
        Nasza strona internetowa korzysta z plików cookie. Dzięki temu możemy zapewnić naszym użytkownikom
        satysfakcjonujące
        wrażenia z przeglądania naszej witryny i jej prawidłowe funkcjonowanie. <a href="<?= uploads($settings->privace) ?>">
            Czytaj
            więcej...
        </a>
    </div>
    <button onclick="hideCookies()">Rozumiem</button>
</div>
<div class="cookies-badge active">
    <div onclick="showCookies()">Cookie Policy</div>
</div>

<script type="text/javascript">
    if (localStorage.getItem('hideCookies')) hideCookies();
    else showCookies();

    function hideCookies() {
        localStorage.setItem('hideCookies', true);
        document.getElementsByClassName('cookies-alert')[0].classList
            .remove('active');
        document.getElementsByClassName('cookies-badge')[0].classList
            .add('active');
    }

    function showCookies() {
        localStorage.removeItem('hideCookies');
        document.getElementsByClassName('cookies-alert')[0].classList
            .add('active');
        document.getElementsByClassName('cookies-badge')[0].classList
            .remove('active');
    }
</script>
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><img data-src="<?= assets("assets/img/modal-close.svg") ?>" alt="" class="lazy modal-close"></span>
                </button>
            </div>
            <div class="modal-body">
                <?php $this->load->view('front/elements/modal', ['title' => '']); ?>
            </div>

        </div>
    </div>
</div>
<script>
    let modal = document.querySelector('.modal');
    document.querySelectorAll('[data-toggle="modal"]').forEach(trigger => trigger.addEventListener('click', () => {
        let subject = trigger.dataset?.subject ?? "";
        let modalSubject = modal.querySelector('#modal-subject');

        if (modalSubject) modalSubject.value = modalSubject.value.length > 0 ? modalSubject.value : subject;
        modal.querySelector(`.nav-link[href="${trigger.dataset.tabHref}"]`)?.click();
    }))
</script>

<script src="<?= assets() ?>assets/owlcarousel/jqeury/jquery.min.js"></script>

<script src="<?= assets() ?>assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= assets() ?>assets/js/lazyload.min.js"></script>
<script>
    var lazyLoadInstance = new LazyLoad({
        // Your custom settings go here
    });

    $('#modal').on('shown.bs.modal', function() {
        $('.modal-trigger').trigger('focus')
    })
</script>
<?php if ($owl) : ?>
    <script type="text/javascript" src="<?= assets() ?>assets/owlcarousel/js/owl.carousel.min.js"></script>
<?php endif; ?>

<?php if (!getUriSegment(1)) : ?>
    <script>
        var myCarousel = document.querySelector('#slider')
        var carousel = new bootstrap.Carousel(myCarousel, {
            pause: false,
        })
    </script>
<?php endif; ?>
<?php if (!getUriSegment(1) || getUriSegment(1) == 'opinie') : ?>
    <script>
        $('.init-opinions-carousel').owlCarousel({
            loop: true,
            margin: 30,
            nav: false,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 3
                }
            }
        })
    </script>
<?php endif; ?>
<?php if (!getUriSegment(1) || getUriSegment(1) == 'warunki-pracy') : ?>
    <script>
        $('.init-dot-carousel').owlCarousel({
            loop: false,
            margin: 30,
            nav: false,
            dots: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 2
                },
                1400: {
                    items: 3
                }
            }
        })
    </script>
<?php endif; ?>

<?php if (in_array(getUriSegment(1), ['o-nas', 'kontakt'])) : ?>
    <script>
        <?php foreach ($our_team_employee_groups as $group) : ?>
            $('.team-group-carousel-<?= $group->id ?>').owlCarousel({
                nav: false,
                dots: false,
                center: false,
                items: 4,

                responsive: {
                    0: {
                        items: 1
                    },


                    500: {
                        items: 2,
                        startPosition: 1,
                    },
                    700: {
                        items: 3
                    },
                    992: {
                        item: 3,
                        startPosition: 1,
                    },
                    992: {
                        item: 6,
                        startPosition: 2,
                    }
                }
            })
        <?php endforeach; ?>
    </script>
<?php endif; ?>
<?php if (getUriSegment(1) == 'o-nas') : ?>
    <script>
        $('.references-carousel').owlCarousel({
            nav: false,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                576: {
                    items: 2
                },

                992: {
                    items: 3
                }
            }
        })
        $('.articles-carousel').owlCarousel({
            nav: false,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                576: {
                    items: 2
                },

                992: {
                    items: 3
                }
            }
        })
    </script>
<?php endif; ?>

<script src="<?= assets() ?>assets/js/script.js"></script>
<script src="<?= assets() ?>assets/bootstrap/js/compiled.min.js"></script>


<script async defer src="https://www.google.com/recaptcha/api.js?render=<?= $captcha ?>"></script>
<script async>
    let contactForms = document.querySelectorAll('.contact-form');
    for (let i = 0; i < contactForms.length; i++) {
        contactForms[i].addEventListener('submit', function(event) {
            event.preventDefault();
            grecaptcha.ready(function() {
                grecaptcha.execute('<?= $captcha ?>', {
                    action: 'mailer/send'
                }).then(function(token) {
                    contactForms[i].querySelector('input[name="token"]').value = token;
                    contactForms[i].submit();
                });;
            });
        })
    }
</script>
<script>
    let attachmentContainers = document.querySelectorAll('.attachment-container');
    attachmentContainers.forEach(container => {

        container.querySelector('.cv-button').addEventListener('click', e => {
            e.path.find(el => el.classList.contains('attachment-container')).querySelector(
                'input[type="file"]').click();
        })
        let attachment = container.querySelector('.attachment');
        attachment.addEventListener('change', () => {
            container.querySelector('.text').innerHTML = [...attachment.files].map(file => file.name).join(
                ', ');
        })

    })
</script>

<script>
    document.querySelector('.go-top').addEventListener('click', () => window.scrollTo({
        top: 0
    }))
</script>

<script src="<?= assets('assets/phoneInput/telinput.js') ?>"></script>

<script>
    $("#phone1").intlTelInput();
    $("#phone1_contact_page").intlTelInput();
    $("#phone2").intlTelInput();
    $("#phone2_contact_page").intlTelInput();
</script>


</body>

</html>