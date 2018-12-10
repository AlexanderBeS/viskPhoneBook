
<?php foreach ($users as $key=>$value): ?>

    <div class="userinfo">
        <div class="username">
            <p>
                <span><?= $users[$key]["firstname"] . ' ' . $users[$key]["lastname"]?></span>
                <a class="toggle" href="#">View details</a>
            </p>
        </div>
        <div class="toggleblock">
            <table>
                <tr>
                    <th>ADDRESS</th>
                    <th>PHONE NUMBERS</th>
                    <th>EMAILS</th>
                </tr>
                <tr>
                    <td>
                        <?= $users[$key]["address"] . '<br>' . $users[$key]["zipcity"] . '<br>' . $users[$key]["country"] ?>
                    </td>
                    <td>
                        <?php
                        $g = 1;
                        foreach ($value['phonenumbers'] as $phone){
                            $phonenumbers = "phonenumbers" . $g;
                            $visiblephone = "visiblephone" . $g;
                            if ((isset($phone->$phonenumbers)) && ($phone->$visiblephone == '1')) {
                                echo $phone->$phonenumbers . '<br>';
                            }
                            $g++;
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        $j = 1;
                            foreach ($value['emails'] as $email){
                                $emails = "emails" . $j;
                                $visibleemail = "visibleemail" . $j;
                                if ((isset($email->$emails)) && ($email->$visibleemail == '1')){
                                    echo $email->$emails . '<br>';
                                }
                                $j++;
                            }
                        ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>

<?php endforeach; ?>