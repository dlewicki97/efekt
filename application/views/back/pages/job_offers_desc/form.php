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
            <div class="row no-gutters">
                <div class="col-12 col-sm-4 col-lg-2 d-inline">
                    Kolor maski baneru (<a href="<?= base_url('panel/colors') ?>">Kolory</a>):
                </div>
                <div class="col-12 col-sm-8 col-lg-9">
                    <input class="form-control" type="text" name="banner_mask_color" value="<?= @$value->banner_mask_color ? @$value->banner_mask_color : 'var(--first)'; ?>">
                </div>
            </div>

            <div class="row no-gutters">
                <div class="col-12 col-sm-4 col-lg-2">
                    Tytuł:
                </div>
                <div class="col-12 col-sm-8 col-lg-9">
                    <input class="form-control" type="text" name="title" value="<?= @$value->title; ?>" required>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-12 col-sm-4 col-lg-2">
                    Podtytuł:
                </div>
                <div class="col-12 col-sm-8 col-lg-9">
                    <input class="form-control" type="text" name="subtitle" value="<?= @$value->subtitle; ?>">
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
                    Napis przycisku 2:
                </div>
                <div class="col-12 col-sm-8 col-lg-9">
                    <input class="form-control" type="text" name="button_name2" value="<?= @$value->button_name2; ?>">
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-12 col-sm-4 col-lg-2">
                    Napis przycisku powrotu:
                </div>
                <div class="col-12 col-sm-8 col-lg-9">
                    <input class="form-control" type="text" name="back_button_name" value="<?= @$value->back_button_name; ?>">
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-12 col-sm-4 col-lg-2">
                    Tytuł opisu na stronie listingu ofert (pod listingiem):
                </div>
                <div class="col-12 col-sm-8 col-lg-9">
                    <input class="form-control" type="text" name="description_title" value="<?= @$value->description_title; ?>" required>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-12 col-sm-4 col-lg-2">
                    Opis na stronie listingu ofert (pod listingiem):
                </div>
                <div class="col-12 col-sm-8 col-lg-9">
                    <textarea class="summernote" name="description"><?php echo @$value->description; ?></textarea>

                </div>
            </div>




            <div class="form-layout-footer bd bd-t-0-force pd-20">
                <button class="btn btn-info" type="submit">Zapisz</button>
                <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Anuluj</button>
            </div>
            <?php $this->load->view('back/forms/double_modal'); ?>
        </form><!-- form-layout -->