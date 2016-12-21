<!DOCTYPE html>
<html lang="en">
<?php include_once("querybook.php");
include_once("function.php");
$sidebarValue = 1;
$users = getMembers();
?>

<?php include("navigation.php"); ?>
<!-- Page Content -->
<div class="container">
    <div class="row profile">
        <?php include_once("backstage_siderbar.php"); ?>
        <div class="col-md-9">
            <div class="profile-sidebar">
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
                                <td><a href="profile.php?userid=<?=$user['Member_ID'] ?>"
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
        </div>
    </div>
</div>
<?php include("footer.php"); ?>
