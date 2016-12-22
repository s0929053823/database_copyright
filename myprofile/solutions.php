<?php
$solutions =  getSolutionsByCreator($member['Member_ID']);
?>

<h1> My Solutions</h1>

<div class="profile-sidebar">
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Sol#</th>
                <th>CreateDate</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($solutions as $solution) {
                ?>
                <tr>
                    <td><a href="solution.php?value=<?= $solution['Solution_ID'] ?>"><?=$solution['Title'] ?></a></td>
                    <td><?=$solution['Create_Date'] ?></td>
                    <td>
                        <form method="POST" action="#"">
                                <button type="submit" class="btn-default" name="Active" value=<?=$solution['Solution_ID'] ?>>編輯</button>
                        </form>
                    </td>
                    <td>
                        <form method="POST" action="<?= MPROFILE_URL ?>setsolution.php">
                            <?php if ($solution['isActive']) { ?>
                                <button type="submit" class="btn-primary" name="Deactive" value=<?=$solution['Solution_ID'] ?>>下架
                                </button>
                            <?php } else {
                                ?>
                                <button type="submit" class="btn-warning" name="Active" value=<?=$solution['Solution_ID'] ?>>上架
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