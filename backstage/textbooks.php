<?php
$textbooks = getTextbookCategory();
?>
<div class="profile-sidebar">
    <div class="table-responsive">
        <form action="<?= BACKSTAGE_URL ?>insertBook.php">
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
                        <td><a href="../textbook.php?value=<?=$textbook['Textbook_ID'] ?>"> <?=$textbook['Textbook_ID'] ?></a></td>
                        <td><?=$textbook['Category_Name'] ?></td>
                        <td><?=$textbook['Title'] ?></a></td>

                        <td>
                            <form method="post" action="<?= BACKSTAGE_URL?>deleteTextbook.php">
                                <button type="submit" class="btn-primary" name="deleteButton" value=<?=$textbook['Textbook_ID'] ?>>刪除
                            </button>
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
