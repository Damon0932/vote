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
<div class="container" style="min-height: 800px;">
    <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Vote</li>
    </ol>
    <div class="col-lg-12 light-block">
        <div class="row">
            <div class="col-md-5">
                <img src="img/01.png" alt="">
            </div>
            <div class="col-md-7">
                <h2 style="font-weight: bold;">YOUR OUTFITS</h2>
                <h2 style="font-weight: lighter;" class="text-center underline">YOUR CHOICE</h2>
                <p>Now's your chance to participate in designing upcoming Allegra K collections. Complete the questionnaire to WIN an Allegra K outfit for FREE!</p>
                <br>
                <div class="col-xs-0 col-md-1"></div>
                <button class="button button-uppercase button-border col-md-4 col-xs-5">q &amp; a</button>
                <div class="col-xs-2"></div>
                <button type="button" id='vote_button' class="button button-uppercase button-caution col-md-4 col-xs-5">vote now</button>
            </div>
        </div>
    </div>
    <div class="col-lg-12 light-block">
        <div class="row">
            <div class="col-lg-4 col-md-5 ">
                <img src="img/02.png" alt="">
            </div>
            <div class="col-md-8">
                <h2 style="font-weight: lighter;" class="underline">GOTHIC CHIC
                        <span style="font-size: 40%;font-weight: lighter;border-radius: 0;vertical-align: text-top;background-color: #45B6AF;" class="label label-success">
                        IN PROGRESS
                        </span>
                </h2>
                <p>Please fill in your email and start voting.</p>
                <form action="####" method="post" id="index_form">
                <div class="input-group col-lg-4 col-md-6 col-sm-12 col-xs-12 has-error">
                        <span class="input-group-addon">
                            <i class="fa fa-envelope"></i>
                        </span>
                    <input required type="email" name="email" placeholder="" id="email" class="form-control" title="Please enter your email address.">
                </div>
                <br>
                <div class="input-group col-lg-4 col-md-6 col-sm-12 col-xs-12">
                    <button id="submit_button" href="vote.html" type="submit" class="button button-uppercase button-caution col-xs-12">vote now</button>
                </div>
                </form>
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
                <p><i class="fa fa-weibo"></i><i class="fa fa-wechat"></i><i class="fa fa-qq"></i><i class="fa fa-skype"></i></p>
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
<div class="copy-info">
    <div class="container">
        <p>2016 Copyright © 123@123 Co. Ltd. All Rights Reserved.</p>
    </div>
</div>
<script src="js/vendor/jquery-2.1.4.min.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/vendor/swiper-3.3.0.min.js"></script>
<script src="js/vendor/vue.js"></script>
<script>
    $('#vote_button').click(function(event) {
        $('#submit_button').click();
    });
</script>
</body>

</html>
