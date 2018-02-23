<?php
namespace controllers;

class form_controller {
    public function handle_data($f3)
    {
        if (\models\form::validate_post($f3)) {
            \models\form::create_record($f3);
            $f3->status(200);
        } else {
            print_r($f3->get('POST'));
            print_r($f3->get('FILES'));
            $f3->status(418);
        }
    }
}