
<div class="panel-heading">
    <div class="panel-title text-center">
        <h1 class="title">Add Publisher</h1>
        <hr/>
    </div>
</div>


<div class="main-login main-center">

    <form class="form-horizontal" method="post" action="action.php" >

        <div class="form-group">
            <label for="name" class="cols-sm-2 control-label">Company Name*</label>
            <div class="cols-sm-10">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Name" required/>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="isbn10" class="cols-sm-2 control-label">Owner</label>
            <div class="cols-sm-10">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" name="owner" id="owner" placeholder="Owner"/>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="isbn13" class="cols-sm-2 control-label">Website</label>
            <div class="cols-sm-10">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" name="website" id="website"
                           placeholder="www.?">
                </div>
            </div>
        </div>



        <div class="form-group">
            <label for="edition" class="cols-sm-2 control-label">Telephone*</label>
            <div class="cols-sm-10">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" name="telephone" id="telephone"
                           placeholder="09xx-xxx-xxx" required/>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="pyear" class="cols-sm-2 control-label">FoundDate*</label>
            <div class="cols-sm-10">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                    <input type="date" class="form-control" name="fdate" id=fdate"
                           placeholder="When this company start?" required/>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="description" class="cols-sm-2 control-label">Description(255)</label>
            <div class="cols-sm-10">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                    <textarea class="form-control" maxlength="255" name="description" id="description"> </textarea>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="image" class="cols-sm-2 control-label">ImageSource</label>
            <div class="cols-sm-10">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" name="imgSrc" id="imgSrc" placeholder="Enter URL"/>
                </div>
            </div>
        </div>

        <div class="form-group ">
            <button type="submit" class="btn btn-primary btn-lg btn-block login-button" name="insert_publisher">Insert</button>
        </div>

    </form>
</div>


