<?php include("navigation.php"); ?>
<?php include("check.php"); ?>

<!-- Page Content -->
<div class="container center_div">
    <form id="upload-form" class="text-left" method="post" action="action.php">
        <input type="text" hidden name="memberID" value="<?=$user->id?>">
        <div class="form-group md">

            <label for="email">Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Enter tite"
                   required="required">

        </div>
        <div class="form-group">

            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" name="price" placeholder="" required="required"
                   min="1">

        </div>

        <div class="form-group">
            <?php $categorys = getCategorys(); ?>
            <label for="category">Category</label>
            <select multiple class="form-control" name="category" id="category"
                    onchange="javascript:changeCategory(document.getElementById('category').value)" required="required">

                <option value="0">None</option>

                <?php for ($i = 0; $i < count($categorys); $i++) {
                    if (isset($_GET['categoryValue']) && $_GET['categoryValue'] == $categorys[$i]['Category_ID']) {
                        ?>
                        <option value= <?=$categorys[$i]['Category_ID'] ?> selected> <?=$categorys[$i]['Category_Name'] ?></option>

                        <?php
                    } else {
                        ?>
                        <option value= <?=$categorys[$i]['Category_ID'] ?>> <?=$categorys[$i]['Category_Name'] ?></option>
                    <?php }
                }
                ?>

            </select>

            <?php
            if (isset($_GET['categoryValue']) && $_GET['categoryValue'] != '0') {
                ?>

                <?php $textbooks = getTextbookByCategory($_GET['categoryValue']); ?>
                <label for="textbook">Book</label>

                <select multiple class="form-control" name="textbook" id="textbook" required="required">
                    <?php for ($i = 0; $i < count($textbooks); $i++) { ?>
                        <option value= <?=$textbooks[$i]['Textbook_ID'] ?>><?="{$textbooks[$i]['Title']}({$textbooks[$i]['Publish_Year']})" ?> </option>
                    <?php } ?>
                </select>
            <?php } ?>
        </div>

        <div class="form-group">
            <label for="Chapter">Chapter</label>
            <input type="number" class="form-control" id="chapter" name="chapter" placeholder="" required="required"
                   min="0">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" rows="3" name="description"></textarea>
        </div>
        <div class="form-group">
            <label for="InputFile">File input</label>
            <input type="file" class="form-control-file" id="InputFile">
        </div>

        <button type="submit" class="submit-button" name="insert_solution">Submit</button>
    </form>
</div>
<?php include("footer.php"); ?>

<script>
    function changeCategory(category) {
        window.location.href = "upsolution.php?categoryValue=" + category;
    }
</script>
