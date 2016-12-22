
<?php include_once ('config.php'); ?>
<?php include("querybook.php"); ?>
<?php include("navigation.php"); ?>
<?php include_once ('check.php') ;?>
<?php include(BACKSTAGE_URL."model.php");?>
<!-- Page Content -->
<body>
<div class="container">
    <div class ="col-md-12">
        <div class="col-md-3">
        <?php include_once(BACKSTAGE_URL . "siderbar.php");?>
        </div>
        <div class="col-md-9">
            <?php include_once (BACKSTAGE_URL.$sites[$sidebarValue].".php"); ?>
        </div>
    </div>
</div>
</body>
<?php include("footer.php"); ?>
