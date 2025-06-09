<?php
include_once '../usr/inc.php';
$do = isset($_POST['do']) ? $_POST['do'] : '0';
header('Content-Type: application/json');
if ($adminlogin != 1) {
    json(['code' => 0, 'msg' => '未登录！']);
    exit();
}
function escape_POST_params()
{
    foreach ($_POST as $key => $value) {
        $_POST[$key] = str_replace("'", "''", $value);
    }
}
escape_POST_params();
if ($do == "base") {
    if (isset($_POST['user']) && isset($_POST['pwd'])) {
        $sitename = $_POST['sitename'];
        $keywords = $_POST['keywords'];
        $user = $_POST['user'];
        $pwd = $_POST['pwd'];
        $description = $_POST['description'];
        $ico = $_POST['ico'];
        $logo = $_POST['logo'];
        $author = $_POST['author'];
        $beian = $_POST['beian'];
        $title1 = $_POST['title1'];
        $title2 = $_POST['title2'];
        $header = $_POST['header'];
        $footer = $_POST['footer'];
        $icon = $_POST['icon'];
        $bgurl = $_POST['bgurl'];
        $footurl = $_POST['footurl'];

        $sql = "UPDATE zyyo_data SET 
                user='$user', 
                pwd='$pwd', 
                sitename='$sitename', 
                keywords='$keywords', 
                description='$description', 
                ico='$ico', 
                logo='$logo', 
                author='$author', 
                beian='$beian', 
                title1='$title1', 
                title2='$title2', 
                header='$header', 
                footer='$footer' ,
                icon='$icon' ,
                bgurl='$bgurl' ,
                footurl='$footurl' 
                WHERE id=1";

        if (DB::query($sql) == TRUE) {
            json(['code' => 1, 'msg' => '成功！']);
        } else {
            json(['code' => 0, 'msg' => '错误！' . DB::error()]);
        }
    } else {
        json(['code' => 0, 'msg' => '参数不足！']);
    }
} else if ($do == "newproject") {
    if (isset($_POST['name']) && isset($_POST['icon'])) {
        $name = $_POST['name'];
        $icon = $_POST['icon'];
        $sql = "INSERT INTO zyyo_project (name, icon) VALUES ('$name', '$icon')";
        if (@DB::query($sql) == TRUE) {
            json(['code' => 1, 'msg' => '成功！']);
        } else {
            json(['code' => 0, 'msg' => '错误！' . DB::error()]);
        }
    } else {
        json(['code' => 0, 'msg' => '参数不足！']);
    }
} else if ($do == "newnav") {
    if (isset($_POST['name']) && isset($_POST['href'])) {
        $name = $_POST['name'];
        $href = $_POST['href'];
        $sql = "INSERT INTO zyyo_nav (name, href) VALUES ('$name', '$href')";
        if (@DB::query($sql) == TRUE) {
            json(['code' => 1, 'msg' => '成功！']);
        } else {
            json(['code' => 0, 'msg' => '错误！' . DB::error()]);
        }
    } else {
        json(['code' => 0, 'msg' => '参数不足！']);
    }
} else if ($do == "newfriends") {
    if (isset($_POST['name']) && isset($_POST['des']) && isset($_POST['ico']) && isset($_POST['href'])) {
        $name = $_POST['name'];
        $des = $_POST['des'];
        $ico = $_POST['ico'];
        $href = $_POST['href'];
        $sql = "INSERT INTO zyyo_friends (name,des,ico ,href) VALUES ('$name', '$des', '$ico', '$href')";
        if (@DB::query($sql) == TRUE) {
            json(['code' => 1, 'msg' => '成功！']);
        } else {
            json(['code' => 0, 'msg' => '错误！' . DB::error()]);
        }
    } else {
        json(['code' => 0, 'msg' => '参数不足！']);
    }
} else if ($do == "newitem") {
    if (isset($_POST['name']) && isset($_POST['icon']) && isset($_POST['des']) && isset($_POST['href']) && isset($_POST['project'])) {
        $name = $_POST['name'];
        $icon = $_POST['icon'];
        $des = $_POST['des'];
        $href = $_POST['href'];
        $project = $_POST['project'];
        $sql = "INSERT INTO zyyo_item (name, icon, des, href, project) VALUES ('$name', '$icon', '$des', '$href', '$project')";
        if (@DB::query($sql) == TRUE) {
            json(['code' => 1, 'msg' => '成功！']);
        } else {
            json(['code' => 0, 'msg' => '错误！' . DB::error()]);
        }
    } else {
        json(['code' => 0, 'msg' => '参数不足！']);
    }
} else if ($do == "del") {
    if (isset($_POST['c']) && isset($_POST['id'])) {
        $class = $_POST['c'];
        $id = $_POST['id'];
        $sql = "DELETE FROM `$class` WHERE `id` = $id";
        if (@DB::query($sql) == TRUE) {
            if ($class === 'zyyo_project') {
                $sql1 = "DELETE FROM `zyyo_item` WHERE `project` = $id";
                if (@DB::query($sql1) == FALSE) {
                    json(['code' => 0, 'msg' => '删除zyyo_item表失败！' . DB::error()]);
                } else {
                    json(['code' => 1, 'msg' => '成功！']);
                }
            } else {
                json(['code' => 1, 'msg' => '成功！']);
            }
        } else {
            json(['code' => 0, 'msg' => '错误！' . DB::error()]);
        }
    } else {
        json(['code' => 0, 'msg' => '参数不足！']);
    }
} else if ($do == "totop") {
    if (isset($_POST['c']) && isset($_POST['id'])) {
        $class = $_POST['c'];
        $id = $_POST['id'];
        $sql = "UPDATE `$class` SET `power` = `power` + 1 WHERE `id` = $id";
        if (@DB::query($sql) == TRUE) {
            json(['code' => 1, 'msg' => '成功！']);
        } else {
            json(['code' => 0, 'msg' => '错误！' . DB::error()]);
        }
    } else {
        json(['code' => 0, 'msg' => '参数不足！']);
    }
} else if ($do == "tobottom") {
    if (isset($_POST['c']) && isset($_POST['id'])) {
        $class = $_POST['c'];
        $id = $_POST['id'];
        $sql = "UPDATE `$class` SET `power` = `power` - 1 WHERE `id` = $id";
        if (@DB::query($sql) == TRUE) {
            json(['code' => 1, 'msg' => '成功！']);
        } else {
            json(['code' => 0, 'msg' => '错误！' . DB::error()]);
        }
    } else {
        json(['code' => 0, 'msg' => '参数不足！']);
    }
} else if ($do == "edititem") {
    if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['icon']) && isset($_POST['des']) && isset($_POST['href']) && isset($_POST['project'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $icon = $_POST['icon'];
        $des = $_POST['des'];
        $href = $_POST['href'];
        $project = $_POST['project'];
        $sql = "UPDATE zyyo_item SET name='$name', icon='$icon', des='$des', href='$href', project='$project' WHERE id='$id'";
        if (@DB::query($sql) == TRUE) {
            json(['code' => 1, 'msg' => '成功！']);
        } else {
            json(['code' => 0, 'msg' => '错误！' . DB::error()]);
        }
    } else {
        json(['code' => 0, 'msg' => '参数不足！']);
    }
} else if ($do == "editproject") {
    if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['icon'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $icon = $_POST['icon'];
        $sql = "UPDATE zyyo_project SET name='$name', icon='$icon', WHERE id='$id'";
        if (@DB::query($sql) == TRUE) {
            json(['code' => 1, 'msg' => '成功！']);
        } else {
            json(['code' => 0, 'msg' => '错误！' . DB::error()]);
        }
    } else {
        json(['code' => 0, 'msg' => '参数不足！']);
    }
} else if ($do == "editnav") {
    if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['href'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $href = $_POST['href'];
        $sql = "UPDATE zyyo_nav SET name='$name', href='$href' WHERE id='$id'";
        if (@DB::query($sql) == TRUE) {
            json(['code' => 1, 'msg' => '成功！']);
        } else {
            json(['code' => 0, 'msg' => '错误！' . DB::error()]);
        }
    } else {
        json(['code' => 0, 'msg' => '参数不足！']);
    }
} else if ($do == "editfriends") {
    if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['des']) && isset($_POST['ico']) && isset($_POST['href'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $des = $_POST['des'];
        $ico = $_POST['ico'];
        $href = $_POST['href'];
        $sql = "UPDATE zyyo_friends SET name='$name', des='$des', ico='$ico', href='$href' WHERE id='$id'";
        if (@DB::query($sql) == TRUE) {
            json(['code' => 1, 'msg' => '成功！']);
        } else {
            json(['code' => 0, 'msg' => '错误！' . DB::error()]);
        }
    } else {
        json(['code' => 0, 'msg' => '参数不足！']);
    }
}
