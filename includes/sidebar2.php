<div class="col-md-4">
    <div class="well">
        <h4 class="green">Blog Search</h4>
        <form action="search.php" method="post">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search Here">
                    <span class="input-group-btn">
                        <button name="submit" class="btn btn-primary" type="submit">
                            <span class="icon-search"></span>
                        </button>
                    </span>
            </div>
        </form>
    </div>
    <hr>
              
    <div class="well">
        <h4 class="green">Blog Categories</h4>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled">
                <?php

                    $query = "SELECT * FROM categories";
                    $result = mysqli_query($connection, $query);
                    while($row = mysqli_fetch_array($result))
                    {
                       $cat_id = $row['cat_id'];
                       $cat_title = $row['cat_title'];

                       echo "<li><a href='category.php?category=$cat_id'>$cat_title</a>
                       </li>";
                    }

                ?>
                </ul>
            </div>
        </div>
     </div>
     <hr>
    <?php include("widget.php"); ?>
</div>