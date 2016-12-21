<?php include_once("querybook.php");
include_once("function.php");
include_once("check.php");
$sidebarValue = 0;
$member = getMember($_SESSION['user_id']);
?>

<?php include("navigation.php"); ?>
<!-- Page Content -->
<div class="container">
    <?php if (!isAdmin($member['Member_ID'])) { ?>
        <h1>You're not Administrator ! </h1>
    <?php } else {
        ?>
    <?php } ?>
    <div class="row profile">
        <?php include_once("backstage_siderbar.php"); ?>
        <div class="col-md-9">
            <div class="profile-sidebar">
                Walcome to backstage!!
            </div>
        </div>
    </div>
</div>
<?php include("footer.php"); ?>
