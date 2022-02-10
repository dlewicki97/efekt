<?php

function cmsButtonLink($link)
{
    $baseUrlLink = true;

    foreach (['http', 'tel', 'mail', 'fax'] as $key) {
        if (strpos($link, $key) !== FALSE) $baseUrlLink = false;
    }

    return $baseUrlLink ? base_url($link) : $link;
}
