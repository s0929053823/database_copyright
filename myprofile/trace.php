<?php
    require_once 'model/Trace.php';
    require_once 'model/Solution.php';
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
            foreach (Trace::GetByMemberID($member->id) as $trace) {
                $solution = Solution::GetByID($trace->solutionID)
                ?>
                <tr>
                    <td><a href="<?=$solution->url?>"><?=$solution->title ?></a></td>
                    <td>
                        <form method="POST" action="<?= MPROFILE_URL ?>tracecontroller.php"">
                        <button type="submit" class="btn-primary" name="cancel" value=<?=$solution->id ?>>取消</button>
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