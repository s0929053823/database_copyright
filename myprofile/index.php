<?php
require_once 'model/Solution.php';
require_once 'model/Rate.php';
require_once 'model/SchoolDepartment.php';
require_once 'tableView/V_TransactionCreator.php';
require_once 'tableView/V_SolutionRate.php';
$sd = SchoolDepartment::GetByID($user->sd_id);
$department = Department::GetByID($sd->departmentID);
$school = School::GetByID($sd->schoolID);
$userType = array("管理員", "一般用戶", "高級用戶");

?>
<div class="row">

    <div class="row">
        <div class=" col-md-9 col-lg-9 ">
            <table class="table table-user-information">
                <tbody>
                <tr>
                    <td>School:</td>
                    <td><?=$school->nameENG ?></td>
                </tr>
                <tr>
                    <td>Department:</td>
                    <td><?=$department->nameENG ?></td>
                </tr>
                <tr>
                    <td>Solutions</td>
                    <td><?=count(Solution::GetByMemberID($user->id)) ?></td>
                </tr>
                <tr>
                    <td>Help Count</td>
                    <td><?=V_TransactionCreator::GetNumberOfPeopleBuy($user->id) ?></td>
                </tr>
                <tr>
                    <td>Average Rate</td>
                    <td><?=V_SolutionRate::GetAverageRateByCreatorID($user->id) ?></td>
                </tr>
                <tr>
                <tr>
                    <td>Birthday</td>
                    <td><?=$user->birthday ?></td>
                </tr>
                <tr>
                    <td>E-mail</td>
                    <td><?=$user->email?></td>
                </tr>
                <tr>
                    <td>Type</td>
                    <td><?=$userType[$user->type]?></td>
                </tr>

                </tr>

                </tbody>
            </table>

        </div>
    </div>
</div>
