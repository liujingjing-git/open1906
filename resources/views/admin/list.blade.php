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
    <title>列表</title>
</head>
<body>
<center><h3>列表</h3></center>
<form action="{{url('index/store')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
<table class="table table-striped">
  <caption>用户信息</caption>
        <thead>
            <tr>
                <th>公司名称</th>
                <th>法人</th>
                <th>公司地址</th>
                <th>营业执照照片</th>
                <th>联系人电话</th>
                <th>Email</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
        @foreach($data as $v)
            <tr>
                <td>{{$v->r_name}}</td>
                <td>{{$v->r_legal}}</td>
                <td>{{$v->r_address}}</td>
                <td>  <img src="{{asset('storage'.$v->r_logo)}}"  width="50px" height="50px"> </td>
                <td>{{$v->r_tel}}</td>
                <td>{{$v->r_email}}</td>
                <td>
                    <a href="">删除</a>  |
                    <a href="">编辑</a>
                </td>
            </tr>
        @endforeach
        </tbody>
        </table>
         {{$data->links()}}
      <script src="https://code.jquery.com/jquery.js"></script>
      <script src="js/bootstrap.min.js"></script>
</body>
</html>