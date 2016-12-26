<?php
$type = isset($_GET['type'])?$_GET['type']:0;

?>
<div class="panel-heading">
    <div class="panel-title text-center">
        <h1 class="title">Add Discount</h1>
        <hr/>
    </div>
</div>
<div class="main-login main-center">
    <form class="form-horizontal" method="post" action="action.php" >
        <div class="form-group" >
            <label for="category" class="cols-sm-2 control-label">種類*</label>
            <div class="cols-sm-10">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                    <select class="form-control" id="type" name="type" required onchange="changeType(document.getElementById('type').value)" >
                        <?php for ($i = 0; $i < count($discountType); $i++) {
                            if($type==$i) {
                                echo "<option selected value=" . $i . ">" . $discountType[$i] . "</option>";
                            }
                            else{
                                echo "<option value=" . $i . ">" . $discountType[$i] . "</option>";
                            }
                        } ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group" >
            <label for="category" class="cols-sm-2 control-label">依據*</label>
            <div class="cols-sm-10">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                    <select class="form-control" required id="dependent" name="dependent" >
                        <?php
                        if($type==0){
                            $publishers = Publisher::GetAll();
                                foreach ($publishers as $publisher) {
                                    echo "<option value=" . $publisher->id . ">" . $publisher->companyName . "</option>";
                                }
                        }
                        else if($type==1){
                            $authors = Author::GetAll();
                            foreach ($authors as $author) {
                                echo "<option value=" . $author->id . ">" . $author->name . "</option>";
                            }

                        }
                        else{
                            $textbooks = Textbook::GetAll();
                            foreach ($textbooks as $textbook) {
                                echo "<option value=" . $textbook->id . ">" . $textbook->title . "</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="name" class="cols-sm-2 control-label">活動名稱*</label>
            <div class="cols-sm-10">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" name="description" id="description" placeholder="Name" required/>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="name" class="cols-sm-2 control-label">開始時間*</label>
            <div class="cols-sm-10">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                    <input type="date" class="form-control" name="s_date" id="s_date" placeholder="Date" value="<?=date("Y-m-d")?>" required/>
                    <input type="time" class="form-control" name="s_time" id="s_time" placeholder="Time" value="<?=date("h:i")?>" required/>
                </div>
            </div>
        </div>


        <div class="form-group">
            <label for="name" class="cols-sm-2 control-label">結束時間*</label>
            <div class="cols-sm-10">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                    <input type="date" class="form-control" name="e_date" id="e_date" placeholder="Date" required/>
                    <input type="time" class="form-control" name="e_time" id="e_time" placeholder="Time" required/>
                </div>
            </div>
        </div>



        <div class="form-group">
            <label for="rate" class="cols-sm-2 control-label">折扣率(/100)*</label>
            <div class="cols-sm-10">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                    <input type="number" class="form-control" name="rate" id="rate" min="1" max="100" placeholder="6折就是 60/100" required/>
                </div>
            </div>
        </div>


        <div class="form-group ">
            <button type="submit" class="btn btn-primary btn-lg btn-block login-button" name="insert_discount">Insert</button>
        </div>


    </form>
</div>


<script type="text/javascript">
    function changeType (type) {
        window.location.href = "backstage.php?value=8&action=1&type=" + type;

    }

</script>