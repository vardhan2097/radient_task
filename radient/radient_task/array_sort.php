<?php

    function twoWaySort(&$arr, $n)
    {
        $arr_o_count=0;
        $arr_e_count=0;

        for ($i = 0 ; $i < $n; $i++)
        {   
            if ($arr[$i] & 1) 
            {   
                $arr[$i] *= -1;
                $arr_odd[$arr_o_count] = $arr[$i];
                $arr_o_count++;
            }
            else
            {
                $arr_even[$arr_e_count] = $arr[$i];
                $arr_e_count++;
            }
        }

        echo 'even->';
        sort($arr_even);
        for ($i = 0 ; $i < $arr_e_count; $i++)
        {
            echo ' '.$arr_even[$i];
        }
       
        // Sort all numbers
        rsort($arr_odd);
        echo '<br>odd->';
        for ($i = 0 ; $i < $arr_o_count; $i++)
        {
            $arr_odd[$i] *= -1;
        }

        for ($i = 0 ; $i < $arr_o_count; $i++)
        {
            echo ' '.$arr_odd[$i];
        }
        
        $arr = array_merge($arr_even,$arr_odd);
    }
    
    // Driver code
    $arr = array(1, 9, 16, 4, 22, 31, 6, 19, 48, 3, 90, 61, 88 ,55, 27);
    
    $n = sizeof($arr);
    
    twoWaySort($arr, $n);
    
    echo '<br> sorted array <br>';
    for ($i = 0; $i < $n; $i++)
        echo $arr[$i] . " ";

?>