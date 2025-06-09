<?php if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "UPDATE zyyo_friends SET status='1' WHERE id='$id'";
    DB::query($sql);
} ?>
<div class="row">
    <div class="card">
        <header class="card-header">
            <div class="card-title">友情链接待审核</div>
        </header>
        <div class="card-body">
            <div class="card-search mb-2-5">
            </div>
            <div class="new-friends card-btns mb-2-5">
                <a class="btn btn-primary me-1" href="#!">
                    <i class="mdi mdi-plus"></i> 新增
                </a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>名称</th>
                            <th>描述</th>
                            <th>图标</th>
                            <th>链接</th>
                            <th>状态</th>

                            <th>权重</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM zyyo_friends WHERE status=0 ORDER BY  power DESC";
                        $result = DB::query($sql);
                        if ($result && count($result) > 0) {
                            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                $type = ($row["status"] == 1) ? " 已经通过" : "未通过";
                                $type1 = ($row["status"] == 0) ? " 点击通过" : "点击待审核";
                                $type2 =  './index.php?do=friends-delay&id=' . $row["id"];
                                echo '<tr>
                        <td>' . $row["id"] . '</td>
                        <td>' . $row["name"] . '</td>
                            <td>' . $row["des"] . '</td>
                                <td>' . $row["ico"] . '</td>
                                        <td>' . $row["href"] . '</td>
                        <td>' . $type . '</td>
                         
             
                        <td>' . $row['power'] . '  <div class="btn-group btn-group-sm">
                        <a class="btn btn-default" onclick="totop(\'zyyo_friends\', \'' . $row["id"] . '\')" data-bs-toggle="tooltip" title="上移"><i class="mdi mdi-arrow-up"></i></a>
                        <a class="btn btn-default" onclick="tobottom(\'zyyo_friends\', \'' . $row["id"] . '\')" href="#!" data-bs-toggle="tooltip" title="下移"><i class="mdi mdi-arrow-down"></i></a>
                        </div></td>
                        <td>
                        <div class="btn-group btn-group-sm">
                        <a class="btn btn-default" href="' . $type2 . '" data-bs-toggle="tooltip" title="应用">' . $type1 . '</a>
                        <a class="btn btn-default" href="./index.php?do=edit-friends&id=' . $row["id"] . '" data-bs-toggle="tooltip" title="编辑"><i class="mdi mdi-pencil"></i></a>
                        <a class="btn btn-default" onclick="del(\'zyyo_friends\', \'' . $row["id"] . '\')" href="#!" data-bs-toggle="tooltip" title="删除"><i class="mdi mdi-window-close"></i></a>
                        </div>
                        </td>
                        </tr>';
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $('.new-friends').on('click', function() {
        $.confirm({
            title: '添加分类',
            content: '<div class="form-group p-1 mb-0">' +
                '  <label class="control-label">名称</label>' +
                '  <input autofocus="" type="text" id="input-name" placeholder="请输入您的名字" class="form-control">' +

                '  <label class="control-label">描述</label>' +
                '  <input autofocus="" type="text" id="input-des" placeholder="请输入您的描述" class="form-control">' +
                '  <label class="control-label">图标</label>' +
                '  <input autofocus="" type="text" id="input-ico" placeholder="请输入您的图标" class="form-control">' +
                '  <label class="control-label">链接</label>' +
                '  <input autofocus="" type="text" id="input-href" placeholder="请输入您的链接" class="form-control">' +
                '</div>',
            buttons: {
                sayMyName: {
                    text: '添加',
                    btnClass: 'btn-orange',
                    action: function() {
                        var input1 = this.$content.find('input#input-name');
                        var input2 = this.$content.find('input#input-des');
                        var input3 = this.$content.find('input#input-ico');
                        var input4 = this.$content.find('input#input-href');
                        var errorText = this.$content.find('.text-danger');
                        if (!$.trim(input1.val())) {
                            $.alert({
                                content: "不能为空。",
                                type: 'red'
                            });
                            return false;
                        } else {
                            $.ajax({
                                url: './api.php',
                                method: 'POST',
                                data: {
                                    do: 'newfriends',
                                    name: input1.val(),
                                    des: input2.val(),
                                    ico: input3.val(),
                                    href: input3.val(),
                                },
                                dataType: 'json',
                                success: function(res) {
                                    if (res.code === 1) {
                                        $.notify({
                                            message: '修改成功',
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
                                            location.href = 'index.php?do=friends';
                                        }, 500);
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
                    }
                },
                '取消': function() {}
            }
        });
    });
</script>