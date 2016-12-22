
<?php
include("../config.php");
include("../querybook.php");

if (isset($_POST['Active'])) {
    activeSolution($_POST['Active']);
}
if (isset($_POST['Deactive'])) {
    deactiveSolution($_POST['Deactive']);
}
header("location:../myprofile.php?sidevalue=2");

?>



