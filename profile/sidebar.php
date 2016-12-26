<?php
$SD = SchoolDepartment::GetByID($profileUser->sd_id);

if ($SD != null) {
    $school = School::GetByID($SD->schoolID);
    $department = Department::GetByID($SD->departmentID);
}
?>

<div class="profile-sidebar">
    <!-- SIDEBAR USERPIC -->
    <div class="profile-userpic">
        <img src="<?=$user->img?>"class="img-responsive" alt="">
    </div>
    <!-- END SIDEBAR USERPIC -->
    <!-- SIDEBAR USER TITLE -->
    <div class="profile-usertitle">
        <div class="profile-usertitle-name">
            <?= $profileUser->account ?>

        </div>
        <?php if (isset($school)) { ?>
            <div class="profile-usertitle-job">
                <?=$school->nameCHT ?>
            </div>

            <div class="profile-usertitle-department">
                <?= $department->nameCHT?>
            </div>
        <?php } ?>
    </div>

    <div class="profile-usermenu">
        <ul class="nav">
            <?php
            for ($i=0 ;$i<count($sidebars);$i++)
            {
                echo ($i == $sidebarValue)? "<li class=\"active\">" : "<li>";
                ?>
                <a href="<?=APP_URL?>profile.php?userid=<?=$profileUser->id?>&sidebar=<?=$i?>">
                    <i class=""></i> <?=$sidebars[$i] ?> </a>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
</div>