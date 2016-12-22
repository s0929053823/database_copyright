<?php
$receipts = GetReceiptByMemberID($user['Member_ID']);
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
                    <td><a href="myprofile.php?sidevalue=3&rp=<?=$receipt['Receipt_ID'] ?>"><?=$receipt['Receipt_ID'] ?></a></td>
                    <td><?=$receipt['Buying_Date'] ?></td>
                    <td><?=$receipt['Total']?></td>
                    <td><?=$receipt['Amount']?></td>
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
    $receipt = getReceiptInfo(($_GET['rp' ]));
    $transactions = getReceiptDetail(($_GET['rp' ]));
?>

    <h1>Receipt# <?=($_GET['rp' ])?></h1>
    <h5>Transaction Date :　<?=$receipt['Buying_Date'] ?>　</h5>
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
                foreach ($transactions as $solution) {
                    ?>
                    <tr>
                        <td><a href="solution.php?value=<?=$solution['Solution_ID']?>"><?=$solution['Title'] ?></a></td>
                        <td><?=$solution['Price'] ?></td>
                    </tr>
                    <?php
                }
                ?>
                <tr>
                    <td>Total</td>
                    <td><?=$receipt['Total'] ?></td>
                </tr>
                <tr>
                    <td>Remained Point</td>
                    <td><?=$receipt['Amount'] ?></td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>


<?php } ?>