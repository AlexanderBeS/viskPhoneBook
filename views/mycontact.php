<!--<form method="post" action="/mycontact" enctype="multipart/form-data">
    <div>
        <div style="float: left; background-color: red; display: block">
            <input name="id" type="hidden" value="<?= $user[id] ?>">
            <p class="orangemsg">CONTACT:
            <p>First Name:</p>
            <input name="firstname" type="text" value="<?= $user[firstname] ?>">
            <p>Last Name:</p>
            <input name="lastname" type="text" value="<?= $user[lastname] ?>">
            <p>Address:</p>
            <input name="address" type="text" value="<?= $user[address] ?>">
            <p>ZIP/City:</p>
            <input name="zipcity" type="text" value="<?= $user[zipcity] ?>">
            <p>Country:</p>
            <input name="country" type="text" value="<?= $user[country] ?>">
        </div>

        <div style="float: left; background-color: green; display: block">
            <p class="orangemsg">PHONE NUMBERS:</p>
            <p><input name="visible_phone" type="checkbox" value="1">publish field:</p>
            <p><input name="phone" type="text" value="<?= $user[phone] ?>"></p>
            <a href="">+Add</a>
        </div>

        <div style="float: left; background-color: yellow; display: block">
            <p class="orangemsg">EMAILS:</p>
            <p><input name="visible_email" type="checkbox" value="1">publish field:</p>
            <p><input name="email" type="text" value="<?= $user[email] ?>"></p>
            <a href="">+Add</a>
        </div>
    </div>
    <div style="width: 500px; background-color: lightcoral;clear:both; display: block">
        <p><input name="visible_contact" type="checkbox" value="1" <?php /*if ($a == '1') checked */ ?>>Publish my contact</p>
        <input name="btn_save" type="submit" value="Save">
    </div>


</form>-->

<form method="post" action="/mycontact" enctype="multipart/form-data">
    <div>
        <div style="float: left; background-color: red; display: block">
            <input name="id" type="hidden" >
            <p class="orangemsg">CONTACT:
            <p>First Name:</p>
            <input name="firstname" type="text">
            <p>Last Name:</p>
            <input name="lastname" type="text" >
            <p>Address:</p>
            <input name="address" type="text" >
            <p>ZIP/City:</p>
            <input name="zipcity" type="text" >
            <p>Country:</p>
            <select name="country" >
               <!--
               сюда нужно передавать массив
               {% for key,category in categories %}
                <option value="{{ category.id }}" {% if product.category == category.id %}  selected  {% endif %}>{{ category.name }} </option>
                {% endfor %}
                -->
                <?php
                $option = array('Ukraine', 'Sweden');

                foreach ($option as $country) {
                    echo "<option value=$country> $country </option>";
                }

                ?>

            </select>
        </div>

        <div style="float: left; background-color: green; display: block">
            <p class="orangemsg">PHONE NUMBERS:</p>
            <p><input name="visible_phone" type="checkbox" value="1">publish field:</p>
            <p><input name="phone" type="text"></p>
            <a href="">+Add</a>
        </div>

        <div style="float: left; background-color: yellow; display: block">
            <p class="orangemsg">EMAILS:</p>
            <p><input name="visible_email" type="checkbox" value="1">publish field:</p>
            <p><input name="email" type="text" ></p>
            <a href="">+Add</a>
        </div>
    </div>
    <div style="width: 500px; background-color: lightcoral;clear:both; display: block">
        <p><input name="visible_contact" type="checkbox" value="1" >Publish my contact</p>
        <input name="btn_save" type="submit" value="Save">
    </div>


</form>