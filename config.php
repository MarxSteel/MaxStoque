<?php
/* config.php */
function dbcon()
{
    @mysql_connect("localhost:8889", "root", "root") or die(mysql_error());
    @mysql_select_db("henry") or die(mysql_error());
}
?>