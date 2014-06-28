<?php

	if(isset($_POST['submitted']))
	{
	require_once ('connect_db.php');
	$errors=array();

	if(empty($_POST['search']))
	{
		$errors[]='Please enter the word';
	}
	else
	{
		$search=mysqli_real_escape_string($dbc,trim($_POST['search']));
	}
	if(empty($errors)){

///words list
	// Make the query:
$Q = "SELECT * FROM words WHERE word='$search%' ";
$R = @mysqli_query($dbc, $Q);
if($r){
			echo '<p> thank you</p>';
}
 // Run the query.

else {
	echo '<h1>error</h1>';
	echo '<p>'.mysqli_error($dbc).'<br/>query'.$q.'</p>';
}
mysqli_close($dbc);
exit();
}
else{
	echo '<h1> error</h1>';
	foreach($errors as $msg){
		echo "-$msg<br/>";
		}
		echo '<p>-please try again</p>';
}
mysqli_close($dbc);


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

}
?>