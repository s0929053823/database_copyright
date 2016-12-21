<?php include ('navigation.php') ?>

<?php if(isset($_GET['receipt'])) {
    $receipt = $_GET['receipt'];
    $receiptInfo = getReceiptInfo($receipt);
    ?>
    <div class="alert alert-success fade in">
        <strong>Congratulation!</strong> Transaction Success
    </div>

    <h3>收據編號 <?= $receipt ?> 訂購時間 <?= $receiptInfo['Buying_Date'] ?> </h3>

    <div class="col-md-2">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Solution</th>
                    <th>Price</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $receiptDetail = getReceiptDetail($receipt);
                foreach ($receiptDetail as $itemDetail) {
                    ?>
                    <tr>
                        <td> <a href="solution.php?value=<?= $itemDetail['Solution_ID'] ?>"><?= $itemDetail['Title'] ?></a></td>
                        <td><?=$itemDetail['Price'] ?></td>
                    </tr>
                    <?php
                }
                ?>
                <tr>
                    <td>總計</td>
                    <td><?=$receiptInfo['Total'] ?></td>
                </tr>
                <tr>
                    <td>餘額</td>
                    <td><?=$receiptInfo['Amount'] ?></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

<?php } else { ?>
    <div class="alert alert-warning fade in">
        <strong>WTF!</strong> How did you get in ? Your IP is <?= $_SERVER['REMOTE_ADDR'] ?>
    </div>

<?php } ?>


<?php include ('footer.php') ?>
