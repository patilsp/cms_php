 <div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
      <!-- main menu header-->
      <div class="main-menu-header">
        <input type="text" placeholder="Search" class="menu-search form-control round"/>
      </div>
      <!-- / main menu header-->
      <!-- main menu content-->
      <div class="main-menu-content">
        <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
          <li class=" nav-item"><a href="index.php"><i class="icon-home3"></i><span data-i18n="nav.dash.main" class="menu-title">Home</span></a>
         
          </li>
          
          
          
          <li class=" nav-item"><a href="admin"><i class="icon-home3"></i>
          <span data-i18n="nav.page_layouts.main" class="menu-title">ADMIN</span></a>
           
          </li>
              <?php

                    if(isset($_SESSION['user_role']))
                    {
                        if(isset($_GET['p_id']))
                        {
                            $the_post_id = $_GET['p_id'];
                            echo "<li>
                                    <a href='admin/posts.php?source=edit_post&p_id=$the_post_id'>Edit Post</a>
                                 </li>";
                        }
                    }

                ?>
                    <li class=" nav-item"><a href="#"><i class="icon-android-funnel"></i><span data-i18n="nav.menu_levels.main" class="menu-title">Categories</span></a>
            <ul class="menu-content">
             <?php

                $query = "SELECT * FROM categories LIMIT 5";
                $result = mysqli_query($connection, $query);

                while($row = mysqli_fetch_array($result))
                {
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];

                    $category_class = '';

                    $registration_class = '';

                    $contact_class = '';

                    $pageName = basename($_SERVER['PHP_SELF']);

                    $registration = 'registration.php';

                    $contact = 'contact.php';

                    if(isset($_GET['category']) && $_GET['category'] == $cat_id)
                    {
                        $category_class = 'active';
                    }
                    elseif ($pageName == $registration) 
                    {
                        $registration_class = 'active';
                    }

                    elseif ($pageName == $contact) 
                    {
                        $contact_class = 'active';
                    }
            ?>
                <li class='<?php echo $category_class; ?>'>
                    <a href="category.php?category=<?php echo $cat_id; ?>"><?php echo $cat_title; ?></a>
                </li>
        <?php   }

        ?>
        
                        </ul>
            </li>
        
        
        
 
         <li class='<?php echo $registration_class; ?>'>
                    <a href="registration.php">Registration</a>
                </li>
                <li class='<?php echo $contact_class; ?>'>
                    <a href="contact.php">Contact</a>
              </li>
      
     
          <li class=" navigation-header"><span data-i18n="nav.category.support">Support</span><i data-toggle="tooltip" data-placement="right" data-original-title="Support" class="icon-ellipsis icon-ellipsis"></i>
          </li>
          <li class=" nav-item"><a href="https://github.com/pixinvent/robust-free-bootstrap-admin-template/issues"><i class="icon-support"></i><span data-i18n="nav.support_raise_support.main" class="menu-title">Raise Support</span></a>
          </li>
          <li class=" nav-item"><a href="https://pixinvent.com/free-bootstrap-template/robust-lite/documentation"><i class="icon-document-text"></i><span data-i18n="nav.support_documentation.main" class="menu-title">Documentation</span></a>
          </li>
        </ul>
      </div>
    </div>