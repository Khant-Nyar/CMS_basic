<?php ob_start(); ?>
<?php include_once"database.php" ?>
<?php include_once"layout/header.php" ?>

    <!-- Navigation -->
    <?php include_once"layout/navigation.php" ?>

       
            
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
            <?php

            //$par_page = 5;
            if(isset($_GET['page'])){
                $page =$_GET['page'];
            } else{
                $page = '';
            }
            if($page==''||$page==1){
                $page_one = 0;
            }else{
                $page_one = ($page*5)-5;
            }
            
            $index = $_SERVER['REQUEST_URI'];
            if($index == '/php_lesson/cmsinstitute/' || $index == '/php_lesson/cmsinstitute/index.php'){
                $x = 1;
                $page = $x;
                header("location:index.php?page=$x");
            }             
                $query="SELECT * FROM posts WHERE post_status='public'";
                $Find_count = mysqli_query($connect,$query);
                $count = mysqli_num_rows($Find_count);
                $count = ceil($count/5);

                $query="SELECT * FROM posts WHERE post_status='public' LIMIT $page_one,5";
                $result=mysqli_query($connect,$query);
                while($row=mysqli_fetch_assoc($result)){
                    $post_id=$row['post_id'];
                    $post_title=$row['post_title'];
                    $post_author=$row['post_author'];
                    $post_date=$row['post_date'];
                    $post_image=$row['post_image'];
                    $post_content=substr($row['post_content'],0,180)."....";
            ?>
                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?post_id=<?php echo $post_id?>"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="author.php?author=<?php echo $post_author ?>&post_id=<?php echo $post_id ?>"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                <hr>
                <a href="post.php?post_id=<?php echo $post_id?>"><img class="img-responsive" src="image/<?php echo $post_image ?>" alt=""></a>
                <hr>
                <p><?php echo $post_content ?></p>
              
                <a class="btn btn-primary" href="post.php?post_id=<?php echo $post_id?>">Read More 
                    <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                <?php 
                   } 
                 ?>

                <!-- Pager -->
                <ul class="pager">
                    <?php 
                        for ($i = 1; $i <= $count; $i++){
                            if($page > $i){
                                echo "<li class='previous'>
                        <a href='#'>&larr; Previous</a>
                    </li>";
                            }else{
                                echo "";
                            }
                            if($i==$page){  
                                echo "<li><a href='index.php?page=$i' class='active_link'>$i</a></li>";
                            }else{
                                echo " <li><a href='index.php?page=$i' class='other_link'>$i</a></li>";
                            }
                        };
                     ?>
                    <li class="next">
                        <a href="#">Next &rarr;</a>
                    </li>
                </ul>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">
                 <?php include_once"layout/sidebar.php" ?>

                <!-- Blog Search Well -->
                

            </div>

        </div>
        <!-- /.row -->

        <hr>

    <?php include_once"layout/footer.php" ?>

                <!-- Pager -->

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4" style="position: sticky; top:60px;">
                 <?php include_once"layout/sidebar.php" ?>

                <!-- Blog Search Well -->
                

            </div>

        </div>
        <!-- /.row -->

        <hr>

    <?php include_once"layout/footer.php" ?>