<?php
/**
 * Created by PhpStorm.
 * User: Alexander
 * Date: 06.12.2018
 * Time: 18:40
 */
?>

<ul class="menu">
    <li>
        <a href="/phonebook">Public Phonebook</a>
    </li>
    <li>
        <?php
        if (isset($_SESSION['uId'])){
            echo '<a href="/mycontact">My Contact</a>';
        } else {
            echo '<a href="/authorization">Login</a>';
        }
        ?>

    </li>
</ul>
