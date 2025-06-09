<?php

session_start(); // session
// error_reporting(0); // 非致命错误不报错
define('ROOTS', dirname(__FILE__) . '/'); // 本目录
define('ROOT', dirname(ROOTS) . '../../'); // 根目录
date_default_timezone_set("PRC"); // 时区
$date = date('Y-m-d H:i:s', time());
require_once("../tool/function.php"); // 引入相关文件
require_once("../tool/sqlite.php");
@include_once("../../config.php"); // config

if (file_exists("../../config.php")) {
    alert('配置文件已经存在,退出安装', '../../');
    exit;
}

$do = isset($_GET['do']) ? $_GET['do'] : '0';
$db_dir = $_GET['db_dir'] ?? null;

if ($do === "install") {
    if (empty($db_dir)) {
        json(['code' => 100, 'msg' => '信息不全！']);
        return;
    }

    if (!file_exists($db_dir)) {
        if (!touch($db_dir)) {
            json(['code' => 100, 'msg' => '无法创建数据库文件！']);
            return;
        }
    }

    $con = DB::connect($db_dir); // 假设 DB::connect 是静态方法
    if (!$con) {
        json(['code' => 100, 'msg' => '连接失败: ' . DB::error()]);
        return;
    }

    $sql = file_get_contents(ROOTS . "install.sql");
    if ($sql === false) {
        json(['code' => 100, 'msg' => '无法读取 SQL 文件！']);
        return;
    }

    $sql = explode(';', $sql);
    $t = 0;
    $e = 0;
    $error = '';
    foreach ($sql as $query) {
        $query = trim($query);
        if (empty($query)) {
            continue;
        }
        if (DB::query($query)) { // 假设 DB::query 是静态方法
            ++$t;
        } else {
            ++$e;
            $error .= DB::error() . '<br/>';
        }
    }

    $config = "<?php
/*数据库配置*/
\$dbconfig=array(
    'dir' => '{$db_dir}', // 数据库文件位置
);
?>";

    if ($e === 0) {
        if (!file_put_contents(ROOT . "config.php", $config)) {
            json(['code' => 100, 'msg' => '保存失败！']);
            return;
        } else {
            json(['code' => 200, 'msg' => '安装成功: 成功 ' . $t . ' 条，失败 ' . $e . ' 条']);
        }
    } else {
        json(['code' => 100, 'msg' => '安装失败: 成功 ' . $t . ' 条，失败 ' . $e . ' 条，错误信息: ' . $error]);
    }
}

if (file_exists(ROOT . "config.php")) {
    alert('你已经安装过了,请删除config.php', '');
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Linxiyy安装程序</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="message.min.css">
    <script src="message.min.js"></script>
    <style>
        body {
            height: 100vh;
            width: 100vw;
            background: #dbf1ff;

        }

        button,
        input,
        input:focus,
        #selectOption {
            outline: none;
            border: none;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            overflow: hidden;
        }

        .main {
            width: 90%;
            max-width: 500px;
            padding: 40px 20px 80px 20px;
            background-color: #fff;
            margin: 60px auto;
            border-radius: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            box-shadow: 1px 1px 20px 1px #e9e9e9;
        }

        .logo {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background-image: url(https://yilx.net/tx.jpg);
            background-size: cover;
            margin-bottom: 20px;

        }

        .password {
            width: 80%;
            height: 40px;
            padding-left: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 20px;
            background: #f8f8f8;
        }

        .password:focus {
            border: 1px solid #000;
        }

        .password:hover {
            border: 1px solid #000;
        }

        .password:active {
            border: 1px solid #000;
        }

        .container {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        .button {
            width: 100px;
            height: 50px;
            border-radius: 5px;
            background: linear-gradient(20deg, #6ea0ff, #168ded);
            color: #fff;
        }

        #container2 {
            display: flex;
            align-items: center;
            flex-direction: column;
            justify-content: center;
            width: 100%;
            display: none;
        }

        #container1 {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 100%;


        }

        #fitler {
            display: none;
            width: 100vw;
            position: fixed;
            height: 100vh;
            background: #2222224f;
        }
    </style>
</head>

<body>
    <div id="fitler"></div>
    <div class="main">
        <div class="logo"></div>

        <div id="container1">
            <p style="
    text-align: center;
">
                欢迎使用Linxiyy主页1.0<br>
                sqlite版本<br>
                数据库文件默认在/usr/install/下<br>
                配置文件在/config.php<br>
                默认账号密码admin/123456<br>
                安装填写的数据库文件位置是绝对路径<br>
                迁移时要注意修改<br>
                配置文件创建失败是因为没有写入权限，尤其是1panle用户</p>
            <div class="container">
                <button onclick="start()" class="button">开始安装</button>
            </div>
        </div>

        <div id="container2">
            <input type="text" id="db_dir"
                value="<?= $dbFilePath = getcwd() . DIRECTORY_SEPARATOR . bin2hex(random_bytes(5)) . '.db'; ?>"
                class="password" placeholder="数据库文件位置">
            <div class="container">

                <button onclick="install()" class="button">执行安装</button>
            </div>
        </div>



    </div>
    <script>
        function install() {
            var db_dir = document.getElementById('db_dir').value;
            var fitler = document.getElementById('fitler');

            var loadingMsg = Qmsg.loading('加载中');
            fitler.style.display = "flex";
            const xhr = new XMLHttpRequest();
            xhr.open('GET', `?do=install&db_dir=${db_dir}`);
            xhr.onload = function() {
                const response = JSON.parse(xhr.responseText);

                setTimeout(function() {
                    loadingMsg.close();
                    if (response.code == 200) {

                        setTimeout(function() {
                            location.href = "/";
                        }, 1000);
                    }
                    fitler.style.display = "none";
                    Qmsg.success(response.msg);

                }, 500);
            };
            xhr.send();
        }








        function start() {
            var a = document.getElementById('container2');
            var b = document.getElementById('container1');
            b.style.display = "none";
            a.style.display = "flex";


        }
    </script>


</body>

</html>