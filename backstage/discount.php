<?php
require_once 'model/Discount.php';
$action = isset($_GET['action'])?$_GET['action']:0;
$discountType = array("出版社","作者","課本");
?>
<div class="profile-sidebar">
    <?php
    switch ($action) {
        case 0:
            include_once 'backstage/discount/showDiscount.php';
            break;
        case 1:
            include_once 'backstage/discount/insertDiscount.php';
            break;
        case 2:
            include_once 'backstage/discount/editDiscount.php';
            break;

    }
    ?>
</div>
