<div class="table-responsive">
    <form action="controller/backstage/AuthorController.php" method="post">
        <button type="submit" class="btn-primary" name="insertButton">新增作者</button>
    </form>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Author#</th>
            <th>Name</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach (Author::GetAll() as $author) {
            ?>
            <tr>
                <td><a href="<?=$author->url?>"><?= $author->id?></a></td>
                <td><?=$author->name ?></td>

                <td>
                    <form method="post" action="controller/backstage/AuthorController.php">
                        <button type="submit" class="btn-warning" name="editButton" value=<?=$author->id?>>修改
                        </button>
                    </form>

                </td>
                <td>
                    <form method="post" action="action.php">
                        <button type="submit" class="btn-primary" name="delete_author" value=<?=$author->id?>>刪除</button>
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