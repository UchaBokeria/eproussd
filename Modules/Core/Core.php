<?php

    require './Modules/Learner/Learner.IPaddresses.php';
    require './Modules/Learner/Learner.RequestHeader.php';
    require './Modules/Learner/Learner.RequestParmas.php';

    require './Modules/Learner/Learner.Auto.php';
    require './Modules/Learner/Learner.Configs.php';
    
    require './Modules/Database/Database.php';
    require './Modules/Guardian/Guardian.php';
    require './Modules/Decorators/RequiredFields.php';
    
    require './Modules/Decorators/RequestDecorators.php';
    require './Modules/Learner/Learner.Controllers.php';

    /* Learn Errors */
    if(ALLOW_ERROR_REPORT) {
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    }

    // /* Learn Guard */
    define('GUARDIAN', (new Guardian())->checkToken());
    
    // /* Learn Route */
    $CALL = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    $emptyURIparseExplodeSpaces = array_count_values($CALL)[""];
    for ($i=0; $i < $emptyURIparseExplodeSpaces; $i++) unset($CALL[array_search("",$CALL)]);

    // /* Build Route */
    $callName = str_replace('-','',$CALL[COUNT($CALL)-1]);
    $Request = str_replace('-','',$CALL[COUNT($CALL)]);
    $Router = new $callName();

    if(!method_exists($Router, $Request))
        die(json_encode(WRONG_ROUTE_STATUS));

    define( 'API_RESULT_JSON' , ( $Router->$Request() ) );