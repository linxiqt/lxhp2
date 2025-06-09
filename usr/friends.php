<?php

include_once '../usr/inc.php';

header('Content-Type: application/json');

function escape_POST_params()
{
    foreach ($_POST as $key => $value) {
        $_POST[$key] = str_replace("'", "''", $value);
    }
}
escape_POST_params();



if (isset($_POST['name']) && isset($_POST['des']) && isset($_POST['ico']) && isset($_POST['href'])) {
    $name = $_POST['name'];
    $des = $_POST['des'];
    $ico = $_POST['ico'];
    $href = $_POST['href'];
    $sql = "INSERT INTO zyyo_friends (name,des,ico ,href,status) VALUES ('$name', '$des', '$ico', '$href',0)";
    if (@DB::query($sql) == TRUE) {
        json(['code' => 1, 'msg' => '成功！']);
    } else {
        json(['code' => 0, 'msg' => '错误！' . DB::error()]);
    }
} else {
    json(['code' => 0, 'msg' => '参数不足！']);
}
