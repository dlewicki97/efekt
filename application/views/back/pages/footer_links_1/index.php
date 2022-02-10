    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="pd-30">
            <h4 class="tx-gray-800 mg-b-5"><?= $title ?></h4>
            <p class="mg-b-0"><?= subtitle(); ?></p>
        </div><!-- d-flex -->
        <div class="br-pagebody mg-t-0 pd-x-30">
            <?php if (isset($_SESSION['flashdata'])) : ?>
                <div id="alert-box"><?= $_SESSION['flashdata']; ?></div>
            <?php endif; ?>
            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th class="wd-5p align-top">L.p.</th>
                            <!-- <th class="wd-10p align-top no-sort">Aktywny</th> -->
                            <th class="wd-35p align-top">Tytuł</th>
                            <th class="wd-50p text-right no-sort">
                                <a href="<?= base_url(); ?>panel/<?= $this->uri->segment(2); ?>/form/insert" class="btn btn-sm btn-info"><i class="fa fa-plus mg-r-10"></i> Dodaj</a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0;
                        foreach ($rows as $value) : $i++; ?>
                            <tr>
                                <td class="align-middle"><?= $i; ?>.</td>
                                <!-- <td class="align-middle">
                    <label class="ckbox">
                      <input type="checkbox" id="check<?= $value->id ?>" onchange="setCheckbox(<?= $value->id ?>, 'active', '<?= $this->uri->segment(2); ?>');" <?php if (@$value->active) echo "checked"; ?>>
                      <span></span>
                    </label>
                  </td> -->
                                <td class="align-middle"><?= substr($value->title, 0, 70);
                                                            if (strlen($value->title) > 70) echo '...' ?></td>
                                <td class="text-right">
                                    <!-- <a href="<?= base_url(); ?>panel/settings/gallery/<?= $this->uri->segment(2); ?>/<?= $value->id; ?>"
                                    class="btn btn-sm btn-secondary"><i class="icon ion-images mg-r-10"></i> Galeria</a> -->
                                    <a href="<?= base_url(); ?>panel/<?= $this->uri->segment(2); ?>/form/update/<?= $value->id; ?>" class="btn btn-sm btn-info"><i class="icon ion-compose mg-r-10"></i> Edytuj</a>
                                    <a href="<?= base_url(); ?>panel/settings/delete/<?= $this->uri->segment(2); ?>/<?= $value->id; ?>" class="btn btn-sm btn-secondary" onclick="return confirm('Czy na pewno chcesz usunąć <?= $value->title; ?>? #<?= $value->id; ?>')">
                                        <i class="fa fa-close mg-r-10"></i> Usuń
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div><!-- table-wrapper -->