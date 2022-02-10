<?php for ($i = 0; $i < $settings->modal_photos; $i++) : ?>
    <div class="modal fade modal-photos" id="modal_<?= $i + 1 ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title w-100 text-dark" id="myModalLabel_<?= $i + 1 ?>">Zdjęcie</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-tabs" id="myTab_<?= $i + 1 ?>" role="tablist">
                        <li onclick="showSearch(<?= $i ?>)" class="nav-item nav-item-modal">
                            <a class="nav-link active nav-link-modal home-tab" data-toggle="tab" href="#home_<?= $i + 1 ?>" role="tab" aria-controls="home" aria-selected="true" style="white-space: unset !important;">Dodaj nowe
                                zdjęcie: </a>
                        </li>
                        <li onclick="showSearch(<?= $i ?>)" class="nav-item nav-item-modal">
                            <a class="nav-link nav-link-modal profile-tab" data-toggle="tab" href="#profile_<?= $i + 1 ?>" role="tab" aria-controls="profile" aria-selected="false">Wybierz: </a>
                        </li>
                        <li class="li-search d-none ml-auto pl-3" class="nav-item nav-item-modal d-none align-items-center ml-auto bd bd-b-0-force">
                            <input type="text" class="form-control search-input" placeholder="Szukaj...">
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent_<?= $i + 1 ?>">
                        <div class="tab-pane add-file-modal fade show active" id="home_<?= $i + 1 ?>" role="tabpanel" aria-labelledby="home-tab">
                            <label class="custom-file m-3">
                                <input type="file" id="photo_<?= $i + 1 ?>" onchange="photoListener(1)" class="custom-file-input" name="photo_<?= $i + 1 ?>">
                                <span class="custom-file-control custom-file-control-inverse"></span>
                            </label>
                        </div>
                        <div class="tab-pane fade bg-white" id="profile_<?= $i + 1 ?>" role="tabpanel" aria-labelledby="profile-tab">
                            <div class=" p-4">
                                <input type="hidden" name="server_photo_<?= $i + 1 ?>" id="server_photo_<?= $i + 1 ?>">
                                <div class="row modal-pictures">
                                    <?php for ($j = 0; $j < count($api_gallery); $j++) : ?>
                                        <picture class="col-lg-3 col-12 picture photo-row-<?= ceil(($j + 1) / 12) ?>">
                                            <img id="gallery_photo<?= $api_gallery[$j]['id'] ?>__<?= $i + 1  ?>" onclick="choicePhoto('<?= $api_gallery[$j]['photo'] ?>' , '<?= base_url()  ?>' , <?= $api_gallery[$j]['id'] ?>,<?= $i + 1 ?>); " data-src="<?= base_url() . 'uploads/' . $api_gallery[$j]['photo'] ?>" class="gallery_photo p-1 lazy img-fluid " alt="<?= $api_gallery[$j]['alt'] ?>">
                                        </picture>
                                    <?php endfor; ?>
                                    <div id="modal-pagination-<?= $i + 1 ?>" class="col-12 mt-4 modal-pagination-container">
                                        <nav aria-label="Page navigation example ">
                                            <ul class="pagination modal-pagination pg-elegant justify-content-center mb-0 flex-wrap">
                                                <?php for ($j = 0; $j < count($api_gallery) / 12; $j++) : ?>
                                                    <li onclick="paginate(<?= $i ?>, <?= $j + 1 ?>);" class="page-item <?php if ($j == 0) echo 'active' ?>"><a class="page-link"><?= $j + 1 ?></a></li>
                                                <?php endfor; ?>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info btn-sm" data-dismiss="modal">Zapisz zmiany</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php endfor; ?>

<script>
    function showSearch(modalIndex) {
        modalIndex = +modalIndex;
        let modalPhoto = document.querySelectorAll('.modal-photos')[modalIndex];

        if (!modalPhoto.querySelector(`.profile-tab`).classList.contains('active')) {
            modalPhoto.querySelector('.li-search').classList.remove('d-none');
            modalPhoto.querySelector('.li-search').classList.add('d-flex');
        } else {
            modalPhoto.querySelector('.li-search').classList.add('d-none');
            modalPhoto.querySelector('.li-search').classList.remove('d-flex');
        }
    }

    function showPagination(modalIndex, searchValue) {
        if (searchValue === '') {
            document.getElementById(`modal-pagination-${modalIndex + 1}`).classList.remove('d-none');
        } else {
            document.getElementById(`modal-pagination-${modalIndex + 1}`).classList.add('d-none');
        }
    }
    let modalPhotos = document.querySelectorAll('.modal-photos').forEach((modalPhoto, modalIndex) => {
        let searchInput = modalPhoto.querySelector('.search-input');
        searchInput.addEventListener('keyup', () => {
            let searchValue = searchInput.value;
            showPagination(modalIndex, searchValue);
            if (searchValue === '') {
                paginate(modalIndex, 1);
                return;
            }
            let pictures = modalPhoto.getElementsByClassName('picture');
            for (let picture of pictures) {
                let src = picture.getElementsByTagName('img')[0].src.split('/');
                let name = src[src.length - 2] + src[src.length - 1];
                if (name.includes(searchValue)) {
                    picture.style.display = '';
                } else {
                    picture.style.display = 'none';
                }
            }
        })
    })

    function setActiveClass(modalIndex, page) {


        let modalPagination = document.querySelectorAll('.modal-pagination-container')[+modalIndex];

        let pageItems = modalPagination.getElementsByTagName('li');
        [...pageItems].forEach(item => item.classList.remove('active'));
        pageItems[page - 1].classList.add('active');

    }

    function paginate(modalIndex, page) {
        modalIndex = +modalIndex;

        let modalPictures = document.querySelectorAll('.modal-pictures')[modalIndex];
        let photos = modalPictures.querySelectorAll('.picture');
        for (photo of photos) {
            if (!photo.classList.contains(`photo-row-${page}`)) {

                photo.style.display = 'none';
            } else {
                photo.style.display = '';
            }
        }
        setActiveClass(modalIndex, page)
    }

    for (let i = 0; i < <?= $settings->modal_photos ?>; i++) paginate(i, 1);
</script>