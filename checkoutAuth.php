<?php include_once('navigation.php') ?>

<?php
if(!isset($_SESSION['cart_items']))
{
    header('location: cartview.php');
}

if (isset($_POST['check-button'])) {

    $username = $_POST['check_username'];
    $password = $_POST['check_password'];
    if (empty($username) or empty($password)) {
        header('location: checkoutAuth.php?action=empty');
    } else {
        $id = getMemberByAccountPassword($username, $password);
        if ($id == null||$id!=$_SESSION['user_id']) {
            header('location: checkoutAuth.php?action=error');
        } else {
            $_SESSION['AuthToken'] = 'true';
            header('location: transaction.php');
        }
    }
}
require_once 'model/Solution.php'
?>

<div class="col-md-3 col-md-offset-4">
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Solution</th>
                <th>Price</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php
            $total_price=0;
            foreach ($_SESSION['cart_items'] as $item) {
                $solution = Solution::GetByID($item['id']);
                $total_price+=$item['price'];
                ?>
                <tr>
                    <td> <a href="solution.php?value=<?= $solution->id ?>"><?= $solution->title?></a></td>
                    <td><?=$item['price'] ?></td>
                </tr>
                <?php
            }
            ?>
            <tr>
                <?php $remainPoint =  $user->point - $total_price ?>
                <td><b>Total: </b></td>
                <td><b<i><?= $total_price ?></i></b></td>

            </tr>
            <tr>
                <td><b>Remain </b></td>
                <td><b<i><?= $remainPoint ?></i></b></td>
            </tr>
            </tbody>
        </table>
    </div>


    <div class="text-center" style="padding:50px 0">
        <?php
        if(isset($_GET['action']))
        {

            if($_GET['action']=='error')
            {
                echo "<div class=\"alert alert-danger fade in\">" ;
                echo "<strong>Error!</strong> Authentic Error";
            }
            else if ($_GET['action']=='empty')
            {
                echo "<div class=\"alert alert-warning fade in\">" ;
                echo "<strong>Error!</strong> Authentic Empty";
            }
            echo  "</div>";
        }
        ?>

        <div class="logo">Required Login Again</div>
        <!-- Main Form -->
        <div class="login-form-1">
            <form id="login-form" class="text-left" method="post">
                <div class="login-form-main-message"></div>
                <div class="main-login-form">
                    <div class="login-group">
                        <div class="form-group">
                            <label for="lg_username" class="sr-only">Username</label>

                            <input type="text" class="form-control" id="lg_username" name="check_username"
                                   placeholder="username">
                        </div>
                        <div class="form-group">
                            <label for="lg_password" class="sr-only">Password</label>
                            <input type="password" class="form-control" id="lg_password" name="check_password"
                                   placeholder="password">
                        </div>

                    </div>
                    <button type="submit" class="login-button" name="check-button" value="login"><i
                            class="fa fa-chevron-right"></i></button>
                </div>

            </form>
        </div>
    </div>
    <!-- end:Main Form -->
</div>

<?php include_once('footer.php') ?>
