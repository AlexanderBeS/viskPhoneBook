<?php
/**
 * Created by PhpStorm.
 * User: Alexander
 * Date: 03.12.2018
 * Time: 21:50
 */

class Contact extends Database
{
    public $firstName;
    public $lastName;
    public $address;
    public $zipCity;
    public $country;
    public $phoneNumbers;
    public $emails;
    public $publish;
    public $tableColumn;
    public $tableValue;

    /*PHONE NUMBERS:
    EMAILS:*/

    public function getFormData()
    {
        if (($_SERVER['REQUEST_METHOD'] == 'POST') && (isset($_POST['btn_save']))) {
            $this->firstName = trim(htmlspecialchars($_POST['firstname']));
            $this->lastName = trim(htmlspecialchars($_POST['lastname']));
            $this->address = trim(htmlspecialchars($_POST['address']));
            $this->zipCity = trim(htmlspecialchars($_POST['zipcity']));
            $this->country = trim(htmlspecialchars($_POST['country']));
            $this->phoneNumbers = '{ "0":"+38099201745"}'; //пример как будут передаваться элементы в бд
            $this->emails = '{"0":"lorem@gmail.com"}';
            $this->publish = '1';
            print_r($_POST);
            //echo 'Data saved';
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
        $this->tableColumn = '(firstname, lastname, address, zipcity, country, phonenumbers, emails, publish)';
        $this->tableValue = "('$this->firstName', '$this->lastName', '$this->address', '$this->zipCity', '$this->country', '$this->phoneNumbers', '$this->emails', '$this->publish')";
        $table = 'user_information';

        if ($valid) {
            $query = "INSERT INTO $table $this->tableColumn VALUES $this->tableValue";
            //print_r($query);
            $this->query($query);
            //echo 'Good request';
        }
    }

    public function getUserData($id)
    {
        $q = "SELECT * FROM user_information WHERE id = $id";
        $this->query($q);
        return $this->result();
    }

    public function addCategory($category)
    {
        if (empty($category)) {
            return false;
        }
        foreach ($category as $column => $val) {
            $columns[] = $column;
            $values[] = "'" . $val . "'";
        }

        $colum_sql = implode(',', $columns);
        $val_sql = implode(',', $values);


        $query = "INSERT INTO category ($colum_sql) VALUES ($val_sql)";
        echo $query . '<br>';

        $this->query($query);
        return $this->resId();


    }
}