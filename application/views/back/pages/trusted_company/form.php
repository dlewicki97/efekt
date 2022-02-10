<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel">
    <div class="pd-30">
        <h4 class="tx-gray-800 mg-b-5"><?= $title ?></h4>
        <p class="mg-b-0"><?php echo subtitle(); ?></p>
    </div><!-- d-flex -->

    <div class="br-pagebody mg-t-0 pd-x-30">
        <?php if (isset($_SESSION['flashdata'])) : ?>
            <div id="alert-box"><?php echo $_SESSION['flashdata']; ?></div>
        <?php endif; ?>


        <form class="form-layout form-layout-6" action="<?php echo base_url() . 'panel/' . $this->uri->segment(2) . '/action/' . $this->uri->segment(4) . '/' . $this->uri->segment(2); ?>/<?php echo @$value->id; ?>" method="post" enctype="multipart/form-data">

            <?php $photos = ["Duże", "Małe u góry", "Małe u dołu"] ?>
            <?php foreach ($photos as $i => $photo) : ?>
                <?php $photoKey = "photo" .  ($i == 0 ? "" : ($i + 1));  ?>
                <?php $altKey = "alt" .  ($i == 0 ? "" : ($i + 1));  ?>
                <div class="row no-gutters">
                    <div class="col-12 col-sm-4 col-lg-2">
                        Zdjęcie "<?= $photo ?>":
                    </div>
                    <div class="logo-form col-12 col-sm-8 col-lg-9 d-flex">
                        <div id="photoViewer_<?= $i + 1 ?>" class="form-group bd-l-0-force text-center delete_photo cursor bd-0 photo-viewer" onclick="clear_box(<?= $i + 1 ?>);">
                            <?php if (@$value->{$photoKey} != '') {
                                echo '<img class="img-fluid img-thumbnail" src="' . base_url() . 'uploads/' . @$value->{$photoKey} . '" width="64">';
                            } else {
                                echo '<img class="img-fluid img-thumbnail" src="http://via.placeholder.com/128x128" alt="">';
                            } ?>
                        </div>
                        <div class="form-group bd-t-0-force bd-l-0-force photo-viewer-button justify-item-right d-flex">
                            <input type="hidden" id="name_photo_<?= $i + 1 ?>" name="name_photo_<?= $i + 1 ?>">
                            <button type="button" class="btn btn-info white ml-5 my-auto" onclick="openModal(<?= $i + 1 ?>);">Dodaj</button>

                        </div>
                    </div>
                </div>
                <div class="row no-gutters">
                    <div class="col-12 col-sm-4 col-lg-2">
                        Tekst alternatywny zdjęcia "<?= $photo ?>":
                    </div>
                    <div class="col-12 col-sm-8 col-lg-9">
                        <input class="form-control" type="text" name="<?= $altKey ?>" value="<?= @$value->{$altKey}; ?>">
                    </div>
                </div>
            <?php endforeach; ?>

            <div class="row no-gutters">
                <div class="col-12 col-sm-4 col-lg-2">
                    Opis:
                </div>
                <div class="col-12 col-sm-8 col-lg-9">
                    <textarea class="summernote" name="description"><?php echo @$value->description; ?></textarea>

                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-12 col-sm-4 col-lg-2">
                    Napis przycisku 1:
                </div>
                <div class="col-12 col-sm-8 col-lg-9">
                    <input class="form-control" type="text" name="button_name1" value="<?= @$value->button_name1; ?>">
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-12 col-sm-4 col-lg-2">
                    Link przycisku 1:
                </div>
                <div class="col-12 col-sm-8 col-lg-9">
                    <input class="form-control" type="text" name="link1" value="<?= @$value->link1; ?>">
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-12 col-sm-4 col-lg-2">
                    Napis przycisku 2:
                </div>
                <div class="col-12 col-sm-8 col-lg-9">
                    <input class="form-control" type="text" name="button_name2" value="<?= @$value->button_name2; ?>">
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-12 col-sm-4 col-lg-2">
                    Link przycisku 2:
                </div>
                <div class="col-12 col-sm-8 col-lg-9">
                    <input class="form-control" type="text" name="link2" value="<?= @$value->link2; ?>">
                </div>
            </div>



            <div class="form-layout-footer bd bd-t-0-force pd-20">
                <button class="btn btn-info" type="submit">Zapisz</button>
                <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Anuluj</button>
            </div>
            <?php $this->load->view('back/forms/double_modal'); ?>
        </form><!-- form-layout -->