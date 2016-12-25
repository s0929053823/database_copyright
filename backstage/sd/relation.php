<?php
$schools = School::GetAll();

?>

<label for="reg_school">School</label>
<select class="form-control"
        onchange="javascript:changeSchool(document.getElementById('reg_school').value)"
        id="reg_school" name="reg_school">
    <option value="0">None</option>
    <?php foreach ($schools as $school) {

        if (isset($_GET['school']) && $_GET['school'] == $school->id) {
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
<label for="department">Department</label>
<table class="table table-striped " id="department">
    <thead>
    <td></td>
    <td>使用者人數</td>
    <th></th>
    </thead>
    <tbody>
    <?php if(isset($_GET['school'])) {
        $departments = SchoolDepartment::GetDepartmentsBySchoolID($_GET['school']);
        foreach ($departments as $department) {

            ?>
            <tr>
                <td><div id="cid<?= $department->id ?>"><?= $department->nameCHT?></div></td>
                <td></td>
                <td>
                    <form method="post" action="<?= APP_URL?>action.php">
                        <button type="submit" class="btn-primary disabled" name="delete_department" value=<?=$department->id ?>>刪除</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    <?php } ?>
    </tbody>
</table>


<script>
    function changeSchool(school) {
        window.location.href = "backstage.php?value=7&school="+school +"#relation";
    }
</script>