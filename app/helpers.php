<?php

if (! function_exists('firstWord')) {
    function firstWord($string): string
    {
        $string = explode(' ', trim($string));

        return $string[0];
    }
}
