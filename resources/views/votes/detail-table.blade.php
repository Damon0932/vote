<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="shortcut icon" href="/favicon.ico"> -->
    <title>Result</title>

    <link rel="stylesheet" href="/css/vendor/bootstrap.min.css">

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
            <th>Question</th>
            <th>Answer</th>
            @foreach($voteDetails as $detail)
                <tr>
                    <td>{{$detail->question}}</td>
                    <td>{{$detail->answer}}</td>
                </tr>
            @endforeach
        </table>
    </div>
    {{ $voteDetails->render() }}
</div>


<script type="text/javascript" src="js/vendor/jquery.min.js"></script>
<script type="text/javascript" src="js/vendor/bootstrap.min.js"></script>
</body>

</html>
