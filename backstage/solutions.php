<?php
require_once 'model/Solution.php';
?>
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
                foreach (Solution::GetAll() as $solution) {
                    $creator = Member::GetByID($solution->creatorID);
                    ?>
                    <tr>
                        <td><a href="<?=$solution->url?>"><?=$solution->id?></a></td>
                        <td><?=$solution->title?></td>
                        <td><a href="<?=$creator->url ?>"><?=$creator->account?></a></td>
                        <td><?=$solution->createDate?></td>
                        <td>
                            <form method="post" action="<?=BACKSTAGE_URL?>setsolution.php">
                                <?php if (!$solution->isForbidden) { ?>
                                    <button type="submit" class="btn-primary" name="Block" value=<?=$solution->id?>>封鎖</button>
                                <?php } else {?>
                                    <button type="submit" class="btn-warning" name="Unblock" value=<?=$solution->id?>>解鎖</button>
                                <?php } ?>
                            </form>
                        </td>

                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

