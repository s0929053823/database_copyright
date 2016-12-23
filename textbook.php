<?php include('navigation.php') ;?>
<?php if(!isset($_GET['value']))
{
    return;
}
$textbook = getTextbook($_GET['value']);
if(!$textbook) return;
$category = getCategory($textbook['Category_ID']);
$imgSrc = ($textbook['ImgSrc']==null) ? "img/no_image.jpg" :$textbook['ImgSrc'];
$authors = getAuthorsByTextbookID($textbook['Textbook_ID']);
?>
<!-- Portfolio Item Row -->
<div class="row">
    <div class="col-md-6">
        <img class="img-responsive" src=<?= $imgSrc  ?> width="300" height="225">
    </div>
    <div class="col-md-5">

        <h3>Title</h3>
        <ul>
            <h5><?= $textbook ['Title'] ?></h5>
        </ul>
        <h3>Publish Year</h3>
        <ul>
            <h5><?= $textbook['Publish_Year'] ?></h5>
        </ul>
        <h3>Author</h3>
        <ul>
            <h5>
                <?php
                    foreach ($authors as $author){
                        echo"<a href=\"#\">".$author['Name']."</a>";
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
            <h5>10 : <?= $textbook['ISBN_10'] ?></h5>
            <h5>13 : <?= $textbook['ISBN_13'] ?></h5>
        </ul>
        <h3>Category</h3>
        <ul>
            <h5><?= $category['Category_Name'] ?></h5>
        </ul>
        <h3>Edition</h3>
        <ul>
            <h5><?= $textbook['Edition'] ?></h5>
        </ul>

    </div>

</div>

<div class="row">

    <div class="col-md-12">

        <h3>Description</h3>
        <ul>
            <p><?= $textbook['Description'] ?></p>
        </ul>

    </div>
</div>

<?php include('footer.php') ;?>
