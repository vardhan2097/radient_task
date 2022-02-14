<?php
   if(isset($_FILES['image']))
   {
        $error_flag = 0;
        $f_name = $_FILES['image']['name'];
        $f_size =$_FILES['image']['size'];
        $f_tmp =$_FILES['image']['tmp_name'];
        $f_type=$_FILES['image']['type'];
        $f_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
        
        $extensions= array("jpeg","jpg","png");
        
        if(in_array($f_ext,$extensions)=== false)
        {    
            ?>
            <script>
                alert("Image Extension issue. Please choose a JPEG or PNG file");   
            </script>
            <?php
            $error_flag = 1;
        }

        if($f_size > 2097152)
        {    
            ?>
            <script>
                alert("Image has to be less then 2 MB");   
            </script>
            <?php
            $error_flag = 1;
        }
        
        if($error_flag == 0)
        {
            move_uploaded_file($f_tmp,"images/".$f_name);
            
            ?>
            <script>
                alert("Success");   
            </script>
            <?php
        }
        else
        {
            print_r($errors);
        }
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <body>
        <div class="container" style="align:center">
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="file" name="image" />
                <input type="submit"/>
            </form>
        </div>
    </body>
</html>

