<?php

class Globals
{
    private $_GET;
    private $_POST;
    private $_SERVER;
    
    /**
     * __construct filter data
     *
     * @return mixed
     */
    public function __construct()
    {
        $this->_GET = filter_input_array(INPUT_GET);
        $this->_POST = filter_input_array(INPUT_POST);
        $this->_SERVER = filter_input_array(INPUT_SERVER);
    }
    
    /**
     * getGET Get Get input
     *
     * @return mixed
     */
    public function getGET()
    {
        return $this->_GET;
    }
    
    /**
     * getPOST Get Post input
     *
     * @return mixed
     */
    public function getPOST()
    {
        return $this->_POST;
    }
    
    /**
     * getSERVER holds information about headers, paths, and script locations
     *
     * @return void
     */
    public function getSERVER()
    {
        return $this->_SERVER;
    }

}