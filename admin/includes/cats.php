
<div class="post_area">

<?php

if(isset($_GET['cat'])){
    $cat_id =$_GET['cat'];

$get_posts="select * from insert_post1 where category_id='$cat_id'";

$run_posts=mysqli_query($con,$get_posts);
while($row_posts=mysqli_fetch_array($run_posts))
{

    $post_id=$row_posts['post_id'];
    $post_title=$row_posts['post_title'];
    $post_date=$row_posts['post_data'];
    $post_author=$row_posts['post_author'];
    $post_image=$row_posts['post_image'];
    //$post_content=substr($row_posts['post_content'],0,100);
    $post_content=$row_posts['post_content'];

   echo"
   
   <h2><a id='post_a' href='details.php?post=$post_id'>$post_title</a> </h2>

   <div style=' font-style: italic;
   font-size:20px;
   font-weight: 600'>$post_author</div>
<br/><br/><br/>

   <div style='padding-left: 28%;'>$post_content <a id='rmlink' href='details.php?post=$post_id'>Read More</a></div><br />
<br/>
   <img style='margin-top: -18%;
   width: 25%;
   height: 20%;' src='admin/news_images/$post_image'>
<br/><br/>
   <div style='font-style: italic;
   text-shadow: 0 0 black;
   font-weight: 600'> $post_date</div><br/>   
   ";

}

}
?>   

</div>

