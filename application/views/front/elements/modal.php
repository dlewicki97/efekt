<div class="forms">
    <ul class="nav nav-tabs nav-justified">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#phone<?= $title ? "_$title" : "" ?>" role="tab">
                <!-- <img data-src="<?= assets("assets/img/phone.svg") ?>" alt="" class="lazy icon"> -->
                <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="54" height="54" viewBox="0 0 54 54">
                    <g>
                        <g>
                            <path fill="#024c88" d="M52.4 42.027c-2.036-2.036-6.924-5.096-9.334-6.246-2.798-1.343-3.822-1.315-5.803.111-1.648 1.191-2.714 2.299-4.611 1.883-1.898-.401-5.637-3.24-9.265-6.855-3.629-3.628-6.454-7.367-6.855-9.265-.402-1.91.706-2.963 1.883-4.611 1.426-1.98 1.468-3.005.11-5.803-1.149-2.423-4.195-7.298-6.245-9.334C10.244-.129 9.787.315 8.665.717c0 0-1.661.664-3.31 1.758C3.32 3.832 2.186 4.968 1.382 6.67c-.79 1.703-1.703 4.875 2.95 13.156 3.753 6.69 7.437 11.758 12.907 17.214l.014.014.014.014c5.47 5.47 10.525 9.154 17.214 12.907 8.281 4.653 11.453 3.74 13.156 2.95 1.703-.79 2.839-1.925 4.196-3.975 1.094-1.648 1.759-3.31 1.759-3.31.402-1.121.859-1.578-1.191-3.614z" />
                        </g>
                    </g>
                </svg>
                Zadzwoń do mnie!
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#message<?= $title ? "_$title" : "" ?>" role="tab">
                <!-- <img data-src="<?= assets("assets/img/message.svg") ?>" alt="" class="lazy icon"> -->
                <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="49" height="48" viewBox="0 0 49 48">
                    <g>
                        <g>
                            <path fill="#024c88" d="M38.869 14.882H10.21v-4.777h28.658zm0 7.164H10.21V17.27h28.658zm0 7.165H10.21v-4.777h28.658zM43.645.553H5.435C2.808.553.682 2.702.682 5.329L.658 48.316l9.553-9.553h33.434a4.79 4.79 0 0 0 4.776-4.776V5.329A4.79 4.79 0 0 0 43.645.553z" />
                        </g>
                    </g>
                </svg>
                Zostaw wiadomość
            </a>
        </li>

    </ul>



    <div class="tab-content">
        <div class="tab-pane fade in show active" id="phone<?= $title ? "_$title" : "" ?>" role="tabpanel">
            <div class="description"><?= $form_desc->call_description ?>
            </div>
            <form class="d-flex flex-wrap contact-form" method="post" action="<?= base_url('mailer/send') ?>">
                <div class="col-12 col-md-4 input-col"><input required type="text" value="<?= $name = $this->session->flashdata('name') ?? "" ?>" name="name" placeholder="Imię"></div>
                <div class="col-12 col-md-4 input-col"><input id="phone1<?= $title ? "_$title" : "" ?>" type="text" value="<?= $phone = $this->session->flashdata('phone') ?? "" ?>" required name="phone" placeholder="Nr. tel."></div>
                <div class="col-12 col-md-4 input-col">
                    <button class="button button-secondary">Zadzwoń do mnie</button>
                </div>
                <input type="hidden" name="subject" value="Prośba o telefon">
                <input type="hidden" name="token" value="">
            </form>

            <div class="info"><?= str_replace('{liczba}', "<b>$mails_today</b>", $form_desc->counter_description)  ?></div>

            <div class="rodo">
                <?= str_replace('{link}', '<a target="_blank" href="' . base_url('rodo') . "\"> $form_desc->rodo_button_name </a>", $form_desc->rodo) ?>
            </div>
        </div>
        <div class="tab-pane fade" id="message<?= $title ? "_$title" : "" ?>" role="tabpanel">
            <div class="description"><?= $form_desc->description ?>
            </div>
            <style>
                [type=radio] {
                    left: 0% !important;
                    transform: translate(100%, 50%);
                    visibility: unset !important;
                    z-index: -1;
                    width: unset !important;
                }
            </style>
            <form class="d-flex flex-wrap contact-form" enctype="multipart/form-data" method="post" action="<?= base_url('mailer/send') ?>">
                <div class="col-12 pb-2 input-col">
                    <input required placeholder="Imię" name="first_name" type="text">
                </div>
                <div class="col-12 pb-2 input-col">
                    <input required placeholder="Nazwisko" name="last_name" type="text">
                </div>
                <div class="col-12 pb-2 input-col">
                    <input required placeholder="Adres E-mail" name="email" type="email">
                </div>
                <div class="col-12 pb-2 input-col">
                    <input required placeholder="Numer telefonu" id="phone2<?= $title ? "_$title" : "" ?>" name="phone" type="text">
                </div>
                <div class="col-12 pb-2 input-col">
                    <input id="modal-subject" required placeholder="Temat" name="subject" type="text">
                </div>
                <?php foreach ($inputs as $input) : ?>
                    <?php if ($input->type == 'textarea') : ?>
                        <div class="col-12 pb-2 input-col">
                            <textarea name="textarea-<?= $input->id ?>" <?= $input->required ? 'required' : '' ?> placeholder="<?= $input->title ?>" rows="3"></textarea>
                        </div>
                    <?php elseif ($input->type === 'radio') : ?>
                        <div class="col-12 pb-2 input-col">
                            <div class="info text-left font-weight-bold pl-0" style="font-size: 1.4rem"><?= $input->title ?>:</div>
                            <?php foreach (explode(',', $input->options) as $i => $option) : ?>
                                <div class="form-group">
                                    <input name="<?= $input->type ?>-<?= $input->id ?>" type="<?= $input->type ?>" <?= $input->required && $i == 0 ? 'required' : '' ?> class="with-gap" id="<?= ($title ? "_$title" : "") . "$input->title-$option" ?>" value="<?= $option ?>">
                                    <label for="<?= ($title ? "_$title" : "") . "$input->title-$option" ?>"><?= $option ?></label>
                                </div>


                            <?php endforeach; ?>
                        </div>
                    <?php elseif (in_array($input->type, ['file', 'file_multiple'])) : ?>
                        <div class="col-12 pb-2 input-col attachment-container">
                            <input <?= $input->required ? 'required' : '' ?> <?= $input->type === 'file_multiple' ? 'multiple' : '' ?> class="attachment" type="file" name="file-<?= $input->id . ($input->type === 'file_multiple' ? '[]' : '') ?>">
                            <?= $input->title ?>:

                            <svg class="cv-button mx-2" height="30px" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="paperclip" class="svg-inline--fa fa-paperclip fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                <path fill="#8bd8ed" d="M43.246 466.142c-58.43-60.289-57.341-157.511 1.386-217.581L254.392 34c44.316-45.332 116.351-45.336 160.671 0 43.89 44.894 43.943 117.329 0 162.276L232.214 383.128c-29.855 30.537-78.633 30.111-107.982-.998-28.275-29.97-27.368-77.473 1.452-106.953l143.743-146.835c6.182-6.314 16.312-6.422 22.626-.241l22.861 22.379c6.315 6.182 6.422 16.312.241 22.626L171.427 319.927c-4.932 5.045-5.236 13.428-.648 18.292 4.372 4.634 11.245 4.711 15.688.165l182.849-186.851c19.613-20.062 19.613-52.725-.011-72.798-19.189-19.627-49.957-19.637-69.154 0L90.39 293.295c-34.763 35.56-35.299 93.12-1.191 128.313 34.01 35.093 88.985 35.137 123.058.286l172.06-175.999c6.177-6.319 16.307-6.433 22.626-.256l22.877 22.364c6.319 6.177 6.434 16.307.256 22.626l-172.06 175.998c-59.576 60.938-155.943 60.216-214.77-.485z"></path>
                            </svg>
                            <div class="text"></div>
                        </div>

                    <?php else : ?>
                        <div class="col-12 pb-2 input-col">
                            <?php if (in_array($input->type, ['date'])) : ?>
                                <div class="info text-left font-weight-bold pl-0 pb-2" style="font-size: 1.4rem"><?= $input->title ?>:</div>
                            <?php endif; ?>
                            <input <?= $input->required ? 'required' : '' ?> value="<?= $name ?? "" ?>" placeholder="<?= $input->title ?>" name="<?= $input->type ?>-<?= $input->id ?>" type="<?= $input->type ?>">
                        </div>

                    <?php endif; ?>
                <?php endforeach; ?>

                <div class="col-12 pb-2 input-col ">
                    <button class="button button-secondary">Potwierdź</button>
                </div>



                <input type="hidden" name="token" value="">
            </form>

            <div class="info"><?= str_replace('{liczba}', "<b>$mails_today</b>", $form_desc->counter_description)  ?></div>

            <div class="rodo">
                <?= str_replace('{link}', '<a target="_blank" href="' . base_url('rodo') . "\"> $form_desc->rodo_button_name </a>", $form_desc->rodo) ?>
            </div>
        </div>

    </div>

</div>


<script>
    (function() {
        let modalInputs = [...document.querySelectorAll('input'), ...document.querySelectorAll('textarea')];

        modalInputs.forEach(input => input.addEventListener('input', e => {
            let value = input.value;
            localStorage.setItem(`input-${input.name}`, value);
        }))

        window.addEventListener('load', () => {
            modalInputs.forEach(input => {
                if (['file', 'radio'].includes(input.type)) return;
                input.value = localStorage.getItem(`input-${input.name}`) ?? ""
            });
        })
    })();
</script>