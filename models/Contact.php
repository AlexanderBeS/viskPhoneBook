<?php
/**
 * Created by PhpStorm.
 * User: Alexander
 * Date: 03.12.2018
 * Time: 21:50
 */

class Contact extends Database
{
    public $uId;
    public $firstName;
    public $lastName;
    public $address;
    public $zipCity;
    public $country;
    public $phoneNumbers;
    public $emails;
    public $publish;
    public $saveAllColumns;
    public $getAllColumns;

    /*PHONE NUMBERS:
    EMAILS:*/
    public function __construct()
    {
        parent::__construct();
        $this->saveAllColumns = '(uId, firstname, lastname, address, zipcity, country, phonenumbers, emails, publish)';
        $this->getAllColumns = 'uId, firstname, lastname, address, zipcity, country, phonenumbers, emails, publish';
        $this->uId = $_SESSION['uId'];
    }


    public function getFormData()
    {
        if (($_SERVER['REQUEST_METHOD'] == 'POST') && (isset($_POST['btn_save']))) {
            //$this->uId = trim(htmlspecialchars($_POST['uId']));
            $this->firstName = trim(htmlspecialchars($_POST['firstname']));
            $this->lastName = trim(htmlspecialchars($_POST['lastname']));
            $this->address = trim(htmlspecialchars($_POST['address']));
            $this->zipCity = trim(htmlspecialchars($_POST['zipcity']));
            $this->country = trim(htmlspecialchars($_POST['country']));
            $this->phoneNumbers = trim(htmlspecialchars($_POST['phonenumbers']));//'{ "0":"+38099201745"}'; пример как будут передаваться элементы в бд
            $this->emails = trim(htmlspecialchars($_POST['email']));;//'{"0":"lorem@gmail.com"}';
            $this->publish = '1';
            //print_r($_POST);
            //echo 'Data saved';
            //var_dump($this->phoneNumbers);
            return true;
        } else {
            //print_r($_POST);
            //echo 'Data not saved';
            return false;
        }
    }

    public function saveUserData()
    {
        $valid = $this->getFormData();
        if ($valid) {
            $tableValue = "('$this->firstName', '$this->lastName', '$this->address', '$this->zipCity', '$this->country', '$this->phoneNumbers', '$this->emails', '$this->publish')";
            $checkUserRow = "SELECT id FROM user_information WHERE uId = '$this->uId'";

            //если строка с uid=номером существует, то обновляем информацию, иначе создаём новую строку
            if ($this->result($this->query($checkUserRow))){
                $updateString = "firstname = '$this->firstName', lastname = '$this->lastName', address = '$this->address', zipcity = '$this->zipCity', country = '$this->country', phonenumbers = '$this->phoneNumbers', emails = '$this->emails', publish = '$this->publish'";
                $q = "UPDATE user_information SET $updateString WHERE uId='$this->uId'";
            } else {
                $q = "INSERT INTO user_information $this->saveAllColumns VALUES $tableValue";
            }
            //print_r($q);
            $this->query($q);
        }
    }

    public function getUserData()
    {
        $q = "SELECT $this->getAllColumns FROM user_information WHERE uId = '$this->uId'";
        //print_r($q);
        $this->query($q);
        return $this->result();
    }

    public function formMenu(){
        //запрос к БД и отправка return со списком типа "menu" => ["Sweeden", "Ukraine"]
    }

    public function createJson($value)
    {
        //тут из формы мы делаем json объект
    }
}