<?php
namespace models;

class form {
    public static function save_screenshot($files, $destination)
    {
        $info = new \SplFileInfo($files[screenshot][name]);
        $file_name = md5(microtime()).'.'.$info->getExtension(); 
        $dir = "/home/s/slink21/front/public_html/".$destination;
        move_uploaded_file($files[screenshot][tmp_name], $dir.$file_name);
        return $file_name;
    }

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
        $data = $f3->get('POST');
        $files = $f3->get('FILES');

        $dir = 'ui/photos/';
        $file_name = form::save_screenshot($files, $dir);

        $f3->get('DB')->exec('INSERT INTO `users`(`id`, `firstname`, `lastname`, `github`, `telegram`, `screenshot`) VALUES (?,?,?,?,?,?)', 
		array(
            1=> NULL,
			2=> $data[firstname],
			3=> $data[lastname],
			4=> $data[github],
			5=> $data[telegram],
			6=> $dir.$file_name
		));
    }
}