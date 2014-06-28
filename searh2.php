<?php

    /* call this script "this.php" */

    if ($c != 1) {

?>

<form action="search1.php?c=1">

<input type="text" name="keyword">

<input type="submit" value="Search!">

</form>

<?php

    } else if ($c==1) {

        MySQL_connect("hostname", "username", "password");

        MySQL_select_db("database");

        $sql = "

            SELECT *,

                MATCH(title, body) AGAINST('$keyword') AS score

                FROM articles

            WHERE MATCH(title, body) AGAINST('$keyword')

            ORDER BY score DESC

        ";

        $res = MySQL_query($sql);

?>

<table>

<tr><td>SCORE</td><td>TITLE</td><td>ID#</td></tr>

<?php

        while($row = MySQL_fetch_array($rest)) {

            echo "<tr><td>{$sql2['score']}</td>";

            echo "<td>{$sql2['title']}</td>";

            echo "<td>{$sql2['id']}</td></tr>";

        }

        echo "</table>";

    }

?>

