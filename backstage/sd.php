<?php
require_once 'model/SchoolDepartment.php';
$action = isset($_GET['action'])?$_GET['action']:0;
?>
<div class="profile-sidebar">
    <div class="table-responsive">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#school">School</a></li>
            <li><a data-toggle="tab" href="#department">Department</a></li>
            <li><a data-toggle="tab" href="#relation">Relation</a></li>
        </ul>

    </div>

    <div class="tab-content">
        <div id="school" class="tab-pane fade in active">
            <?php include_once ('sd/school.php')?>
        </div>
        <div id="department" class="tab-pane fade">
            <?php include_once ('sd/department.php')?>
        </div>
        <div id="relation" class="tab-pane fade">
            <?php include_once ('sd/relation.php') ?>
        </div>
    </div>
</div>

<script >
    // Javascript to enable link to tab

    var url = document.location.toString();
    if (url.match('#')) {
        console.log(url.split('#')[1]);
        $('.nav-tabs a[href="#' + url.split('#')[1] + '"]').tab('show');
    }

    // Change hash for page-reload
    $('.nav-tabs a').on('shown.bs.tab', function (e) {
        console.log(e.target);
        window.location.hash = e.target.hash;
    })
</script>