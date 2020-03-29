<html>
    <head>
        <title>Learning database</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <div id="header">
        <form>
        <button>log Out
        </button>
       
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

       <form action="result.php" method="post">
            <input type="text" name="valueToSearch" placeholder="Value To Search">
            <input type="submit" name="search" value="Filter">

       </form>
</div>
    
        </div>


<div class="post_area">

<?php
if(isset($_GET['post'])){
		
    $post_id = $_GET['post'];

$get_posts = "select * from insert_post1 where post_id='$post_id'";
$run_posts = mysqli_query($con, $get_posts); 
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
   
   <h2>$post_title</h2>

   <div style='font-size: 26px;
   font-weight: 700;'>$post_author</div>
<br/>
<center>
   <img src='admin/news_images/$post_image' width='52%' height='50%'>
</center>
<br/>


<div style='font-size: 18px;
font-weight: 400;
font-style: italic;'>$post_content</div>
<br/>
   <div style='font-style: normal;
   font-weight: 100;
   font-size: 16px;'> $post_date</div><br/>";

}
}

?>   

</div>



<div class="side_area">
  
<div id="start">SOCIAL BUTTONS

</div>
<br/><center>
<img src="admin/images/facebook.gif">&nbsp;&nbsp;
<img src="admin/images/google.png">&nbsp;&nbsp;
<img src="admin/images/pin.png">&nbsp;&nbsp;
<img src="admin/images/twitter.png">
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
  <h4><a id='side_a_tag' href='details.php' >$post_title</a></h4>
  
   <img style='margin-top: -9%;' src='admin/news_images/$post_image' width='50%' height='14%'>

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