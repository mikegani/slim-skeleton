<?php
/**
 * @Author: mikegani
 * @Date:   2016-03-21 16:06:06
 * @Last Modified by:   mikegani
 * @Last Modified time: 2016-12-14 18:31:36
 */
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$db_setting = array(
    "db_master" => array(
        'driver'    => 'mysql',
        'host'      => getenv("DB_HOST"),
        'database'  => getenv("DB_NAME"),
        'username'  => getenv("DB_USERNAME"),
        'password'  => getenv("DB_PASSWORD"),
        'charset'   => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix'    => '',
        )/*,
    "db_article" => array(
        'driver'    => 'mysql',
        'host'      => getenv("DB_2_HOST"),
        'database'  => getenv("DB_2_NAME"),
        'username'  => getenv("DB_2_USERNAME"),
        'password'  => getenv("DB_2_PASSWORD"),
        'charset'   => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix'    => '',
        )*/
    );

$db_master_config = $db_setting["db_master"];
$capsule->addConnection($db_master_config);
$capsule->addConnection($db_master_config, $db_master_config["database"]);

/*
$db_article_config = $db_setting["db_article"];
$capsule->addConnection($db_article_config, $db_article_config["database"]);
*/

// Set the event dispatcher used by Eloquent models... (optional)
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
$capsule->setEventDispatcher(new Dispatcher(new Container));

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

return $capsule;