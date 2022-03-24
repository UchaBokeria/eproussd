<?php

function Get()
{

    // MUST_BE_GET
    return ($_SERVER["REQUEST_METHOD"] != "GET") ? false : true;
    
}

function Post()
{

    // MUST_BE_POST
    return ($_SERVER["REQUEST_METHOD"] != "POST") ? false : true;
    
}

function Put()
{

    // MUST_BE_PUT
    return ($_SERVER["REQUEST_METHOD"] != "PUT") ? false : true;
    
}

function Delete()
{

    // MUST_BE_DELETE
    return ($_SERVER["REQUEST_METHOD"] != "DELETE") ? false : true;
    
}