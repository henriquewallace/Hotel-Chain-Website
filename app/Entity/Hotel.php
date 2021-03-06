<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class Hotel{

  /**
   * ID
   * @var integer
   */
  public $id;

  /**
   * NAME
   * @var string
   */
  public $name;

  /**
   * AMENITIES
   * @var string
   */
  public $description;

  /**
   * CITY
   * @var string
   */
  public $city;

  /**
   * ROOM TYPE
   * @var string(s/p)
   */
  public $standard;

  /**
   * STATUS
   * @var string(y/n)
   */
  public $opened;


  /**
   * method responsable to register an hotel in database
   * @return boolean
   */
  public function register(){
   // consult if the register already exists
   // var_dump($this->name);// show variable data or data array
   //die();// stop the execution

   $host = 'localhost';
   $database = 'hotel';
   $port = '3306';
   $user = 'root';
   $pass = '';

   $pdo = new PDO('mysql:host=' . $host . ';dbname=' . $database . ';port=' . $port, $user, $pass);
    
   /* Select queries return a resultset */
   $search = $pdo->prepare("SELECT name FROM hotel WHERE name = ? and city = ?");
   $search->bindValue(1, $this->name);
   $search->bindValue(2, $this->city);
   $search->execute();
    
    $result = $search->rowCount();
    if($result > 0){
      header('location: index.php?status=error');
    }
    else{
      $obDatabase = new Database('hotel');
      $this->id = $obDatabase->insert(['name' => $this->name,'city' => $this->city, 'description' => $this->description, 'standard'=> $this->standard, 'opened'=> $this->opened]);
      header('location: index.php?status=success');
    }
  }

  /**
   * method responsable to update an hotel in database
   * @return boolean
   */
  public function update(){
    return (new Database('hotel'))->update('id = '.$this->id,['name' => $this->name, 'city' => $this->city, 'description' => $this->description,'standard' => $this->standard, 'opened' => $this->opened]);
  }

  /**
   * method responsable to delete an hotel in database
   * @return boolean
   */
  public function delete(){
    return (new Database('hotel'))->delete('id = '.$this->id);
  }

  /**
   * method responsable to get an hotel in database
   * @param  string $where
   * @param  string $order
   * @param  string $limit
   * @return array
   */
  public static function getHotels($where = null, $order = null, $limit = null){
    return (new Database('hotel'))->select($where,$order,$limit)
                                  ->fetchAll(PDO::FETCH_CLASS,self::class);
  }

  /**
   * method responsable to search an hotel in database
   * @param  integer $id
   * @return Hotel
   */
  public static function getHotel($id){
    return (new Database('hotel'))->select('id = '.$id)
                                  ->fetchObject(self::class);
  }

    /**
   * method responsable to search (by name) an hotel in database
   * @param  str
   * @return Hotel
   */
 
  public static function name_exists($name){
    return (new Database('hotel'))->select('name = '.$name)
                                  ->fetchObject(self::class);
  
  }

}