<?php
namespace views;

class page_render {
    public static function main($f3)
    {
        $template = \Template::instance();
        echo $template->render("index.html");
    }
}