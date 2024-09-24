<?php

require_once( "../pw/.htpasswd" );

?>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<script type="text/javascript">

$(document).ready( function() {

	$("#gameid").on( "change", function() {
		
		var gameid = $("#gaameid").val();
		
		$.ajax( {
			
			url : "game-details_ajax.php",
			type: "POST",
			data: "gameid=" + gameid,
			success: function( msg ) {
				
				$("#game-details").hide().html( msg ).show( "fade" );
			}
			
			
		} ); //ends ajax code
	
		
	} ); //ends change handler
	
} ); // ends document.ready

</script>
 	
	<form  action="javascript:void(0);">

		<div class="spacer">
			
				<?php
		
				$gamequery = "select * from inventory where consoleid='". $_POST['conid'] ."'  order by title";
				
				$game_results = mysqli_query( $db, $gamequery )
					or die( "Error getting games ->". mysqli_error( $db ) );
				
				if( mysqli_num_rows( $game_results ) == 0 ) {
		
					echo "<div style='color:red;'>No games in stock for this console</div>";
				}
				else {
		
					echo "<div class='spacer'>Select Game</div>";
					
					echo "<select id='gameid'>";
					
					for( $i = 0; $i < mysqli_num_rows( $game_results ); $i++ ) {
						
						$game_data = mysqli_fetch_array( $game_results );
						
						
						echo "<option value='". $game_data['id'] ."'>";
						echo $game_data['title'];
						echo "</option>\n";
						
					} // ends FOR loop
					
					echo "</select>\n";
					
				}
		
				?>
		
		</div>
	
	</form>

	<div id="game-details"></div>



