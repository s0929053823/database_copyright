<?php include('navigation.php') ;?>
<?php
if(!isset($_GET['value'])) {
    return;
}
require_once 'model/WritingRelation.php';
require_once 'model/Category.php';
$textbook = Textbook::GetByID($_GET['value']);
if(!$textbook) return;
$category = Category::GetByID($textbook->categoryID);
$authors = WritingRelation::GetAuthorByTextbookID($textbook->id);
?>
<!-- Portfolio Item Row -->
<div class="row">
    <div class="col-md-6">
        <img class="img-responsive" src="<?=$textbook->imgSrc?>" width="300" height="225">
    </div>
    <div class="col-md-5">
        <h3>Title</h3>
        <ul>
            <h5><?= $textbook->title?></h5>
        </ul>
        <h3>Publish Year</h3>
        <ul>
            <h5><?= $textbook->publishYear?></h5>
        </ul>
        <h3>Author</h3>
        <ul>
            <h5>
                <?php
                foreach ($authors as $author){
                    echo"<a href=\"$author->url\">".$author->name."</a>";
                    echo "<br>";
                }
                ?>
            </h5>
        </ul>
        <h3>Publisher</h3>
        <ul>

        </ul>
        <h3>ISBN</h3>
        <ul>
            <h5>10 : <?= $textbook->ISBN10?></h5>
            <h5>13 : <?= $textbook->ISBN13 ?></h5>
        </ul>
        <h3>Category</h3>
        <ul>
            <h5><?= $category->name ?></h5>
        </ul>
        <h3>Edition</h3>
        <ul>
            <h5><?= $textbook->edition ?></h5>
        </ul>

    </div>

</div>

<div class="row">

    <div class="col-md-12">

        <h3>Description</h3>
        <ul>
            <p><?= $textbook->description ?></p>
        </ul>
    </div>
</div>

<?php include('footer.php') ;?>
