<?php
include_once "RestAPI/RestAPI.php";

class apitest extends restful_api{
    protected static function GET()
    {
        return self::buildResultJSON("Hello world");
    }
    protected static function POST()
    {
        return self::buildResultJSON("POST REQUEST",201);
    }
}

apitest::listen();

?>