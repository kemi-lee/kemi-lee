<?php

// establish communication with MySQL
require_once( "../pw/.htpasswd" );

$query = "select * from inventory where id ". $_POST['gameid'];
	
$results = mysqli_query( $db, $query )
	or die( "Error getting games ". mysqli_error( $db ) );

$game_data = mysqli_fetch_array( $results );
echo "<div class='spacer' style='font-weight:bold;color: red;'>Game Details</div>";	
echo "<div>Title : ". $game_data['title'] ."</div>";	
echo "<div>Cost : $". $game_data['cost'] ."</div>";	
echo "<div>Genre : ". $game_data['genre'] ."</div>";	

?>