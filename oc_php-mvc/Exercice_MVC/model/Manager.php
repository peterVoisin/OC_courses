<?php

namespace coursMVC\Blog\Model;

class Manager
{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=oc_courses;charset=utf8', 'root', 'root');
        return $db;
    }
}
