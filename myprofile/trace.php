<?php
    require_once 'model/Trace.php';
    require_once 'model/Solution.php';
?>

<h1> My Trace List</h1>

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
                        <form method="POST" action="action.php"">
                        <input type="text" hidden  name= "memberID" value=<?=$member->id?>>
                        <input type="text" hidden name="solutionID" value=<?=$solution->id?>>
                        <button type="submit" class="btn-primary" name = "delete_trace">取消</button>
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