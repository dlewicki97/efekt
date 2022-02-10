<!DOCTYPE html>
<html lang="pl">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="<?= assets() ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= assets() ?>assets/bootstrap/css/compiled.min.css" rel="stylesheet">
    <link href="<?= assets() ?>assets/fonts/Satoshi/satoshi.css" rel="stylesheet">
    <link href="<?= assets() ?>assets/css/layout.css" rel="stylesheet">
    <link href="<?= assets("assets/css/$stylesheet.css") ?>" rel="stylesheet">
    <link href="<?= assets() ?>assets/owlcarousel/css/owl.carousel.min.css" rel="stylesheet">
    <link href="<?= assets() ?>assets/owlcarousel/css/owl.theme.default.min.css" rel="stylesheet">
    <link href="<?= assets() ?>assets/phoneInput/telinput.css" rel="stylesheet">
    <title><?= "$meta_title - $settings->meta_title" ?></title>
    <meta name="description" content="<?= strip_tags($meta_description) ?>">
    <style>
        :root {
            <?php foreach ((array)$colors as $key => $value) {
                if ($value && !in_array($key, ['id', 'created', 'title'])) echo "--$key: $value;\n\t\t\t";
            } ?>--banner_mask: <?= $banner_mask_color ?? "var(--first)"; ?>;
        }

        ::-webkit-calendar-picker-indicator {
            background-image: url("data:image/svg+xml,%3Csvg aria-hidden='true' focusable='false' data-prefix='far' data-icon='calendar' class='svg-inline--fa fa-calendar fa-w-14' role='img' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 448 512'%3E%3Cpath fill='<?= urlencode($colors->second) ?>' d='M400 64h-48V12c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v52H160V12c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v52H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48zm-6 400H54c-3.3 0-6-2.7-6-6V160h352v298c0 3.3-2.7 6-6 6z'%3E%3C/path%3E%3C/svg%3E");
            background-repeat: no-repeat;

            background-size: contain;
            display: block;
        }
    </style>
</head>