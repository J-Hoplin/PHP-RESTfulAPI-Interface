<?php

include_once "codes.php";

class HTTPcodes{
    /**
     * available HTTP METHOD
     *
     */
    protected $validhttpmethod = array(
        "GET",
        "POST",
        "PUT",
        "DELETE"
    );
    /**
     * All common http status code should be like this
     *
     * {
     * "code"
     * "msg"
     * }
     */
    protected static $OK = array(
        "code" => 200,
        "msg" => OK
    );
    protected static $INVALIDREQUEST = array(
        "code" => 400,
        "msg" => ERR_400
    );
    protected static $INVALIDHTTPMETHOD = array(
        "code" => 405,
        "msg" => ERR_405
    );
    protected static $INVALIDRETURNTYPE = array(
        "code" => 500,
        "msg" => ERR_500
    );
    protected static $MIDDLEWARENOTCALLABLE = array(
        "code" => 500,
        "msg" => ERR_MIDDLEWARE_NOT_CALLABLE
    );

    protected static $MIDDLEWARESHOULDBEARRAY = array(
        "code" => 500,
        "msg" => ERR_MIDDLEWARE_NOT_ARRAY
    );

    protected static $MIDDLEWREEXCEPTIONOCCURED = array(
        "code" => 500,
        "msg" =>ERR_MIDDLEWARE_EXCEPTION
    );
}

?>