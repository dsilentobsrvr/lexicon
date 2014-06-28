<!DOCTYPE html>
<html>
<head>
<title>
words
</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>


<form id="wordenter"action="enterwords.php" method="post">
		<h5><em>Fill in the form</em></h5>

		<!--<label class="lbl">Word</label>--><input placeholder="Enter words" type="text" name="wrd" size="20" maxlength="30"/>
		<!--<label class="lbl">Meaning</label>--><br/><textarea   name="mng" rows="5" col="5">Enter the meaning,within 150 characters</textarea>
		<!--<label class="lbl">Language</label>--><br/><input type="text" placeholder="Enter the language" name="lang" size="20" maxlength="30"/>
		<input type="submit" name="submit" class="button" value="Enter" />
		<input id="submit" type="hidden" name="submitted" value="TRUE" />
		</form>
		

		
		<?php 
	if(isset($_POST['submitted']))
	{
	require_once ('connect_db.php');
	$errors=array();

	if(empty($_POST['wrd']))
	{
		$errors[]='Please enter the word';
	}
	else
	{
		$wrd=mysqli_real_escape_string($dbc,trim($_POST['wrd']));
	}
	if(empty($_POST['mng'])){
		$errors[]='Please enter the meaning';
	}
	else {
		$mng=mysqli_real_escape_string($dbc,trim($_POST['mng']));
	}
	if(empty($_POST['lang'])){
		$errors[]='Please enter the language';
	}
	else {
		$lang=mysqli_real_escape_string($dbc,trim($_POST['lang']));
	}

	if(empty($errors)){
		$q="INSERT INTO words(word_id,word,meang,lang) VALUES (NULL,'$wrd','$mng','$lang')";
		$r=@mysqli_query($dbc,$q);
		if($r){
			echo '<p class="thanku">The words has been successfully stored in the database.</p>';
}
else {
	echo '<h1>error</h1>';
	echo '<p>'.mysqli_error($dbc).'<br/>query'.$q.'</p>';
}
mysqli_close($dbc);
exit();
}
else{
	echo '<div id="error"><h3> Error!</h3>';
	foreach($errors as $msg){
		echo "$msg<br/>";
		}
		echo '<p>Please try again</p></div>';
}
mysqli_close($dbc);
}


?>


<ul class="nav">
				<li><a href="index.php">Home</a></li>
				<li><a href="aboutus.html">About</a></li>
				<li><a href="enterwords.php" target="_blank">Enter words </a></li>
				<!--<li><a href="testwords.php" target="_blank">View words</a> </li>-->
</ul>

</body>
</html>