<?php
interface LoggerInterface
{
    function logMessage($errorMessage);

    function lastMessages($countMessage);
}

interface EventListenerInterface
{
    function attachEvent($attachEvent, $callback);

    function detouchEvent($methodName);
}
