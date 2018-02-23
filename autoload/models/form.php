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
        if ($data[firstname] < 1)           {print_r('firstname < 1'); return FALSE;}
        elseif ($data[firstname] > 1024)    {print_r('firstname > 1024'); return FALSE;}
        elseif ($data[lastname] < 1)        {print_r('lastname < 1'); return FALSE;}
        elseif ($data[lastname] > 1024)     {print_r('lastname > 1024'); return FALSE;}
        elseif ($data[github] < 1)          {print_r('github < 1'); return FALSE;}
        elseif ($data[github] > 1024)       {print_r('github > 1024'); return FALSE;}
        elseif ($data[telegram] < 1)        {print_r('telegram < 1'); return FALSE;}
        elseif ($data[telegram] > 1024)     {print_r('telegram > 1024'); return FALSE;}
        elseif ($data[faculty] < 1)         {print_r('faculty < 1'); return FALSE;}
        elseif ($data[faculty] > 1024)      {print_r('faculty > 1024'); return FALSE;}
        elseif (!isset($files[screenshot])) {print_r('screenshot is NULL'); return FALSE;}
        else {
            return TRUE;
        }
    }

    public static function create_record($f3)
    {
        $data = $f3->get('POST');
        $files = $f3->get('FILES');

        $dir = 'ui/photos/';
        $file_name = form::save_screenshot($files, $dir);

        $f3->get('DB')->exec('INSERT INTO `users`(`id`, `firstname`, `lastname`, `github`, `telegram`, `faculty`, `screenshot`) VALUES (?,?,?,?,?,?,?)', 
		array(
            1=> NULL,
			2=> $data[firstname],
			3=> $data[lastname],
			4=> $data[github],
            5=> $data[telegram],
            6=> $data[faculty],
			7=> 'http://front.the-center.it/'.$dir.$file_name
		));
    }
}