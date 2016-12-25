
<!--<form action="--><?//= APP_URL?><!--action.php" method="post">-->
<!--    <input type="Text" placeholder="New School" name="scool_name">-->
<!--    <button type="submit" class="btn-primary" name="insert_school">新增學校</button>-->
<!--</form>-->
<!--直接在名稱點擊即可修改，修改完後按編輯-->
<table class="table table-striped ">
    <thead>
    <tr>
        <th>School</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php
    $pageShowNumber = 20;
    $page = isset($_GET['pages'])?$_GET['pages']:1;
    $schools = School::GetAll();
    for($i = $pageShowNumber*($page-1);$i<$pageShowNumber*$page ;$i++) {
    if (count($schools) <= $i) break;
    $school = $schools[$i] ;?>
        <tr>
            <td><div id="cid<?= $school->id ?>" contenteditable><?= $school->nameCHT?></div></td>
            <td>
                <form method="post" action="<?= APP_URL?>action.php">
                    <button type="submit" class="btn-primary disabled" name="delete_category" value=<?=$school->id ?>>刪除</button>
                    <button type="button" class="btn-warning disabled" name="edit_category"  onclick="javascript:changeCategoryName(document.getElementById('cid<?= $school->id ?>'))">編輯</button>
                </form>
            </td>

        </tr>
    <?php } ?>
    </tbody>
</table>

<ul class="pagination">
    <?php

    $pageNumber = ceil(count($schools)/$pageShowNumber);
    for ($i = 1 ;$i <=$pageNumber;$i++){
        if($i == $page){
            echo ' <li class="active"> ';
        }
        else {
            echo "<li>";
        }
        ?>
        <a href="<?=APP_URL?>backstage.php?value=7&pages=<?=$i?>#school"><?=$i?></a></li>
    <?php } ?>

</ul>