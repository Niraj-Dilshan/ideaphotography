<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand " href="index.html"><img src="./images/logo.png" height="35px" > </a>
        <?php 
         $result=$result=mysqli_query($connect,"SELECT * From users where active=1");
         $rowcount=mysqli_num_rows($result);
        ?>
    </div>  
    <!-- Top Menu Items -->
      <ul class="nav navbar-right top-nav">  <li><a href="">Users Online: <?php echo $rowcount; ?><span class="usersonline"></span></a></li>  
        <li>
                            <a href="./include/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
      </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->

        <ul class="nav navbar-nav side-nav ">
            <li class="p">
                <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
            </li>
             <li>
                <a href="siteeditor.php"><i class="fa fa-fw fa-edit"></i>Site Editor</a>
            </li>
            <li>
                <a href="orders.php"><i class="fa fa-fw fa-edit"></i> Orders</a>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#img_drop"><i class="fa fa-fw fa-file-image-o"></i> Image Silder <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="img_drop" class="collapse">
                    <li>
                        <a href="silder.php">View Photos in silder</a>
                    </li>
                    <li>
                        <a href="silder.php?source=add">Add Photos to silder</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#photos_drop"><i class="fa fa-fw fa-file-image-o"></i> Albums <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="photos_drop" class="collapse">
                    <li>
                        <a href="album.php">View All Albums</a>
                    </li>
                    <li>
                        <a href="album.php?source=add_album">Add a New album</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#posts_drop"><i class="fa fa-columns"></i> Blog Posts <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="posts_drop" class="collapse">
                    <li>
                        <a href="posts.php">View All Posts</a>
                    </li>
                    <li>
                        <a href="posts.php?source=add">Add Posts</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-user"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="demo" class="collapse">
                    <li>
                        <a href="users.php">View All users</a>
                    </li>
                    <li>
                        <a href="users.php?source=add_user">Add User</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="categories.php"><i class="fa fa-fw fa-wrench"></i> Categories</a>
            </li>

            <li>
                <a href="comments.php"><i class="fa fa-fw fa-comment"></i>Comments</a>
            </li>
            <li>
                <a href="support.php"><i class="fa fa-fw fa-life-ring" ></i>Support Requests</a>
            </li>

            <li>
                <a href="profile.php"><i class="fa fa-fw fa-cog" aria-hidden="true"></i>Profile</a>
            </li>
            <li><a href="../index.php"><i class="fa fa-fw fa-sitemap" aria-hidden="true"></i>Site</a></li> 
            <li><a href="../index.php">Blog</a></li>
        </ul>
 
    <!-- /.navbar-collapse -->
</nav>