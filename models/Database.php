<?php
class Database
{
    public static function connect()
    {
        $host = "localhost";
        $user = "root";
        $pass = "";
        $dbname = "moduleconnexion";

        $conn = new mysqli($host, $user, $pass, $dbname);

        if ($conn->connect_error) {
            die("Erreur de connexion : " . $conn->connect_error);
        }

        return $conn;
    }
}
