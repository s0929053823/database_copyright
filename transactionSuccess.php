<?php
include_once ('navigation.php');
require_once 'model/Receipt.php';
require_once 'tableView/V_ReceiptDetail.php';
require_once 'model/Solution.php';
?>

<?php if(isset($_GET['receipt'])) {
    $receiptInfo = Receipt::GetByID($_GET['receipt']);
    $receiptDetails = V_ReceiptDetail::GetByReceiptID($_GET['receipt']);
    ?>
    <div class="alert alert-success fade in">
        <strong>Congratulation!</strong> Transaction Success
    </div>

    <h3>收據編號 <?= $receiptInfo->id ?> 訂購時間 <?= $receiptInfo->buyingDate ?> </h3>

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
                foreach ($receiptDetails as $detail) {
                    ?>
                    <tr>
                        <td><a href="<?=Solution::getURL($detail->solutionID)?>"><?=$detail->solutionTitle ?></a></td>
                        <td><?=$detail->transactionPrice ?></td>
                    </tr>
                    <?php
                }
                ?>
                <tr>
                    <td>總計</td>
                    <td><?=$receiptInfo->total ?></td>
                </tr>
                <tr>
                    <td>餘額</td>
                    <td><?=$receiptInfo->amount ?></td>
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
