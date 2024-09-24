<?php

// turn error reporting on, comment out when finished
error_reporting(E_ALL);
ini_set('display_errors','On');

require_once( "../pw/.htpasswd" );
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
	background-image: url("http://newton.ncc.edu/gansonj/ite254/img/spyro.jpg");
	background-repeat: no-repeat;
	background-position: right 150;	
	border: 8px #FF9E01 solid;
	padding: 20px;
	width: 650px;
	margin: 20px auto 0px auto;
	border-radius: 25px;
	min-height: 400px;
}

#heading {
	font-size: 2.2em;
	border-bottom: 6px #484452 double;
	padding: 10px 0px 10px 0px;
	text-align: center;
	margin-bottom: 20px;
}
 
.spacer {
	margin-bottom: 10px;
 }
 
#menu {
	background-color: lightblue;
	color: red;
	padding: 5px;
	width: 225px;
	border: 3px red double;
}

#button {
	background-color: red;
	color: yellow;
	padding: 6px;
	border: 2px #000000 solid;
	cursor: pointer;
	font-weight: bold;
}

#button:hover {
	background-color: yellow;
	color: maroon;
	border: 2px #000000 solid;
	cursor: pointer;
}

#nogames {
		color: red;
		font-size : 17;
}
 </style>
 
</head>
<body>

<div id="contentwrap">

	<div id="heading">Search Games by Console</div>
	
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	
	<div class="spacer">Select a console</div>
	
	<div class="spacer">
	
		<select name="consoleid" id="menu">
	
		<?php	
		// build option tags using data from db
		$conquery = "select * from consoles";
		
		$con_results = mysqli_query( $db, $conquery )
			or die( "Error getting consoles -> ". mysqli_error( $db ) );
	
		for( $i = 0; $i < mysqli_num_rows( $con_results ); $i++ ) {
			
			$con_data = mysqli_fetch_array( $con_results );
			
			echo "<option value='". $con_data['id'] ."'";
			
			if( isset( $_POST['consoleid'] )) { 
			
				if( $_POST['consoleid'] == $con_data['id'] ) 
				echo " selected";
			}
			echo ">";
			echo $con_data['company'] ." ". $con_data['console_name'];
			echo "</option>\n";
			
			
		}	
		?>
		
		</select>
	
	</div>
	
	<div>
		<input type="submit" value="Search Consoles">
	</div>
	
	
	
	</form>
	
	<?php
	if( isset( $_POST['consoleid'] ) ) {
		
		$gamequery = "select * from inventory where consoleid =". $_POST['consoleid']; 
		
		$game_results = mysqli_query( $db, $gamequery ) or die( "Error getting games -> ".mysqli_error( $db ) ) ;
		
		if( mysqli_num_rows ($game_results ) == 0 ) {
			
			// no games found
			echo "<div id='nogames'>No matches found for the selected console!<div>";

		}
		else {
			//games found
			for(  $i = 0; $i < mysqli_num_rows( $game_results); $i++ ) {
				
				$game_data = mysqli_fetch_array(  $game_results );
				
				echo "<div>". $game_data['title'] ."</div>\n";
				
			}
			
		}
			
	}
	
	
	?>
	
	
	
	
	
</div> <!-- ends div#contentwrap -->

</body>
</html>


