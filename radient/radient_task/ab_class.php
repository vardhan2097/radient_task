<?php
    abstract class P_class 
    {
        // Abstract method with an argument
        abstract protected function prefixName($name);
    }
      
    class C_class extends P_class 
    {
        public function prefixName($name) 
        {
            if ($name == "John Doe") 
                $prefix = "Mr.";
            elseif ($name == "Jane Doe") 
                $prefix = "Mrs.";
            else 
                $prefix = "";
          
            return "$prefix - $name";
        }
      }
      
      $class = new C_class;
      echo $class->prefixName("John Doe");
      echo "<br>";
      echo $class->prefixName("Jane Doe");
?>