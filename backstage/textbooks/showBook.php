<div class="table-responsive">
    <form action="controller/backstage/TextbookController.php" method="post">
        <button type="submit" class="btn-primary" name="insertButton">新增書籍</button>
    </form>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Book#</th>
            <th>Category</th>
            <th>Title</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach (Textbook::GetAll() as $textbook) {
            $category = Category::GetByID($textbook->categoryID);
            ?>
            <tr>
                <td><a href="<?=$textbook->url?>"><?= $textbook->id?></a></td>
                <td><?=$category->name ?></td>
                <td><?=$textbook->title ?></a></td>
                <td>
                    <form method="post" action="controller/backstage/TextbookController.php">
                        <button type="submit" class="btn-warning" name="editButton" value=<?=$textbook->id?>>修改
                        </button>
                    </form>

                </td>
                <td>
                    <form method="post" action="action.php">
                        <button type="submit" class="btn-primary" name="delete_textbook" value=<?=$textbook->id?>>刪除</button>
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