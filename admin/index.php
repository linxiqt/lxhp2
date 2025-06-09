<?php
include_once '../usr/inc.php';
$do = isset($_GET['do']) ? $_GET['do'] : '0';
if ($adminlogin != 1) {
    exit("<script language='javascript'>window.location.href='./login.php';</script>");
}
?>
<!DOCTYPE html>
<html lang="zh">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="keywords" content="Zyyo - 后台管理">
    <meta name="description" content="Zyyo - 后台管理">
    <meta name="author" content="yinq">
    <title>Linxiyy - 后台管理</title>
    <link rel="shortcut icon" type="image/x-icon" href="static/favicon.ico">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <link rel="stylesheet" type="text/css" href="./static/css/materialdesignicons.min.css">
    <link rel="stylesheet" type="text/css" href="./static/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./static/css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="./static/css/style.min.css">
    <link rel="stylesheet" type="text/css" href="./static/js/jquery-confirm/jquery-confirm.min.css">
    <script type="text/javascript" src="./static/js/jquery.min.js"></script>
    <script type="text/javascript" src="./static/js/popper.min.js"></script>
    <script type="text/javascript" src="./static/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="./static/js/perfect-scrollbar.min.js"></script>
    <script type="text/javascript" src="./static/js/jquery.cookie.min.js"></script>
    <!--引入chart插件js-->
    <script type="text/javascript" src="./static/js/chart.min.js"></script>
    <script type="text/javascript" src="./static/js/main.min.js"></script>
    <!--对话框插件js-->
    <script type="text/javascript" src="./static/js/jquery-confirm/jquery-confirm.min.js"></script>
    <script type="text/javascript" src="./static/js/lyear-loading.js"></script>
    <script type="text/javascript" src="./static/js/bootstrap-notify.min.js"></script>
</head>

<body>
    <div class="lyear-layout-web">
        <div class="lyear-layout-container">
            <aside class="lyear-layout-sidebar">
                <div id="logo" class="sidebar-header">
                    <a href="index.php">
                        <img width="60%" src="./static/logo.jpg" title="LightYear" alt="LightYear" />
                    </a>
                </div>
                <div class="lyear-layout-sidebar-info lyear-scroll">
                    <nav class="sidebar-main">
                        <ul style="margin-top:20px;" class="nav-drawer">
                            <li class="nav-item active">
                                <a href="index.php">
                                    <i class="mdi mdi-home-city-outline"></i>
                                    <span>后台首页</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php?do=base">
                                    <i class="mdi mdi-television-guide"></i>
                                    <span>基本信息</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php?do=nav">
                                    <i class="mdi mdi-map-search-outline"></i>
                                    <span>项目导航</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php?do=project">
                                    <i class="mdi mdi-map-search-outline"></i>
                                    <span>项目分类</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php?do=item">
                                    <i class="mdi mdi-stove"></i>
                                    <span>项目管理</span>
                                </a>
                            </li>
                    

                            <li class="nav-item">
                                <a href="index.php?do=friends">
                                    <i class="mdi mdi-file-code-outline"></i>
                                    <span>友情链接</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php?do=friends-delay">
                                    <i class="mdi mdi-file-code-outline"></i>
                                    <span>待审核</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="sidebar-footer">
                        <p class="copyright">
                            <span>Copyright &copy; 2025. </span>
                            <a target="_blank" href="">Linxiyy</a>
                        </p>
                    </div>
                </div>
            </aside>
            <header class="lyear-layout-header">
                <nav class="navbar">
                    <div class="navbar-left">
                        <div class="lyear-aside-toggler">
                            <span class="lyear-toggler-bar"></span>
                            <span class="lyear-toggler-bar"></span>
                            <span class="lyear-toggler-bar"></span>
                        </div>
                    </div>
                    <ul class="navbar-right d-flex align-items-center">
                        <li class="dropdown">
                            <a href="javascript:void(0)" data-bs-toggle="dropdown" class="dropdown-toggle">
                                <img class="avatar-md rounded-circle" src="https://yilx.net/tx.jpg"
                                    alt="Zyyo" />
                                <span style="margin-left: 10px;">linxiyy</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="/admin/login.php?do=logout">
                                        <i class="mdi mdi-logout-variant"></i>
                                        <span>退出登录</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </header>
            <main class="lyear-layout-content">
                <div class="container-fluid">
                    <div class="col-lg-12">

                        <?php if ($do == "0") {
                            include './page/infor.php';
                        } else if ($do == "base") {
                            include './page/base.php';
                        } else if ($do == "item") {
                            include './page/item.php';
                        } else if ($do == "edit-item") {
                            include './page/edit-item.php';
                        } else if ($do == "project") {
                            include './page/project.php';
                        } else if ($do == "nav") {
                            include './page/nav.php';
                        } else if ($do == "edit-project") {
                            include './page/edit-project.php';
                        } else if ($do == "friends") {
                            include './page/friends.php';
                        }else if ($do == "friends-delay") {
                            include './page/friends-delay.php';
                        } else if ($do == "edit-nav") {
                            include './page/edit-nav.php';
                        }else if ($do == "edit-friends") {
                            include './page/edit-friends.php';
                        } ?>
                    </div>
                </div>
            </main>
            <script>
                function del(c, id) {
                    $.confirm({
                        title: '提示',
                        content: '确认都删了?',
                        icon: 'mdi mdi-comment-question',
                        animation: 'scale',
                        closeAnimation: 'scale',
                        opacity: 0.5,
                        buttons: {
                            'confirm': {
                                text: '继续',
                                btnClass: 'btn-blue',
                                action: function() {
                                    $.ajax({
                                        url: './api.php',
                                        method: 'POST',
                                        data: {
                                            do: 'del',
                                            c: c,
                                            id: id
                                        },
                                        dataType: 'json',
                                        success: function(res) {
                                            if (res.code === 1) {
                                                $.notify({
                                                    message: '删除成功~',
                                                }, {
                                                    type: 'success',
                                                    placement: {
                                                        from: 'top',
                                                        align: 'right'
                                                    },
                                                    z_index: 10800,
                                                    delay: 1500,
                                                    animate: {
                                                        enter: 'animate__animated animate__fadeInUp',
                                                        exit: 'animate__animated animate__fadeOutDown'
                                                    }
                                                });
                                                setTimeout(function() {
                                                    location.href = '';
                                                }, 200);
                                            } else {
                                                $.notify({
                                                    message: '失败，错误原因：' + res.msg,
                                                }, {
                                                    type: 'danger',
                                                    placement: {
                                                        from: 'top',
                                                        align: 'right'
                                                    },
                                                    z_index: 10800,
                                                    delay: 1500,
                                                    animate: {
                                                        enter: 'animate__animated animate__shakeX',
                                                        exit: 'animate__animated animate__fadeOutDown'
                                                    }
                                                });
                                            }
                                        },
                                        error: function() {
                                            $.notify({
                                                message: '服务器错误',
                                            }, {
                                                type: 'danger',
                                                placement: {
                                                    from: 'top',
                                                    align: 'right'
                                                },
                                                z_index: 10800,
                                                delay: 1500,
                                                animate: {
                                                    enter: 'animate__animated animate__shakeX',
                                                    exit: 'animate__animated animate__fadeOutDown'
                                                }
                                            });
                                        }
                                    });
                                }
                            },
                            '取消': function() {},
                        }
                    });
                }

                function totop(c, id) {
                    $.ajax({
                        url: './api.php',
                        method: 'POST',
                        data: {
                            do: 'totop',
                            c: c,
                            id: id
                        },
                        dataType: 'json',
                        success: function(res) {
                            if (res.code === 1) {
                                $.notify({
                                    message: '上移成功~',
                                }, {
                                    type: 'success',
                                    placement: {
                                        from: 'top',
                                        align: 'right'
                                    },
                                    z_index: 10800,
                                    delay: 1500,
                                    animate: {
                                        enter: 'animate__animated animate__fadeInUp',
                                        exit: 'animate__animated animate__fadeOutDown'
                                    }
                                });
                                setTimeout(function() {
                                    location.href = '';
                                }, 200);
                            } else {
                                $.notify({
                                    message: '失败，错误原因：' + res.msg,
                                }, {
                                    type: 'danger',
                                    placement: {
                                        from: 'top',
                                        align: 'right'
                                    },
                                    z_index: 10800,
                                    delay: 1500,
                                    animate: {
                                        enter: 'animate__animated animate__shakeX',
                                        exit: 'animate__animated animate__fadeOutDown'
                                    }
                                });
                            }
                        },
                        error: function() {
                            $.notify({
                                message: '服务器错误',
                            }, {
                                type: 'danger',
                                placement: {
                                    from: 'top',
                                    align: 'right'
                                },
                                z_index: 10800,
                                delay: 1500,
                                animate: {
                                    enter: 'animate__animated animate__shakeX',
                                    exit: 'animate__animated animate__fadeOutDown'
                                }
                            });
                        }
                    });
                }

                function tobottom(c, id) {
                    $.ajax({
                        url: './api.php',
                        method: 'POST',
                        data: {
                            do: 'tobottom',
                            c: c,
                            id: id
                        },
                        dataType: 'json',
                        success: function(res) {
                            if (res.code === 1) {
                                $.notify({
                                    message: '下移成功~',
                                }, {
                                    type: 'success',
                                    placement: {
                                        from: 'top',
                                        align: 'right'
                                    },
                                    z_index: 10800,
                                    delay: 1500,
                                    animate: {
                                        enter: 'animate__animated animate__fadeInUp',
                                        exit: 'animate__animated animate__fadeOutDown'
                                    }
                                });
                                setTimeout(function() {
                                    location.href = '';
                                }, 200);
                            } else {
                                $.notify({
                                    message: '失败，错误原因：' + res.msg,
                                }, {
                                    type: 'danger',
                                    placement: {
                                        from: 'top',
                                        align: 'right'
                                    },
                                    z_index: 10800,
                                    delay: 1500,
                                    animate: {
                                        enter: 'animate__animated animate__shakeX',
                                        exit: 'animate__animated animate__fadeOutDown'
                                    }
                                });
                            }
                        },
                        error: function() {
                            $.notify({
                                message: '服务器错误',
                            }, {
                                type: 'danger',
                                placement: {
                                    from: 'top',
                                    align: 'right'
                                },
                                z_index: 10800,
                                delay: 1500,
                                animate: {
                                    enter: 'animate__animated animate__shakeX',
                                    exit: 'animate__animated animate__fadeOutDown'
                                }
                            });
                        }
                    });
                }
            </script>
</body>

</html>