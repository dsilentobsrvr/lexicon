<!DOCTYPE html>
<html>
<head>
<title>
Dictionary for the masses
</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<style type="text/css">
div#box1{
	position: relative;
	top:250px;
	left:38%;

	min-width:40%;
	max-width: 60%;
	min-height:90px;
	max-height: 140px;
	/*border: 1px solid black;*/
	padding: 10px;
	margin:0;


}
.searcherror{
	position: absolute;
	top:250px;
	left:40%;
	font: helvetica;
	font-size:120%;
	color:#cc3333;
	background-color:#ffcccc;
	padding:8px;
}
}
.title{
	font-size:150%;
	text-transform: uppercase;
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


.textfld{
	height:30px;
	border-radius: 5px;
	border:1px solid black;
	font-size: 100%;
	background-color: white;
	font-family: helvetica;
}





</style>
</head>
<body>
	<form id="searchform" name="form1" action="index1.php" method="POST">
	<h1>LEXICON</h1>
	<h6><i>The online dictionary</i></h6><br/>
	<input type="text" name="txt1" placeholder="search words/languages" size="30" class="textfld" maxlength="30"/>
	<input type="submit" name="search" class="button" value="Search">
	</form>
	<!--<input id="submit" type="hidden" name="submitted" value="TRUE" />-->
	<?php
	$con=mysql_connect("localhost","root","");
	mysql_select_db("dictionary",$con);


if(isset($_POST['search']))
{
	$sq=mysql_real_escape_string($_POST['txt1']);
	/*$q1=mysql_query("select * from list where  word like '$sq' ",$con);*/
	$q1=mysql_query("SELECT * FROM words WHERE MATCH (word,lang) AGAINST('$sq' IN BOOLEAN MODE)");
	$num = mysql_num_rows($q1);

if ($num > 0){

	
	while($q2=mysql_fetch_array($q1))
	{
		/*echo $q2["word"];
		echo $q2["meang"];*
		echo $q2["lang"];*/
		echo '<div id="box1"><span class="title"> <i>' .'('. $q2['word_id'] .')<b>'. $q2['word'] . '</i></b><hr width="300px"></span>
			<br/><p class="para"><span><em><b><u>Definition:</u></b></em></span>&nbsp;' .$q2['meang'] . '</p>
			<span class="lang"><b>' . $q2['lang'] . '</b></span></div><br/>';
	}
	mysql_free_result($q1);
	mysql_close($con);

}
else{
	echo'<span class="searcherror">No words found in the database</span>';
}
}


?>


	
	</p>
	</form>
	<div id="navigation">
	<ul class="nav">
				<li><a href="index.php">Home</a></li>
				<li><a href="aboutus.html" target="_blank">About</a></li>
				<li><a href="enterwords.php" target="_blank">Enter words </a></li>
				<!--<li><a href="testwords.php" target="_blank">View words</a> </li>-->
</ul>
</div>

	
	
	
</body>

</html>