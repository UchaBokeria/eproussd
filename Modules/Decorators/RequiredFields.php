<?php

function require_fields($fields)
{

    $diff = array_diff($fields, array_keys($_POST));
    $count = COUNT($diff);
    
    define('REQUIRED_FIELDS', [
        'code' => 403,
        'success' => false,
        'msg' => implode(", ", $diff) . " " . (($count == 1) ? 'Is' : 'Are') . " Required"
    ]);

    return ($count > 0) ? false : true;

}