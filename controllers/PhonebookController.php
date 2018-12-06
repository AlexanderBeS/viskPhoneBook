<?php

class PhonebookController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->publicSuccess = true;
    }

    public function showAction(){
        $this->renderViews('phonebook.php');
    }
}