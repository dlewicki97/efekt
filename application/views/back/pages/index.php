    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
      <div class="pd-30">
        <h4 class="tx-gray-800 mg-b-5">Dashboard</h4>
        <p class="mg-b-0"><?php echo subtitle(); ?></p>
      </div><!-- d-flex -->

      <div class="br-pagebody mg-t-5 pd-x-30">
        <?php if (!in_array("gd", get_loaded_extensions())) : ?>
          <div id="alert-box" class="no-animation">Uwaga! Serwer ma wyłączone rozszerzenie PHP: "gd". Formaty webp
            nie
            zotaną wygenerowane!
          </div>
        <?php endif; ?>

        <iframe src="<?php echo base_url(); ?>assets/instrukcja.pdf" width="100%" height="500px"></iframe>