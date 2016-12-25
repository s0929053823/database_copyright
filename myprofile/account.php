<div class="row main">
    <div class="panel-heading">
        <div class="panel-title text-center">
            <h1 class="title">Account Setting</h1>
            <hr/>
        </div>
    </div>
    <div class="main-login main-center">

        <form class="form-horizontal" method="post" action="action.php" >
            <input type="text" hidden name="memberID" value="<?= $user->id?>">
            <div class="form-group">
                <label for="name" class="cols-sm-2 control-label">Username</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="account" id="account" value=<?=$user->account?> required/>
                    </div>
                </div>
            </div>


            <div class="form-group">
                <label for="name" class="cols-sm-2 control-label">Password</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                        <input type="password" class="form-control" name="password" id="password" value=<?=$user->password ?> required/>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="name" class="cols-sm-2 control-label">Type Password Again</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                        <input type="password" class="form-control" name="cpassword" id="cpassword" required value="<?=$user->password ?>"/>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="name" class="cols-sm-2 control-label">Email</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                        <input type="email" class="form-control" name="mail" id="mail" required value= "<?= $user->email ?>" />
                    </div>
                </div>
            </div>


            <div class="form-group">
                <label for="name" class="cols-sm-2 control-label">Birthday</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                        <input type="date" class="form-control" name="birthday" id="birthday" value= <?=$user->birthday ?> required/>
                    </div>
                </div>
            </div>

            <div class="form-group ">
                <button type="submit" class="btn btn-primary btn-lg btn-block login-button" name="edit_member">Confirm</button>
            </div>

        </form>
    </div>
</div>