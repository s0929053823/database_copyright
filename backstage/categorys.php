<?php
$categorys = getCategorys();
?>
<div class="profile-sidebar">
    <div class="table-responsive">
        <form action="<?= BACKSTAGE_URL ?>insertBook.php">
            <button type="submit" class="btn-primary">新增分類</button>
        </form>

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
            <?php
            foreach ($categorys as $category) {
                ?>
                <tr>
                    <td><div id="cid<?= $category['Category_ID'] ?>" contenteditable><?= $category['Category_Name']?></div></td>
                    <?php $bookNumber = getNumberOfTextbookInCategory($category['Category_ID']); ?>
                    <td><?= $bookNumber['Number' ]?></td>
                    <?php $solutionNumber= getNumberOfSolutionInCategory(($category['Category_ID'])); ?>
                    <td><?= $solutionNumber['SolutionNumber']?></td>
                    <td>
                        <form method="post" action="<?= BACKSTAGE_URL?>deleteTextbook.php">
                            <button type="submit" class="btn-primary" name="deleteButton" value=<?=$category['Category_ID'] ?>>刪除</button>
                            <button type="button" class="btn-warning" name="deleteButton"  onclick="javascript:changeCategoryName(document.getElementById('cid<?= $category['Category_ID'] ?>'))" value="111" >編輯</button>
                        </form>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        </form>
    </div>
</div>

<script type="text/javascript">
  function changeCategoryName (newName) {
        console.log(newName);
        var re = /cid/g;
        var id =  (newName.id).replace(re,"") ;
        var name =newName.innerHTML;
      window.location.href = "<?= BACKSTAGE_URL ?>editcategory.php?value=4&id="+id +"&name="+name;
  }
</script>