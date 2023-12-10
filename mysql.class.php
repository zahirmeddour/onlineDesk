<?php

require_once("config.php");

class My
{
    private $db_host = "localhost";
    private $db_username = "root";
    private $db_password = "";
    private $db_name = "onlinedesktop";
    private $link = null;

    public function myqsldb_Connect()
    {
        $this->link = mysqli_connect($this->db_host, $this->db_username, $this->db_password, $this->db_name);
        if (!$this->link) {
            die ('Could not connect!' . mysqli_connect_error());
        }
    }

    public function mysqldb_query($SQLquery)
    {
        $query = mysqli_real_escape_string($this->link, $SQLquery);
        $result = mysqli_query($this->link, $query);
        if (!$result) {
            die ('Invalid query!');
        }
        return $result;
    }

    public function mysqldb_close()
    {
        mysqli_close($this->link);
    }
}
