<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel">
  <div class="pd-30">
    <h4 class="tx-gray-800 mg-b-5"><?php echo ucfirst(str_replace('_', ' ', $this->uri->segment(1))); ?></h4>
    <p class="mg-b-0"><?php echo subtitle(); ?></p>
  </div><!-- d-flex -->

  <div class="br-pagebody mg-t-0 pd-x-30">
    <?php if (isset($_SESSION['flashdata'])) : ?>
      <div id="alert-box"><?php echo $_SESSION['flashdata']; ?></div>
    <?php endif; ?>


    <form class="form-layout form-layout-6" action="<?php echo base_url() . 'panel/' . $this->uri->segment(2) . '/action/' . $this->uri->segment(3) . '/' . $this->uri->segment(2); ?>/<?php echo @$value->id; ?>" method="post" enctype="multipart/form-data">
      <div class="row no-gutters">
        <div class="col-12 col-sm-4 col-lg-2">
          Zdjęcie:
        </div>
        <div class="logo-form col-12 col-sm-8 col-lg-9 d-flex">
          <div id="photoViewer_1" class="form-group bd-l-0-force text-center delete_photo cursor bd-0 photo-viewer" onclick="clear_box(1);">
            <?php if (@$value->photo != '') {
              echo '<img class="img-fluid img-thumbnail" src="' . base_url() . 'uploads/' . $value->photo . '" width="64">';
            } else {
              echo '<img class="img-fluid img-thumbnail" src="http://via.placeholder.com/128x128" alt="">';
            } ?>
          </div>
          <div class="form-group bd-t-0-force bd-l-0-force photo-viewer-button justify-item-right d-flex">
            <input type="hidden" id="name_photo_1" name="name_photo_1">
            <button type="button" class="btn btn-info white ml-5 my-auto" onclick="openModal(1);">Dodaj</button>

          </div>
        </div>
      </div>
      <div class="row no-gutters">
        <div class="col-12 col-sm-4 col-lg-2">
          Tekst alternatywny zdjęcia:
        </div>
        <div class="col-12 col-sm-8 col-lg-9">
          <input class="form-control" type="text" name="alt" value="<?= @$value->alt; ?>">
        </div>
      </div>
      <div class="row no-gutters">
        <div class="col-12 col-sm-4 col-lg-2">
          Nazwa strony w menu:
        </div>
        <div class="col-12 col-sm-8 col-lg-9">
          <input class="form-control" type="text" name="title" value="<?= @$value->title; ?>" required>
        </div>
      </div>
      <div class="row no-gutters">
        <div class="col-12 col-sm-4 col-lg-2">
          Tekst na banerze głównym:
        </div>
        <div class="col-12 col-sm-8 col-lg-9">
          <input class="form-control" type="text" name="banner_title" value="<?= @$value->banner_title; ?>" required>
        </div>
      </div>
      <div class="row no-gutters">
        <div class="col-12 col-sm-4 col-lg-2">
          Link:
        </div>
        <div class="col-12 col-sm-8 col-lg-9">
          <input class="form-control" type="text" name="page" value="<?= @$value->page; ?>">
        </div>
      </div>
      <div class="row no-gutters">
        <div class="col-12 col-sm-4 col-lg-2">
          Kolor tekstu:
        </div>
        <div class="col-12 col-sm-8 col-lg-9">
          <input class="form-control" type="color" name="text_color" value="<?= @$value->text_color ? @$value->text_color : '#024d88'; ?>">
        </div>
      </div>
      <div class="row no-gutters">
        <div class="col-12 col-sm-4 col-lg-2">
          Krótki opis strony:
        </div>
        <div class="col-12 col-sm-8 col-lg-9">
          <textarea class="summernote" name="description"><?php echo @$value->description; ?></textarea>

        </div>
      </div>
      <div class="row no-gutters">
        <div class="col-12 col-sm-4 col-lg-2 d-inline">
          Kolor maski baneru (<a href="<?= base_url('panel/colors') ?>">Kolory</a>):
        </div>
        <div class="col-12 col-sm-8 col-lg-9">
          <input class="form-control" type="text" name="banner_mask_color" value="<?= @$value->banner_mask_color ? @$value->banner_mask_color : 'var(--first)'; ?>">
        </div>
      </div>
      <div class="row no-gutters">
        <div class="col-12 col-sm-4 col-lg-2 d-inline">
          Pozycja baneru osi Y (<a target="_blank" href="https://developer.mozilla.org/en-US/docs/Web/CSS/background-position-y">poradnik</a>):
        </div>
        <div class="col-12 col-sm-8 col-lg-9">
          <input class="form-control" type="text" name="banner_position" value="<?= @$value->banner_position ? @$value->banner_position : '50%'; ?>">
        </div>
      </div>



      <div class="form-layout-footer bd bd-t-0-force pd-20">
        <button class="btn btn-info" type="submit">Zapisz</button>
        <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Anuluj</button>
      </div>
      <?php $this->load->view('back/forms/double_modal'); ?>
    </form><!-- form-layout -->