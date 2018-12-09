
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
                        <?= $users[$key]["emails"] ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>

<?php endforeach; ?>