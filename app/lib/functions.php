<?php
function get($name,$def='')
{
    return isset($_REQUEST[$name]) ? $_REQUEST[$name] : $def;
}

function is_active($page,$current_link)
{
    return $page == $current_link ? 'active' : '';
}

function nextID(){
    global $config;
    $file_name = $config['DATA_PATH'] . 'id.txt';
    if(!file_exists($file_name)){
        touch($file_name);
        $handle = fopen($file_name,'r+');
        $id = 0;
    }
    else{
        $handle = fopen($file_name,'r+');
        $id = fread($handle,filesize($file_name));
        settype($id,"integer");
    }
    rewind($handle);
    fwrite($handle,++$id);
    fclose($handle);
    return $id;
}