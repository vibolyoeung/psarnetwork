<?php

class FeMemberController extends BaseController {

    public function index() {

        return View::make('frontend.modules.member.index');
    }

    public function register($usertype = '') {
        if (!empty($usertype)) {
            if ($usertype == 'enterprise') {
                return View::make('frontend.modules.member.enterprise');
            } else {
                return View::make('frontend.modules.member.freesell');
            }
        } else {
            return View::make('frontend.modules.member.register');
        }
    }

}
