<?php

namespace App\Db;

use \PDO;
use \PDOException;

class Database{

  /**
   * host
   * @var string
   */
  const HOST = 'localhost';

  /**
   * database name
   * @var string
   */
  const NAME = 'hotel';

  /**
   * user
   * @var string
   */
  const USER = 'root';

  /**
   * password
   * @var string
   */
  const PASS = '';

  /**
   * table name
   * @var string
   */
  private $table;

  /**
   * PDO
   * @var PDO
   */
  private $connection;

  /**
   * table and instance
   * @param string $table
   */
  public function __construct($table = null){
    $this->table = $table;
    $this->setConnection();
  }

  /**
   * method responsable to create a connection with database
   */
  private function setConnection(){
    try{
      $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME,self::USER,self::PASS);
      $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
      die('ERROR: '.$e->getMessage());
    }
  }

  /**
   * method responsable to execute query in database
   * @param  string $query
   * @param  array  $params
   * @return PDOStatement
   */
  public function execute($query,$params = []){
    try{
      $statement = $this->connection->prepare($query);
      $statement->execute($params);
      return $statement;
    }catch(PDOException $e){
      die('ERROR: '.$e->getMessage());
    }
  }

  /**
   * method responsable to insert date in database
   * @param  array $values [ field => value ]
   * @return integer ID inserido
   */
  public function insert($values){
    //QUERY DATA
    $fields = array_keys($values);
    $binds  = array_pad([],count($fields),'?');

    //QUERY
    $query = 'INSERT INTO '.$this->table.' ('.implode(',',$fields).') VALUES ('.implode(',',$binds).')';

    //EXECUTE INSERT
    $this->execute($query,array_values($values));

    //RETURN ID
    return $this->connection->lastInsertId();
  }

  /**
   * method responsable to search in database
   * @param  string $where
   * @param  string $order
   * @param  string $limit
   * @param  string $fields
   * @return PDOStatement
   */
  public function select($where = null, $order = null, $limit = null, $fields = '*'){
    //QUERY DATA
    $where = strlen($where) ? 'WHERE '.$where : '';
    $order = strlen($order) ? 'ORDER BY '.$order : '';
    $limit = strlen($limit) ? 'LIMIT '.$limit : '';

    //QUERY
    $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;

    //EXECUTE QUERY
    return $this->execute($query);
  }

  /**
   * method responsable to do updates in database
   * @param  string $where
   * @param  array $values [ field => value ]
   * @return boolean
   */
  public function update($where,$values){
    //QUERY DATA
    $fields = array_keys($values);

    //QUERY
    $query = 'UPDATE '.$this->table.' SET '.implode('=?,',$fields).'=? WHERE '.$where;

    //EXECUTE A QUERY
    $this->execute($query,array_values($values));

    return true;
  }

  /**
   * method responsable to delete data in database
   * @param  string $where
   * @return boolean
   */
  public function delete($where){
    //QUERY
    $query = 'DELETE FROM '.$this->table.' WHERE '.$where;

    //EXECUTe  QUERY
    $this->execute($query);

    return true;
  }

}