<?php

function modulo_js($js) {
    $ci = & get_instance();
    return base_url('application/modules/' . $ci->router->fetch_class() . '/snippets/js/' . $js);
}

function modulo_css($css) {
    $ci = & get_instance();
    return base_url('application/modules/' . $ci->router->fetch_class() . '/snippets/css/' . $css);
}

function date_pt_bd($dt) {
    $ret = DateTime::createFromFormat('d/m/Y', $dt)->format('Y-m-d');
    return $ret;
}
