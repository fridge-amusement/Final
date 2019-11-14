<?php 
							//include 'admin/database.php';
	$pdo = Database::connect();
	$sql = 'select * from attractions LIMIT 10';
	foreach ($pdo ->query($sql) as $row) {
		echo '<li><a href="attraction.php?id='.$row['attraction_ID'].'">'.$row['attraction_name'].'</a></li>';
	}
?>			