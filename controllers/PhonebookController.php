<?php

class PhonebookController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->publicSuccess = true;
        $this->myContact = new Contact();
    }

    public function showAction()
    {
        $users = array('users' => $this->myContact->getUsersData());
        $this->renderViews('phonebook.php', $users);
    }
}