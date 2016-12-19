<?php
/**
 * @Author: mikegani
 * @Date:   2016-03-21 15:59:23
 * @Last Modified by:   mikegani
 * @Last Modified time: 2016-12-15 16:47:02
 */
namespace Controller;

use Controller\BaseController as Base;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class Home
{
    protected $view;
    protected $token_service;

    public function __construct($view, $token_service)
    {
        $this->view = $view;
        $this->token_service = $token_service;
    }

    public function dispatch(Request $request, Response $response, $args)
    {
        $twig_file = "home.twig";
        $data = array("title"=>"Slim Skeleton");
        $this->view->render($response, $twig_file, $data);
        return $response;
    }

    // To get data from REQUEST POST BODY: $request->getParsedBody()
    // To get data from URL : $args
    public function getUser(Request $request, Response $response, $args)
    {  
        $status_code = STATUS_CODE_FAIL;
        $message = "";
        $data = NULL;

        $id_keyword = "id";
        $req_body = $request->getParsedBody(); // from POST body
        if (!empty($args) && array_key_exists($id_keyword, $args)) {
            $id = intval($args[$id_keyword]); // from URL
            $user_result = $this->token_service->getUser($id);
            $status_code = $user_result["status_code"];
            $message .= $user_result["message"];
            $data = $user_result["data"];
        } else {
            $message .= "Please input a valid id.";
        }

        $result = array("status_code"=>$status_code, "message"=>$message, "data"=>$data);
        return json_encode($result);
    }
}
