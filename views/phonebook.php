
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
                        <?= $users[$key]["phonenumbers"] ?>
                    </td>
                    <td>
                        <?php
                        $j = 1;
                        foreach($users as $key=>$value){
                            $emails = "emails$j";
                            $visibleemail = "visibleemail$j";
                            foreach ($value['emails'] as $key2=>$value2){
                                if (isset($value2->$emails)){
                                    echo $value2->$emails . '<br>';
                                    $j++;
                                }
                            }
                            }
                            ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>

<?php endforeach; ?>