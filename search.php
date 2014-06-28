<?php
  if(isset($_POST['submit'])){
  require_once('connect_db.php');
  if(isset($_GET['go'])){
  if(preg_match("/^[  a-zA-Z]+/", $_POST['search'])){
  $query=$_POST['search'];
  //connect  to the database
 
  //-query  the database table
  $sql="SELECT (word,meang,lang) FROM words WHERE MATCH (word,meang,lang) AGAINST("$query")";
  //-run  the query against the mysql query function
  $result=@mysqli_query($dbc,$sql);
  //-create  while loop and loop through result set
  while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
          
          $word=$row['search'];
          $lang=$row['search'];
          
  //-display the result of the array
  echo "<ul>\n";
  echo "<li>" . "<a  href=\"search.php?id=$word_id\">"   .$word. " </a></li>\n";
  echo "</ul>";
  mysqli_free_result($result);
  }
  }
  else{
  echo  "<p>Please enter a search query</p>";
  }
  }
  }
?>