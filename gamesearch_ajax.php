<?php

// establish communication with MySQL
require_once( "../pw/.htpasswd" );

$query = "select * from inventory where title like '". $_POST['gamename'] ."%'";
	
$results = mysqli_query( $db, $query )
	or die( "Error getting games ". mysqli_error( $db ) );
	
if( mysqli_num_rows( $results ) == 0 ) 
	echo "<div style='color: red;font-size:1.5em;'>No Matches Found!!!</div>";
else {
	
	for( $i = 0; $i < mysqli_num_rows( $results ); $i++ ) {
		
		$game_data = mysqli_fetch_array( $results );
		echo "<div>Title : ". $game_data['title'] ."</div>";	
	}
}
?>