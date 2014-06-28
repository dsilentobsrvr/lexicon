<html>
<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("dictionary",$con);
if(isset($_POST["search"]))
{
	$sq="%".mysql_escape_string($_POST["txt1"])."%";
	/*$q1=mysql_query("select * from words where word like '$sq' ",$con);*/
	$q1=@mysqli_query("SELECT * FROM words WHERE MATCH(word,lang) AGAINST('$sq')");
if($q1 === FALSE) {
    die(mysql_error()); // TODO: better error handling
}
	while($q2=mysql_fetch_array($q1,MYSQLI_ASSOC))
	{
		echo $q2["word"];
		echo $q2["meang"];
		echo $q2["lang"];
	}
}
?>
<body>
<form id="searchform" name="form1" action="lest.php" method="POST">
	<h1>LEXICON</h1>
	<h6><i>online dictionary</i></h6><br/>
	<input type="text" name="txt1" placeholder="Search here" size="30" maxlength="30"/>
	<input type="submit" name="search" class="button" value="Search">
</body>
</html>