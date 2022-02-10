     <section class="carousel-section">
         <div id="slider" class="carousel slide custom-carousel" data-pause="false" data-bs-ride="carousel">
             <div class="carousel-inner custom-carousel-inner">
                 <?php foreach ($slider as $i => $slide) : ?>
                     <div class="carousel-item custom-carousel-item active">
                         <div class="custom-carousel-img lazy" title="<?= $slide->alt ?>" data-bg="<?= uploads($slide->photo) ?>">
                             <div class="oncarousel-box">
                                 <h1 class="oncarousel-title"><?= $slide->title ?></h1>
                                 <h2 class="oncarousel-subtitle"><?= $slide->subtitle ?></h2>
                                 <div class="oncarousel-buttons">
                                     <a href="<?= cmsButtonLink($slide->link1) ?>" class="oncarousel-leftbutton"><?= $slide->button_name1 ?></a>
                                     <a href="<?= cmsButtonLink($slide->link2) ?>" class="oncarousel-rightbutton"><?= $slide->button_name2 ?></a>
                                 </div>
                             </div>
                         </div>
                     </div>
                 <?php endforeach; ?>

             </div>
         </div>
     </section>

     <section class="tiles-container tiles-section flex-wrap justify-content-start">
         <div class="background-tiles-container"></div>
         <div class="background-little-tiles-container"></div>

         <?php foreach ($links_under_slider as $link) : ?>
             <div class="col-12 col-lg-4 p-3 cus-pad">
                 <a href="<?= cmsButtonLink($link->link) ?>">
                     <style>
                         .linear-tiles {
                             background-position-y: <?= $link->banner_position ?>;
                         }
                     </style>
                     <div class="linear-tiles lazy" title="<?= $link->alt ?>" data-bg="<?= uploads($link->photo) ?>">
                         <h1><?= $link->title ?></h1>
                     </div>
                 </a>
             </div>
         <?php endforeach; ?>

     </section>

     <section class="offer-section">
         <div class="offer-main-container">
             <div class="background-offer-container"></div>
             <div class="background-little-offer-container"></div>
             <div class="offer-container">
                 <div class="offer-title-container">
                     <h1 class="offer-title"><?= $job_offers_desc->title ?></h1>
                     <h3 class="offer-subtitle"><?= $job_offers_desc->subtitle ?></h3>
                 </div>
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
                                     <a class="modal-trigger" data-subject="Oferta pracy #<?= $job->number ?>" data-tab-href="#message" data-toggle="modal" data-target="#modal">
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
     <section class="trusted-section">
         <div class="trusted-main-container">
             <div class="background-trusted-container"></div>
             <div class="background-little-trusted-container"></div>

             <?php foreach ($trusted_company as $i => $row) : ?>
                 <?php if ($i % 2 == 0) : ?>
                     <div class="trusted-outside-container-one trusted-outside-containers">
                         <div class="trusted-container-one trusted-containers">
                             <?= $row->description ?>
                             <?php if ($row->button_name1 || $row->button_name2) : ?>
                                 <div class="trusted-buttons">
                                     <a href="<?= cmsButtonLink($row->link1) ?>" class="trusted-offer"><?= $row->button_name1 ?></a>
                                     <a href="<?= cmsButtonLink($row->link2) ?>" class="trusted-contact"><?= $row->button_name2 ?></a>
                                 </div>
                             <?php endif; ?>
                         </div>
                     </div>
                     <div class="trusted-outside-container-two trusted-outside-containers">
                         <div class="trusted-container-two trusted-containers">
                             <div class="trusted-grid-img-one trusted-images lazy" title="<?= $row->alt ?>" data-bg="<?= uploads($row->photo) ?>"></div>
                             <div class="trusted-grid-img-two trusted-images lazy" title="<?= $row->alt2 ?>" data-bg="<?= uploads($row->photo2) ?>"></div>
                             <div class="trusted-grid-img-three trusted-images lazy" title="<?= $row->alt3 ?>" data-bg="<?= uploads($row->photo3) ?>"></div>
                         </div>
                     </div>
                 <?php else : ?>

                     <div class="trusted-outside-container-three trusted-outside-containers">
                         <div class="trusted-container-three trusted-containers">
                             <div class="trusted-grid-img-four trusted-images lazy" title="<?= $row->alt ?>" data-bg="<?= uploads($row->photo) ?>"></div>
                             <div class="trusted-grid-img-five trusted-images lazy" title="<?= $row->alt2 ?>" data-bg="<?= uploads($row->photo2) ?>"></div>
                             <div class="trusted-grid-img-six trusted-images lazy" title="<?= $row->alt3 ?>" data-bg="<?= uploads($row->photo3) ?>"></div>
                         </div>
                     </div>
                     <div class="trusted-outside-container-four trusted-outside-containers">
                         <div class="trusted-container-four trusted-containers">
                             <?= $row->description ?>

                             <?php if ($row->button_name1 || $row->button_name2) : ?>
                                 <div class="trusted-buttons">
                                     <a href="<?= cmsButtonLink($row->link1) ?>" class="trusted-offer"><?= $row->button_name1 ?></a>
                                     <a href="<?= cmsButtonLink($row->link2) ?>" class="trusted-contact"><?= $row->button_name2 ?></a>
                                 </div>
                             <?php endif; ?>
                         </div>
                     </div>
                 <?php endif; ?>

             <?php endforeach; ?>
         </div>
     </section>

     <section class="opinion-section">
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
                         <a href="<?= base_url('opinie') ?>">
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
                         </a>
                     <?php endforeach; ?>
                 </div>
             </div>
         </div>
     </section>
     <section class="empl-section">
         <div class="empl-main-container">
             <div class="background-empl-container-one"></div>
             <div class="background-little-empl-container-one"></div>
             <div class="background-empl-container-two"></div>
             <div class="background-little-empl-container-two"></div>
             <div class="empl-text-box">
                 <div class="empl-title-box">
                     <h1 class="empl-title"><?= $german_employment->title ?></h1>
                     <h2 class="empl-subtitle"><?= $german_employment->subtitle ?></h2>
                 </div>
                 <div class="empl-maintext"><?= $german_employment->description ?></div>
             </div>
             <div class="empl-gap">&nbsp</div>
             <div class="empl-img lazy" title="<?= $german_employment->alt ?>" data-bg="<?= uploads($german_employment->photo) ?>"></div>
         </div>
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
                                     <?php if ($row->icon) : ?>
                                         <?= $row->icon ?>
                                     <?php else : ?>
                                         <img width="auto" height="72px" data-src="<?= uploads($row->photo) ?>" alt="<?= $row->alt ?>" class="lazy">

                                     <?php endif; ?>
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
     <section class="language-section">
         <div class="language-main-container">
             <div class="background-language-container-one"></div>
             <div class="background-little-language-container-one"></div>
             <div class="language-title-box">
                 <h1 class="language-main-title"><?= $coordinator_support_desc->title ?></h1>
                 <h2 class="language-main-subtitle"><?= $coordinator_support_desc->subtitle ?></h2>
             </div>
             <div class="language-contain-box">
                 <?php foreach ($coordinator_support_tiles as $i => $row) : ?>
                     <div class="language-box">
                         <div class="language-outer-img lazy" title="<?= $row->alt ?>" data-bg="<?= uploads($row->photo) ?>">
                             <div class="language-on-img lazy" title="<?= $row->alt2 ?>" data-bg="<?= uploads($row->photo2) ?>"></div>
                         </div>
                         <h1 class="language-title"><?= $row->title ?></h1>
                         <h2 class="language-subtitle"><?= $row->description ?></h2>
                     </div>
                 <?php endforeach; ?>

             </div>
             <div class="language-buttons">
                 <a href="<?= $coordinator_support_desc->link1 ?>" class="language-button language-btn-one"><?= $coordinator_support_desc->button_name1 ?></a>
                 <a href="<?= $coordinator_support_desc->link2 ?>" class="language-button language-btn-two"><?= $coordinator_support_desc->button_name2 ?></a>
             </div>
         </div>
     </section>
     <section class="other-offer-section">
         <div class="otheroff-main-container">
             <div class="background-otheroff-container-one"></div>
             <div class="background-little-otheroff-container-one"></div>
             <div class="otheroff-text-container">
                 <div class="otheroff-title-container">
                     <h1 class="otheroff-title"><?= $checked_offers->title ?></h1>
                     <h2 class="otheroff-subtitle"><?= $checked_offers->subtitle ?></h2>
                 </div>
                 <div class="otheroff-text"><?= $checked_offers->description ?></div>
                 <div class="otheroff-button-box">
                     <a href="<?= cmsButtonLink($checked_offers->link) ?>" class="otheroff-button"><?= $checked_offers->button_name ?></a>
                 </div>
             </div>
             <div class="otheroff-img lazy" title="<?= $checked_offers->alt ?>" data-bg="<?= uploads($checked_offers->photo) ?>"></div>
         </div>
     </section>

     <section class="proffesion-section">
         <div class="prof-main-container">
             <div class="background-prof-container-one"></div>
             <div class="background-little-prof-container-one"></div>
             <div class="prof-title-container">
                 <h1 class="prof-title"><?= $hard_job_desc->title ?></h1>
                 <h2 class="prof-subtitle"><?= $hard_job_desc->subtitle ?></h2>
             </div>
             <div class="prof-main-box">
                 <div class="prof-left-box">
                     <div class="prof-text"><?= $hard_job_desc->description ?></div>
                     <a href="<?= $hard_job_desc->link ?>" class="prof-button"><?= $hard_job_desc->button_name ?></a>
                 </div>
                 <div class="prof-right-box">
                     <div class="prof-in-box">
                         <?php foreach ($hard_job_dots as $row) : ?>
                             <div class="prof-element d-flex flex-column">
                                 <h1 class="prof-bold" style="order: <?= !$row->inverse ? 0 : (int)($row->inverse) ?>"><?= $row->title ?></h1>
                                 <h2 class="prof-light" style="order: <?= !$row->inverse ? 0 : (int)($row->inverse) - 1 ?>"><?= $row->subtitle ?></h2>
                             </div>
                         <?php endforeach; ?>
                     </div>
                 </div>
             </div>
         </div>
     </section>
     <section class="call-section">
         <div class="call-main-container">
             <div class="call-text-container">
                 <h1 class="call-title"><?= $talk_with_coordinator->title ?></h1>
                 <h2 class="call-subtitle"><?= $talk_with_coordinator->subtitle ?></h2>
                 <div class="call-text"><?= $talk_with_coordinator->description ?></div>
             </div>
             <div class="call-img-container lazy" title="<?= $talk_with_coordinator->alt ?>" data-bg="<?= uploads($talk_with_coordinator->photo) ?>">
                 <div class="call-button-container">
                     <a href="<?= $talk_with_coordinator->link1 ?>" class="call-button"><?= $talk_with_coordinator->button_name1 ?></a>
                     <a href="<?= $talk_with_coordinator->link2 ?>" class="call-button"><?= $talk_with_coordinator->button_name2 ?></a>
                 </div>
             </div>
         </div>
     </section>

     <section class="social-section">
         <div class="social-main-container">
             <div class="social-text-container">
                 <div class="social-title-container">
                     <h1 class="social-title"><?= $our_social_media->title ?></h1>
                     <h2 class="social-subtitle"><?= $our_social_media->subtitle ?></h2>
                 </div>
                 <div class="social-button-container">
                     <a target="_blank" href="<?= $settings->fb_link ?>" class="social-fb-button">
                         <div class="social-fb-icon lazy" title="facebook icon" data-bg="<?= assets() ?>assets/icons/facebook-icon.svg"></div>
                         <h1 class="social-text"><?= $our_social_media->fb_button_name ?></h1>
                     </a>
                     <a target="_blank" href="<?= $settings->ig_link ?>" class="social-ig-button">
                         <div class="social-ig-icon lazy" title="instagram icon" data-bg="<?= assets() ?>assets/icons/instagram-icon.svg"></div>
                         <h1 class="social-text"><?= $our_social_media->ig_button_name ?></h1>
                     </a>
                 </div>
             </div>
             <div class="social-img lazy" title="<?= $our_social_media->alt ?>" data-bg="<?= uploads($our_social_media->photo) ?>"></div>
         </div>
     </section>