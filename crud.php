<?php

class ArticlesCrud
{

    private $connection;

    private $host = 'localhost';
    private $db = 'db_address_book';
    private $user = 'root';
    private $pass = '';

    public function __construct()
    {
        try
        {
            $this->connection = new PDO('mysql:host={$host};dbname={$db}', $user, $pass);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function add()
    {
        $this->connection->prepare();
    }

    public function view($id = null)
    {

    }

    public function edit($id = null)
    {

    }

    public function delete($id = null)
    {

    }

}
