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
            <small>不倒绒：{{$bdrCount}}|法兰绒：{{$flrCount}}|文胸：{{$braCount}}</small>
        </h1>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">投票结果</div>
        <table class="table table-striped table-bordered table-hover">
            <th>电话</th>
            <th>姓名</th>
            <th>年纪</th>
            <th>从事工作</th>
            <th> a. 请问您喜欢这一系列衣服么？为什么？</th>
            <th>b. 对于GOSO的家居服（文胸）您会希望要什么类型的衣服呢？</th>
            <th>投票时间</th>
            <th>操作</th>
            </th>
            @foreach($votes as $vote)
                <tr>
                    <td>{{$vote->phone}}</td>
                    <td>{{$vote->name}}</td>
                    <td>{{$vote->age}}</td>
                    <td>{{$vote->job}}</td>
                    @foreach($vote->voteQuestions as $question)
                        <td>{{$question->answer}}</td>
                    @endforeach
                    <td><a href="/result/vote-detail?vote_id={{$vote->id}}">详情</a></td>
                    <td>{{$vote->created_at}}</td>
                </tr>
            @endforeach
        </table>
    </div>
    {{ $votes->render() }}
</div>


<script type="text/javascript" src="js/vendor/jquery.min.js"></script>
<script type="text/javascript" src="js/vendor/bootstrap.min.js"></script>
</body>

</html>
