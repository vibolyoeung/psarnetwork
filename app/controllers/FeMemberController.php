<?php

class FeMemberController extends BaseController {

    public function index() {

        return View::make('frontend.modules.member.index');
    }

    public function register() {

        return View::make('frontend.modules.member.register');
    }

}
