<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Parallel Universe </title>
    <link rel="stylesheet" href="/../../static/common/layui/css/layui.css">
    <link rel="stylesheet" href="/../../static/admin/css/login.css">
    <script src="/../../static/common/layui/layui.js"></script>
    <script src="http://libs.baidu.com/jquery/2.0.0/jquery.js"></script>
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
    <div class="layui-header">
        <div class="layui-logo">Parallel Universe</div>
        <!-- 头部区域（可配合layui已有的水平导航） -->
        <ul class="layui-nav layui-layout-left">
            <li class="layui-nav-item"><a href="">He&She</a></li>
            <li class="layui-nav-item"><a href="/goods/manage">He Want To Tell Her</a></li>
        </ul>
        <ul class="layui-nav layui-layout-right">
            <li class="layui-nav-item">
                <a href="javascript:;">
                    <img src="http://t.cn/RCzsdCq" class="layui-nav-img">

                </a>
                <dl class="layui-nav-child">
                    <dd><a href="">基本资料</a></dd>
                    <dd><a href="">安全设置</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item"><a href="/login/logout">logout</a></li>
        </ul>
    </div>
    <!--
    <div class="layui-side layui-bg-black">
      <div class="layui-side-scroll"> -->
    <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
    <!--    <ul class="layui-nav layui-nav-tree"  lay-filter="test">
          <li class="layui-nav-item layui-nav-itemed">
            <a class="" href="javascript:;">商品管理</a>
            <dl class="layui-nav-child">
              <dd><a href="/goods/brand">品牌管理</a></dd>
              <dd><a href="/goods/manage">商品管理</a></dd>
              <dd><a href="/goods/size">尺码管理</a></dd>
            </dl>
          </li>
          <li class="layui-nav-item">
            <a href="javascript:;">订单管理</a>
            <dl class="layui-nav-child">
              <dd><a href="/order/index">订单查询</a></dd>
              <dd><a href="/buy/index">购买单查询</a></dd>
              <dd><a href="/sell/index">出售单查询</a></dd>
            </dl>
          </li>
          <li class="layui-nav-item">
            <a href="javascript:;">库存管理</a>
            <dl class="layui-nav-child">
              <dd><a href="/stock/index">库存查询</a></dd>
            </dl>
          </li>
          <li class="layui-nav-item">
            <a href="javascript:;">用户管理</a>
            <dl class="layui-nav-child">
              <dd><a href="/user/index">用户查询</a></dd>
            </dl>
          </li>
        </ul>
      </div>
    </div>
    -->
    <div class="layui-body">
        <!-- 内容主体区域 -->
        <div style="padding: 15px;">
            <div class ="layui-form-item">
                <ul class="layui-timeline">
                    <li class="layui-timeline-item">
                        <i class="layui-icon layui-timeline-axis">&#xe63f;</i>
                        <div class="layui-timeline-content layui-text">
                            <h3 class="layui-timeline-title">8月18日</h3>
                            <p>
                                layui 2.0 的一切准备工作似乎都已到位。发布之弦，一触即发。
                                <br>不枉近百个日日夜夜与之为伴。因小而大，因弱而强。
                                <br>无论它能走多远，抑或如何支撑？至少我曾倾注全心，无怨无悔 <i class="layui-icon"></i>
                            </p>
                        </div>
                    </li>
                    <li class="layui-timeline-item">
                        <i class="layui-icon layui-timeline-axis">&#xe63f;</i>
                        <div class="layui-timeline-content layui-text">
                            <h3 class="layui-timeline-title">8月16日</h3>
                            <p>杜甫的思想核心是儒家的仁政思想，他有“<em>致君尧舜上，再使风俗淳</em>”的宏伟抱负。个人最爱的名篇有：</p>
                            <ul>
                                <li>《登高》</li>
                                <li>《茅屋为秋风所破歌》</li>
                            </ul>
                        </div>
                    </li>
                    <li class="layui-timeline-item">
                        <i class="layui-icon layui-timeline-axis">&#xe63f;</i>
                        <div class="layui-timeline-content layui-text">
                            <h3 class="layui-timeline-title">8月15日</h3>
                            <p>
                                中国人民抗日战争胜利72周年
                                <br>常常在想，尽管对这个国家有这样那样的抱怨，但我们的确生在了最好的时代
                                <br>铭记、感恩
                                <br>所有为中华民族浴血奋战的英雄将士
                                <br>永垂不朽
                            </p>
                        </div>
                    </li>
                    <li class="layui-timeline-item">
                        <i class="layui-icon layui-timeline-axis">&#xe63f;</i>
                        <div class="layui-timeline-content layui-text">
                            <div class="layui-timeline-title">过去</div>
                        </div>
                    </li>
                </ul>
            </div>
            <div id="main1" style="width: 800px;height:400px;" ></div>
            <div class ="layui-form-item">
            </div>
            <div id="main2" style="width: 800px;height:400px;" ></div>
            <div class ="layui-form-item">
            </div>
            <div id="main3" style="width: 800px;height:400px;" ></div>
            <div class ="layui-form-item">
            </div>
            <div id="main4" style="width: 800px;height:400px;" ></div>
        </div>
    </div>

    <div class="layui-footer">
        <!-- 底部固定区域 -->
        © Parallel Universe Created By Li - 2021
    </div>
</div>

<script>
    //JavaScript代码区域
    layui.use('element', function(){
        var element = layui.element;

    });
</script>

</body>
</html>
