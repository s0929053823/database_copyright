
<div class="panel-heading">
    <div class="panel-title text-center">
        <h1 class="title">Add Author</h1>
        <hr/>
    </div>
</div>
<div class="main-login main-center">
    <form class="form-horizontal" method="post" action="action.php" >

        <div class="form-group">
            <label for="name" class="cols-sm-2 control-label">Name*</label>
            <div class="cols-sm-10">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Name" required/>
                </div>
            </div>
        </div>


        <div class="form-group">
            <label for="description" class="cols-sm-2 control-label">Description</label>
            <div class="cols-sm-10">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                    <textarea class="form-control"  maxlength="255" name="description" id="description"> </textarea>
                </div>
            </div>
        </div>



        <div class="form-group">
            <label for="isbn10" class="cols-sm-2 control-label">ImageSource</label>
            <div class="cols-sm-10">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" name="imgSrc" id="imgSrc" placeholder="URL"d/>
                </div>
            </div>
        </div>



        <div class="form-group ">
            <button type="submit" class="btn btn-primary btn-lg btn-block login-button" name="insert_author">Insert</button>
        </div>

    </form>
</div>
