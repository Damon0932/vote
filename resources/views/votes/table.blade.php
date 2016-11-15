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
            <small>&emsp;vote</small>
        </h1>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">投票结果</div>
        <table class="table table-striped table-bordered table-hover">
            <th>Eamil</th>
            <th>Question</th>
            <th>Answer</th>
            <th>Time</th>
            </th>
            @foreach($results as $result)
                <tr>
                    <td>{{$result->email}}</td>
                    <td>{{$result->product->question}}</td>
                    <td>{{$result->answer}}</td>
                    <td>{{$result->created_at}}</td>
                </tr>
            @endforeach
        </table>
    </div>
    {{ $results->render() }}
</div>


<script type="text/javascript" src="js/vendor/jquery.min.js"></script>
<script type="text/javascript" src="js/vendor/bootstrap.min.js"></script>
</body>

</html>
