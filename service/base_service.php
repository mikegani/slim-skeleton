<?php

/**
 * @Author: mikegani
 * @Date:   2016-03-21 16:00:17
 * @Last Modified by:   mikegani
 * @Last Modified time: 2016-12-14 18:29:22
 */

namespace Service;

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\QueryException as QueryException;
use \Exception;

class BaseService
{
    public static function removeSpecialCharExceptDash($str){
        $pattern = array("/\s+/", "/[^a-zA-Z0-9-]/", "/-+/");
        $replace = array("-", "", "-");
        $new_str = preg_replace($pattern, $replace, $str);
        return $new_str;
    }

    public static function select($sql, $binding, $db_name=NULL){
        return self::execute_raw(SQL_SELECT, $sql, $binding, $db_name);
    }
    
    public static function update($sql, $binding, $db_name=NULL){
        return self::execute_raw(SQL_UPDATE, $sql, $binding, $db_name);
    }

    public static function delete($model, $id){
        return self::execute(SQL_DELETE, $model, $id);
    }

    public static function execute_raw($command, $sql, $binding, $db_name=NULL){
        $status_code = STATUS_CODE_FAIL;
        $message = "";
        $data = null;

        $connection = null;
        $binding_array = array();

        if($binding && !empty($binding)){
            $binding_array = $binding;
        }

        try{
            if($db_name && !empty($db_name)){   
                $connection = Capsule::connection($db_name);
            } else {
                $connection = Capsule::connection(); // default database
            }
        } catch (Exception $e) {
            $message .= "Invalid database name ($db_name). Fail to execute sql RAW. Please make sure the database is properly set. ";
        }
        
        if($connection && !empty($connection)){
            try{
                switch($command){
                    case SQL_SELECT:
                        $data = $connection->select($sql, $binding_array);
                        $message .= "successfully select raw sql. ";
                        $status_code = STATUS_CODE_SUCCESS;
                        break; 
                    case SQL_UPDATE:
                        $data = $connection->update($sql, $binding_array);
                        $message .= "successfully update raw sql. ";
                        $status_code = STATUS_CODE_SUCCESS;
                        break;
                    default:
                        $message .= "Unknown SQL command ($command). Fail to execute raw SQL. ";
                        break;
                }   

            } catch (\Illuminate\Database\QueryException $e) {
                echo $e->getMessage();
                $message .= "Query Exception: Fail to execute SQL Query execute_raw. ";
            } catch (PDOException $e) {
                $message .= "PDO exception: Fail to execute SQL Query execute_raw. ";
            } catch (MySQLException $e) {
                $message .= "MySQL exception: Fail to execute SQL Query execute_raw. ";
            } catch (Exception $e) {
                echo $e->getMessage();
                $message .= "PHP exception: Fail to execute SQL Query to execute_raw, ";
            }
        }

        $result = array("status_code" => $status_code, "message" => $message, "data" => $data);
        return $result;
    }

    public static function execute($command, $model, $id)
    {
        $status_code = STATUS_CODE_FAIL;
        $message = "";
        $data = null;

        if($model && !empty($model) && $command && !empty($command) && $id && !empty($id)){
            try{
                $m = $model->find($id);
                if($m){
                    switch($command){
                        case SQL_DELETE:
                            $m->delete();
                            $message .= "successfully deleted (id=$id). ";
                            $status_code = STATUS_CODE_SUCCESS;
                            break;
                        default:
                            $message .= "Unknown SQL command ($command). Fail to execute SQL. ";
                            break;
                    }      
                } else {
                    $message .= "Sorry, we couldn't find a valid instance of model with (id=$id). ";
                }
            } catch (\Illuminate\Database\QueryException $e) {
                echo $e->getMessage();
                $message .= "Query Exception: Fail to execute SQL Query execute ";
            } catch (PDOException $e) {
                $message .= "PDO exception: Fail to execute SQL Query execute ";
            } catch (MySQLException $e) {
                $message .= "MySQL exception: Fail to execute SQL Query execute ";
            } catch (Exception $e) {
                echo $e->getMessage();
                $message .= "PHP exception: Fail to execute SQL Query to execute ";
            }
        } else {
            $message .= "Please input valid SQL Command, Model, and id. ";
        }

        $result = array("status_code" => $status_code, "message" => $message, "data" => $data);
        return $result;
    }
}
