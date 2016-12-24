<?php
require_once 'model/Textbook.php';
require_once 'model/Category.php';
$actions = Array('showBooks.php');
$action = isset($_GET['action'])?$_GET['action']:0
?>
<div class="profile-sidebar">
    <?php
    switch ($action) {
        case 0:
            include_once 'backstage/textbooks/showBook.php';
            break;
        case 1:
            include_once 'backstage/textbooks/insertBook.php';
            break;
        case 2:
            include_once 'backstage/textbooks/editbook.php';
            break;
    }
    ?>
    </div>
</div>
