<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="shortcut icon" href="/favicon.ico"> -->
    <title>Result</title>

    <link rel="stylesheet" href="css/vendor/bootstrap.min.css">

</head>

<body>
<div class="container">
    <div class="page-header">
        <h1>Result
            <small>&emsp;demo</small>
        </h1>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">123123</div>
        <table class="table table-striped table-bordered table-hover">
            <th>
            <th>邮箱</th>
            <th>问题</th>
            <th>分数</th>
            <th>留言</th>
            <th>时间</th>
            </th>
            @foreach($results as $result)
                <tr>
                    <td>{{$result->email}}</td>
                    <td>{{$result->question}}</td>
                    <td>{{$result->answer}}</td>
                    <td>{{$result->comment}}</td>
                    <td>{{$result->created_at}}</td>
                </tr>
            @endforeach
        </table>
        {{ $products->render() }}
    </div>
</div>


<script type="text/javascript" src="js/vendor/jquery.min.js"></script>
<script type="text/javascript" src="js/vendor/bootstrap.min.js"></script>
</body>

</html>
