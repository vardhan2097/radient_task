<?php

echo "Printing 1 Pattern \n";

function hash_func($n)
{
    // Outer loop to handle number
    for($i=0; $i<$n; $i++)
    {   
        for($j=$n; $j>$i; $j--)
        {  
            echo "#";  
        }  
        echo "\n";  
    }  
}
  
$n = 5;
hash_func($n);

echo "\n\n\n\nPrinting 2 Pattern  \n";

function side_tri($len)
{
  
    $mid_point=ceil($len/2);
    for($i=1;$i<=$mid_point;$i++)
    {
        for($j=1;$j<=$i;++$j) 
        {
           echo "#";
        }
        echo "\n";
    }
      
    for($i=$mid_point;$i>=1;$i--)
    {
        for($j=1;$j<$i;++$j) 
        {
            echo "#";
        }
        echo "\n";   
    }
}

echo side_tri(7);


?>