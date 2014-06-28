



<form action="search2.php?c=1">

<input type="text" name="keyword">

<input type="submit" name="submit" value="Search">

</form>

<?php


    /* call this script "this.php" */
if(isset($_POST['submit']))
    {
        if(isset($_GET['$c'])){
            
    if ($c != 1) {
        echo '<h1> error</h1>';

    } else if ($c==1) {

       require_once ('connect_db.php');
       $keyword1=$_POST['$keyword'];

       $sql="SELECT word,meang,lang FROM words WHERE MATCH (word,meang,lang) AGAINST('$keyword1')";
       $res = MySQLI_query($sql);
}}
?>

<table>

<tr><td>SCORE</td><td>TITLE</td><td>ID#</td></tr>

<?php

        while($row = MySQL_fetch_array($res)) {

            echo "<tr><td>{$sql['word']}</td>";

            echo "<td>{$sql['lang']}</td>";

            echo "<td>{$sql2['word_id']}</td></tr>";

        }

        echo "</table>";

    }

?>

