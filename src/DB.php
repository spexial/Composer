<?php

namespace Spexial\Iwunan;

class DB
{
    private $from;
    private $host='localhost';
    private $user='root';
    private $pwd='root';
    private $dbname='laravel';
    private $port=3306;
    private $charset='utf8';
    private $query;

    /**
     * DB constructor.
     *
     */
    public function __construct()
    {
        $dsn = "mysql:host=$this->host;dbname=$this->dbname";
        try {
            $this->db = new \PDO($dsn, $this->user, $this->pwd);
            $this->db->exec("use $this->dbname");
        } catch (\PDOException $e) {
            die ($e->getMessage());
        }

    }
    public function table($table)
    {
        $this->from = $table;
        return $this;
    }
    public function select($data)
    {
        $sql = 'select ' . $data . ' from ' . $this->from;
        $this->query = $this->db->query($sql);
        return $this;
    }
    public function first()
    {
        $result = $this->query->fetch(\PDO::FETCH_ASSOC);
        return $result;
    }
    public function get()
    {
        $result = $this->query->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }
}