<?php
require_once 'model/Solution.php';
require_once 'model/Rate.php';

?>
<h1><?= $profileUser->account ?>'s Solutions</h1>
<div class="profile-sidebar">
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Title</th>
                <th>Rate</th>
                <th>CreateDate</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach (Solution::GetByMemberID($profileUser->id) as $solution) {
                $avgRate = Rate::GetAverageRateOfSolution($solution->id);
                $avgValue = ($avgRate['Average']!=null)?number_format(round($avgRate['Average'],2),2) :'N/A';
                ?>
                <tr>
                    <td><a href="<?=$solution->url?>"><?=$solution->title?></a></td>
                    <td><?= $avgValue ?></td>
                    <td><?=$solution->createDate?></td>

                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
