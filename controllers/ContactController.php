<?php
/**
 * Created by PhpStorm.
 * User: Alexander
 * Date: 03.12.2018
 * Time: 21:48
 */

class ContactController extends BaseController
{
    public $myContact;

    public function __construct()
    {
        parent::__construct();
        $this->myContact = new Contact();
    }

    public function saveAction()
    {
        $this->myContact->saveUserData();
        $this->redirect('mycontact');
    }

    public function showAction()
    {
        $userData = $this->myContact->getUserData();

        $this->renderViews('mycontact.php', $userData);
    }
}