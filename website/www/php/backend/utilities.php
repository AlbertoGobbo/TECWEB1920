<?php

class Utilities
{
    public static function get_page_name()
    {
        $array=explode('/', $_SERVER['PHP_SELF']);
        $page=explode('.', end($array));
        return ucfirst($page[0]);
    }

    public static function shrink_page($page)
    {
        $array=explode('/', $page);
        $page=explode('.', end($array));
        return $page[0];
    }
}
?>