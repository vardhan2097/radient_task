<?php
    //reading file by line, 1 iteration, 1 line
    echo 'Reading file Line by line<br><br>';
    $file_h = fopen("test_file.txt","r");
    while(!feof($file_h))
    {
        echo fgets($file_h);
        echo '<br>';
    }
    fclose($file_h);

    $file_h2 = fopen("test_file.txt","r");
    echo '<br><br>Reading file char by char<br>';
    while(!feof($file_h2)) 
    {  
        echo fgetc($file_h2);  
    }  
?>