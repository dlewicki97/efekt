    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="pd-30">
            <h4 class="tx-gray-800 mg-b-5"><?php echo ucfirst(str_replace('_', ' ', $this->uri->segment(2))); ?> #<?php echo @$value->id; ?></h4>
            <p class="mg-b-0"><?php echo subtitle(); ?></p>
            <hr>
        </div><!-- d-flex -->

        <div class="br-pagebody mg-t-0 pd-x-30">
            <?php if (isset($_SESSION['flashdata'])) : ?>
                <div id="alert-box"><?php echo $_SESSION['flashdata']; ?></div>
            <?php endif; ?>

            <form class="form-layout form-layout-2" action="<?php echo base_url(); ?>panel/<?php echo $this->uri->segment(2); ?>/action/<?php echo $this->uri->segment(4) . '/' . $this->uri->segment(2) . '/' . @$value->id; ?>" method="post" enctype="multipart/form-data">

                <div class="row no-gutters">
                    <div class="col-md-8">
                        <div class="row">
                            <!-- set -->
                            <div class="col-md-6 pr-0">
                                <div class="form-group">
                                    <label class="form-control-label">Język: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="title" value="<?php echo @$value->title; ?>">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-md-6 px-0">
                                <div class="form-group bd-l-0-force">
                                    <label class="form-control-label">Prefix:</label>
                                    <input class="form-control" type="text" name="prefix" value="<?php echo @$value->prefix; ?>">
                                </div>
                            </div><!-- col-4 -->
                        </div> <!-- set -->
                        <?php if (@$value->prefix != 'pl') : ?>
                            <div class="row">
                                <div class="col-md-12 pr-0">
                                    <div id="tables" class="form-group bd-t-0-force ">
                                        <label for="" class="form-control-label">Wybierz tabele do przetłumaczenia</label>
                                        <label class="ckbox">
                                            <?php $count = count($tables);
                                            $jezyki = $this->back_m->get_prefixes();
                                            $indexes = []; ?>
                                            <input type="checkbox" id="check_all" onchange="checkAll();">
                                            <span>Zaznacz wszystkie</span>
                                        </label>


                                        <?php $j = 0;
                                        for ($i = 0; $i < count($tables); $i++) : ?>

                                            <label class="ckbox">
                                                <input type="checkbox" id="table_checkbox_<?= $j + 1;  ?>" name="<?= $tables[$i] ?>" value="<?= $tables[$i] ?>" <?php if (in_array($tables[$i], explode('o|o', @$value->tables))) echo 'checked'; ?>>
                                                <span><?= $tables[$i] ?></span>
                                            </label>
                                            <?php $j++; ?>
                                        <?php endfor; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="row">
                            <div class="col-md-12 pr-0">
                                <div class="form-layout-footer bd pd-20 bd-t-0-force">
                                    <button class="btn btn-info" type="submit">Zapisz</button>
                                    <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Anuluj</button>
                                </div><!-- form-group -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="col-md-12">
                            <div id="photoViewer_1" class="form-group bd-l-0-force text-center delete_photo cursor" onclick="clear_box(1);">
                                <?php if (@$value->photo != '') {
                                    echo '<img class="img-fluid img-thumbnail" src="' . base_url() . 'uploads/' . @$value->photo . '" width=75%>';
                                } else {
                                    echo '<img class="img-fluid img-thumbnail" src="http://via.placeholder.com/64x64" alt="">';
                                } ?>
                            </div>
                        </div><!-- col-12 -->
                        <div class="col-md-12">
                            <div class="form-group bd-t-0-force bd-l-0-force">
                                <label class="form-control-label">Zdjęcie:</label>
                                <input type="hidden" id="name_photo_1" name="name_photo_1">
                                <button type="button" class="btn btn-info white w-100" onclick="openModal(1);">Dodaj</button>
                            </div>
                        </div><!-- col-12 -->
                        <div class="col-md-12">
                            <div id="photoViewer_1" class="form-group bd-t-0-force bd-l-0-force">
                                <label class="form-control-label">Tekst alternatywny zdjęcia:</label>
                                <input class="form-control" type="text" name="alt" value="<?php echo @$value->alt; ?>">
                            </div>
                        </div><!-- col-12 -->
                    </div>
                </div><!-- row -->
                <?php $this->load->view('back/forms/double_modal'); ?>
            </form><!-- form-layout -->

            <script>
                function checkAll() {
                    var isChecked = document.querySelector('#check_all').checked;
                    var classess_nr = document.querySelectorAll('#tables .ckbox').length;
                    console.log('ilosc klas' + classess_nr);
                    for (i = 0; i < classess_nr; i++) {
                        if (isChecked) {
                            if (document.querySelector('#table_checkbox_' + i)) {
                                document.querySelector('#table_checkbox_' + i).checked = true;
                            }
                        } else {
                            if (document.querySelector('#table_checkbox_' + i)) {
                                document.querySelector('#table_checkbox_' + i).checked = false;
                            }
                        }

                    }
                }
            </script>