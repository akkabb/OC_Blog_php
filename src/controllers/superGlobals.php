<?php

class Globals
{
    private $_GET;
    private $_POST;
    private $_SERVER;
    private  $_SESSION;

    public function __construct()
    {
        $this->_GET = filter_input_array(INPUT_GET);
        $this->_POST = filter_input_array(INPUT_POST);
        $this->_SERVER = filter_input_array(INPUT_SERVER);
    }

    public function getGET()
    {
        return $this->_GET;
    }

    public function getPOST()
    {
        return $this->_POST;
    }

    public function getSERVER()
    {
        return $this->_SERVER;
    }

    public function getSession()
    {
        return $this->_SESSION;
    }

}