<span style="float: left">
    <h1>Phonebook</h1>
</span>
    <p class="three" style="float: right;">

        <?php
        if (isset($_SESSION['uId'])){
            echo '<a href="/logout">LOGOUT</a>';
        }
        ?>

    </p>
