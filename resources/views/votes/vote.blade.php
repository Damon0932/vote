<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vote</title>
    <!-- <link rel="shortcut icon" href="/favicon.ico"> -->
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
                <img src="img/logo_150.png" alt="">
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
                You have rated
                <b>@{{ vote_count }}</b>
                <b>/</b>
                <b>@{{ vote.length }}</b> styles.
            </div>
        </div>
        <button type="button"  @click='submit_vote' class="button button-caution button-uppercase" id='submit_vote'>submit</button>
    </div>
</div>
<div class="container" style="min-height: 800px;">
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li><a href="#">Vote</a></li>
    </ol>
    <div class="col-lg-12 light-block text-center">
        <h2 style="margin: 0;color: #f28794;font-weight: 300;">Gothic Chic</h2>
        <hr>
        <p><span class="text-danger">*</span> Please rate ALL OUTFITS by clicking the stars before
            <button class="button-caution" style="padding: 0 4px; border: none;">submit</button>
        </p>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-4" v-for="item in vote" track-by="$index">
            <div class="thumbnail">
                <img style="display: block;" :src="item.img_url">

                <div class="caption"  v-for="question in questions">
                    <p>
                        <span>Question@{{ $index }}:</span>@{{{ question.question }}}
                    </p>

                    <p v-if=" question.type == 'select'">
                            <span>Answer: <span class="text-danger">*</span>
                            <span class="star">
                                <i class="fa fa-star" :class=" question.answer >= 1 ? 'choose':''" @click="star(question,1)"></i><i class="fa fa-star" :class=" question.answer >= 2 ? 'choose':''" @click="star(question,2)"></i><i class="fa fa-star" :class=" question.answer >= 3 ? 'choose':''" @click="star(question,3)"></i><i class="fa fa-star" :class=" question.answer >= 4 ? 'choose':''" @click="star(question,4)"></i><i class="fa fa-star" :class=" question.answer >= 5 ? 'choose':''" @click="star(question,5)"></i>
                            </span>
                            <span v-show="question.answer == '' " class="label label-default">Not Rated</span>
                            <span v-show="question.answer == 1" class="label label-danger">Very Unlikely</span>
                            <span v-show="question.answer == 2" class="label label-warning">Unlikely</span>
                            <span v-show="question.answer == 3" class="label label-info">Maybe</span>
                            <span v-show="question.answer == 4" class="label label-primary">Likely</span>
                            <span v-show="question.answer == 5" class="label label-success">Very Likely</span>
                            </span>
                    </p>

                    <div class="form-group" style="margin-top: 10px;" v-if=" question.type == 'comment'">
                        <textarea rows="2" class="form-control" placeholder="Leave a comment. (Optional)" v-model="question.answer"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-12 col-xs-12 footer-block">
                <h2>About</h2>

                <p>
                    Company Limited.
                </p>
            </div>
            <div class="col-lg-4 col-sm-12 col-xs-12 footer-block">
                <h2>Shares</h2>

                <p><i class="fa fa-weibo"></i><i class="fa fa-wechat"></i><i class="fa fa-qq"></i><i
                            class="fa fa-skype"></i></p>
            </div>
            <div class="col-lg-4 col-sm-12 col-xs-12 footer-block">
                <h2>Contacts</h2>
                <address class="margin-bottom-40">
                    Email: <a href="mailto:123@123.com">123@123.com</a>
                </address>
            </div>
        </div>
    </div>
</footer>
{{-- <div class="copy-info">
    <div class="container">
        <p>2016 Copyright © 123@123 Co. Ltd. All Rights Reserved.</p>
    </div>
</div> --}}

<script type="text/javascript">
    var data = {!! $products !!}
</script>
<script src="js/vendor/jquery-2.1.4.min.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/vendor/vue.js"></script>
<script src="js/vote.js"></script>
</body>

</html>
