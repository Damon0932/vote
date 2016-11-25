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
                <b>@{{ vote_count }}</b>
                <b>/</b>
                <b>@{{ vote.length }}</b>
            </div>
        </div>
        <button type="button" @click='show_modal' class="button button-caution button-uppercase" id='submit_vote'>
        提交</button>
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
                            <span>评分: <span class="text-danger">*</span>
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
<br><br><br>

<div class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                            class="sr-only">Close</span></button>
                <h4 class="modal-title">请您完成剩下的内容:</h4>
            </div>
            <div class="modal-body">
                <form role="form" @submit.prevent="submit_vote">
                    <input type="hidden" name="category" value="{{$category}}" v-model="category">
                    <div class="form-group" v-for="question in questions">
                        <label for="@{{ 'question_' + $index }}">@{{ question.question }}</label>
                        <textarea required rows="3" type="text" class="form-control" id="@{{ 'question_' + $index }}"
                                  placeholder="" v-model="question.answer"></textarea>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="name">姓名</label>
                        <input required type="text" class="form-control" id="name" placeholder="输入您的姓名"
                               v-model="info.name">
                    </div>
                    <div class="form-group">
                        <label for="phone">电话(GOSO会员登记手机)</label>
                        <input required type="number" class="form-control" id="phone" placeholder="输入您的电话"
                               v-model="info.phone">
                    </div>
                    <div class="form-group">
                        <label for="age">年龄</label>
                        <input required type="number" class="form-control" id="age" placeholder="输入您的年龄"
                               v-model="info.age">
                    </div>
                    <div class="form-group">
                        <label for="job">从事职业</label>
                        <select required class="form-control" id="job" v-model="info.job">
                            <option value="学生">学生</option>
                            <option value="公务员">公务员</option>
                            <option value="家庭主妇">家庭主妇</option>
                            <option value="工厂职工">工厂职工</option>
                            <option value="服务/销售">服务/销售</option>
                            <option value="自由职业者">自由职业者</option>
                            <option value="其他">其他</option>
                        </select>
                    </div>
                    <div class="form-group" v-if="info.job == '其他'">
                        <label for="job">请输入您的职业</label>
                        <input required type="text" class="form-control" id="job_other" placeholder="输入您的职业"
                               v-model="info.job_other">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                        <button type="submit" class="btn btn-primary">提交</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script type="text/javascript">
    var data = {!! $products !!}
</script>
<script src="js/vendor/jquery-2.1.4.min.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/vendor/vue.js"></script>
<script src="js/vote.js"></script>
</body>

</html>
