<?php
namespace controllers;

class page_controller {
    public function main_page($f3)
    {
        \views\page_render::main($f3);
    }
}