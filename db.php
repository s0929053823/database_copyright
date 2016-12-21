<?php
include_once("config.php");
global $link;
function db_init()
{
    //使用全域變數
    global $DB_HOST;
    global $DB_USER;
    global $DB_PASSWORD;
    global $DB_DATABASE;

    /* 連接資料庫 */
    $link = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD)
    or die('無法連接到資料庫：' . mysqli_error($link));
    /* 選用資料庫 */
    mysqli_query($link,"set names 'utf8'");
    mysqli_select_db($link ,$DB_DATABASE)
    or die('無法選擇資料庫[' . $DB_DATABASE . ']：' . mysqli_error($link));
}

?>