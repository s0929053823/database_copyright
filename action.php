<?php
session_start();
if(isset($_POST['insert_textbook'])||isset($_POST['edit_textbook'])||isset($_POST['delete_textbook'])) {
    include_once 'action/textbook.php';
}
else if(isset($_POST['insert_category'])||isset($_POST['delete_category'])||isset($_POST['edit_category'])) {
    include_once 'action/category.php';
}
else if(isset($_POST['insert_member'])||isset($_POST['edit_member'])){
    include_once 'action/member.php';
}
else if(isset($_POST['insert_solution'])||isset($_POST['edit_solution'])||isset($_POST['block_solution'])||isset($_POST['unblock_solution'])||isset($_POST['deactive_solution'])||isset($_POST['active_solution'])){
    include_once 'action/solution.php';
}
else if(isset($_POST['insert_author'])||isset($_POST['edit_author'])||isset($_POST['delete_author'])){
    include_once 'action/author.php';
}
else if(isset($_POST['insert_publisher'])||isset($_POST['edit_publisher'])||isset($_POST['delete_publisher'])){
    include_once 'action/publisher.php';
}
else if(isset($_POST['insert_trace_from_sol'])||isset($_POST['delete_trace_from_sol'])||isset($_POST['delete_trace'])){
    include_once 'action/trace.php';
}
else if(isset($_POST['insert_rate'])||isset($_POST['edit_rate'])||isset($_POST['delete_rate'])){
    include_once 'action/rate.php';
}
else if(isset($_POST['insert_discount'])||isset($_POST['edit_discount'])||isset($_POST['delete_discount'])){
    include_once 'action/discount.php';
}