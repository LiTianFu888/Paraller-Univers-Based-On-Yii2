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
            <li class="layui-nav-item"><a href="/universe/story">Story Of Them</a></li>
            <li class="layui-nav-item"><a href="/universe/tell">He Want To Tell Her</a></li>
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
            <li class="layui-nav-item"><a href="/universe/logout">logout</a></li>
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
    <div class="layui-body"  style="left: 0px">
        <!-- 内容主体区域 -->
	<div class ="layui-form-item">

	</div>	
	<div class ="layui-form-item">

	</div>	
            <div class="demoTable">
    		<div class="layui-input-block" contenteditable="true">
      			<textarea id = "storyText" name="desc" placeholder="To be continue" class="layui-textarea"></textarea>
    		</div>
    		<div class="layui-input-block" style="left: 0px">
      			<button class="layui-btn" data-type="reload" >say</button>
    		</div>
            </div>

        <div class ="layui-form-item">

        </div>
	<div class = "layui-input-block" contenteditable="true">
        	<table class="layui-hide" id="LAY_table_user" lay-filter="story"></table>
	</div>
    </div>

    <div class="layui-footer" style = "left:0px">
        <!-- 底部固定区域 -->
        © Parallel Universe Created By Li - 2021
    </div>
</div>

<script>
    //JavaScript代码区域
    layui.use('element', function(){
        var element = layui.element;

    });
    layui.use('table', function(){
        var table = layui.table;
        //监听表格复选框选择
        table.on('checkbox(demo)', function(obj){
            console.log(obj)
        });
        //方法级渲染
        table.render({
            elem: '#LAY_table_user'
            ,url: '/universe/storytable'
            ,cols: [[
                {field:'time', title: '时间', width:200, sort: true, fixed: true}
                ,{field:'msg', title: '消息', width:1000}

            ]]
            ,id: 'storyTable'
            ,page: false
	    ,method: 'post'
            ,height: '80%'
            ,width:'100%'
        });
        var $ = layui.$, active = {
            getCheckData: function(){ //获取选中数据
                var checkStatus = table.checkStatus('testReload')
                    ,data = checkStatus.data;
                layer.alert(JSON.stringify(data));
            }
            , reload: function(){
                var demoReload = $('#story');

                //执行重载
                table.reload('storyTable', {
                    page: {
                        curr: 1 //重新从第 1 页开始
                    }
                    ,where: {
                        id: demoReload.val()
                    }
                    ,url: '/universe/storytable'
                    ,method: 'post'
                }, 'data');
            }
        };
        $('.demoTable .layui-btn').on('click', function(){
            var text = document.getElementById('storyText');
	    var data = text.value;
	    $.ajax({
              url:'storyadd',
              type:'post',
              data:{msg:data},
              success:function(data){
                  if(data.code == '0'){
                      layer.msg(data.msg,{icon: 5});//失败的表情
                      o.removeClass('layui-btn-disabled');
                      return;
                  }else{
                      layer.msg(data.msg, {
                          icon: 6,//成功的表情
                          time: 1000 //1秒关闭（如果不配置，默认是3秒）
                      }, function(){
                          location.reload();
                      });
                  }
              },
          });
      
        });

        $('.demoTable .layui-btn').on('click', function(){
            var type = $(this).data('type');
            active[type] ? active[type].call(this) : '';
        });
    });
</script>

</body>
</html>
