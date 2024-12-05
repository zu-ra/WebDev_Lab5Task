<!DOCTYPE html> 
<html lang="en"> 
<head> 
		<title>Lab 5a Q1</title> 
</head> 
<body> 
		<?php  
			$name = "Zulhafif Bin Zulkifle"; 
			$matric = "CI220006"; 
			$course = "BIM"; 
			$yearStudy = 3; 
			$address = "A-317, Felda Melati Jengka Sebelas, 26400 Bandar Jengka, Pahang."; 
		?> 
		<table>
			<tr>
            	<th><b><em>Details</em></b></th>
            	<th><b><em>Information</em></b></th>
        	</tr> 
			<tr> 
				<td><b>Name</b></td> 
				<td><?php echo "$name"; ?></td>  
			</tr> 
			<tr> 
				<td><b>Matric Number</b></td> 
				<td><?php echo "$matric"; ?></td>  
			</tr> 
			<tr> 
				<td><b>Course</b></td> 
				<td><?php echo "$course"; ?></td>  
			</tr> 
			<tr> 
				<td><b>Year of Study</b></td> 
				<td><?php echo "$yearStudy"; ?></td>  
			</tr> 
			<tr> 
				<td><b>Address</b></td> 
				<td><?php echo "$address"; ?></td>  
			</tr> 
		</table> 

</body> 
</html>
