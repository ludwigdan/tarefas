<?php

function modulo_js($js) {
    $ci = & get_instance();
    return base_url('application/modules/' . $ci->router->fetch_class() . '/snippets/js/' . $js);
}

function modulo_css($css) {
    $ci = & get_instance();
    return base_url('application/modules/' . $ci->router->fetch_class() . '/snippets/css/' . $css);
}