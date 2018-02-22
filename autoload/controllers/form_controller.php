<?php
namespace controllers;

class form_controller {
    public function handle_data($f3)
    {
        if (\models\form::validate($f3)) {
            \models\form::create_record($f3);
            $f3->status(200);
        } else {
            $f3->status(418);
        }
    }
}