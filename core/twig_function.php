<?php
/**
 * @Author: mikegani
 * @Date:   2016-03-21 16:01:51
 * @Last Modified by:   mg5
 * @Last Modified time: 2016-12-13 17:03:57
 */
namespace Core;

use Cartalyst\Sentinel\Native\Facades\Sentinel as Sentinel;

class TwigFunction extends \Twig_Extension
{
    public function __construct()
    {
    }

    public function getName()
    {
        return 'slim-twig-helper';
    }

    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('dummyFunction', array($this, 'dummyFunction')),
        ];
    }

    public function dummyFunction()
    {
        $result = true;
        return $result;
    }
}