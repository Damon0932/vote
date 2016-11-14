var vm = new Vue({
    el: 'body',
    data: {
        vote: data,
    },
    methods: {
        star: function(question, value) {
            question.answer = value;
        },
        submit_vote: function() {
            if (this.vote_count == this.vote.length) {
                $.post(window.location.href, { answer: this.vote }, function(data) {
                    if (data.success) {
                        alert('投票成功!');
                        window.location.href = '/';
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
