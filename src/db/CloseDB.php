<?php
$conn = null;

function closeDB($conn){
	mysqli_close($conn);
}
?>