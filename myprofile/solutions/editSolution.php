<?php

require_once 'model/Category.php';
require_once 'model/Textbook.php';
$solution = Solution::GetByID($_GET['sid']);

?>
<div class="panel-heading">
    <div class="panel-title text-center">
        <h1 class="title">Edit Solution</h1>
        <hr/>
    </div>
</div>
<form id="upload-form" class="text-left" method="post" action="action.php">
    <input type="text" hidden name="memberID" value="<?=$user->id?>">
    <input type="text" hidden name="solutionID" value="<?=$solution->id?>">
    <div class="form-group md">
        <label for="email">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="<?= $solution->title ?>" required="required">
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" class="form-control" id="price" name="price" value="<?= $solution->price ?>" required="required" min="1">
    </div>

    <div class="form-group">
        <?php $categorys= Category::GetAll(); ?>
        <label for="category">Category</label>
        <select multiple class="form-control" name="category" id="category"
                onchange="javascript:changeCategory(document.getElementById('category').value)" required="required">

            <option value="0">None</option>
            <?php for ($i = 0; $i < count($categorys); $i++) {
                $category = $categorys[$i];
                if (!isset($_GET['categoryValue'])&&$category->id == $solution->id)
                {
                    echo "<option value=$category->id selected>$category->name</option>";
                }
                else if($_GET['categoryValue']==$category->id)
                {
                    echo "<option value= $category->id  selected> $category->name </option>";
                }
                else
                {
                    echo "<option value= $category->id > $category->name</option>";
                }
            }
            ?>
        </select>

        <?php
        if (isset($_GET['categoryValue']) && $_GET['categoryValue'] != '0') {
            ?>

            <?php $textbooks = Textbook::GetByCategoryID($_GET['categoryValue']); ?>
            <label for="textbook">Book</label>

            <select multiple class="form-control" name="textbook" id="textbook" required="required">
                <?php for ($i = 0; $i < count($textbooks); $i++) {

                    $textbook = $textbooks[$i];
                    if(!isset($_GET['categoryValue'])&&$textbook->id = $solution->textbookID) {
                        echo "<option value= $textbook->id selected> $textbook->title($textbook->publishYear)</option>";
                    }
                    else{
                        echo "<option value= $textbook->id> $textbook->title($textbook->publishYear)</option>";
                    }
                } ?>
            </select>
        <?php } ?>
    </div>

    <div class="form-group">
        <label for="Chapter">Chapter</label>
        <input type="number" class="form-control" id="chapter" name="chapter" value="<?=$solution->chapterNo?>" required="required" min="0">
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" rows="3" name="description"><?=$solution->description?></textarea>
    </div>
    <div class="form-group">
        <label for="InputFile">File input</label>
        <input type="file" class="form-control-file" id="InputFile">
    </div>

    <button type="submit" class="btn-primary" name="edit_solution">Confirm</button>
</form>

<?php include("footer.php"); ?>

<script>
    function changeCategory(category) {
        window.location.href = "myprofile.php?sidevalue=2&action=1&sid="+ "<?=$solution->id?>" +"&categoryValue=" + category;
    }
</script>