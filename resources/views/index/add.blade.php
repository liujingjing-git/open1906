<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="/static/admin/css/bootstrap.min.css"> 
    <script src="{{asset('/static/admin/js/jquery-3.1.1.min.js')}}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">    
    <title>注册</title>
</head>
<body>
<center><h3>欢迎注册</h3></center>
<form action="{{url('index/store')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">公司名称</label>
            <div class="col-sm-10">
                <input type="text" name="r_name" class="form-control" id="firstname"  placeholder="请输入公司名称">
                <b style="color:red"></b>
            </div>
        </div>
        <div class="form-group">
            <label for="lastname" class="col-sm-2 control-label">法人名称</label>
            <div class="col-sm-10">
               <input type="text" name="r_legal" class="form-control" id="lastname" placeholder="请输入法人名称">
               <b style="color:red"></b>
       </div>
       </div> <div class="form-group">
            <label for="lastname" class="col-sm-2 control-label">密码</label>
            <div class="col-sm-10">
               <input type="password" name="r_pwd" class="form-control" id="lastname" placeholder="请输入密码">
               <b style="color:red"></b>
            </div>
        </div>
        </div> <div class="form-group">
            <label for="lastname" class="col-sm-2 control-label">确认密码</label>
            <div class="col-sm-10">
               <input type="password" name="r_pwd1" class="form-control" id="lastname" placeholder="请确认密码">
               <b style="color:red"></b>
            </div>
        </div>
        </div> <div class="form-group">
            <label for="lastname" class="col-sm-2 control-label">公司地址</label>
            <div class="col-sm-10">
               <input type="text" name="r_address" class="form-control" id="lastname" placeholder="请输入公司地址">
               <b style="color:red"></b>
            </div>
        </div> <div class="form-group">
            <label for="lastname" class="col-sm-2 control-label">营业执照照片</label>
            <div class="col-sm-10">
               <input type="file" name="r_logo" class="form-control" id="lastname">
               <b style="color:red"></b>
            </div>
        </div> <div class="form-group">
            <label for="lastname" class="col-sm-2 control-label">联系人电话</label>
            <div class="col-sm-10">
               <input type="text" name="r_tel" class="form-control" id="lastname" placeholder="请输入联系人电话">
               <b style="color:red"></b>
            </div>
        </div>
        </div> <div class="form-group">
            <label for="lastname" class="col-sm-2 control-label">联系人Email</label>
            <div class="col-sm-10">
               <input type="text" name="r_email" class="form-control" id="lastname" placeholder="请输入可用的Email">
               <b style="color:red"></b>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">提交</button>
            </div>
        </div>
</form>
      <script src="https://code.jquery.com/jquery.js"></script>
      <script src="js/bootstrap.min.js"></script>
</body>
</html>