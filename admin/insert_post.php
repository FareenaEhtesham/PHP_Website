
<html>
    <head>
        <title>Learning database</title>

    </head>
   
<body>


<form action="insert_post.php" method="POST" enctype="multipart/form-data">


<table>
<tr>
    <td><h1>Insert New Post</h1></td>
</tr>

<tr>

<td><b>Post Title:</b></td>
<td><input type="text" name="post_title"></td>
</tr>
<td><b>Post Category:</b></td>
<td>
<select name="cat">

<option>Select a category</option>

<?php

include("./includes/insert.php");
$get_cats="select *from cat";
$run_cats=mysqli_query($con,$get_cats);

while($cats_row=mysqli_fetch_array($run_cats)){


    $cat_id=$cats_row['cat_id'];
    $cat_title=$cats_row['cat_title'];
    echo "<option value='$cat_id'>$cat_title</option>";
}

?>

</select>

</td>


</tr><td><b>Post Author:</b></td>
<td><input type="text" name="post_author"></td>
</tr><td><b>Post Key Word:</b></td>
<td><input type="text" name="post_Keyword"></td>

</tr><td><b>Image:</b></td>
<td><input type="file" name="post_image"></td>
</tr><td><b>Post Content:</b></td>
<td>

 <textarea name="post_content" style="margin: 0px;
    height: 302px;
    width: 583px;"></textarea>

</td>

</tr>


<tr>
    <td><input type="submit" name="submit" value="publish Now">
</td>
</tr>
</table>


</form>

</body>   
</html>


<?php

if (isset($_POST['submit']))

{
     $post_title=$_POST['post_title'];
 
     $post_date=date('m-d-y');
     $post_cat=$_POST['cat'];
     $post_author=$_POST['post_author'];
     $post_keyword=$_POST['post_Keyword'];
     $post_image=$_FILES['post_image']['name'];
     $post_img_tmp=$_FILES['post_image']['tmp_name'];

     $post_content=$_POST['post_content'];

    if($post_title=='' OR $post_cat=='null' OR  $post_author=='' OR $post_keyword=='' OR $post_image=='' OR $post_content=='')
    {

    echo"<script>

alert('please fill all the fields');
</script>";
    exit();
}

    else {
        move_uploaded_file($post_img_tmp,"news_images/$post_image");

        $insert_post="insert into insert_post1 (category_id,post_title,post_data,post_author,post_keyword,post_image,
        post_content) values('$post_cat','$post_title','$post_date','$post_author','$post_keyword','$post_image','
        $post_content')";

       $run_posts=mysqli_query($con,$insert_post);


       
     
           echo"<script>alert('inserted')</script>";
       
       
       
       
        
        
    } 
        


}

?>