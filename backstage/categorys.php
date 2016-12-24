<?php
require_once 'config.php';
require_once 'model/Category.php';
?>
<div class="profile-sidebar">
    <div class="table-responsive">
        <form action="<?= APP_URL?>action.php" method="post">
            <input type="Text" placeholder="New Category" name="category_name">
            <button type="submit" class="btn-primary" name="insert_category">新增分類</button>
        </form>
        直接在名稱點擊即可修改，修改完後按編輯
        <table class="table table-striped ">
            <thead>
            <tr>
                <th>Category</th>
                <th>BoookQuantity</th>
                <th>SolutionQuantity</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach (Category::GetAll() as $category) { ?>
                <tr>
                    <td><div id="cid<?= $category->id ?>" contenteditable><?= $category->name?></div></td>
                    <?php $bookNumber = getNumberOfTextbookInCategory($category->id); ?>
                    <td><?= $category->GetTextbookNumber()?></td>
                    <td><?= $category->GetSolutionNumber()?></td>
                    <td>
                        <form method="post" action="<?= APP_URL?>action.php">
                            <button type="submit" class="btn-primary" name="delete_category" value=<?=$category->id ?>>刪除</button>
                            <button type="button" class="btn-warning" name="edit_category"  onclick="javascript:changeCategoryName(document.getElementById('cid<?= $category->id ?>'))" value="111" >編輯</button>
                        </form>

                    </td>

                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<script type="text/javascript">
    function changeCategoryName (newName) {
        console.log(newName);

        var re = /cid/g;
        var id =  (newName.id).replace(re,"") ;
        var name =newName.innerHTML;
      //  window.location.href = "<?= BACKSTAGE_URL ?>editcategory.php?value=4&id="+id +"&name="+name;
        $.ajax({
            type: "POST",
            url: "action.php",
            data: { edit_category : id ,category_name : name},
        });
    }

</script>