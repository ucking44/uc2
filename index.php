<?php include "includes/db.php"; ?>

<?php include "includes/header.php"; ?>

<?php include "includes/navigation.php"; ?>

     <!-- Navigation -->

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                
<?php

                
$per_page = 2;          
                
if(isset($_GET['page'])) {
    
    
    
$page = $_GET['page'];    
    
} else {
    
    
$page = "";    
    
}
                
if($page == "" || $page == 1) {
    
$page_1 = 0;    
    
} else {
    
$page_1 = ($page * $per_page) - $per_page;    
    
}               
                
                
$post_query_count = "SELECT * FROM posts";
$find_count = mysqli_query($connection, $post_query_count);
$count = mysqli_num_rows($find_count); 
                
$count = ceil($count / $per_page);                
                
                
                    
$query = "SELECT * FROM posts LIMIT $page_1, $per_page";
$select_all_posts_query = mysqli_query($connection, $query);
                    
while($row = mysqli_fetch_assoc($select_all_posts_query)) {
    $post_id = $row['post_id'];
    $post_title = $row['post_title'];
    $post_author = $row['post_author'];
    $post_date = $row['post_date'];
    $post_image = $row['post_image'];
    $post_content = substr($row['post_content'],0,50);
    $post_status = $row['post_status'];
                          
    if($post_status == 'published') {
    //if($post_status !== 'published') //{
        
        //echo "<h1 class='text-center'> NO POST </h1>";
        
        
//}   //else {
        

    
?>    
       
                <h1><?php echo $count ?></h1>

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="author_posts.php?author=<?php echo $post_author ?>&p_id=<?php echo $post_id; ?>"><?php echo $post_author ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date ?></p>
                <hr>
                
                <a href="post.php?p_id=<?php echo $post_id; ?>">
                <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">  </a>
          
                
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

<?php }  } //} ?>                     
                   
                
                
                
                <!-- Second Blog Post -->
                
    <!--            <h2>
                    <a href="#">Blog Post Title</a>
                </h2>
                <p class="lead">
                    by <a href="index.php">Start Bootstrap</a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on August 28, 2013 at 10:45 PM</p>
                <hr>
                <img class="img-responsive" src="http://placehold.it/900x300" alt="">
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam, quasi, fugiat, asperiores harum voluptatum tenetur a possimus nesciunt quod accusamus saepe tempora ipsam distinctio minima dolorum perferendis labore impedit voluptates!</p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr> -->

                <!-- Third Blog Post -->
  <!--              <h2>
                    <a href="#">Blog Post Title</a>
                </h2>
                <p class="lead">
                    by <a href="index.php">Start Bootstrap</a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on August 28, 2013 at 10:45 PM</p>
                <hr>
                <img class="img-responsive" src="http://placehold.it/900x300" alt="">
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate, voluptates, voluptas dolore ipsam cumque quam veniam accusantium laudantium adipisci architecto itaque dicta aperiam maiores provident id incidunt autem. Magni, ratione.</p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>  -->

                <!-- Pager -->
      <!--          <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>  -->

                
                
                
                
                
                
            </div>

            <!-- Blog Sidebar Widgets Column -->
            
            
           
   <?php include "includes/sidebar.php"; ?>         
            
            
        </div>
   <!--     </div> -->
        <!-- /.row -->

        <hr>
        
<ul class="pager">
        
<?php 
    
for($i =1; $i <= $count; $i++) {
  
if($i == $page) {
    
echo "<li '><a class='active_link' href='index.php?page={$i}'>{$i}</a></li>";        
    
} else {
    
echo "<li '><a href='index.php?page={$i}'>{$i}</a></li>";      
    
}    
    
    
}    
    
?>        
        
</ul>        
        
        

<?php include "includes/footer.php"; ?>
     