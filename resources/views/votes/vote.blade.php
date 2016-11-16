<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>投票</title>
    <link rel="stylesheet" href="css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="css/vendor/font-awesome.min.css">
    <link rel="stylesheet" href="css/vendor/swiper-3.3.0.min.css">
    <link rel="stylesheet" href="css/vendor/buttons.css">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
<div class="navbar">
    <div class="container">
        <div class="media">
            <a class="media-left">
                <img src="img/logo.jpg" alt="">
            </a>

            <div class="media-body">
                <h1></h1></div>
        </div>
    </div>
</div>
<div class="navbar navbar-fixed-bottom">
    <div class="container">
        <div class="word">
            <div>
                你已经投了
                <b>@{{ vote_count }}</b>
                <b>/</b>
                <b>@{{ vote.length }}</b> 票.
            </div>
        </div>
        <button type="button" @click='submit_vote' class="button button-caution button-uppercase" id='submit_vote'>
        submit</button>
    </div>
</div>
<div class="container" style="min-height: 800px;">
    <ol class="breadcrumb">
    </ol>
    <div class="row">
        <div class="col-lg-4 col-md-4" v-for="item in vote" track-by="$index">
            <div class="thumbnail">
                <img style="display: block;" :src="item.img_url">

                <div class="caption" v-for="question in item.questions" v-cloak>
                    <p>
                        <span>@{{ $index+1 }}:</span>@{{{ question.question }}}
                    </p>

                    <p v-if=" question.type == 'select'">
                            <span>答案: <span class="text-danger">*</span>
                            <span class="star">
                                <i class="fa fa-star" :class=" question.answer >= 1 ? 'choose':''" @click="star(question,1)"></i>
                                <i class="fa fa-star" :class=" question.answer >= 2 ? 'choose':''" @click="star(question,2)"></i>
                                <i class="fa fa-star" :class=" question.answer >= 3 ? 'choose':''" @click="star(question,3)"></i>
                                <i class="fa fa-star" :class=" question.answer >= 4 ? 'choose':''" @click="star(question,4)"></i>
                                <i class="fa fa-star" :class=" question.answer >= 5 ? 'choose':''" @click="star(question,5)"></i>
                            </span>
                            <span v-show="question.answer == '' " class="label label-default">未选择</span>
                            <span v-show="question.answer == 1" class="label label-danger">非常不好</span>
                            <span v-show="question.answer == 2" class="label label-warning">不好</span>
                            <span v-show="question.answer == 3" class="label label-info">一般</span>
                            <span v-show="question.answer == 4" class="label label-primary">好</span>
                            <span v-show="question.answer == 5" class="label label-success">非常好</span>
                            </span>
                    </p>

                    <div class="form-group" style="margin-top: 10px;" v-if=" question.type == 'comment'">
                        <textarea rows="2" class="form-control" placeholder=""
                                  v-model="question.answer"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var data = {!! $products !!}
</script>
<script src="js/vendor/jquery-2.1.4.min.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/vendor/vue.js"></script>
<script src="js/vote.js"></script>
</body>

</html>
