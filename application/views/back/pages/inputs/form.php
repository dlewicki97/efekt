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
                    Wymagane?:
                </div>
                <div class="col-12 col-sm-8 col-lg-9">
                    <input class="form-control" type="checkbox" name="required" <?php if (@$value->required) echo 'checked'; ?>>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-12 col-sm-4 col-lg-2">
                    Typ pola:
                </div>
                <div class="col-12 col-sm-8 col-lg-9">
                    <select class="form-control" required name="type" id="">
                        <?php $options = [
                            'text' =>  'Pole tekstowe',
                            'textarea' =>  'Pole tekstowe długie',
                            'phone' =>  'Pole numeru telefonu',
                            'radio' =>  'Pole wyboru',
                            'date' =>  'Data',
                            'file' =>  'Plik',
                            'file_multiple' =>  'Pliki',
                        ];
                        foreach ($options as $type => $label) : ?>
                            <option <?php if (@$value->type == $type) echo 'selected'; ?> value="<?= $type ?>"><?= $label ?> </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div id="options" class="row no-gutters d-none">
                <div class="col-12 col-sm-4 col-lg-2">
                    Opcje pola wyboru:
                </div>
                <div class="col-12 col-sm-8 col-lg-9">
                    <input type="text" name="options" value="<?= @$value->options; ?>" class="form-control form-control-inverse transition pd-y-10" data-role="tagsinput">
                </div>
            </div>




            <div class="form-layout-footer bd bd-t-0-force pd-20">
                <button class="btn btn-info" type="submit">Zapisz</button>
                <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Anuluj</button>
            </div>
            <?php $this->load->view('back/forms/double_modal'); ?>
        </form><!-- form-layout -->

        <script>
            let type = document.querySelector('select[name="type"]');
            let options = document.querySelector('#options');
            setOptions();

            function setOptions() {
                if (type.value === 'radio') options.classList.remove('d-none');
                else options.classList.add('d-none');
            }
            document.querySelector('select[name="type"]').addEventListener('change', () => {
                setOptions();
            })
        </script>