<?php include('navigation.php') ;?>
<?php
if(!isset($_GET['value'])) {
    return;
}
require_once 'model/Publisher.php';
require_once 'model/Textbook.php';
require_once 'model/Category.php';
$publisher = Publisher::GetByID($_GET['value']);
if(!$publisher) return;

//$publishers = WritingRelation::GetAuthorByTextbookID($textbook->id);
?>
<!-- Portfolio Item Row -->
<div class="row">
    <div class="col-md-6" >
        <img class="img-responsive" src="<?=$publisher->imgSrc?>" width="300" height="225">
    </div>
    <div class="col-md-5">
        <h3>Name</h3>
        <ul>
            <h5><?= $publisher->companyName?></h5>
        </ul>
        <h3>Owner</h3>
        <ul>

            <h5><?= ($publisher->owner)?$publisher->owner:"Unknown" ?></h5>
        </ul>
        <h3>Telephone</h3>
        <ul>
            <h5><?= $publisher->telephone?></h5>
        </ul>
        <h3>Website</h3>
        <ul>
            <h5><?= $publisher->website?></h5>
        </ul>
        <h3>Found</h3>
        <ul>
            <h5><?= $publisher->foundDate?></h5>
        </ul>
    </div>

</div>

<div class="row">
    <h1>Description</h1>
    <ul>
        <h5><?= $publisher->description?></h5>
    </ul>

</div>

<div class="row">
    <h1>出版的書</h1>
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
        foreach (Textbook::GetByPublisherID($publisher->id) as $textbook) {
            $category = Category::GetByID($textbook->categoryID);
            ?>
            <tr>
            <td><a href="<?=$textbook->url?>"><?=$textbook->id?></a></td>
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
