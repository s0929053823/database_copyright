
<!--<form action="--><?//= APP_URL?><!--action.php" method="post">-->
<!--    <input type="Text" placeholder="New Department" name="department_name">-->
<!--    <button type="submit" class="btn-primary" name="insert_department">新增系所</button>-->
<!--</form>-->
<!--直接在名稱點擊即可修改，修改完後按編輯-->
<table class="table table-striped ">
    <?php
    $pageShowNumber = 20;
    $page = isset($_GET['paged'])?$_GET['paged']:1;
    ?>
    <thead>
    <tr>
        <th>Department</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php  $departments = Department::GetAll();?>
    <?php for($i = $pageShowNumber*($page-1);$i<$pageShowNumber*$page ;$i++) {
        if (count($departments) <= $i) break;
        $department = $departments[$i];
        ?>
        <tr>
            <td><div id="cid<?= $department->id ?>" contenteditable><?= $department->nameCHT?></div></td>
            <td>
                <form method="post" action="<?= APP_URL?>action.php">
                    <button type="submit" class="btn-primary disabled" name="delete_department" value=<?=$department->id ?>>刪除</button>
                    <button type="button" class="btn-warning disabled" name="edit_department"  onclick="javascript:changeCategoryName(document.getElementById('cid<?= $department->id ?>'))">編輯</button>
                </form>
            </td>
        </tr>
    <?php } ?>
    </tbody>


</table>


<ul class="pagination">
    <?php

        $pageNumber = ceil(count($departments)/$pageShowNumber);
        for ($i = 1 ;$i <=$pageNumber;$i++){
            if($i == $page){
                echo ' <li class="active"> ';
              }
            else {
                echo "<li>";
            }
            ?>
            <a href="<?=APP_URL?>backstage.php?value=7&paged=<?=$i?>#department"><?=$i?></a></li>
       <?php } ?>

</ul>