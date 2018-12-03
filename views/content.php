<div>
    <ul class="menu">
        <li>
            <a href="">Public Phonebook</a>
        </li>
        <li>
            <a href="">Login</a>
        </li>
    </ul>
</div>

<div>
    <p> ТУТ БУДЕТ ОСНОВНОЕ ОКНО</p>
    <?php
    if (isAuthorized())
    {
        require_once 'phonebook.html';
    } else {
        require_once ('authorization.html');
    }
    ?>



</div>

<?php


$_SESSION['authKey'] = getHash($_POST['LOGIN'], $_POST['PASSWORD']);
$_SESSION['USER'] = ['id' => 1,];
if (isAuthorized()) {
    // ...
} else {
    // ... login UI here
}
//session_start();
//if ($_SESSION['USER']['id'] && $_SESSION['authKey'] && /*тут проверка authKey на соотв. реальн.*/) {
//
//}

function getUsers ()
{
    return [
        1 => [
            'login' => 'admin',
            'password' => 'secure'
        ],
    ];
}

function getHash($login, $password)
{
    return md5($login . 'sault' . $password);
}

function isAuthorized()
{
    $userID = $_SESSION['USER']['id'];
    $authKey = $_SESSION['authKey'];
    $users = getUsers();
    $currentUser = $users[$userID];
    $realAuthKey = getHash($currentUser['login'], $currentUser['password']);

    return $authKey === $realAuthKey;
}