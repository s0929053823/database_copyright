<?php
require_once 'model/Receipt.php';
require_once 'tableView/V_ReceiptDetail.php';
require_once 'model/Solution.php';
$receipts = Receipt::GetByBuyerID($user->id);
?>

<?php if(!isset($_GET['rp' ])) { ?>

    <h1> My Receipts</h1>
    <div class="profile-sidebar">

        <div class="table-responsive">
            <table class="table table-striped">

                <thead>
                <tr>
                    <th>Receipt#</th>
                    <th>TransactionDate</th>
                    <th>Total</th>
                    <th>Remained Point</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($receipts as $receipt) {
                    ?>
                    <tr>
                        <td><a href="myprofile.php?sidevalue=3&rp=<?=$receipt->id ?>"><?=$receipt->id ?></a></td>
                        <td><?=$receipt->buyingDate ?></td>
                        <td><?=$receipt->total?></td>
                        <td><?=$receipt->amount?></td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>

    </div>
<?php }
else {
    $receipt = Receipt::GetByID($_GET['rp' ]);
    $receiptDetails = V_ReceiptDetail::GetByReceiptID($receipt->id);
    ?>

    <h1>Receipt# <?=$receipt->id?></h1>
    <h5>Transaction Date :　<?=$receipt->buyingDate?>　</h5>
    <div class="profile-sidebar">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>SolutionID</th>
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
                    <td>Total</td>
                    <td><?=$receipt->total ?></td>
                </tr>
                <tr>
                    <td>Remained Point</td>
                    <td><?=$receipt->amount?></td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>


<?php } ?>