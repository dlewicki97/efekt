<?php

function getUriSegment($segment)
{
    $CI = &get_instance();
    return $CI->uri->segment($segment + ($_SESSION['lang'] != 'pl' ? 1 : 0));
}
