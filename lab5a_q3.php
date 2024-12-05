<!DOCTYPE html> 
<html lang="en"> 
<head> 
		<title>Lab 5a Q3</title>
</head> 
<body> 
	<?php  
        function calculateArea($w, $l) {
            return $w * $l;
        }

        $width = 4;
        $length = 2;

        $area = calculateArea($width, $length);

        echo "<p><b>The area of a rectangle with a width of $width and $length is $area</b></p>";
	?> 

</body> 
</html>