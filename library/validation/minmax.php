<?php

function validation($str, $min, $max)
{
    if (empty($str)) {
        $output = json_encode(array('type' => 'error', 'text' => 'periksa kembali data input'));
        die($output);
    } else {
        $strClean = htmlspecialchars($str);
        $len = strlen($strClean);
        if ($len < $min) {
            $output = json_encode(array('type' => 'error', 'text' => 'periksa kembali data input'));
            die($output);
        } elseif ($len > $max) {
            $output = json_encode(array('type' => 'error', 'text' => 'periksa kembali data input'));
            die($output);
        }
        return TRUE;
    }
}
