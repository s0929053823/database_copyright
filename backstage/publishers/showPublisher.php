<div class="table-responsive">
    <form action="controller/backstage/PublisherController.php" method="post">
        <button type="submit" class="btn-primary" name="insertButton">新增出版社</button>
    </form>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Publisher#</th>
            <th>Company Name</th>
            <th>Owner</th>
            <th>Telephone</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach (Publisher::GetAll() as $publisher) {

            ?>
            <tr>
                <td><a href="<?=$publisher->url?>"><?= $publisher->id?></a></td>
                <td><?=$publisher->companyName ?></td>
                <td><?=$publisher->owner?></td>
                <td><?=$publisher->telephone ?></td>
                <td>
                    <form method="post" action="controller/backstage/PublisherController.php">
                        <button type="submit" class="btn-warning" name="editButton" value=<?=$publisher->id?>>修改
                        </button>
                    </form>

                </td>
                <td>
                    <form method="post" action="action.php">
                        <button type="submit" class="btn-primary" name="delete_publisher" value=<?=$publisher->id?>>刪除</button>
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