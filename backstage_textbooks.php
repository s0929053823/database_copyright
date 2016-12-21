<?php include_once("querybook.php");
include_once("function.php");
$sidebarValue= 3;
$textbooks = getTextbookCategory();
?>
<?php include("navigation.php"); ?>
<!-- Page Content -->
<div class="container">
    <div class="row profile">
        <?php include_once("backstage_siderbar.php"); ?>
        <div class="col-md-9">
            <div class="profile-sidebar">
                <div class="table-responsive">
                    <form action="backstage_insertBook.php">
                        <button type="submit" class="btn-primary">新增書籍</button>
                    </form>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Book#</th>
                            <th>Category</th>
                            <th>Title</th>

                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($textbooks as $textbook) {
                            ?>
                            <tr>
                                <td><a href="textbook.php?value=<?=$textbook['Textbook_ID'] ?>"> <?=$textbook['Textbook_ID'] ?></a></td>
                                <td><?=$textbook['Category_Name'] ?></td>
                                <td><?=$textbook['Title'] ?></a></td>
                                <td><button type="submit" class="btn-primary" name="Block" value=<?=$textbook['Textbook_ID'] ?>>刪除
                                    </button></td>

                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include("footer.php"); ?>
