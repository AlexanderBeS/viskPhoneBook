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

    public function __construct()
    {
        parent::__construct();
        $this->saveAllColumns = '(uId, firstname, lastname, address, zipcity, country, phonenumbers, emails, publish)';
        $this->getAllColumns = 'uId, firstname, lastname, address, zipcity, country, phonenumbers, emails, publish';
        if (isset($_SESSION['uId']))
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
            //Обработка полей phonenumbers и emails
            $this->getPhonesEmails();
            //обработка блока publish
            if(isset($_POST['publish'])){
                $this->publish = trim(htmlspecialchars($_POST['publish']));
            } else {
                $this->publish = '0';
            }
            return true;
        } else {
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
            $this->query($q);
        }
    }

    public function getUserData()
    {
        $q = "SELECT $this->getAllColumns FROM user_information WHERE uId = '$this->uId'";
        $this->query($q);
        $res = $this->result();
        $res['phonenumbers'] = json_decode($res['phonenumbers']);
        $res['emails'] = json_decode($res['emails']);
        //обработка если у юзера не было информации до этого
        if (is_null($res)) {
            $insert = "INSERT INTO user_information (id, uId) VALUES ($this->uId, $this->uId)";
            $this->query($insert);

            $q = "SELECT id, uId FROM user_information WHERE uId = '$this->uId'";
            $this->query($q);
            $res = $this->result();
        }

        $menu = $this->formMenu();
        $res = $res + $menu;
        return $res;
    }

    public function getUsersData()
    {
        $q = "SELECT $this->getAllColumns FROM user_information WHERE publish = '1'";
        $this->query($q);
        $res = $this->results();
        foreach ($res as $key=>$value){
            $res[$key]['phonenumbers'] = json_decode($res[$key]['phonenumbers']);
            $res[$key]['emails'] = json_decode($res[$key]['emails']);
        }
        print_r($res);
        return $res;
    }

    public function formMenu(){
        $arr = array();
        $q = "SELECT name FROM countries";
        $res = $this->results($this->query($q));
        foreach ($res as $key=>$value){
            $arr['countryMenu'][] = $value['name'];
        }
        return $arr;
    }

    public function getPhonesEmails()
    {
        $regexPhones = '/^phonenumbers[1-9]*$/';
        $regexEmails = '/^emails[1-9]*$/';
        $arrPhones = array();
        $arrEmails = array();
        $i = 0;
        $j = 0;
        //находим phonenumbers, берем последнюю цифру, проверяем есть ли $_POST['visiblephone плюс цифра'], объединяем в массив
        foreach ($_POST as $inputName=>$value) {
            $number = preg_replace('/[^0-9]/', '', $inputName);

            if (preg_match($regexPhones, $inputName)) {
                $arrPhones[$i][$inputName] = trim(htmlspecialchars($value));
                $visiblePhonePost = "visiblephone" . $number;
                if(isset($_POST[$visiblePhonePost])){
                    $arrPhones[$i][$visiblePhonePost] = '1';
                } else {
                    $arrPhones[$i][$visiblePhonePost] = '0';
                }
                $i++;
            }

            if (preg_match($regexEmails, $inputName)) {
                $arrEmails[$j][$inputName] = trim(htmlspecialchars($value));
                $visibleEmailPost = "visibleemail" . $number;
                if(isset($_POST[$visibleEmailPost])){
                    $arrEmails[$j][$visibleEmailPost] = '1';
                } else {
                    $arrEmails[$j][$visibleEmailPost] = '0';
                }
                $j++;
            }
        }
        $this->phoneNumbers = json_encode($arrPhones);
        $this->emails = json_encode($arrEmails);
    }
}