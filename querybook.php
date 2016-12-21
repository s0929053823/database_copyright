<?php
include_once("config.php");
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

    return $link;
}


function getMemberByAccountPassword($account, $password)
{
    $link = db_init();
    $sql = "SELECT Member_ID FROM MEMBER WHERE Account = '$account' AND Password = '$password'";
    $result = mysqli_query($link,$sql);
    if (!$result) die ('無法執行查詢: ' . $sql);
    $member = mysqli_fetch_assoc($result);
    return $member['Member_ID'];

}

function getSchoolDepartment($school, $department)
{
    $link = db_init();
    mysqli_query($link,"set names 'utf8'");
    $sql = "SELECT * FROM SCHOOL_DEPARTMENT WHERE school_id='$school' AND department_id='$department'";

    $result = mysqli_query($link,$sql);
    if (!$result) die ('無法執行查詢: ' . $sql);
    $sm = mysqli_fetch_assoc($result);
    return $sm;
}

function insertMember($username, $password, $email, $school_department, $birthday)
{
    $link = db_init();
    if($school_department!=null) {
        $sql = "INSERT INTO MEMBER (Account,Password,sd_id,Email,Birthday)
     VALUES ('$username', '$password', '$school_department','$email' ,'$birthday')";

    }
    else{
        $sql = "INSERT INTO MEMBER (Account,Password,Email,Birthday)
     VALUES ('$username', '$password','$email' ,'$birthday')";
    }
    $result = mysqli_query($link,$sql);
    if (!$result) die ('無法執行查詢: ' . $sql);
}

function getMember($id)
{
    $link = db_init();
    $sql = "SELECT * FROM MEMBER WHERE Member_ID = '$id'";
    $result = mysqli_query($link,$sql);
    if (!$result) die ('無法執行查詢: ' . $sql);
    $member = mysqli_fetch_assoc($result);
    return $member;
}

function updateMemberPoint($id,$point)
{
    $link = db_init();
    $sql = "UPDATE MEMBER SET POINT = '$point' WHERE Member_ID = '$id'";
    $result = mysqli_query($link,$sql);
    if (!$result) die ('無法執行查詢: ' . $sql);
}

function getMembers()
{
    $link = db_init();
    $members = array();
    // 定義 SQL 命令的字串變數
    $sql = 'SELECT * FROM MEMBER';
    // 傳回查詢結果
    $result = mysqli_query($link,$sql);
    if (!$result) die ('無法執行查詢: ' . $sql);
    while ($member = mysqli_fetch_assoc($result)) {
        array_push($members, $member);
    }
    return $members;
}

function getCategorys()
{
    $link = db_init();
    // 宣告一個陣列變數 $recordset, 存放查詢所得的紀錄集
    $categorys = array();
    // 定義 SQL 命令的字串變數
    $sql = 'SELECT * FROM CATEGORY';
    // 傳回查詢結果
    $result = mysqli_query($link,$sql);
    if (!$result) die ('無法執行查詢: ' . $sql);
    while ($category = mysqli_fetch_assoc($result)) {
        array_push($categorys, $category);
    }
    return $categorys;
}


function getTextbooks()
{
    $link = db_init();
    $textbooks = array();
    // 定義 SQL 命令的字串變數
    $sql = 'SELECT * FROM TEXTBOOK';
    // 傳回查詢結果
    $result = mysqli_query($link,$sql);
    if (!$result) die ('無法執行查詢: ' . $sql);
    while ($textbook = mysqli_fetch_assoc($result)) {
        array_push($textbooks, $textbook);
    }
    return $textbooks;
}


function getTextbookByCategory($category_id)
{
    $link = db_init();
    // 宣告一個陣列變數 $recordset, 存放查詢所得的紀錄集
    $textbooks = array();
    // 定義 SQL 命令的字串變數
    $sql = "SELECT * FROM TEXTBOOK , CATEGORY WHERE TEXTBOOK.Category_ID=CATEGORY.Category_ID AND CATEGORY.Category_ID ='$category_id' ";
    // 傳回查詢結果
    $result = mysqli_query($link,$sql);
    if (!$result) die ('無法執行查詢: ' . $sql);
    while ($textbook = mysqli_fetch_assoc($result)) {
        array_push($textbooks, $textbook);
    }
    return $textbooks;
}

function insertTextbook($category,$isbn10,$isbn13,$title,$edition,$publisher,$pyear,$description,$imgsrc)
{
    $link = db_init();
    if (empty($publisher)) {
        $sql = "INSERT INTO TEXTBOOK (Category_ID, ISBN_10, ISBN_13, Title, Edition,Publish_Year, Description, ImgSrc) VALUES ('$category','$isbn10','$isbn13','$title','$edition','$pyear','$description','$imgsrc')";
    }
    else {
        $sql = "INSERT INTO TEXTBOOK (Category_ID, ISBN_10, ISBN_13, Title, Edition, Publisher_ID, Publish_Year, Description, ImgSrc) VALUES ('$category','$isbn10','$isbn13','$title','$edition','$publisher','$pyear','$description','$imgsrc')";
    }
    $result = mysqli_query($link,$sql);
    if (!$result) die ('無法執行查詢: ' . $sql);
}

function getSolutionsAndCreators()
{
    $link = db_init();
    mysqli_query($link,"set names 'utf8'");
    // 宣告一個陣列變數 $recordset, 存放查詢所得的紀錄集
    $solutions = array();
    // 定義 SQL 命令的字串變數
    $sql = 'SELECT * FROM SOLUTION LEFT JOIN MEMBER ON SOLUTION.Creater_ID=MEMBER.Member_ID';
    // 傳回查詢結果
    $result = mysqli_query($link,$sql);
    if (!$result) die ('無法執行查詢: ' . $sql);
    while ($solution = mysqli_fetch_assoc($result)) {
        array_push($solutions, $solution);
    }
    return $solutions;
}

function getSolutions()
{
    $link = db_init();
    // 宣告一個陣列變數 $recordset, 存放查詢所得的紀錄集
    $solutions = array();
    // 定義 SQL 命令的字串變數
    $sql = 'SELECT * FROM SOLUTION ORDER BY Create_Date DESC';
    // 傳回查詢結果
    $result = mysqli_query($link,$sql);
    if (!$result) die ('無法執行查詢: ' . $sql);
    while ($solution = mysqli_fetch_assoc($result)) {
        array_push($solutions, $solution);
    }
    return $solutions;
}

function getComment($solutionID)
{
    $link = db_init();
    $comments = array();
    // 定義 SQL 命令的字串變數

    $sql = "SELECT * FROM COMMENT WHERE  Solution_ID =' $solutionID'";
    $result = mysqli_query($link,$sql);
    if (!$result) die ('無法執行查詢: ' . $sql);
    while ($comment = mysqli_fetch_assoc($result)) {
        array_push($comments, $comment);
    }
    return $comments;
}

function getTextbook($id)
{
    $link = db_init();
    $sql = "SELECT * FROM TEXTBOOK WHERE Textbook_ID = '$id'";
    $result = mysqli_query($link,$sql);
    if (!$result) die ('無法mysqli_fetch_assoc($result)執行查詢: ' . $sql);
    $textbook = mysqli_fetch_assoc($result);
    return $textbook;
}

function getSchools()
{
    $link = db_init();
    mysqli_query($link,"set names 'utf8'");
    $schools = array();
    $sql = "SELECT * FROM SCHOOL ORDER BY name_eng";
    $result = mysqli_query($link,$sql);
    if (!$result) die ('無法mysqli_fetch_assoc($result)執行查詢: ' . $sql);
    while ($school = mysqli_fetch_assoc($result)) {
        array_push($schools, $school);
    }
    return $schools;
}

function getSchool($id)
{
    $link = db_init();
    mysqli_query($link,"set names 'utf8'");
    $sql = "SELECT * FROM SCHOOL WHERE school_ID = '$id'";
    $result = mysqli_query($link,$sql);
    if (!$result) die ('無法mysqli_fetch_assoc($result)執行查詢: ' . $sql);
    $school = mysqli_fetch_assoc($result);
    return $school;
}


function getDepartment($id)
{
    $link = db_init();
    mysqli_query($link,"set names 'utf8'");
    $sql = "SELECT * FROM DEPARTMENT WHERE department_ID = '$id'";
    $result = mysqli_query($link,$sql);
    if (!$result) die ('無法mysqli_fetch_assoc($result)執行查詢: ' . $sql);
    $department = mysqli_fetch_assoc($result);
    return $department;
}

function getSchoolDepartments($id)
{
    $link = db_init();
    mysqli_query($link,"set names 'utf8'");
    // 宣告一個陣列變數 $recordset, 存放查詢所得的紀錄集
    $departemts = array();
    // 定義 SQL 命令的字串變數
    $sql = "SELECT * FROM SCHOOL_DEPARTMENT WHERE '$id' = school_id ";

    // 傳回查詢結果
    $result = mysqli_query($link,$sql);
    if (!$result) die ('無法執行查詢: ' . $sql);
    while ($department = mysqli_fetch_assoc($result)) {
        array_push($departemts, $department);
    }
    return $departemts;
}

function getCategory($id)
{
    $link = db_init();
    $sql = "SELECT * FROM CATEGORY WHERE '$id' = Category_ID";
    $result = mysqli_query($link,$sql);
    if (!$result) die ('無法執行查詢: ' . $sql);
    $category = mysqli_fetch_assoc($result);
    return $category;
}

function insertSolution($creater_id, $title, $price, $textbook, $chapter, $description)
{
    $link = db_init();
    $sql = "INSERT INTO SOLUTION (Title, Price, Chapter_Number, Textbook_ID, Creater_ID , Description, imgName) VALUES ('$title', '$price', '$chapter','$textbook', '$creater_id', '$description', 'notfound')";
    mysqli_query($link,$sql);
}


function getSolution($id)
{
    $link = db_init();
    $sql = "SELECT * FROM SOLUTION WHERE '$id' = Solution_ID";
    $result = mysqli_query($link,$sql);
    if (!$result) die ('無法執行查詢: ' . $sql);
    $solution = mysqli_fetch_assoc($result);
    return $solution;
}

function getSolutionsByCreator($creator)
{
    $solutions = array();
    $link = db_init();
    $sql = "SELECT * FROM SOLUTION WHERE '$creator' = Creater_ID";
    $result = mysqli_query($link,$sql);
    if (!$result) die ('無法執行查詢: ' . $sql);
    while ($solution = mysqli_fetch_assoc($result)) {
        array_push($solutions, $solution);
    }
    return $solutions;
}

function isAdmin($id)
{
    $link = db_init();
    $sql = "SELECT * FROM MEMBER WHERE Member_ID = '$id'";
    $result = mysqli_query($link,$sql);
    if (!$result) die ('無法mysqli_fetch_assoc($result)執行查詢: ' . $sql);
    $user = mysqli_fetch_assoc($result);
    if ($user['Type'] == '0') return true;
    else return false;
}

function blockSolution($solution_id)
{
    $link = db_init();
    $sql = "UPDATE SOLUTION SET isForbidden = true WHERE Solution_ID = '$solution_id'";
    $result = mysqli_query($link,$sql);
}

function unblockSolution($solution_id)
{
    $link = db_init();
    $sql = "UPDATE SOLUTION SET isForbidden = false WHERE Solution_ID = '$solution_id'";
    $result = mysqli_query($link,$sql);
}

function getSchoolDepartmentByID($sd_id)
{
    $link = db_init();
    $sql = "SELECT * FROM SCHOOL_DEPARTMENT WHERE '$sd_id' = sd_id";
    $result = mysqli_query($link,$sql);
    if (!$result) {
        die ('無法執行查詢: ' . $sql);
        return null;
    }
    $sm = mysqli_fetch_assoc($result);
    return $sm;
}

function getTextbookCategory()
{
    $link = db_init();
    $textbooks = array();
    $sql = "SELECT * FROM textbook INNER JOIN category ON textbook.Category_ID = category.Category_ID";
    $result = mysqli_query($link,$sql);
    if (!$result) die ('無法執行查詢: ' . $sql);
    while ($textbook = mysqli_fetch_assoc($result)) {
        array_push($textbooks, $textbook);
    }
    return $textbooks;
}

function getSearchResult($value)
{
    $link = db_init();
    $solutions = array();
    $sql = "SELECT * FROM solution WHERE solution.Title LIKE '%$value%' OR solution.Description LIKE '%$value%'";
    $result = mysqli_query($link,$sql);
    if (!$result) die ('無法執行查詢: ' . $sql);
    while ($solution = mysqli_fetch_assoc($result)) {
        array_push($solutions, $solution);
    }
    return $solutions;
}

function getAverageRate($solution)
{
    $link = db_init();
    $sql = "SELECT AVG(Score) as Average,COUNT(*) as Number FROM RATE WHERE Solution_ID = '$solution'";
    $result = mysqli_query($link,$sql);
    if (!$result) die ('無法執行查詢: ' . $sql);
    $avgRate = mysqli_fetch_assoc($result);
    return $avgRate;
}

function isAlreadyComment($memebr,$solution){
    $link = db_init();
    $sql = "SELECT * FROM COMMENT WHERE MEMBER_ID ='$memebr' AND SOLUTION_ID ='$solution'";
    $result = mysqli_query($link,$sql);
    $isCommented = mysqli_fetch_assoc($result);
    return ($isCommented!=null)? true:false;
}



function getRateInfo($memebr,$solution){
    $link = db_init();
    $sql = "SELECT * FROM RATE WHERE MEMBER_ID ='$memebr' AND SOLUTION_ID ='$solution'" ;
    $result = mysqli_query($link,$sql);
    $rateInfo = mysqli_fetch_assoc($result);
    return $rateInfo;
}


function insertComment($memebr,$solution,$comment)
{
    $link = db_init();
    $sql = "INSERT INTO COMMENT (Member_ID, Solution_ID, Comment) VALUES ('$memebr','$solution','$comment')";
    $result = mysqli_query($link,$sql);
    if (!$result) die ('無法執行查詢: ' . $sql);
}

function insertRate($memebr,$solution,$rate)
{
    $link = db_init();
    $sql = "INSERT INTO RATE (Member_ID, Solution_ID, Score) VALUES ('$memebr','$solution','$rate')";
    $result = mysqli_query($link,$sql);
    if (!$result) die ('無法執行查詢: ' . $sql);
}

function updateRate($memebr,$solution,$rate)
{
    $link = db_init();
    $sql = "UPDATE RATE SET Score = '$rate'WHERE MEMBER_ID ='$memebr' AND SOLUTION_ID ='$solution'";
    $result = mysqli_query($link,$sql);
    if (!$result) die ('無法執行查詢: ' . $sql);
}

function deleteRate($memebr,$solution)
{
    $link = db_init();
    $sql = "DELETE FROM RATE WHERE MEMBER_ID ='$memebr' AND SOLUTION_ID ='$solution'";
    $result = mysqli_query($link,$sql);
    if (!$result) die ('無法執行查詢: ' . $sql);
}

function insertAndGetReceiptID($member, $total, $amount, $destination)
{
    $link = db_init();
    $sql ="INSERT INTO RECEIPT (Buyer_ID, Total, Amount, Destinaton) VALUES ('$member','$total','$amount','$destination')";
    $result = mysqli_query($link,$sql);
    if (!$result) die ('無法執行查詢: ' . $sql);
    else{
        $lastID =  mysqli_insert_id($link) ;
        return $lastID;
    }
}

function insertTransaction($solution,$price,$receipt)
{
    $link = db_init();
    $sql = "INSERT INTO TRANSACTION (Solution_ID,Price,Receipt_ID) VALUES ('$solution','$price','$receipt')";
    $result = mysqli_query($link,$sql);
    if (!$result) die ('無法執行查詢: ' . $sql);
}

function getReceiptInfo($receipt)
{
    $link = db_init();
    $sql = "SELECT * FROM RECEIPT WHERE RECEIPT_ID = '$receipt'";
    $result = mysqli_query($link,$sql);
    return mysqli_fetch_assoc($result);
}

function getReceiptDetail($receipt){
    $link = db_init();
    $details = array();
    $sql = "SELECT * FROM V_RECEIPT WHERE RECEIPT_ID = '$receipt'";
    $result = mysqli_query($link,$sql);
    while ($item = mysqli_fetch_assoc($result)) {
        array_push($details, $item);
    }
    return $details;
}

?>