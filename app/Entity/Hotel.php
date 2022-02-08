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
   
    //insert hotel in database
    $obDatabase = new Database('hotel');
    $this->id = $obDatabase->insert(['name' => $this->name,'city' => $this->city, 'description' => $this->description, 'standard'=> $this->standard, 'opened'=> $this->opened]);

    return true;
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

}