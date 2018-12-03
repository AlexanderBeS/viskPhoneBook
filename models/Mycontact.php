<?php
/**
 * Created by PhpStorm.
 * User: Alexander
 * Date: 03.12.2018
 * Time: 21:50
 */

class Mycontact extends Database
{
    public $firstName;
    public $lastName;
    public $address;
    public $zipCity;
    public $country;
    public $phoneNumbers;
    public $emails;
    public $publish;
    /*PHONE NUMBERS:
    EMAILS:*/

    public function getData(){
        if (($_SERVER['REQUEST_METHOD'] == 'POST') && (isset($_POST['btn_save']))) {
            $this->firstName = trim(htmlspecialchars($_POST['firstName']));
            $this->lastName = trim(htmlspecialchars($_POST['lastName']));
            $this->address = trim(htmlspecialchars($_POST['address']));
            $this->zipCity = trim(htmlspecialchars($_POST['zipCity']));
            $this->country = trim(htmlspecialchars($_POST['country']));
            $this->phoneNumbers = '{ "0":"+38099201745"}'; //пример как будут передаваться элементы в бд
            $this->emails = '{"0":"lorem@gmail.com"}';
            $this->publish = '1';
        }
    }

    public function saveData()
    {
        $this->getData();
        $table = 'user_information';
        $query = "INSERT INTO $table VALUES ($this->firstName, $this->lastName, $this->address,$this->zipCity , $this->country, $this->phoneNumbers, $this->emails, $this->publish)";
        $this->query($query);
    }
}