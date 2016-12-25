<?php
require_once 'model/Member.php';


if (isset($_POST['edit_member'])) {
    $id = $_POST['memberID'];
    $account = $_POST['account'];
    $password = $_POST['password'];
    $email = $_POST['mail'];
    $birthday = $_POST['birthday'];

    Member::Update($id,$account,$password,$email,$birthday);
    header('Location: myprofile.php?');
}