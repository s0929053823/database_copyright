<?php
    $users = getMembers();
?>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>User#</th>
            <th>用戶名</th>
            <th>註冊日期</th>
            <th>CP值</th>
            <th>類型</th>
            <th>E-mail</th>

        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($users as $user) {
            ?>
            <tr>
                <td><a href="<?=APP_URL?>   profile.php?userid=<?=$user['Member_ID'] ?>"
                       ?><?=$user['Member_ID'] ?></a></td>
                <td><?=$user['Account'] ?></td>
                <td><?=$user['Start_Date'] ?></td>
                <td><?=$user['Point'] ?></td>
                <td><?=$userType[$user['Type']] ?></td>
                <td><?=$user['Email'] ?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>
</div>
