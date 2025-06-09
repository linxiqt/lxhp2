<div class="row">
    <div class="card">
        <header class="card-header">
            <div class="card-title">网站配置</div>
        </header>
        <div class="card-body">

            <form action="" method="post" name="edit-form" class="base-form edit-form">

                <div class="mb-3">
                    <label for="sitename" class="form-label">网站标题</label>
                    <input class="form-control" type="text" id="sitename"
                        name="sitename" value="<?= $data['sitename'] ?>"
                        placeholder="请输入站点标题">
                </div>
                <div class="mb-3">
                    <label for="keywords" class="form-label">站点关键词</label>
                    <input class="form-control" type="text" id="keywords"
                        name="keywords" value="<?= $data['keywords'] ?>"
                        placeholder="请输入站点关键词">
                    <small class="form-text">网站搜索引擎关键字</small>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">站点描述</label>
                    <textarea class="form-control" id="description" rows="5"
                        name="description"
                        placeholder="请输入站点描述"><?= $data['description'] ?></textarea>
                    <small class="form-text">网站描述，有利于搜索引擎抓取相关信息</small>
                </div>
                <div class="mb-3">
                    <label for="header" class="form-label">自定义头部</label>
                    <textarea class="form-control" id="header" rows="5" name="header"
                        placeholder="请输入"><?= $data['header'] ?>
</textarea>
                </div>
                <div class="mb-3">
                    <label for="footer" class="form-label">自定义底部</label>
                    <textarea class="form-control" id="footer" rows="5" name="footer"
                        placeholder="请输入"><?= $data['footer'] ?>
</textarea>
                </div>
                <div class="mb-3">
                    <label for="beian" class="form-label">备案信息</label>
                    <input class="form-control" type="text" id="beian" name="beian"
                        value="<?= $data['beian'] ?>" placeholder="请输入备案信息">
                </div>
                <div class="mb-3">
                    <label for="ico" class="form-label">ico</label>
                    <input class="form-control" type="text" id="ico" name="ico"
                        value="<?= $data['ico'] ?>" placeholder="请输入">
                </div>
                <div class="mb-3">
                    <label for="author" class="form-label">头像</label>
                    <input class="form-control" type="text" id="author" name="author"
                        value="<?= $data['author'] ?>" placeholder="请输入">
                </div>

                <div class="mb-3">
                    <label for="logo" class="form-label">logo</label>
                    <input class="form-control" type="text" id="logo" name="logo"
                        value="<?= $data['logo'] ?>" placeholder="请输入">
                </div>

                <div class="mb-3">
                    <label for="beian" class="form-label">用户名</label>
                    <input class="form-control" type="text" id="user" name="user"
                        value="<?= $data['user'] ?>" placeholder="请输入">
                </div>
                <div class="mb-3">
                    <label for="beian" class="form-label">密码</label>
                    <input class="form-control" type="text" id="pwd" name="pwd"
                        value="<?= $data['pwd'] ?>" placeholder="请输入">
                </div>



                <div class="mb-3">
                    <label for="title1" class="form-label">标题1</label>
                    <textarea class="form-control" id="title1" rows="5" name="title1"
                        placeholder="请输入"><?= $data['title1'] ?>
</textarea>
                </div>
                <div class="mb-3">
                    <label for="title2" class="form-label">标题2</label>
                    <textarea class="form-control" id="title2" rows="5" name="title2"
                        placeholder="请输入"><?= $data['title2'] ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="bgurl" class="form-label">背景图片</label>
                    <textarea class="form-control" id="bgurl" rows="5" name="bgurl"
                        placeholder="请输入"><?= $data['bgurl'] ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="footurl" class="form-label">底部图片</label>
                    <textarea class="form-control" id="footurl" rows="5" name="footurl"
                        placeholder="请输入"><?= $data['footurl'] ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="icon" class="form-label">图标链接（按先后顺序，英文逗号隔开）</label>
                    <textarea class="form-control" id="icon" rows="5" name="icon"
                        placeholder="请输入"><?= $data['icon'] ?></textarea>
                </div>





                <button type="submit" class="btn btn-primary me-1">确 定</button>
                <button type="button" class="btn btn-default"
                    onclick="javascript:history.back(-1);return false;">返 回</button>

            </form>
        </div>
    </div>
</div>
<script>
    $('.base-form').on('submit', function(event) {
        if ($(this)[0].checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
            $(this).addClass('was-validated');
            return false;
        }
        var $data = $(this).serialize();
        $.ajax({
            url: './api.php',
            method: 'POST',
            data: $data + "&" + "do=base",
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
        return false;
    });
</script>