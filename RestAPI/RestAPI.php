<?php

include_once "httpcode.php";

// Add JSON header for json sending
header("Content-Type: application/json");
class restful_api extends HTTPcodes {
    private $validhttpmethod = array(
        "GET",
        "POST",
        "PUT",
        "DELETE"
    );

    protected static $SUCCESS = true;
    protected static $FAIL = false;

    private static function commonResult($block){
        return self::buildResultJSON($block["msg"],$block["code"]);
    }

    protected static function buildResultJSON($data="",$statuscode=200){
        http_response_code($statuscode);
        $success = $statuscode >= 400 ? self::$FAIL : self::$SUCCESS;
        return json_encode(array(
            "success" => $success,
            "data" => $data
        ),JSON_UNESCAPED_UNICODE);
    }
    /**
     * Every http method will return invalid request error
     *
     * User must override method in following http method user want
     */

    protected static function GET(){
        return self::commonResult(self::$INVALIDHTTPMETHOD);
    }
    protected static function POST(){
        return self::commonResult(self::$INVALIDHTTPMETHOD);
    }
    protected static function PUT(){
        return self::commonResult(self::$INVALIDHTTPMETHOD);
    }

    protected static function DELETE(){
        return self::commonResult(self::$INVALIDHTTPMETHOD);
    }

    protected static function PATCH(){
        return self::commonResult(self::$INVALIDHTTPMETHOD);
    }

    public static function listen(){
        $httpmethod = strtoupper($_SERVER['REQUEST_METHOD']);
        if(is_callable(array(get_called_class(),$httpmethod))){
            $res = get_called_class()::$httpmethod();
            if(gettype($res) == "string"){
                echo $res;
            }else{
                echo get_called_class()::commonResult(self::$INVALIDRETURNTYPE);
            }
        }else{
            echo get_called_class()::commonResult(self::$INVALIDHTTPMETHOD);
        }
    }
}

?>