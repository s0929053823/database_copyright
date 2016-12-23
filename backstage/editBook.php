<?php
include_once("../config.php");
include_once('../navigation.php');
include_once ('../querybook.php');
$categorys = getCategorys();
$textBook = getTextbook($_GET['value']);
?>

<?php
if (isset($_POST['edit_button'])) {
    $title = $_POST['title'];
    $categoryID = $_POST['category'];
    $isbn10 = $_POST['isbn10'];
    $isbn13 = $_POST['isbn13'];
    $edition = $_POST['edition'];
    $publishYear = $_POST['pyear'];
    $description = $_POST['description'];
    $imgSrc = $_POST['image'];

    updateTextbook($_GET['value'],$categoryID,$isbn10,$isbn13,$title,$edition,null,$publishYear,$description,$imgSrc);
    //insertTextbook($categoryID,$isbn10,$isbn13,$title,$edition,null,$publishYear,$description,$imgSrc);
    header('location:'.APP_URL.'backstage.php?value=3');
}
?>
    <div class="container">
        <div class="row main">
            <div class="panel-heading">
                <div class="panel-title text-center">
                    <h1 class="title">Edit Textbook</h1>
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
                                <input type="text" class="form-control" name="title" id="title" value="<?=$textBook['Title'] ?>" required/>
                            </div>
                        </div>
                    </div>


                    <div class="form-group" >
                        <label for="category" class="cols-sm-2 control-label">Category</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope fa"
                                                                   aria-hidden="true"></i></span>
                                <select class="form-control" id="category" name="category" >

                                    <?php for ($i = 0; $i < count($categorys); $i++) {
                                        if($categorys[$i]['Category_ID']==$textBook['Category_ID']) {
                                            echo "<option value=" . $categorys[$i]['Category_ID'] . "
                                                selected>" . $categorys[$i]['Category_Name'] . "</option>";
                                        }
                                        else{
                                            echo "<option value=" . $categorys[$i]['Category_ID'] . "
                                                >" . $categorys[$i]['Category_Name'] . "</option>";
                                        }
                                     } ?>
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
                                       value="<?=$textBook['ISBN_10'] ?>" required/>
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
                                       value="<?=$textBook['ISBN_13'] ?>" required>
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
                                       value="<?=$textBook['Edition'] ?>" required/>
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
                                       value="<?=$textBook['Publish_Year'] ?>" required/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description" class="cols-sm-2 control-label">Description</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock fa-lg"
                                                                   aria-hidden="true"></i></span>
                                <textarea class="form-control" name="description" id="description" required><?=$textBook['Description'] ?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="image" class="cols-sm-2 control-label">ImageSource</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock fa-lg"
                                                                   aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="image" id="image" value="<?=$textBook['ImgSrc'] ?>"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group ">
                        <button type="submit" class="btn btn-primary btn-lg btn-block login-button" name="edit_button">Confirm</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

<?php
include_once('..\footer.php');
?>