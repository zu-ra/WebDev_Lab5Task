<!DOCTYPE html> 
<html lang="en"> 
<head> 
		<title>Lab 5a Q2</title>
    <style>
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center; 
        }
        th {
            background-color: #f2f2f2;
        }
    </style> 
</head> 
<body> 
		<?php  
            $students = [
                [
                    'name' => 'Alice',
                    'program' => 'BIP',
                    'age' => 21
                ],
                [    
                    'name' => 'Bob',
                    'program' => 'BIS',
                    'age' => 20
                ],
                [    
                    'name' => 'Raju',
                    'program' => 'BIT',
                    'age' => 22
                ],

            ];
		?> 

		<table>
			<tr>
            	<th><b>Name</b></th>
            	<th><b>Program</b></th>
                <th><b>Age</b></th>
        	</tr>
            <?php
            foreach ($students as $stn){
                echo "<tr>";
                echo "<td>{$stn['name']}</td>";
                echo "<td>{$stn['program']}</td>";
                echo "<td>{$stn['age']}</td>";
                echo "</tr>"; 
            }
            ?>
		</table> 
</body> 
</html>
