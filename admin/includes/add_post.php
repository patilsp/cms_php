<?php

    if(isset($_POST['create_post']))
    {
       $post_title          = mysqli_real_escape_string($connection, trim($_POST['post_title']));
       $post_category_id    = mysqli_real_escape_string($connection, trim($_POST['post_category_id']));
       $post_user           = mysqli_real_escape_string($connection, trim($_POST['post_user']));
       $post_status         = mysqli_real_escape_string($connection, trim($_POST['post_status']));

       $post_image          = $_FILES['image']['name'];
       $post_image_tmp      = $_FILES['image']['tmp_name'];

       $post_tags           = mysqli_real_escape_string($connection, trim($_POST['post_tags']));
       $post_content        = mysqli_real_escape_string($connection, trim($_POST['post_content']));

       $post_date           = date('d-m-y');
    //    $post_comment_count  = 4;

       move_uploaded_file($post_image_tmp, "../images/$post_image");

       $query = "INSERT INTO posts(post_category_id, post_title, post_user, post_date, post_image, 
                    post_content, post_tags, post_status) VALUES($post_category_id, 
                    '$post_title', 
                    '$post_user', now(), '$post_image', '$post_content', '$post_tags',  
                    '$post_status')";

        $result = mysqli_query($connection, $query);

        confirmQuery($result);

        $the_get_post_id = mysqli_insert_id($connection);

        echo "<p class='text-center text-success bg-success p-2'>Post Created. <a href='../post.php?p_id=$the_get_post_id'> View Post</a> Or <a href='posts.php'>Edit More Posts</a></p>";

    }

?>
        <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="green" id="basic-layout-card-center">Add Post Here</h4>
                            <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                                    <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                                    <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                                    <li><a data-action="close"><i class="icon-cross2"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body collapse in">
                            <div class="card-block">

                                <form action="" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="post_title">Post Title</label>
                <input type="text" name="post_title" class="form-control">
            </div>

            <div class="form-group">
                <label for="post_category">Post Category</label>
                <select name="post_category_id" class="form-control">
                    <?php

                        $query = "SELECT * FROM categories";
                        $result = mysqli_query($connection, $query);

                        confirmQuery($result);

                        while($row = mysqli_fetch_array($result))
                        {
                            $cat_id = $row['cat_id'];
                            $cat_title = $row['cat_title'];

                            echo "<option value='$cat_id'>$cat_title</option>";
                        }

                    ?>

                </select>
            </div>

            <div class="form-group">
                <label for="post_auhtor">Users</label>
                <select name="post_user" class="form-control">
                    <?php

                        $query = "SELECT * FROM users";
                        $result = mysqli_query($connection, $query);

                        confirmQuery($result);

                        while($row = mysqli_fetch_array($result))
                        {
                            $user_id = $row['user_id'];
                            $username = $row['username'];

                            echo "<option value='$username'>$username</option>";
                        }

                    ?>

                </select>
            </div>

            <div class="form-group">
                <label for="post_status">Post Status</label>
                <select name="post_status" class="form-control">
                    <option value="draft">Select Options</option>
                    <option value="published">Publish</option>
                    <option value="draft">Draft</option>
                </select>
            </div>

            <div class="form-group">
                <label for="post_image">Post Image</label>
                <input type="file" name="image" class="form-control">
            </div>

            <div class="form-group">
                <label for="post_tags">Post Tags</label>
                <input type="text" name="post_tags" class="form-control">
            </div>

            <div class="form-group">
                <label for="post_content">Post Content</label>
                <textarea name="post_content" class="form-control" cols="30" rows="10"></textarea>
            </div>

            <div class="form-actions center">

            <div class="form-group">
                <input type="submit" value="Publish Post" name="create_post" class="btn btn-primary">
    </div>

							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>



