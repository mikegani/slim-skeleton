<?php
/**
 * @Author: mikegani
 * @Date:   2016-03-21 15:59:48
 * @Last Modified by:   mg5
 * @Last Modified time: 2016-12-13 18:21:09
 */

namespace Controller;

use Controller\BaseController as Base;

final class Token extends BaseController
{
    private $service;

    public function __construct($service)
    {
        $this->service = $service;
    }

    public function generateToken(){
      $status_code = STATUS_CODE_FAIL;
      $message = "";
      $data = NULL;

      $id = 1; // profile_id
      $data = $this->service->generateToken($id);

      $result = array("status_code" => $status_code, "message"=>$message, "data"=>$data);
      return json_encode($result);
    }
}
