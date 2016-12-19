<?php
/**
 * @Author: mikegani
 * @Date:   2016-03-21 16:05:48
 * @Last Modified by:   mikegani
 * @Last Modified time: 2016-12-13 16:52:14
 */
$env = getenv("ENV");

// Environtment: Develop
if($env == "develop"){
  include ('router/develop.php');
}
// Environtment: Production
else {
  include ('router/production.php');
}
