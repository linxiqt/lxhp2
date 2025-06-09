<div class="row">
    <div class="col-md-6 col-xl-3">
        <div class="card bg-primary text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <span class="avatar-md rounded-circle bg-white bg-opacity-25 avatar-box">
                        <i class="mdi mdi-currency-cny fs-4"></i>
                    </span>
                    <span class="fs-4">
                        <?= DB::count("SELECT COUNT(*) FROM zyyo_project") ?>
                    </span>
                </div>
                <div class="text-end">项目分类</div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card bg-danger text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <span class="avatar-md rounded-circle bg-white bg-opacity-25 avatar-box">
                        <i class="mdi mdi-account fs-4"></i>
                    </span>
                    <span class="fs-4">
                        <?= DB::count("SELECT COUNT(*) FROM zyyo_item") ?>
                    </span>
                </div>
                <div class="text-end">项目总数</div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card bg-success text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <span class="avatar-md rounded-circle bg-white bg-opacity-25 avatar-box">
                        <i class="mdi mdi-arrow-down-bold fs-4"></i>
                    </span>
                    <span class="fs-4">
                        <?= DB::count("SELECT COUNT(*) FROM zyyo_icon") ?>
                    </span>
                </div>
                <div class="text-end">图标总数</div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card bg-purple text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <span class="avatar-md rounded-circle bg-white bg-opacity-25 avatar-box">
                        <i class="mdi mdi-comment-outline fs-4"></i>
                    </span>
                    <span class="fs-4">1.0</span>
                </div>
                <div class="text-end">当前版本</div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <header class="card-header">
                <div class="card-title">表单</div>
            </header>
            <div class="card-body">
                <h1>使用说明</h1>
                <p>开屏页面内容在基本信息里改</p>
                <p>图片支持本地或者链接</p>
                <p>动态打字部分暂时不支持修改</p>
                <pre>如果可以的话，请前往https://github.com/linxiqt/homepage点个Star🌟</pre>
                <p>背景可以使用本人的API</p>
                https://api/yilx.net/img/(有pc,pm,mobi三种)
                <p>像这样
                https://api.yilx.net/img/pc</p>
                <h1>更新日志</h1>
                <pre>
2025.3|后台版1.0更新
2025.2|开源版上传Github
2025.2|第一版html版网页出世
</pre>
            </div>
        </div>
    </div>
</div>