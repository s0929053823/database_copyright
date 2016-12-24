<?php include('navigation.php') ;?>
<?php
if(!isset($_GET['value'])) {
    return;
}
require_once 'model/WritingRelation.php';
require_once 'model/Category.php';

$author = Author::GetByID($_GET['value']);
if(!$author) return;

//$authors = WritingRelation::GetAuthorByTextbookID($textbook->id);
?>
<!-- Portfolio Item Row -->
<div class="row">
    <div class="col-md-6" >
        <img class="img-responsive" src="<?=$author->imgSrc?>" width="300" height="225">
    </div>
    <div class="col-md-5">
        <h3>Name</h3>
        <ul>
            <h5><?= $author->name?></h5>
        </ul>
        <h3>Description</h3>
        <ul>
            <h5><?= $author->description?></h5>
        </ul>

    </div>

</div>

<div class="row">
    <h1>寫過的書</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Title</th>
            <th>Category</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach (WritingRelation::GetTextbookByAuthorID($author->id) as $textbook) {
            $category = Category::GetByID($textbook->categoryID);
            ?>
            <tr>
                <td><a href="<?=$textbook->url?>"><?= $textbook->id?></a></td>
                <td><?=$category->name ?></td>
                <td><?=$textbook->title ?></a></td>

            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>

</div>

<?php include('footer.php') ;?>
