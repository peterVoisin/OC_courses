<?php

namespace Wamp\Blog\Model; 

class Manager
{
	protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=test2;charset=utf8', 'root', 'root');
        return $db;
    }
}