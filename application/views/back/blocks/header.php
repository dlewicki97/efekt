<!-- ########## START: LEFT PANEL ########## -->
<style>
.nav-item>a {
    white-space: pre-wrap !important;
}
</style>
<div class="br-logo"><a href=""><span>[</span>AD Awards<span>]</span></a></div>
<div class="br-sideleft overflow-y-auto">
    <label class="sidebar-label pd-x-15 mg-t-20">Nawigacja</label>
    <div class="br-sideleft-menu">
        <a href="<?= base_url(); ?>panel/dashboard" class="br-menu-link 
        <?php if ($this->uri->segment(2) == 'dashboard') {
            echo 'active';
        } ?>">
            <div class="br-menu-item">
                <i class="menu-item-icon icon fas fa-desktop tx-20"></i>
                <span class="menu-item-label">Dashboard</span>
            </div>
        </a>
        <a href="<?= base_url(); ?>panel/colors" class="br-menu-link
        <?php if ($this->uri->segment(2) == 'colors') {
            echo 'active';
        } ?>">
            <div class="br-menu-item">
                <i class="menu-item-icon icon fas fa-palette tx-20"></i>
                <span class="menu-item-label">Kolory</span>
            </div>
        </a>
        <a href="<?= base_url(); ?>panel/subpages" class="br-menu-link
        <?php if ($this->uri->segment(2) == 'subpages') {
            echo 'active';
        } ?>">
            <div class="br-menu-item">
                <i class="menu-item-icon icon fas fa-folder-open tx-20"></i>
                <span class="menu-item-label">Podstrony</span>
            </div>
        </a>
        <a href="<?= base_url(); ?>panel/header_desc" class="br-menu-link
        <?php if ($this->uri->segment(2) == 'header_desc') {
            echo 'active';
        } ?>">
            <div class="br-menu-item">
                <i class="menu-item-icon icon fas fa-header tx-20"></i>
                <span class="menu-item-label">Header opisy</span>
            </div>
        </a>
        <a href="<?= base_url(); ?>panel/call_box_desc" class="br-menu-link
        <?php if ($this->uri->segment(2) == 'call_box_desc') {
            echo 'active';
        } ?>">
            <div class="br-menu-item">
                <i class="menu-item-icon icon fas fa-comment tx-20"></i>
                <span class="menu-item-label">Powiadomienie opisy</span>
            </div>
        </a>
        <?php $links = [
            'Slider' => 'slider',
            'Linki pod sliderem' => 'links_under_slider',
            'Oferty pracy opisy' => 'job_offers_desc',
            'Zaufana firma' => 'trusted_company',
            'Zatrudnienie na warunkach niemieckich' => 'german_employment',
            'Atrybuty' => 'attributes',
            'Przyjazna rekrutacja kroki' => 'recruitment_steps',
            'Przyjazna rekrutacja opisy' => 'recruitment_desc',
            'Wsparcie koordynatora opisy' => 'coordinator_support_desc',
            'Wsparcie koordynatora kafle' => 'coordinator_support_tiles',
            'Sprawdzone oferty' => 'checked_offers',
            'Wiemy, że to bardzo trudny zawód opisy' => 'hard_job_desc',
            'Wiemy, że to bardzo trudny zawód kropki' => 'hard_job_dots',
            'Już dziś porozmawiaj ze swoją koordynatorką' => 'talk_with_coordinator',
            'Nasze social media' => 'our_social_media',
        ]; ?>
        <a href="#" class="br-menu-link
    <?php if (in_array($this->uri->segment(2), $links)) {
        echo 'show-sub';
    } ?>">
            <div class="br-menu-item">
                <i class="menu-item-icon icon fas fa-home tx-20"></i>
                <span class="menu-item-label">Strona główna</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div>
        </a>
        <ul class="br-menu-sub nav flex-column">
            <?php foreach ($links as $key => $value) : ?>
            <li class="nav-item"><a href="<?= base_url() . 'panel/' . $value ?>"
                    class="nav-link <?php if ($this->uri->segment(2) == $value) echo 'active' ?>"><?= $key ?></a></li>
            <?php endforeach; ?>
        </ul>

        <?php $links = [
            'Sekcja opisowa' => 'abouts',
            'Nasz zespół opisy' => 'our_team_desc',
            'Nasz zespół pracownicy' => 'our_team_employees',
            'Nasz zespół grupy pracowników' => 'our_team_employee_groups',
            'Referencje opisy' => 'references_desc',
            'Referencje' => 'references_list',
            'Aktualności opisy' => 'about_articles_desc',
            'Aktualności' => 'articles',
            'Konkursy opisy' => 'contests_desc',
            'Konkursy' => 'contests',
        ]; ?>
        <a href="#" class="br-menu-link
    <?php if (in_array($this->uri->segment(2), $links)) {
        echo 'show-sub';
    } ?>">
            <div class="br-menu-item">
                <i class="menu-item-icon icon fas fa-building tx-20"></i>
                <span class="menu-item-label">O nas</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div>
        </a>
        <ul class="br-menu-sub nav flex-column">
            <?php foreach ($links as $key => $value) : ?>
            <li class="nav-item"><a href="<?= base_url() . 'panel/' . $value ?>"
                    class="nav-link <?php if ($this->uri->segment(2) == $value) echo 'active' ?>"><?= $key ?></a></li>
            <?php endforeach; ?>
        </ul>

        <?php $links = [
            'Listing' => 'job_offers',
            'Opisy' => 'job_offers_desc',
        ]; ?>
        <a href="#" class="br-menu-link
    <?php if (in_array($this->uri->segment(2), $links)) {
        echo 'show-sub';
    } ?>">
            <div class="br-menu-item">
                <i class="menu-item-icon icon fas fa-user-tie tx-20"></i>
                <span class="menu-item-label">Oferty pracy</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div>
        </a>
        <ul class="br-menu-sub nav flex-column">
            <?php foreach ($links as $key => $value) : ?>
            <li class="nav-item"><a href="<?= base_url() . 'panel/' . $value ?>"
                    class="nav-link <?php if ($this->uri->segment(2) == $value) echo 'active' ?>"><?= $key ?></a></li>
            <?php endforeach; ?>
        </ul>
        <?php $links = [
            'Opisy' => 'opinions_desc',
            'Listing' => 'opinions',
        ]; ?>
        <a href="#" class="br-menu-link
    <?php if (in_array($this->uri->segment(2), $links)) {
        echo 'show-sub';
    } ?>">
            <div class="br-menu-item">
                <i class="menu-item-icon icon fas fa-comments tx-20"></i>
                <span class="menu-item-label">Opinie</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div>
        </a>
        <ul class="br-menu-sub nav flex-column">
            <?php foreach ($links as $key => $value) : ?>
            <li class="nav-item"><a href="<?= base_url() . 'panel/' . $value ?>"
                    class="nav-link <?php if ($this->uri->segment(2) == $value) echo 'active' ?>"><?= $key ?></a></li>
            <?php endforeach; ?>
        </ul>
        <?php $links = [
            'Listing' => 'working_conditions',
            'Formularz opisy' => 'form_desc',
            'Premie opisy' => 'bonuses_desc',
            'Premie' => 'bonuses',
        ]; ?>
        <a href="#" class="br-menu-link
    <?php if (in_array($this->uri->segment(2), $links)) {
        echo 'show-sub';
    } ?>">
            <div class="br-menu-item">
                <i class="menu-item-icon icon fas fa-list tx-20"></i>
                <span class="menu-item-label">Warunki pracy</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div>
        </a>
        <ul class="br-menu-sub nav flex-column">
            <?php foreach ($links as $key => $value) : ?>
            <li class="nav-item"><a href="<?= base_url() . 'panel/' . $value ?>"
                    class="nav-link <?php if ($this->uri->segment(2) == $value) echo 'active' ?>"><?= $key ?></a></li>
            <?php endforeach; ?>
        </ul>
        <?php $links = [
            'Listing' => 'blogs',
            'Opisy' => 'blogs_desc',

        ]; ?>
        <a href="#" class="br-menu-link
    <?php if (in_array($this->uri->segment(2), $links)) {
        echo 'show-sub';
    } ?>">
            <div class="br-menu-item">
                <i class="menu-item-icon icon fas fa-blog tx-20"></i>
                <span class="menu-item-label">Blog</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div>
        </a>
        <ul class="br-menu-sub nav flex-column">
            <?php foreach ($links as $key => $value) : ?>
            <li class="nav-item"><a href="<?= base_url() . 'panel/' . $value ?>"
                    class="nav-link <?php if ($this->uri->segment(2) == $value) echo 'active' ?>"><?= $key ?></a></li>
            <?php endforeach; ?>
        </ul>
        <?php $links = [
            'Sekcja opisowa' => 'vademecums',
            'Słowniczek przydatnych zwrotów opisy' => 'phrases_desc',
            'Słowniczek przydatnych zwrotów' => 'phrases',
        ]; ?>
        <a href="#" class="br-menu-link
    <?php if (in_array($this->uri->segment(2), $links)) {
        echo 'show-sub';
    } ?>">
            <div class="br-menu-item">
                <i class="menu-item-icon icon fas fa-book tx-20"></i>
                <span class="menu-item-label">Vademecum<br>opiekunki</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div>
        </a>
        <ul class="br-menu-sub nav flex-column">
            <?php foreach ($links as $key => $value) : ?>
            <li class="nav-item"><a href="<?= base_url() . 'panel/' . $value ?>"
                    class="nav-link <?php if ($this->uri->segment(2) == $value) echo 'active' ?>"><?= $key ?></a></li>
            <?php endforeach; ?>
        </ul>
        <?php $links = [
            'Opisy' => 'contact_desc',
            'Pola formularzy' => 'inputs',
            'Nasz zespół opisy' => 'our_team_desc',
            'Nasz zespół pracownicy' => 'our_team_employees',
            'Nasz zespół grupy pracowników' => 'our_team_employee_groups',
            'Wsparcie koordynatora opisy' => 'coordinator_support_desc',
            'Wsparcie koordynatora kafle' => 'coordinator_support_tiles',
        ]; ?>
        <a href="#" class="br-menu-link
    <?php if (in_array($this->uri->segment(2), $links)) {
        echo 'show-sub';
    } ?>">
            <div class="br-menu-item">
                <i class="menu-item-icon icon fas fa-phone tx-20"></i>
                <span class="menu-item-label">Kontakt</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div>
        </a>
        <ul class="br-menu-sub nav flex-column">
            <?php foreach ($links as $key => $value) : ?>
            <li class="nav-item"><a href="<?= base_url() . 'panel/' . $value ?>"
                    class="nav-link <?php if ($this->uri->segment(2) == $value) echo 'active' ?>"><?= $key ?></a></li>
            <?php endforeach; ?>
        </ul>

        <?php $links = [
            'Linki (kolumna 1)' => 'footer_links_1',
            'Linki (kolumna 2)' => 'footer_links_2',
            'Linki (kolumna 3)' => 'footer_links_3',
            'Przyciski' => 'footer_buttons',
        ] ?>
        <a href="#" class="br-menu-link
    <?php if (in_array($this->uri->segment(2), $links)) {
        echo 'show-sub';
    } ?>">
            <div class="br-menu-item">
                <i class="menu-item-icon icon fas fa-shoe-prints tx-20"></i>
                <span class="menu-item-label">Footer</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div>
        </a>
        <ul class="br-menu-sub nav flex-column">
            <?php foreach ($links as $key => $value) : ?>
            <li class="nav-item"><a href="<?= base_url() . 'panel/' . $value ?>"
                    class="nav-link <?php if ($this->uri->segment(2) == $value) echo 'active' ?>"><?= $key ?></a></li>
            <?php endforeach; ?>
        </ul>





        <a href="<?= base_url(); ?>panel/settings/gallery/gallery_page/1" class="br-menu-link
        <?php if ($this->uri->segment(4) == 'gallery_page') {
            echo 'active';
        } ?>">
            <div class="br-menu-item">
                <i class="menu-item-icon icon fas fa-photo tx-20"></i>
                <span class="menu-item-label">Galeria</span>
            </div>
        </a>

        <a href="<?= base_url(); ?>panel/media" class="br-menu-link
        <?php if ($this->uri->segment(2) == 'media') {
            echo 'active';
        } ?>">
            <div class="br-menu-item">
                <i class="menu-item-icon icon fab fa-medium tx-20"></i>
                <span class="menu-item-label">Media</span>
            </div>
        </a>
        <a href="<?= base_url(); ?>panel/mails" class="br-menu-link
        <?php if ($this->uri->segment(2) == 'mails') {
            echo 'active';
        } ?>">
            <div class="br-menu-item">
                <i class="menu-item-icon icon fas fa-mail-bulk tx-20"></i>
                <span class="menu-item-label">Skrzynka mailowa</span>
            </div>
        </a>



    </div>
</div>
<!-- ########## END: LEFT PANEL ########## -->

<!-- ########## START: HEAD PANEL ########## -->
<div class="br-header">
    <div class="br-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a>
        </div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i
                    class="icon ion-navicon-round"></i></a></div>
    </div>
    <div class="br-header-right">
        <nav class="nav">
            <form class="nav-link pd-x-7 pos-relative d-flex align-items-center" id="form_lang"
                action="<?= base_url() ?>panel/settings/set_lang" method="post">
                <select id="lang_select" name="lang" class="" style="border:none; color:#868e96;">
                    <?php foreach ($jezyki as $jezyk) : ?>
                    <option <?php if ($jezyk->prefix == $this->session->userdata('lang')) echo 'selected'; ?>
                        value="<?= $jezyk->prefix ?>"><?= strtoupper($jezyk->prefix) ?></option>
                    <?php endforeach; ?>
                </select>
                <input type="hidden" name="redirect" id="redirect_input">
            </form>
            <div class="dropdown">
                <a href="" class="nav-link pd-x-7 pos-relative" data-toggle="dropdown">
                    <i class="icon ion-ios-email-outline tx-24"></i>

                    <?php $unreadMessage = false;
                    $i = 0;
                    foreach ($mails as $value) {
                        $i++;
                        if ($value->answer == 0) {
                            $unreadMessage = true;
                        }
                        if ($i == 5) {
                            break;
                        }
                    }
                    if ($unreadMessage == true) : ?>
                    <span class="square-8 bg-danger pos-absolute t-15 r-0 rounded-circle"></span>
                    <?php endif; ?>

                </a>
                <div class="dropdown-menu dropdown-menu-header wd-300 pd-0-force">
                    <div class="d-flex align-items-center justify-content-between pd-y-10 pd-x-20 bd-b bd-gray-200">
                        <label class="tx-12 tx-info tx-uppercase tx-semibold tx-spacing-2 mg-b-0">Wiadomości</label>
                    </div>

                    <div class="media-list">
                        <?php if (empty($mails)) {
                            echo '<p class="p-3">Brak wiadomości w skrzynce</p>';
                        } ?>
                        <?php $i = 0;
                        foreach (array_reverse($mails) as $value) : $i++; ?>
                        <a href="<?= base_url(); ?>panel/mails/show/<?= $value->id; ?>"
                            class="media-list-link <?php if ($value->answer == 0) {
                                                                                                                        echo 'read';
                                                                                                                    } ?>">
                            <div class="media pd-x-20 pd-y-15">
                                <?php if ($value->answer == 1) : ?>
                                <img src="<?= base_url(); ?>assets/back/img/icons/checked.png"
                                    class="wd-40 rounded-circle" alt="">
                                <?php else : $unreadMessage == true; ?>
                                <img src="<?= base_url(); ?>assets/back/img/icons/cancel.png"
                                    class="wd-40 rounded-circle" alt="">
                                <?php endif; ?>
                                <div class="media-body">
                                    <div class="d-flex align-items-center justify-content-between mg-b-5">
                                        <p class="mg-b-0 tx-medium tx-gray-800 tx-14"><?= $value->name; ?></p>
                                        <span
                                            class="tx-11 tx-gray-500"><?= date('d/m/Y', strtotime($value->created)); ?></span>
                                    </div>
                                    <p class="tx-12 mg-b-0"><?= $value->subject; ?></p>
                                </div>
                            </div>
                        </a>
                        <?php if ($i == 5) {
                                break;
                            } ?>
                        <?php endforeach; ?>
                        <div class="pd-y-10 tx-center bd-t">
                            <a href="<?= base_url(); ?>panel/mails" class="tx-12"><i
                                    class="fa fa-angle-down mg-r-5"></i> Wyświetl wszystkie wiadomości</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="dropdown">
                <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
                    <span class="logged-name hidden-md-down"><?= ucfirst($_SESSION['rola']); ?></span>
                    <?php if (@$user->avatar != '') {
                        echo '<span class="avatar" style="background: url(' . base_url() . 'uploads/' . @$user->avatar . ')"></span>';
                    } else {
                        echo '<span class="avatar" style="background: url(http://via.placeholder.com/64x64)"></span>';
                    } ?>
                    <span class="square-10 bg-success"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-header wd-200">
                    <ul class="list-unstyled user-profile-nav">
                        <li><a href="<?= base_url(); ?>panel/profile"><i class="icon ion-ios-person"></i> Edytuj
                                profil</a></li>
                        <li><a href="<?= base_url(); ?>panel/home/logout"><i class="icon ion-power"></i> Wyloguj się</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="navicon-right">
            <a id="btnRightMenu" href="" class="pos-relative">
                <i class="fas fa-angle-double-left"></i>



            </a>
        </div>
    </div>
</div>
<!-- ########## END: HEAD PANEL ########## -->

<!-- ########## START: RIGHT PANEL ########## -->
<div class="br-sideright">
    <ul class="nav nav-tabs sidebar-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" role="tab" href="#calendar"><i
                    class="icon ion-ios-calendar-outline tx-24"></i></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" role="tab" href="#contact"><i
                    class="icon ion-clipboard tx-24"></i></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" role="tab" href="#settings"><i
                    class="icon ion-ios-gear-outline tx-24"></i></a>
        </li>
    </ul>


    <div class="tab-content">

        <div class="tab-pane pos-absolute a-0 mg-t-60 overflow-y-auto active" id="calendar" role="tabpanel">
            <label class="sidebar-label pd-x-25 mg-t-25">Czas &amp; Data</label>
            <div class="pd-x-25">
                <h2 id="brTime" class="tx-white tx-lato mg-b-5"></h2>
                <h6 id="brDate" class="tx-white tx-light op-3"></h6>
            </div>
            <label class="sidebar-label pd-x-25 mg-t-25">Kalendarz</label>
            <div class="datepicker sidebar-datepicker"></div>
        </div>

        <div class="tab-pane pos-absolute a-0 mg-t-60 overflow-y-auto" id="contact" role="tabpanel">
            <label class="sidebar-label pd-x-25 mg-t-25">Dane kontaktowe</label>

            <div class="change"></div>

            <div class="pd-y-20 pd-x-25 tx-white">
                <h6 class="tx-13 tx-normal">Nazwa firmy:</h6>
                <div class="pos-relative">
                    <input type="text" id="company" name="company"
                        onchange="updateField('company' , 'contact_settings')" value="<?= $contact->company; ?>"
                        class="form-control form-control-inverse transition pd-y-10">
                </div>
            </div>

            <div class="pd-y-20 pd-x-25 tx-white">
                <h6 class="tx-13 tx-normal">Imię i nazwisko właściciela:</h6>
                <div class="pos-relative">
                    <input type="text" id="name" name="name" onchange="updateField('name' , 'contact_settings')"
                        value="<?= $contact->name; ?>" class="form-control form-control-inverse transition pd-y-10">
                </div>
            </div>

            <div class="pd-y-20 pd-x-25 tx-white">
                <h6 class="tx-13 tx-normal">Adres firmy:</h6>
                <div class="pos-relative">
                    <input type="text" id="address" name="address"
                        onchange="updateField('address' , 'contact_settings')" value="<?= $contact->address; ?>"
                        class="form-control form-control-inverse transition pd-y-10">
                </div>
            </div>

            <div class="pd-y-20 pd-x-25 tx-white">
                <h6 class="tx-13 tx-normal">Miasto:</h6>
                <div class="pos-relative">
                    <input type="text" id="city" name="city" onchange="updateField('city' , 'contact_settings')"
                        value="<?= $contact->city; ?>" class="form-control form-control-inverse transition pd-y-10">
                </div>
            </div>

            <div class="pd-y-20 pd-x-25 tx-white">
                <h6 class="tx-13 tx-normal">Kod pocztowy:</h6>
                <div class="pos-relative">
                    <input type="text" id="zip_code" name="zip_code"
                        onchange="updateField('zip_code' , 'contact_settings')" value="<?= $contact->zip_code; ?>"
                        class="form-control form-control-inverse transition pd-y-10">
                </div>
            </div>

            <div class="pd-y-20 pd-x-25 tx-white">
                <h6 class="tx-13 tx-normal">NIP:</h6>
                <div class="pos-relative">
                    <input type="text" id="nip" name="nip" onchange="updateField('nip' , 'contact_settings')"
                        value="<?= @$contact->nip; ?>" class="form-control form-control-inverse transition pd-y-10">
                </div>
            </div>

            <div class="row">


                <div class="col-md-12">
                    <div class="pd-y-20 pd-x-25 tx-white">
                        <h6 class="tx-13 tx-normal">Numer telefonu (header):</h6>
                        <div class="pos-relative">
                            <input type="text" id="phone_header" name="phone_header"
                                onchange="updateField('phone_header' , 'contact_settings')"
                                value="<?= @$contact->phone_header; ?>"
                                class="form-control form-control-inverse transition pd-y-10">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">


                <div class="col-md-12">
                    <div class="pd-y-20 pd-x-25 tx-white">
                        <h6 class="tx-13 tx-normal">Numer telefonu (header):</h6>
                        <div class="pos-relative">
                            <input type="text" id="phone_header2" name="phone_header2"
                                onchange="updateField('phone_header2' , 'contact_settings')"
                                value="<?= @$contact->phone_header2; ?>"
                                class="form-control form-control-inverse transition pd-y-10">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">


                <div class="col-md-12">
                    <div class="pd-y-20 pd-x-25 tx-white">
                        <h6 class="tx-13 tx-normal">Adres e-mail (header):</h6>
                        <div class="pos-relative">
                            <input type="text" id="email_header" name="email_header"
                                onchange="updateField('email_header' , 'contact_settings')"
                                value="<?= @$contact->email_header; ?>"
                                class="form-control form-control-inverse transition pd-y-10">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">


                <div class="col-md-12">
                    <div class="pd-y-20 pd-x-25 tx-white">
                        <h6 class="tx-13 tx-normal">Numer telefonu (stopka tel.):</h6>
                        <div class="pos-relative">
                            <input type="text" id="phone_footer_tel" name="phone_footer_tel"
                                onchange="updateField('phone_footer_tel' , 'contact_settings')"
                                value="<?= @$contact->phone_footer_tel; ?>"
                                class="form-control form-control-inverse transition pd-y-10">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">


                <div class="col-md-12">
                    <div class="pd-y-20 pd-x-25 tx-white">
                        <h6 class="tx-13 tx-normal">Numer telefonu (stopka kom.):</h6>
                        <div class="pos-relative">
                            <input type="text" id="phone_footer_mobile" name="phone_footer_mobile"
                                onchange="updateField('phone_footer_mobile' , 'contact_settings')"
                                value="<?= @$contact->phone_footer_mobile; ?>"
                                class="form-control form-control-inverse transition pd-y-10">
                        </div>
                    </div>
                </div>
            </div>



            <div class="row">

                <div class="col-md-12">
                    <div class="pd-y-20 pd-x-25 tx-white">
                        <h6 class="tx-13 tx-normal">Adres e-mail:</h6>
                        <div class="pos-relative">
                            <input type="text" id="email1" name="email1"
                                onchange="updateField('email1' , 'contact_settings')" value="<?= $contact->email1; ?>"
                                class="form-control form-control-inverse transition pd-y-10">
                        </div>
                    </div>
                </div>
            </div>



            <div class="pd-y-20 pd-x-25 tx-white">
                <h6 class="tx-13 tx-normal">Link do mapy Google:</h6>
                <div class="pos-relative">
                    <input type="text" id="map" name="map" onchange="updateFieldMap('map' , 'contact_settings')"
                        value="<?= $contact->map; ?>" class="form-control form-control-inverse transition pd-y-10">
                </div>
                <div id="googleMap" class="text-center">
                    <iframe src="<?= $contact->map; ?>" width="100%" height="150" frameborder="0"
                        style="border:0; margin-top: 20px;" allowfullscreen=""></iframe>
                </div>
            </div>
        </div>


        <div class="tab-pane pos-absolute a-0 mg-t-60 overflow-y-auto" id="settings" role="tabpanel">
            <label class="sidebar-label pd-x-25 mg-t-25">Ustawienia strony</label>

            <div class="change"></div>

            <div class="pd-y-20 pd-x-25 tx-white header-logo-row">
                <h6 class="tx-13 tx-normal">Logo:</h6>
                <p class="op-5 tx-13">Logo wyświetlane w zakładce i Google</p>
                <div class="pos-relative">
                    <div class="photo-viewer form-group bd-t-0-force bd-r-0-force text-center">
                        <?php if (@$settings->logo != '') {
                            echo '<img class="img-fluid img-thumbnail" src="' . base_url() . 'uploads/' . @$settings->logo . '" width="74">';
                        } else {
                            echo '<img class="img-fluid img-thumbnail" src="http://via.placeholder.com/64x64" alt="">';
                        } ?>
                    </div>
                    <label class="custom-file">
                        <input type="file" id="logo" class="custom-file-input" name="logo"
                            onchange="updateFieldPhoto('logo' , 'settings')">
                        <span class="custom-file-control custom-file-control-inverse"></span>
                    </label>
                </div>
            </div>
            <div class="pd-y-20 pd-x-25 tx-white header-logo-row">
                <h6 class="tx-13 tx-normal">Logo w stopce:</h6>
                <p class="op-5 tx-13">Logo wyświetlane w stopce</p>
                <div class="pos-relative">
                    <div class="photo-viewer form-group bd-t-0-force bd-r-0-force text-center">
                        <?php if (@$settings->footer_logo != '') {
                            echo '<img class="img-fluid img-thumbnail" src="' . base_url() . 'uploads/' . @$settings->footer_logo . '" width="74">';
                        } else {
                            echo '<img class="img-fluid img-thumbnail" src="http://via.placeholder.com/64x64" alt="">';
                        } ?>
                    </div>
                    <label class="custom-file">
                        <input type="file" id="footer_logo" class="custom-file-input" name="footer_logo"
                            onchange="updateFieldPhoto('footer_logo' , 'settings')">
                        <span class="custom-file-control custom-file-control-inverse"></span>
                    </label>
                </div>
            </div>



            <div class="pd-y-20 pd-x-25 tx-white">
                <h6 class="tx-13 tx-normal">Nazwa witryny:</h6>
                <p class="op-5 tx-13">Nazwa, która będzie wyświetlać się w zakładce i przeglądarce Google.</p>
                <div class="pos-relative">
                    <input type="text" id="meta_title" name="meta_title"
                        onchange="updateField('meta_title' , 'settings')" value="<?= $settings->meta_title; ?>"
                        class="form-control form-control-inverse transition pd-y-10">
                </div>
            </div>

            <div class="pd-y-20 pd-x-25 tx-white">
                <h6 class="tx-13 tx-normal">Słowa kluczowe:</h6>
                <p class="op-5 tx-13">Frazy po których Google indeksuje stronę.</p>
                <div class="pos-relative">
                    <input type="text" id="keywords" name="keywords" onchange="updateField('keywords' , 'settings')"
                        value="<?= $settings->keywords; ?>" class="form-control form-control-inverse transition pd-y-10"
                        data-role="tagsinput">
                </div>
            </div>

            <div class="pd-y-20 pd-x-25 tx-white">
                <h6 class="tx-13 tx-normal">Link do Facebooka:</h6>
                <div class="pos-relative">
                    <input type="text" id="fb_link" name="fb_link" onchange="updateField('fb_link' , 'settings')"
                        value="<?= @$settings->fb_link; ?>"
                        class="form-control form-control-inverse transition pd-y-10">
                </div>
            </div>
            <div class="pd-y-20 pd-x-25 tx-white">
                <h6 class="tx-13 tx-normal">Link do Instagrama:</h6>
                <div class="pos-relative">
                    <input type="text" id="ig_link" name="ig_link" onchange="updateField('ig_link' , 'settings')"
                        value="<?= @$settings->ig_link; ?>"
                        class="form-control form-control-inverse transition pd-y-10">
                </div>
            </div>



            <div class="pd-y-20 pd-x-25 tx-white">
                <h6 class="tx-13 tx-normal">Opis w stopce:</h6>
                <p class="op-5 tx-13">Opis w stopce</p>
                <div class="pos-relative">
                    <textarea id="footer_description" name="footer_description" rows="5"
                        onfocusout="updateTextarea('footer_description' , 'settings')"
                        class="form-control form-control-inverse transition pd-y-10"><?= @$settings->footer_description; ?></textarea>
                </div>
            </div>
            <div class="pd-y-20 pd-x-25 tx-white">
                <h6 class="tx-13 tx-normal">Oferta i przedstawienie usług:</h6>
                <p class="op-5 tx-13">Klauzula RODO</p>
                <div class="pos-relative">
                    <textarea id="rodo" name="rodo" rows="5" onfocusout="updateTextarea('rodo' , 'settings')"
                        class="form-control form-control-inverse transition pd-y-10"><?= @$settings->rodo; ?></textarea>
                </div>
            </div>
            <div class="pd-y-20 pd-x-25 tx-white">
                <h6 class="tx-13 tx-normal">Oferta:</h6>
                <p class="op-5 tx-13">Klauzula RODO</p>
                <div class="pos-relative">
                    <textarea id="rodo2" name="rodo2" rows="5" onfocusout="updateTextarea('rodo2' , 'settings')"
                        class="form-control form-control-inverse transition pd-y-10"><?= @$settings->rodo2; ?></textarea>
                </div>
            </div>
            <div class="pd-y-20 pd-x-25 tx-white">
                <h6 class="tx-13 tx-normal">Kontakt telefoniczny:</h6>
                <p class="op-5 tx-13">Klauzula RODO</p>
                <div class="pos-relative">
                    <textarea id="rodo3" name="rodo3" rows="5" onfocusout="updateTextarea('rodo3' , 'settings')"
                        class="form-control form-control-inverse transition pd-y-10"><?= @$settings->rodo3; ?></textarea>
                </div>
            </div>


            <div class="pd-y-20 pd-x-25">
                <h6 class="tx-13 tx-normal tx-white m-0">Więcej ustawień</h6>
                <label class="custom-file" style="height:4rem;">
                    <input type="file" id="privace" name="privace" class="custom-file-input" style="height: 0;"
                        onchange="updateFieldPrivace('privace' , 'settings')">
                    <span id="privaceTx"
                        class="btn btn-block btn-outline-secondary tx-uppercase tx-11 tx-spacing-2 mb-4">
                        Polityka prywatności
                        <?php if ($settings->privace != '') : ?>
                        <i class="fas fa-check"></i>
                        <?php endif; ?>
                    </span>
                </label>
                <a href="<?= base_url(); ?>panel/profile"
                    class="btn btn-block btn-outline-secondary tx-uppercase tx-11 tx-spacing-2">Ustawienia profilu</a>
            </div>

        </div>
    </div>
</div>
<!-- ########## END: RIGHT PANEL ########## --->