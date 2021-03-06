
<?php
include_once("navigation.php");
include_once("check.php");
require_once 'model/Member.php';

$sidebars = array("Overview", "AccountSetting", "Solutions", "Transaction","TraceList");
$sites = array("index", "account", "solutions", "transaction","trace");
$sideValue = isset($_GET['sidevalue'])?  $_GET['sidevalue'] : 0;
$member = Member::GetByID($_SESSION['user_id']);
?>
<!-- Page Content -->
<div class="container">
    <div class="row profile">
        <div class="col-md-3">
            <div class="profile-sidebar">
                <!-- SIDEBAR USERPIC -->
                <div class="profile-userpic">
                    <img src="<?=$user->img?>" class="img-responsive" alt="">
                </div>


                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">
                        <?=$member->account?>
                    </div>
                </div>

                <div class="profile-usermenu">
                    <ul class="nav">
                        <?php for($i=0;$i<count($sidebars);$i++) {
                            if($sideValue == $i) {
                                echo '<li class="active">';
                            }
                            else
                            {
                                echo '<li class=>';
                            }
                            echo "<a href=\"myprofile.php?sidevalue=$i\"> <i class ='glyphicon glyphicon-user'></i> $sidebars[$i] </a>";
                            echo'</li>';
                        } ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9">
                <?php
                $url = MPROFILE_URL.$sites[$sideValue].'.php';
                include_once($url);
                ?>
        </div>
    </div>
</div>
<?php include("footer.php"); ?>