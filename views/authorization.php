<?php
/** @var $authError */
?>
<section class="container">
    <div class="login">
        <form method="post" action="/authorization">
            <p class="orangemsg">USERNAME
            <input type="text" name="login" value="" placeholder="USERNAME"></p>
            <p class="orangemsg">PASSWORD
            <input type="password" name="password" value="" placeholder="PASSWORD"></p>
            <p class="submit"><input type="submit" name="btn_auth" value="LOGIN"></p>
            <p class="error"><?= $loginError ?></p>
        </form>
    </div>
</section>