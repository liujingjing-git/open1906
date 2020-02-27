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
    <title>登录</title>
</head>
<body>
<center><h3>欢迎登录</h3></center>
<form action="{{url('index/logindo')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">名称</label>
            <div class="col-sm-10">
                <input type="text" name="r_legal" class="form-control" id="firstname"  placeholder="请输入法人名称">
                <b style="color:red"></b>
            </div>
        </div>
        <div class="form-group">
            <label for="lastname" class="col-sm-2 control-label">个人密码</label>
            <div class="col-sm-10">
               <input type="password" name="r_pwd" class="form-control" id="lastname" placeholder="请输入密码">
               <b style="color:red"></b>
       </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">登录</button>
            </div>
        </div>
</form>
      <script src="https://code.jquery.com/jquery.js"></script>
      <script src="js/bootstrap.min.js"></script>
</body>
</html>