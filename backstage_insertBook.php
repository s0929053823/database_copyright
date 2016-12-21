<?php
include_once('navigation.php');
$categorys = getCategorys();
?>

<?php

if (isset($_POST['insert_button'])) {
    $title = $_POST['title'];
    $categoryID = $_POST['category'];
    $isbn10 = $_POST['isbn10'];
    $isbn13 = $_POST['isbn13'];
    $edition = $_POST['edition'];
    $publishYear = $_POST['pyear'];
    $description = $_POST['description'];
    $imgSrc = $_POST['image'];
    insertTextbook($categoryID,$isbn10,$isbn13,$title,$edition,null,$publishYear,$description,$imgSrc);
    header('location: backstage_textbooks.php');
}



?>
    <body>
<div class="container">
    <div class="row main">
        <div class="panel-heading">
            <div class="panel-title text-center">
                <h1 class="title">Add Textbook</h1>
                <hr/>
            </div>
        </div>
        <div class="main-login main-center">
            <form class="form-horizontal" method="post" >

                <div class="form-group">
                    <label for="name" class="cols-sm-2 control-label">Title</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Title"/>
                        </div>
                    </div>
                </div>


                <div class="form-group" >
                    <label for="category" class="cols-sm-2 control-label">Category</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope fa"
                                                                   aria-hidden="true"></i></span>
                            <select class="form-control" id="category" name="category">

                                <?php for ($i = 0; $i < count($categorys); $i++) { ?>
                                    <option value="<?= $categorys[$i]['Category_ID'] ?>"
                                            selected><?= $categorys[$i]['Category_Name'] ?></option>

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
                                   placeholder="ISBN-10"/>
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
                                   placeholder="ISBN-13"/>
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
                                   placeholder="Enter Edition"/>
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
                                   placeholder="Enter Year"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="description" class="cols-sm-2 control-label">Description</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock fa-lg"
                                                                   aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="description" id="description"
                            />
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
                    <button type="submit" class="btn btn-primary btn-lg btn-block login-button" name="insert_button">Insert</button>
                </div>

            </form>
        </div>
    </div>
</div>

<?php
include_once("footer.php");
?>