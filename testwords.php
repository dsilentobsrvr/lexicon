<html>
<head>
<title>
word lists
</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<style type="text/css">
div#box1{
	position: relative;
	top:10%;
	left:20%;

	min-width:40%;
	max-width: 60%;
	min-height:90px;
	max-height: 140px;
	border: 1px solid black;
	padding: 10px;
	margin:0;


}
.title{
	font-size:120%;
}
.lang{
	text-transform: uppercase;
	margin-left: 70px;

}
.para{
	font-size:100%;
	font-family: helvetica;
	margin-left: 70px;

}




</style>
</head>
<body>

<?php

 require_once ('connect_db.php');

///words list
	// Make the query:
$Q = "SELECT * FROM words ORDER BY word_id ASC";
$R = @mysqli_query($dbc, $Q); // Run the query.

// Count the number of returned rows:
$num = mysqli_num_rows($R);

if ($num > 0) { // If it ran OK, display the records.

	// Print how many users there are:

	/*echo '
	<tr><td class="border1" ><b>word_id</b></td><td class="border1"><b>word</b></td><td class="border1"><b>meaning</b></td>
	<td class="border1"><b>language</b></td></tr>';*/


	
	// Fetch and print all the records:
	while ($row = mysqli_fetch_array($R, MYSQLI_ASSOC)) {
			echo '<div id="box1"><span class="title"> <i>' .'('. $row['word_id'] .')<b>'. $row['word'] . '</i></b></span>
			<p class="para">' .$row['meang'] . '</p><span class="lang">' . $row['lang'] . '</span></div><br/>';
		
		
	}

       

	 // Close the table.
	
	mysqli_free_result($R); // Free up the resources.

} else { // If no records were returned.

	echo '<p class="error">There are currently no words in the database.</p>';

}

?>

</body>
</html>