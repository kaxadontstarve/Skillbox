<?php

interface LoggerInterface
{
    function logMessage($errorMessage);
    function lastMessages($countMessage);
}

interface EventListenerInterface
{
    

    
    function attachEvent($methodName, $cbFunctionName);
    function detouchEvent($methodName);
}
