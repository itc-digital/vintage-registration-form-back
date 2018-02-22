<?php
namespace models;

class form {
    public static function validate_post($f3)
    {
        $data = $f3->get('POST');
        return TRUE;
    }

    public static function create_record($f3)
    {
        print_r($f3->get('POST'));
    }
}