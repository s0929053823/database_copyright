<?php
    $traces = getTraceByMemberID($_SESSION['user_id']);
?>

<h1> My Solutions</h1>

<div class="profile-sidebar">
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Solution Title</th>

                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($traces as $trace) {
                $solution = getSolution($trace['Solution_ID']);
                ?>
                <tr>
                    <td><a href="solutionco.php?value=<?= $trace['Solution_ID'] ?>"><?=$solution['Title'] ?></a></td>
                    <td>
                        <form method="POST" action="<?= MPROFILE_URL ?>tracecontroller.php"">
                        <button type="submit" class="btn-primary" name="cancel" value=<?=$solution['Solution_ID'] ?>>取消</button>
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