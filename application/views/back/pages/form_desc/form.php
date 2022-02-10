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
                    Tytuł:
                </div>
                <div class="col-12 col-sm-8 col-lg-9">
                    <input class="form-control" type="text" name="title" value="<?= @$value->title; ?>" required>
                </div>
            </div>

            <div class="row no-gutters">
                <div class="col-12 col-sm-4 col-lg-2">
                    Opis "zadzwoń do mnie":
                </div>
                <div class="col-12 col-sm-8 col-lg-9">
                    <textarea class="summernote" name="call_description"><?php echo @$value->call_description; ?></textarea>

                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-12 col-sm-4 col-lg-2">
                    Opis formularza kontakowego:
                </div>
                <div class="col-12 col-sm-8 col-lg-9">
                    <textarea class="summernote" name="description"><?php echo @$value->description; ?></textarea>

                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-12 col-sm-4 col-lg-2">
                    Opis licznika wiadomości:
                </div>
                <div class="col-12 col-sm-8 col-lg-9">
                    <textarea class="summernote" name="counter_description"><?php echo @$value->counter_description; ?></textarea>

                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-12 col-sm-4 col-lg-2">
                    Rodo:
                </div>
                <div class="col-12 col-sm-8 col-lg-9">
                    <textarea class="summernote" name="rodo"><?php echo @$value->rodo; ?></textarea>

                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-12 col-sm-4 col-lg-2">
                    Napis przycisku rodo:
                </div>
                <div class="col-12 col-sm-8 col-lg-9">
                    <input class="form-control" type="text" name="rodo_button_name" value="<?= @$value->rodo_button_name; ?>" required>
                </div>
            </div>



            <div class="form-layout-footer bd bd-t-0-force pd-20">
                <button class="btn btn-info" type="submit">Zapisz</button>
                <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Anuluj</button>
            </div>
            <?php $this->load->view('back/forms/double_modal'); ?>
        </form><!-- form-layout -->