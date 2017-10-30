<?php
function get($name,$def='')
{
    return isset($_REQUEST[$name]) ? $_REQUEST[$name] : $def;
}

function is_active($page,$current_link)
{
    return $page == $current_link ? 'active' : '';
}