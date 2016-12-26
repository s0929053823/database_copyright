<?php include("navigation.php"); ?>
<?php
if (isset($_GET['userid'])) {
    require_once 'model/SchoolDepartment.php';
    $profileUser = Member::GetByID($_GET['userid']);
    include_once 'profile/model.php';
    $sidebarValue = isset($_GET['sidebar'])?$_GET['sidebar']:0;
    ?>

    <!-- Page Content -->
    <div class="container">
        <div class="row profile">
            <div class="col-md-3">
                    <?php include_once 'profile/sidebar.php';?>
            </div>
            <div class="col-md-9">
                <div class="profile-sidebar">
                    <?php include_once "profile/".$sites[$sidebarValue].".php"?>
                </div>
            </div>
        </div>
    </div>

<?php } ?>
<?php include("footer.php"); ?>