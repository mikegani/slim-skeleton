<?php

/**
 * @Author: mikegani
 * @Date:   2016-03-21 15:59:05
 * @Last Modified by:   mg5
 * @Last Modified time: 2016-12-13 17:33:32
 */

namespace Controller;

class BaseController
{
    public static function lastVisitURL($url) { 
        return $_SESSION['last_visit'] = $url; 
    }
}
