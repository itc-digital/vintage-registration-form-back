<?php
namespace models;

class form {
    public static function validate_post($f3)
    {
        $data = $f3->get('POST');
        $files = $f3->get('FILES');
        if (($data[firstname] < 0) || ($data[firstname] > 1024) ||
            ($data[lastname] < 0) || ($data[lastname] > 1024) ||
            ($data[github] < 0) || ($data[github] > 1024) ||
            ($data[telegram] < 0) || ($data[telegram] > 1024) ||
            (!isset($files[screenshot])))
        {
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    public static function create_record($f3)
    {
        print_r($f3->get('FILES'));
    }
}