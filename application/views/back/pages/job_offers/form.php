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
                <div class="col-12 col-sm-4 col-lg-2">
                    Aktywny:
                </div>
                <div class="col-12 col-sm-8 col-lg-9">
                    <input class="form-control" type="checkbox" name="active" <?php if (@$value->active) echo 'checked'  ?>>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-12 col-sm-4 col-lg-2">
                    Strona główna:
                </div>
                <div class="col-12 col-sm-8 col-lg-9">
                    <input class="form-control" type="checkbox" name="home" <?php if (@$value->home) echo 'checked'  ?>>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-12 col-sm-4 col-lg-2">
                    Miasto:
                </div>
                <div class="col-12 col-sm-8 col-lg-9">
                    <input class="form-control" type="text" name="city" value="<?= @$value->city; ?>" required>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-12 col-sm-4 col-lg-2">
                    Język:
                </div>
                <div class="col-12 col-sm-8 col-lg-9">
                    <input class="form-control" type="text" name="lang" value="<?= @$value->lang; ?>">
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-12 col-sm-4 col-lg-2">
                    Wynagrodzenie:
                </div>
                <div class="col-12 col-sm-8 col-lg-9">
                    <input class="form-control" type="text" name="salary" value="<?= @$value->salary; ?>">
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-12 col-sm-4 col-lg-2">
                    Data rozpoczęcia:
                </div>
                <div class="col-12 col-sm-8 col-lg-9">
                    <input class="form-control" type="text" name="start_date" value="<?= @$value->start_date; ?>">
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-12 col-sm-4 col-lg-2">
                    Numer oferty:
                </div>
                <div class="col-12 col-sm-8 col-lg-9">
                    <input class="form-control" type="text" name="number" value="<?= @$value->number ? $value->number : ($nextNumber->number ?? 1); ?>">
                </div>
            </div>
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
                    Opis2:
                </div>
                <div class="col-12 col-sm-8 col-lg-9">
                    <textarea class="summernote" name="description2"><?php echo @$value->description2; ?></textarea>

                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-12 col-sm-4 col-lg-2">
                    Opis seo (meta opis):
                </div>
                <div class="col-12 col-sm-8 col-lg-9">
                    <textarea class="summernote" name="meta_description"><?php echo @$value->meta_description; ?></textarea>

                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-12 col-sm-4 col-lg-2">
                    Cechy oferty (enter wprowadza cechę):
                </div>
                <div class="col-12 col-sm-8 col-lg-9">
                    <input class="form-control" type="text" name="attributes" data-role="tagsinput" value="<?= @$value->attributes ?>">
                </div>
            </div>



            <div class="form-layout-footer bd bd-t-0-force pd-20">
                <button class="btn btn-info" type="submit">Zapisz</button>
                <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Anuluj</button>
            </div>
            <?php $this->load->view('back/forms/double_modal'); ?>
        </form><!-- form-layout -->