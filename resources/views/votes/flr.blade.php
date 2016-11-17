<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>投票</title>
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
                <img src="img/logo.jpg" alt="">
            </a>

            <div class="media-body">
                <h1></h1></div>
        </div>
    </div>
</div>
<div class="container" style="min-height: 800px;">
<br>
    <div class="col-lg-12 light-block">
        <div class="row">
            <div class="col-lg-4 col-md-5 ">
                <img src="img/法兰绒.jpg" alt="">
            </div>
            <div class="col-lg-8 col-md-7">
                <h2 style="font-weight: lighter;" class="underline">法兰绒
                        <span style="font-size: 40%;font-weight: lighter;border-radius: 0;vertical-align: text-top;background-color: #45B6AF;"
                              class="label label-success">
                        持续进行中
                        </span>
                </h2>

                <p>请填写邮箱，然后点击“开始投票”按钮开始投票。</p>

                <form action="#" @submit.prevent="submit_vote('法兰绒')" method="post" id="index_form">
                    <div class="input-group col-lg-4 col-md-6 col-sm-12 col-xs-12 has-error">
                        <span class="input-group-addon">
                            <i class="fa fa-mobile-phone"></i>
                        </span>
                        <input required type="number" v-model="phone" name="phone" placeholder="请输入手机号"
                               id="phone" class="form-control" title="Please enter your email address.">
                    </div>
                    <br>

                    <div class="input-group col-lg-4 col-md-6 col-sm-12 col-xs-12">
                        <button id="submit_button" type="submit"
                                class="button button-uppercase button-caution col-xs-12">开始投票
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="js/vendor/jquery-2.1.4.min.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/vendor/vue.js"></script>
<script>


    new Vue({
        el: 'body',
        data: {
            phone: '',
        },
        methods: {
            submit_vote: function (e) {
                window.location.href = '/vote?phone=' + this.phone + '&category=' + e;
            }
        }
    });


    $('#vote_button').click(function (event) {
        $('#submit_button').click();
    });
</script>
</body>

</html>
