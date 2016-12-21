<?php include("navigation.php"); ?>
<?php
if (isset($_GET['userid'])) {
    $user = getMember($_GET['userid']);
    $sd = getSchoolDepartmentByID($user['sd_id']);

    if ($sd != null) {
        $school = getSchool($sd['school_id']);
        $department = getDepartment($sd['department_id']);
    }

    ?>

    <!-- Page Content -->
    <div class="container">
        <div class="row profile">
            <div class="col-md-3">
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
                            <?php
                            echo $user['Account'];
                            ?>

                        </div>
                        <?php if (isset($school)) { ?>
                            <div class="profile-usertitle-job">
                                <?php
                                echo $school['name_cht'];
                                ?>
                            </div>

                            <div class="profile-usertitle-department">
                                <?php
                                echo $department['name_cht'];
                                ?>
                            </div>
                        <?php } ?>
                    </div>
                    <!-- END SIDEBAR USER TITLE -->
                    <!-- SIDEBAR MENU -->
                    <div class="profile-usermenu">
                        <ul class="nav">
                            <li class="active">
                                <a href="#">
                                    <i class="glyphicon glyphicon-home"></i> Overview </a>
                            </li>

                            <li>
                                <a href="#" target="_blank">
                                    <i class="glyphicon glyphicon-ok"></i> Solutions </a>
                            </li>

                        </ul>
                    </div>
                    <!-- END MENU -->
                </div>
            </div>
            <div class="col-md-9">
                <div class="profile-sidebar">
                    Some user related content goes here...
                </div>
            </div>
        </div>
    </div>


<?php } ?>
<?php include("footer.php"); ?>