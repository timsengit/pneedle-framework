<?php


namespace model\test;


class Test
{
    private $database;

    function __construct()
    {
        // Initialize
        $this->database = new Medoo([
            'database_type' => 'mysql',
            'database_name' => 'test',
            'server' => '192.168.1.1',
            'username' => '1',
            'password' => '1'
        ]);
    }

    function add(){
        // Enjoy
        $this->database->insert('test', [
            'user_name' => 'foo',
            'email' => 'foo@bar.com'
        ]);

    }

    function list(){
        $data = $this->database->select('test', [
            'user_name',
            'email'
        ], [
            'user_id' => 50
        ]);
        return $data;
    }
}