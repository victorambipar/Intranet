<?php

    function connection_db()
    {
        $database = mysqli_connect("localhost","root","mysql","intranet");
        mysqli_set_charset($database,"utf8");
        return $database;//teste
    }

?>