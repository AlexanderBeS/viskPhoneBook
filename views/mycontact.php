<form method="post" action="/savemycontact" enctype="multipart/form-data">
    <div>
        <div class="mycontactdiv">
            <input name="uId" type="hidden" value="<?= $uId ?>">
            <p class="orangemsg">CONTACT:
            <p>First Name: *</p>
            <input name="firstname" type="text" value="<?= $firstname ?>" required>
            <p>Last Name: *</p>
            <input name="lastname" type="text" value="<?= $lastname ?>" required>
            <p>Address: *</p>
            <input name="address" type="text" value="<?= $address ?>" required>
            <p>ZIP/City: *</p>
            <input name="zipcity" type="text" value="<?= $zipcity ?>" required>
            <p>Country: *</p>
            <select name="country"">
                <?php foreach ($countryMenu as $countryName): ?>
                    <option value=<?= $countryName ?> <?= ($country == $countryName)?'selected':''?>     > <?=$countryName?> </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mycontactdiv">
            <p class="orangemsg">PHONE NUMBERS:</p>
            <div class="clonephonediv">
                <?php
                    $i = 1;
                    foreach($phonenumbers as $key=>$value):
                        $phonenumbers = "phonenumbers$i";
                        $visiblephone = "visiblephone$i";
                ?>
                <div class="phone">
                    <p><input name=<?= $visiblephone ?> type="checkbox" value="1" style="margin:5px;" <?= ($value->$visiblephone)?'checked':''  ?>> Publish field </p>
                    <p><input name=<?= $phonenumbers ?> type="text" value="<?= $value->$phonenumbers ?>"></p>
                </div>
                 <?php $i++; endforeach;?>
            </div>
            <p style="float: right">
                <a href="#" class="addphone">+Add</a>
            </p>
        </div>
        <div class="mycontactdiv">
            <p class="orangemsg">EMAILS:</p>
            <div class="cloneemaildiv">
                <?php
                $j = 1;
                foreach($emails as $key=>$value):
                    $emails = "emails$j";
                    $visibleemail = "visibleemail$j";
                 ?>
                <div class="email">
                    <p><input name=<?= $visibleemail ?> type="checkbox" value="1" style="margin:5px;" <?= ($value->$visibleemail)?'checked':''  ?>> Publish field </p>
                    <p><input name=<?= $emails ?> type="text" value="<?= $value->$emails ?>"></p>
                </div>
                <?php $j++; endforeach;?>
            </div>


            <p style="float: right">
                <a href="#" class="addemail">+Add</a>
            </p>
        </div>
    </div>
    <div class="bottomContact">
            <p>*Fields are mandatory</p>
            <label>
                <input name="publish" type="checkbox" value="1" <?php if ($publish == '1') echo 'checked' ?>>
                Publish my contact
            </label>
            <input name="btn_save" type="submit" value="Save">
    </div>


</form>