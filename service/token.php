<?php
/**
 * @Author: mikegani
 * @Date:   2016-03-21 16:00:53
 * @Last Modified by:   mikegani
 * @Last Modified time: 2016-12-14 18:32:21
 */
namespace Service;

use Service\BaseService as Base;


final class Token
{
  protected $jwt_helper;

  public function __construct($jwt_helper)
  {
    $this->jwt_helper = $jwt_helper;
  }

  public function generateToken($id){
    $result = $this->jwt_helper->generateToken($id);
    return $result;
  }

  public function getUser($id){
    $sql = "select * from users where id=:PARAM_id";
    $binding_ar = array("PARAM_id"=>$id);
    $sql_result = Base::select($sql, $binding_ar, MASTER_DB_NAME);
    return $sql_result;
  }
}
