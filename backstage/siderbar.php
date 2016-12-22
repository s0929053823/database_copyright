<?php

$member = getMember($_SESSION['user_id']);
if (!isAdmin($member['Member_ID'])) {
    header('location: adminwarning.php');
}

$sidebarValue = isset($_GET['value'])?$_GET['value']:0;

?>

    <div class="profile-sidebar">
        <!-- SIDEBAR USERPIC -->
        <div class="profile-userpic">
            <img src="http://keenthemes.com/preview/metronic/theme/assets/admin/pages/media/profile/profile_user.jpg"
                 class="img-responsive" alt="">
        </div>
        <!-- END SIDEBAR USERPIC -->
        <!-- SIDEBAR USER TITLE -->
        <div class="profile-usertitle">
            <div class="profile-usertitle-name">
                <h3>Hello Admin <?=$member['Account'] ?></h3>
            </div>
        </div>
        <!-- END SIDEBAR USER TITLE -->
        <!-- SIDEBAR MENU -->
        <div class="profile-usermenu">
            <ul class="nav">
                <?php for ($i = 0; $i < count($sidebars); $i++) { ?>
                    <li>
                    <?php
                    if ($sidebarValue == $i) {
                        ?>
                        <li class="active">
                        <?php
                    }
                    $site = "backstage.php?value=$i";
                    echo "<a href=$site>";
                    ?>
                    <i class="glyphicon glyphicon-user"></i> <?=$sidebars[$i] ?> </a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>

    </div>

