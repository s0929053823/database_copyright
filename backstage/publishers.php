<?php
require_once 'model/Publisher.php';
$action = isset($_GET['action'])?$_GET['action']:0
?>
<div class="profile-sidebar">
    <?php
    switch ($action) {
        case 0:
            include_once 'backstage/publishers/showPublisher.php';
            break;
        case 1:
            include_once 'backstage/publishers/insertPublisher.php';
            break;
        case 2:
            include_once 'backstage/publishers/editPublisher.php';
            break;
    }
    ?>
</div>
</div>
