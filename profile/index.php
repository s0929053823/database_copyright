<?php
require_once 'model/Solution.php';
require_once 'model/Rate.php';
require_once 'tableView/V_TransactionCreator.php';
require_once 'tableView/V_SolutionRate.php';
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
                            <td><?=count(Solution::GetByMemberID($profileUser->id)) ?></td>
                        </tr>
                        <tr>
                            <td>Help Count</td>
                            <td><?=V_TransactionCreator::GetNumberOfPeopleBuy($profileUser->id) ?></td>
                        </tr>
                        <tr>
                            <td>Average Rate</td>
                            <td><?=V_SolutionRate::GetAverageRateByCreatorID($profileUser->id) ?></td>
                        </tr>
                        <tr>
                        <tr>
                            <td>Birthday</td>
                            <td><?=$profileUser->birthday ?></td>
                        </tr>
                        <tr>
                            <td>E-mail</td>
                            <td><?=$profileUser->email?></td>
                        </tr>
                        <tr>
                            <td>Type</td>
                            <td><?=$userType[$profileUser->type]?></td>
                        </tr>

                        </tr>

                        </tbody>
                    </table>

                </div>
            </div>
    </div>
