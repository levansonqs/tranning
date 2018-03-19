<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>E-Shopper</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row notify">
			<div class="col-md-6 col-md-offset-1 text-left">
				<h1>Bạn không có quyền truy cập </h1>
				<h2>Click vào <a href="{{ route('admin.index.index') }}" title="">đây</a> để quay trở lại</h2>
			</div>
		</div>
	</div>
</body>
</html>

<style type="text/css" media="screen">
body{
	background: lightblue url("/storage/images/tree.jpg") no-repeat fixed center; 
	color:white;
}
.notify{
	background: #121010;
	opacity: 0.8;
	padding: 20px;
	margin: 20px;
}
</style>