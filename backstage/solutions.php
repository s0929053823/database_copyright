<?php
$solutions = getSolutionsAndCreators();
?>
<!-- Page Content -->
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
                        <td><a href="<?=APP_URL?>/solution.php?value=<?= $solution['Solution_ID'] ?>"><?=$solution['Solution_ID'] ?></a></td>
                        <td><?=$solution['Title'] ?></td>
                        <td>
                            <a href="<?=APP_URL?>/profile.php?userid=<?=$solution['Creater_ID'] ?>"><?=$solution['Account'] ?></a>
                        </td>
                        <td><?=$solution['Create_Date'] ?></td>
                        <td>
                            <form method="post" action="<?=BACKSTAGE_URL?>setsolution.php">
                                <?php if (!$solution['isForbidden']) { ?>
                                    <button type="submit" class="btn-primary" name="Block" value=<?=$solution['Solution_ID'] ?>>封鎖
                                    </button>
                                <?php } else {
                                    ?>
                                    <button type="submit" class="btn-warning" name="Unblock" value=<?=$solution['Solution_ID'] ?>>解鎖
                                    </button>
                                <?php } ?>
                            </form>
                        </td>

                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>

