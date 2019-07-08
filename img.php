<?php
if(extension_loaded('gd')) {
    print_r(gd_info());
} elseif (extension_loaded('imagick')) {
    $imagick = new Imagick();
    print_r($imagick->queryFormats());
} else {
    echo 'Nenhuma extensão de imagem disponível';
    exit;
}