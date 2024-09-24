<?php

require_once( "../pw/.htpasswd" );

//turn error on
error_reporting( E_ALL);
ini_set( 'display_errors', 'On');


if( isset( $_POST['deleteid'] )) {
	
	// a button has been clicked
	//delete the selected game
	$delquery = "delete from inventory where id=".$_POST['deleteid'];
	mysqli_query( $db, $delquery ) or die( "Error deleting game -> ".mysqli_error( $db ) );
	
}

?>




<html>
<head>
<title></title>

<style type="text/css">

body {
	background-image: url("http://newton.ncc.edu/gansonj/ite254/img/152587.jpg");
	font-family: arial;
	color: #454F8C;
}

#contentwrap {
	background: #FFFFFF;
	background-image: url("https://newton.ncc.edu/gansonj/ite254/img/spyro.jpg");
	background-repeat: no-repeat;
	background-position: right 150;	
	border: 8px #FF9E01 solid;
	padding: 20px;
	width: 800px;
	margin: 20px auto 0px auto;
	border-radius: 25px;
	min-height: 400px;
}

#heading {
	font-size: 1.75em;
	border-bottom: 6px #484452 double;
	padding: 10px 0px 10px 0px;
	text-align: center;
	margin-bottom: 20px;
}

.bottomdiv {
 	margin-bottom: 15px;
 }
 
 .spacer {
	margin-bottom: 10px;
 }
 /
 	color: red;
 	background-color: lightblue;
 }
 
tr:nth-child(even) {
	background: #CCC
}
tr:nth-child(odd) {
	background: #FFF
}
 </style>
 
 <script type="text/javascript">
 
 function confirmDelete( gamename ) {
	 
	 return confirm( "Are you sure you want to delete" + gamename + ";" );
	 
 }
 
 </script>

</head>

<body>

<div id="contentwrap">

	<div id="heading">Video Game Inventory Management Page</div>
	
	
	<div style="margin-bottom: 12px;">
		
		<a href="add_new_game.php">Add new Game</a>
		
	</div>
	
	<div> <!-- table goes here -->
	
		<table border="3" width="100%">
			<tr>
				<td>Game Title</td>
				<td>Console</td>
				<td>Quantity</td>
				<td>Action</td>
			</tr>
			
			<?php
			
			$gamequery = "select * from inventory";
			$game_results = mysqli_query( $db, $gamequery ) or die( "Error getting games -> ".mysqli_error( $db ) );
			
			
			for( $i = 0; $i < mysqli_num_rows ( $game_results ) ; $i++ ) {
				
				$game_data = mysqli_fetch_array( $game_results );
				
				echo "<tr>\n";
				
				echo "<td>". $game_data['title'] ."</td>\n";
				
				echo "<td>";
				
				// get the console name from the consoles table
				$conquery = "select * from consoles where id=". $game_data['consoleid'];
				
				$con_result = mysqli_query( $db, $conquery ) or die( "Error gettind console -> ".mysqli_error( $db ) );
				$con_data = mysqli_fetch_array( $con_result );
				
				
				echo $con_data['company']." ".$con_data['console_name'];
				
				echo "</td>\n";
				
				echo "<td>". $game_data['quantity'] ."</td>\n";
				
				echo "<td>";
				
				// buttons go here
				echo "<form onSubmit='return confirmDelete(\"".$game_data['title']."\")' method='post' action='".$_SERVER['PHP_SELF'] ."'>\n";
				
				echo "<input type='submit' value='Delete Game'>\n";
				
				echo "<input type='hidden' name='deleteid' value='".$game_data['id']."'>\n";
				
				echo"</form>\n";
				
				echo"</td>\n";
				
				echo "</tr>\n";
				
				
			} // ends FOR LOOP
			
			?>
			
		</table>	
			
			
			
	
				
	</div>	
	
</div> <!-- ends div#contentwrap -->

</body>
</html>



