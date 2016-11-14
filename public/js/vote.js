var vm = new Vue({
    el: 'body',
    data: {
        vote: data,
    },
    methods: {
        star: function(question,value) {
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
            var select = false;
            for (item in this.vote) {
                for (answer in this.vote[item].questions) {
                    if (answer.answer == '' && answer.type == 'select') {
                        select = true;
                    }
                }
                if(select){
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
