<?php

class PhonebookController extends BaseController
{
    public function __construct()
    {

        $this->renderViews('phonebook.php');
    }
}