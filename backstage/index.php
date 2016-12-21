<!DOCTYPE html>
<html lang="en">
<?php include_once("../querybook.php"); 
    include_once("../function.php");
    include("../check.php");
?>
<?php include("../navigation.php"); ?>
    <!-- Bootstrap Core CSS -->

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">CopyRight</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">Solutions</a>
                    </li>
                    <li>
                        <a href="#">Textbooks</a>
                    </li>
                    <li>
                        <a href="#">Authors</a>
                    </li>
                    <li>
                        <a href="#">Schools</a>
                    </li>
                    <li>
                        <a href="#">Publishers</a>
                    </li>
                </ul>
                
                  <ul class="nav navbar-nav navbar-right">
                    <?php 
                        if(isLogin()){
                        $user = getMember($_SESSION['user_id']);
                        $username = $user['Account'];
                        $userType = $user['Type'];
                    ?>
                     <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome, <?=$username ?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="profile.php"><i class="icon-cog"></i>Profiles</a></li>
                            <li><a href="upsolution.php"><i class="icon-off"></i> Upload Solutions</a></li>
                            <li class="divider"></li>
                            <li><a href="logout.php"><i class="icon-off"></i> Logout</a></li>
                            <?php  if($userType=='0') { ?>   
                                 <li><a href="backstage.php"><i class="icon-off"></i> Backstage</a></li>
                            <?php  } ?>
                        </ul>
                    </li>
                    <?php
                       
                    }
                     else
                    {
                    ?>
                    <li>
                        <a href="login.php">Login</a>
                    </li>
                    <li>
                        <a href="register.php">Register</a>
                    </li>
                    <?php } ?>
                </ul>

                     <div class="input-group">       
                        <div class="form-group col-lg-16">
                        <input type="text" class="form-control" name="q" placeholder="Search.." id="search_key" value="">
                        </div>
                        <span class="input-group-btn">
                            <button class="btn btn-info" type="submit">Search </button>
                         </span>
                 </div>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <!-- Page Content -->
    <div class="container">
    <?php if (!isAdmin($_SESSION['user_id'])) { ?>
                <h1>You're not Administrator ! </h1>
    <?php } 
        else{
    ?>
    <?php } ?>
    </div>
<?php include("../footer.php"); ?>
