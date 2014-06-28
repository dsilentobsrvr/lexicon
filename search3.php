



<?php

 require_once ('connect_db.php');
    /* call this script "this.php" */
if(isset($_POST['submit']))
    {
        $keyword=$_POST['keyword'];

       $sql="SELECT word,meang,lang FROM words WHERE word LIKE '$keyword%'";
       $res = MySQLI_query($dbc,$sql);

?>

<table>

<tr><td>word</td><td>Meaning</td><td>Language</td></tr>

<?php

        while($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {

            echo '<tr><td>'.$row['word'].'</td>';

            echo '<td>'.$row['meang'].'</td>';

            echo '<td>'.$row['lang'].'</td></tr>';

        }

        echo '</table>';

    }

?>

