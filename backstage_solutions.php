<?php include_once("querybook.php");
include_once("function.php");
include_once("check.php");
$sidebarValue = 2;
$member = getMember($_SESSION['user_id']);
$solutions = getSolutionsAndCreators();
?>


<?php
if (isset($_POST['Block'])) {
    blockSolution($_POST['Block']);
    header("location:backstage_solutions.php");
}
if (isset($_POST['Unblock'])) {
    unblockSolution($_POST['Unblock']);
    header("location:backstage_solutions.php");
}
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
                            <th>Sol#</th>
                            <th>Title</th>
                            <th>Creator</th>
                            <th>CreateDate</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($solutions as $solution) {
                            ?>
                            <tr>

                                <td><a href="solution.php?value=<?= $solution['Solution_ID'] ?>"><?=$solution['Solution_ID'] ?></a></td>
                                <td><?=$solution['Title'] ?></td>
                                <td>
                                    <a href="profile.php?userid=<?=$solution['Creater_ID'] ?>"><?=$solution['Account'] ?></a>
                                </td>
                                <td><?=$solution['Create_Date'] ?></td>
                                <td>
                                    <form method="POST">
                                        <?php if (!$solution['isForbidden']) { ?>
                                            <button type="submit" class="btn-primary" name="Block"
                                                    value=<?=$solution['Solution_ID'] ?>>封鎖
                                            </button>
                                        <?php } else {
                                            ?>
                                            <button type="submit" class="btn-warning" name="Unblock"
                                                    value=<?=$solution['Solution_ID'] ?>>解鎖
                                            </button>
                                        <?php } ?>
                                </td>
                                </form>
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
