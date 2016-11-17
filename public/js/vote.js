var vm = new Vue({
    el: 'body',
    data: {
        vote: data,
        questions: [{
            question: 'a. 请问您喜欢这一系列衣服么? 为什么?',
            answer: ''
        }, {
            question: 'b. 对于GOSO的家居服(文胸)您会希望要什么类型的衣服呢?',
            answer: ''
        }],
        info: {
            name: '',
            phone: '',
            age: '',
            job: '',
            job_other: ''
        }
    },
    methods: {
        star: function(question, value) {
            question.answer = value;
        },
        show_modal: function() {
            $('.modal').modal('show');
        },
        submit_vote: function() {
            if (this.vote_count == this.vote.length) {
                $.post(window.location.href, { 
                    votes: this.vote,
                    questions: this.questions,
                    info: this.info
                }, function(data) {
                    if (data.success) {
                        alert('投票成功!');
                        history.go(-1);
                    }
                })
            }
        }
    },
    computed: {
        vote_count: function() {
            var i = 0;
            for (item in this.vote) {
                var select = true;
                for (answer in this.vote[item].questions) {
                    if (this.vote[item].questions[answer].answer == '' && this.vote[item].questions[answer].type == 'select') {
                        select = false;
                    }
                }
                if (select) {
                    i++;
                }
            }
            if (i != this.vote.length) {
                $('#submit_vote').attr('disabled', 'disabled')
            } else {
                $('#submit_vote').removeAttr('disabled')
            }
            return i;
        }
    }
});
