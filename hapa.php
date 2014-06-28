<html>
<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("dictionary",$con);
if(isset($_POST["search"]))
{
	$sq="%".$_POST["txt1"]."%";
	/*$q1=mysql_query("select * from words where word like '$sq' ",$con);*/
	$q2="SELECT * FROM words WHERE MATCH (word,lang) AGAINST('$sq')";
	$q1=@mysql_query($q2,$con);
	
	while($q2=mysql_fetch_array($q1))
	{
		echo $q2["word"];
		echo $q2["meang"];
		echo $q2["lang"];
	}
}
?>
<body>
<form name="frm1" action="hapa.php" method="post">
<input type="text" name="txt1">
<input type="submit" value="Search" name="search">
</form>
</body>
</html>