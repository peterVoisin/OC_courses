<?php
class DBFactory
{
  public static function getMysqlConnexionWithPDO()
  {
    $db = new PDO('mysql:host=localhost;dbname=oc_courses','root','root');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $db;
  }

  public static function getMysqlConnexionWithMySQLi()
  {
    return new MySQLi('localhost','root','root','oc_courses');
  }
}
