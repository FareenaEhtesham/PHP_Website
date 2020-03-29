<html>
    <head>
        <title>Learning database</title>
        <link rel="stylesheet" href="style.css">
    </head>



    <body>
        <div id="header">
       
     </form>
       <ul id="navigation">
       <?php

include("admin/includes/insert.php");
$get_cats="select *from cat";
$run_cats=mysqli_query($con,$get_cats);

while($cats_row=mysqli_fetch_array($run_cats)){


    $cat_id=$cats_row['cat_id'];
    $cat_title=$cats_row['cat_title'];
    echo"<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";
    
}

?>

       </ul>

       <div >

       <form action="result.php" method="get" enctype="multipart/form-data">
            <input type="text" name="search_query" placeholder="Value To Search">
            <input type="submit" name="search" value="submit">

       </form>
</div>
    
        </div>

<!--Content area begins-->
<div class="post_area">



<?php

if(!isset($_GET['cat'])){

$get_posts="select * from insert_post1 order by rand() LIMIT 0,5";

$run_posts=mysqli_query($con,$get_posts);
while($row_posts=mysqli_fetch_array($run_posts))
{

    $post_id=$row_posts['post_id'];
    $post_title=$row_posts['post_title'];
    $post_date=$row_posts['post_data'];
    $post_author=$row_posts['post_author'];
    //$post_keyword=$row_posts['post_keyword'];
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


else{

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


}

?>   

</div>

<!--Content area ends-->

<div class="side_area">
  
<div id="start">SOCIAL BUTTONS

</div>
<br/><center>
<a href="#"><img src="admin/images/facebook.gif"></a>&nbsp;&nbsp;
<a href="#"><img src="admin/images/google.png"></a>&nbsp;&nbsp;
<a href="#"><img src="admin/images/pin.png"></a>&nbsp;&nbsp;
<a href="#"><img src="admin/images/twitter.png"></a>
</center>
<div>




</div>



<br/>

<div id="start">TOP STORIES</div>
<?php


$get_posts="select * from insert_post1 order by 1 DESC LIMIT 0,6";

$run_posts=mysqli_query($con,$get_posts);
while($row_posts=mysqli_fetch_array($run_posts))
{

    $post_id=$row_posts['post_id'];
    
    $post_title=$row_posts['post_title'];
    
    $post_image=$row_posts['post_image'];
    
   
   echo"
   <center>
  <h4><a id='side_a_tag' href='details.php?post=$post_id' >$post_title</a></h4>
  <br/>
   <img style='margin-top: -9%;' src='admin/news_images/$post_image' width='60%' height='14%'>

</center>
  ";

}

?> 


</div>

<div class="footer">
    this is footer
</div>
    </body>
</html>
