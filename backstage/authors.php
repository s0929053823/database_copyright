<?php
require_once 'model/Author.php';
$action = isset($_GET['action'])?$_GET['action']:0
?>
<div class="profile-sidebar">
    <?php
    switch ($action) {
        case 0:
            include_once 'backstage/authors/showAuthor.php';
            break;
        case 1:
            include_once 'backstage/authors/insertAuthor.php';
            break;
        case 2:
            include_once 'backstage/authors/editAuthor.php';
            break;

    }
    ?>
</div>
