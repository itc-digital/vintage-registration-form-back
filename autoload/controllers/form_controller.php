<?php
namespace controllers;

class form_controller {
    public function handle_data($f3)
    {
        if (\models\form::validate_post($f3)) {
            print_r($f3->get('POST')[faculty]);
            //\models\form::create_record($f3);
            $f3->status(200);
        } else {
            $f3->status(418);
        }
    }
}