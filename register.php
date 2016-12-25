<?php include("navigation.php"); ?>
<?php
require_once 'model/SchoolDepartment.php';
$schools = School::GetAll();
?>
<!-- REGISTRATION FORM -->
<div class="text-center" style="padding:50px 0">
    <div class="logo">Register</div>
    <!-- Main Form -->
    <div class="login-form-1">
        <form id="register-form" class="text-left" method="post">
            <?php
            if (isset($_POST['register-button'])) {
                $username = $_POST['reg_username'];
                $password = $_POST['reg_password'];
                $email = $_POST['reg_email'];
                $confirm_password = $_POST['reg_password_confirm'];
                if (empty($username) or empty($password) or empty($email) or empty($confirm_password)) {
                    ?>
                    <label>Field Empty</label>
                    <?php
                } else {
                    $birthday = empty($_POST['reg_birthday']) ? 'NULL' : $_POST['reg_birthday'];
                    $school = $_POST['reg_school'];

                    if (isset($_POST['reg_department'])) {
                        $department = $_POST['reg_department'];
                        $sd = getSchoolDepartment($school, $department);
                        insertMember($username, $password, $email, $sd['sd_id'], $birthday);
                    } else {
                        insertMember($username, $password, $email, null, $birthday);
                    }

                    header('location: regsus.php');
                }
            }
            ?>
            <div class="login-form-main-message"></div>
            <div class="main-login-form">
                <div class="login-group">
                    <div class="form-group">
                        <label for="reg_username" class="sr-only">User</label>
                        <input type="text" class="form-control" id="reg_username" name="reg_username"
                               placeholder="username">
                    </div>
                    <div class="form-group">
                        <label for="reg_password" class="sr-only">Password</label>
                        <input type="password" class="form-control" id="reg_password" name="reg_password"
                               placeholder="password">
                    </div>
                    <div class="form-group">
                        <label for="reg_password_confirm" class="sr-only">Password Confirm</label>
                        <input type="password" class="form-control" id="reg_password_confirm"
                               name="reg_password_confirm" placeholder="confirm password">
                    </div>

                    <div class="form-group">
                        <label for="reg_email" class="sr-only">Email</label>
                        <input type="email" class="form-control" id="reg_email" name="reg_email" placeholder="email">
                    </div>

                    <div class="form-group">
                        <label for="reg_school">School</label>
                        <select class="form-control"
                                onchange="javascript:changeSchool(document.getElementById('reg_school').value)"
                                id="reg_school" name="reg_school">
                            <option value="0">None</option>
                            <?php foreach ($schools as $school) {

                                if (isset($_GET['schoolValue']) && $_GET['schoolValue'] == $school->id) {
                                    ?>
                                    <option value="<?= $school->id?>"selected><?= $school->nameCHT ?></option>
                                    <?php
                                } else {
                                    ?>
                                    <option value="<?= $school->id ?>"><?= $school->nameCHT ?></option>
                                <?php }
                            }
                            ?>
                        </select>
                    </div>

                    <?php if (isset($_GET['schoolValue']) && $_GET['schoolValue'] != '0') { ?>
                        <div class="form-group">
                            <label for="reg_deparmtent">Department</label>
                            <select class="form-control" id="reg_department" name="reg_department">
                                <?php
                                $departments =SchoolDepartment::GetDepartmentsBySchoolID($_GET['schoolValue']);
                                foreach ($departments as $department) { ?>
                                    <option value="<?= $department->id?>"><?= $department->nameCHT ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    <?php } ?>

                    <div class="form-group">
                        <label for="reg_birthday" class="sr-only">Birthday</label>
                        <input type="date" class="form-control" id="reg_birthday" name="reg_birthday"">
                    </div>

                </div>
                <button type="submit" name="register-button" class="login-button"><i class="fa fa-chevron-right"></i>
                </button>
            </div>


            <div class="etc-login-form">
                <p>already have an account? <a href="login.php">login here</a></p>
            </div>
        </form>

    </div>
    <!-- end:Main Form -->
</div>
<?php include("footer.php"); ?>

<script>
    function changeSchool(school) {
        window.location.href = "register.php?schoolValue=" + school;
    }
</script>  