<?php

function connect(){
	$link=mysqli_connect('localhost','root','','chitor_db');
	if($link){
	}
	else{

		echo 'error in connection';
	}

	return $link;
}

?>