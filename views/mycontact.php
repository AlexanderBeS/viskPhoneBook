<form method="post" action="/savemycontact" enctype="multipart/form-data">
    <div>
        <div style="float: left; background-color: #ff9595; display: block; padding: 10px;">
            <input name="uId" type="hidden" value="<?= $uId ?>">
            <p class="orangemsg">CONTACT:
            <p>First Name:</p>
            <input name="firstname" type="text" value="<?= $firstname ?>">
            <p>Last Name:</p>
            <input name="lastname" type="text" value="<?= $lastname ?>">
            <p>Address:</p>
            <input name="address" type="text" value="<?= $address ?>">
            <p>ZIP/City:</p>
            <input name="zipcity" type="text" value="<?= $zipcity ?>">
            <p>Country:</p>
            <select name="country" >
                <!--
                сюда нужно передавать массив
                {% for key,category in categories %}
                 <option value="{{ category.id }}" {% if product.category == category.id %}  selected  {% endif %}>{{ category.name }} </option>
                 {% endfor %}

                    сделать алтернативным синтаксисом
                 -->
                <?php
                $option = array('Ukraine', 'Sweden');

                foreach ($option as $country) {
                    echo "<option value=$country> $country </option>";
                }

                ?>

            </select>
        </div>

        <div style="float: left; background-color: #dded7b; display: block; padding: 10px;">
            <p class="orangemsg">PHONE NUMBERS:</p>

        <div class="clonephonediv">
            <div class="phone">
                <p><input name="visiblephone1" type="checkbox" value="1" style="margin:5px;"> Publish field </p>
                <p><input name="phonenumbers1" type="text" value="<?= $phonenumbers ?>"></p>
            </div>
        </div>
            <p style="float: right">
                <a href="#" class="addphone">+Add</a>
            </p>
        </div>

        <div style="float: left; background-color: #c9ffaf; display: block; padding: 10px;">
            <p class="orangemsg">EMAILS:</p>

            <div class="cloneemaildiv">
                <div class="email">
                    <p><input name="visibleemail1" type="checkbox" value="1" style="margin:5px;"> Publish field </p>
                    <p><input name="emails1" type="text" value="<?= $emails ?>"></p>
                </div>
            </div>
            <p style="float: right">
                <a href="#" class="addemail">+Add</a>
            </p>
        </div>
    </div>
    <div style="width: 500px; background-color: #babbf0;clear:both; display: block; padding: 10px;">
        <label>
            <input name="publish" type="checkbox" value="1" <?php if ($publish == '1') echo 'checked' ?>>
            Publish my contact
        </label>
        <input name="btn_save" type="submit" value="Save">
    </div>


</form>