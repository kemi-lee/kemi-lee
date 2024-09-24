<!- stargate.ncc.edu ->
<!- http://stargate.ncc.edu/~aki6188.searchgames.php ->

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
background-position: 80% 150;
border: 8px #FF9E01 solid;
padding: 20px;
width: 800px;
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

.bottomdiv {
  margin-bottom: 15px;
 }
 
 .spacer {
margin-bottom: 10px;
 }
</style>

</head>
<body>

<div id="contentwrap">

	<div id="heading">Display Some Video Games in Inventory</div>

	<div>

	<?php



	$db = mysqli_connect( "localhost", "i254", "i254ka", "i254" );

	$query = "select * from inventory where title like '". $_POST['gamename'] ."%'";

	$results = mysqli_query( $db, $query )
		or die( "Error getting games ". mysqli_error( $db ) );


    for( $i = 0; $i < mysqli_num_rows( $results ); $i++ ) {

	$game_data = mysqli_fetch_array( $results );

	// query inventory and get games greater than 10 in quantity

	if( $game_data['quantity'] > 10 && $game_data ['rating '] < 7 ) {
		
		// print records
		echo "<div>Number of games > 10 is". $game_data. "</div>";
		echo "<div>Title of game is ". $game_data['title']."</div>";
		echo "<div>Quantity in stock is " $game_data['quantity']."</div>";
		echo "<div style='color:green;'>With a critic score of ".$game_data['rating']. ",this game is a hot pick</div>";

	}

	else if ( $game_data['quantity'] < 10 && $game_data ['rating '] > 7 ) {
		
		echo "<div>Number of games > 10 is". $game_data. "</div>";
		echo "<div>Title of game is ". $game_data['title']."</div>";
		echo "<div>Quantity in stock is " $game_data['quantity']."</div>";
		echo "<div style='color:red;'>With a critic score of ".$game_data['rating']. ",this game is not hot!!</div>";
	}






	?>

</div>

</div> <!-- ends div#contentwrap -->

</body>
</html>



