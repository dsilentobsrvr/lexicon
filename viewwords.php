<html>
<head>
<title>
word lists
</title>
<link rel="stylesheet" type="text/css" href="style.css" />
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
	echo "<div id='viewwords'><h1 style=text-align:center;/>words</h1>\n";
	echo '<table align="center"  >
	<tr><td class="border1" ><b>word_id</b></td><td class="border1"><b>word</b></td><td class="border1"><b>meaning</b></td>
	<td class="border1"><b>language</b></td></tr>';


	
	// Fetch and print all the records:
	while ($row = mysqli_fetch_array($R, MYSQLI_ASSOC)) {
			echo '<tr><td align="left">' . $row['word_id'] . '</td><td align="left"><b>' . $row['word'] . '</b></td><td class="words" >' .
			$row['meang'] . '</td><r><td align="left">' . $row['lang'] . '</td></tr>';
		
		
	}

        echo '</table></div>';

	 // Close the table.
	
	mysqli_free_result($R); // Free up the resources.

} else { // If no records were returned.

	echo '<p class="error">There are currently no words in the database.</p>';

}

?>
<ul class="nav">
				<li><a href="index.php">Home</a></li>
				<li><a href="#">About</a></li>
				<li><a href="enterwords.php" target="_blank">Enter words </a></li>
				<li><a href="testwords.php" target="_blank">View words</a> </li>
</ul>


</body>
</html>