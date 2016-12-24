<?php
require_once 'model/Category.php';
require_once 'model/Author.php';
$categorys = Category::GetAll();
$authors = Author::GetAll();
?>

<div class="panel-heading">
    <div class="panel-title text-center">
        <h1 class="title">Add Textbook</h1>
        <hr/>
    </div>
</div>


<div class="main-login main-center">

    <form class="form-horizontal" method="post" action="action.php" >

        <div class="form-group">
            <label for="name" class="cols-sm-2 control-label">Title</label>
            <div class="cols-sm-10">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Title" required/>
                </div>
            </div>
        </div>

        <div class="form-group" >
            <label for="category" class="cols-sm-2 control-label ">Author</label>
            <div class="cols-sm-10">
                <div class="input-group">
                    <select class="selectpicker" id="author" name="author[]" data-live-search="true" multiple>
                        <?php for ($i = 0; $i < count($authors); $i++) { ?>
                            <option value="<?= $authors[$i]->id ?>"><?= $authors[$i]->name ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group" >
            <label for="category" class="cols-sm-2 control-label">Category</label>
            <div class="cols-sm-10">
                <div class="input-group">

                    <select class="selectpicker" id="category" name="category" data-live-search="true" data-live-search="true">
                        <?php for ($i = 0; $i < count($categorys); $i++) { ?>
                            <option value="<?= $categorys[$i]->id ?>"
                                    selected><?= $categorys[$i]->name ?></option>

                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>


        <div class="form-group">
            <label for="isbn10" class="cols-sm-2 control-label">ISBN-10</label>
            <div class="cols-sm-10">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" name="isbn10" id="isbn10"
                           placeholder="ISBN-10" required/>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="isbn13" class="cols-sm-2 control-label">ISBN-13</label>
            <div class="cols-sm-10">
                <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock fa-lg"
                                                                   aria-hidden="true"></i></span>
                    <input type="text" class="form-control" name="isbn13" id="isbn13"
                           placeholder="ISBN-13" required>
                </div>
            </div>
        </div>



        <div class="form-group">
            <label for="edition" class="cols-sm-2 control-label">Edition</label>
            <div class="cols-sm-10">
                <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock fa-lg"
                                                                   aria-hidden="true"></i></span>
                    <input type="text" class="form-control" name="edition" id="edition"
                           placeholder="Enter Edition" required/>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="pyear" class="cols-sm-2 control-label">Publish Year</label>
            <div class="cols-sm-10">
                <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock fa-lg"
                                                                   aria-hidden="true"></i></span>
                    <input type="text" class="form-control" name="pyear" id="pyear"
                           placeholder="Enter Year" required/>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="description" class="cols-sm-2 control-label">Description</label>
            <div class="cols-sm-10">
                <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock fa-lg"
                                                                   aria-hidden="true"></i></span>
                    <input type="text" class="form-control" name="description" id="description" required/>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="image" class="cols-sm-2 control-label">ImageSource</label>
            <div class="cols-sm-10">
                <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock fa-lg"
                                                                   aria-hidden="true"></i></span>
                    <input type="text" class="form-control" name="image" id="image"
                           placeholder="Enter URL"/>
                </div>
            </div>
        </div>

        <div class="form-group ">
            <button type="submit" class="btn btn-primary btn-lg btn-block login-button" name="insert_textbook">Insert</button>
        </div>

    </form>
</div>


