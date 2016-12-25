<?php
require_once 'model/Author.php';
require_once 'model/Publisher.php';
require_once  'model/WritingRelation.php';
$categorys = Category::GetAll();
$textBook = Textbook::GetByID($_GET['bookid']);;
$authors = Author::GetAll();
$textBookAuthors = WritingRelation::GetAuthorByTextbookID($textBook->id);
$publishers = Publisher::GetAll();
?>


<div class="panel-heading">
    <div class="panel-title text-center">
        <h1 class="title">Edit Textbook</h1>
        <hr/>
    </div>
</div>
<div class="main-login main-center">
    <form class="form-horizontal" method="post" action="action.php">
        <input type ="text" name="bookID" value="<?= $textBook->id?>" hidden>
        <div class="form-group">
            <label for="name" class="cols-sm-2 control-label">Title</label>
            <div class="cols-sm-10">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" name="title" id="title" value="<?=$textBook->title ?>" required/>
                </div>
            </div>
        </div>

        <div class="form-group" >
            <label for="category" class="cols-sm-2 control-label ">Author</label>
            <div class="cols-sm-10">
                <div class="input-group">
                    <select class="selectpicker" id="author" name="author[]" data-live-search="true" multiple>
                        <?php foreach ($authors as $author) {
                            foreach ($textBookAuthors as $textbookauthor){

                                if($author->id==$textbookauthor->id){
                                    echo " <option value= $author->id selected>$author->name</option> ";
                                    break;
                                }
                            }
                            echo " <option value= $author->id >$author->name</option> ";
                         } ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group" >
            <label for="category" class="cols-sm-2 control-label">Publisher</label>
            <div class="cols-sm-10">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                    <select class="form-control" id="publisher" name="publisher" >
                        <option value="0">null</option>
                        <?php for ($i = 0; $i < count($publishers); $i++) {
                            $publisher = $publishers[$i];
                            if($textBook->publisher!=null && $publisher->id = $textBook->publisherID) {
                                echo "<option value=" . $publisher->id . " selected>" . $publisher->companyName. "</option>";
                            }
                            else{
                                echo "<option value=" . $publisher->id . ">" . $publisher->companyName . "</option>";
                            }
                        } ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group" >
            <label for="category" class="cols-sm-2 control-label">Category</label>
            <div class="cols-sm-10">
                <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                    <select class="form-control" id="category" name="category" >

                        <?php for ($i = 0; $i < count($categorys); $i++) {
                            $category = $categorys[$i];
                            if($category->id==$textBook->categoryID) {
                                echo "<option value=" . $category->id . "
                                                selected>" . $category->name. "</option>";
                            }
                            else{
                                echo "<option value=" . $category->id . "
                                                >" . $category->name . "</option>";
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
                           value="<?=$textBook->ISBN10 ?>" required/>
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
                           value="<?=$textBook->ISBN13 ?>" required>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="edition" class="cols-sm-2 control-label">Edition</label>
            <div class="cols-sm-10">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" name="edition" id="edition" value="<?=$textBook->edition?>" required/>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="pyear" class="cols-sm-2 control-label">Publish Year</label>
            <div class="cols-sm-10">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" name="pyear" id="pyear" value="<?=$textBook->publishYear ?>" required/>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="image" class="cols-sm-2 control-label">ImageSource</label>
            <div class="cols-sm-10">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" name="image" id="image" value="<?=$textBook->imgSrc ?>"/>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="pyear" class="cols-sm-2 control-label">Description</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                <textarea maxlength="255" class="form-control" name="description" id="description" required><?=$textBook->description ?></textarea>
            </div>
        </div>

        <div class="form-group ">
            <div class="input-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block login-button" name="edit_textbook" value="<?php $textBook->id?>">Confirm</button>
            </div>
        </div>
</div>

</form>
</div>


