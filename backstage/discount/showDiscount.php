<div class="table-responsive">
    <form action="controller/backstage/DiscountController.php" method="post">
        <button type="submit" class="btn-primary" name="insertButton">新增折價活動</button>
    </form>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Discount#</th>
            <th>Description</th>
            <th>Rate</th>
            <th>種類</th>
            <th>依據</th>
            <th>Start</th>
            <th>End</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach (Discount::GetAll() as $discount) {
            ?>
            <tr>
                <td><?= $discount->id?></td>
                <td><?=$discount->description ?></td>
                <td><?=$discount->rate/100?></td>
                <td><?=$discountType[$discount->type] ?></td>
                <td>
                    <?php
                    if($discount->type==0){
                        $publisher = Publisher::GetByID($discount->dependent);
                        echo "<a href=$publisher->url>$publisher->companyName";
                    }
                    else if($discount->type==1){
                        $author = Author::GetByID($discount->dependent);
                        echo "<a href=$author->url>$author->name";
                    }
                    else if($discount->type==2){
                        $textbook = Textbook::GetByID($discount->dependent);
                        echo "<a href=$textbook->url>$textbook->title";
                    }

                    ?>
                </td>
                <td><?=$discount->startDate ?></td>
                <td><?=$discount->endDate ?></td>
                <td>
                    <form method="post" action="action.php">
                        <button type="submit" class="btn-primary" name="delete_discount" value=<?=$discount->id?>>刪除</button>
                    </form>
                </td>

            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>