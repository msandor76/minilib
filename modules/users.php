<?php
$sql = "SELECT * FROM user";
$queryArr = DB::query($sql);

foreach($queryArr as $row){
	echo $row["name"]." - ".$row["email"]." - ".$row["telephone"]."<br>";
}
?>
