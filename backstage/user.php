<?php
require_once 'model/Member.php';
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
        foreach (Member::GetAll() as $user) { ?>
            <tr>
                <td><a href="<?=$user->url?>"?><?=$user->id?></a></td>
                <td><?=$user->account ?></td>
                <td><?=$user->start_date ?></td>
                <td><?=$user->point ?></td>
                <td><?=$userType[$user->type] ?></td>
                <td><?=$user->email ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
</div>
