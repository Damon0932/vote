var vm = new Vue({
    el: 'body',
    data: {
        vote: [{
            img_url: 'img/1.jpg',
            question: 'Would you buy this style at <b>$18?</b>',
            answer: 0,
            comment: ''
        }, {
            img_url: 'img/2.jpg',
            question: 'Would you buy this style at <b>$18?</b>',
            answer: 0,
            comment: ''
        }, {
            img_url: 'img/3.jpg',
            question: 'Would you buy this style at <b>$18?</b>',
            answer: 0,
            comment: ''
        }, {
            img_url: 'img/4.jpg',
            question: 'Would you buy this style at <b>$18?</b>',
            answer: 0,
            comment: ''
        }, {
            img_url: 'img/5.jpg',
            question: 'Would you buy this style at <b>$18?</b>',
            answer: 0,
            comment: ''
        }, {
            img_url: 'img/6.jpg',
            question: 'Would you buy this style at <b>$18?</b>',
            answer: 0,
            comment: ''
        }, {
            img_url: 'img/7.jpg',
            question: 'Would you buy this style at <b>$18?</b>',
            answer: 0,
            comment: ''
        }, {
            img_url: 'img/8.jpg',
            question: 'Would you buy this style at <b>$18?</b>',
            answer: 0,
            comment: ''
        }, {
            img_url: 'img/9.jpg',
            question: 'Would you buy this style at <b>$18?</b>',
            answer: 0,
            comment: ''
        }, {
            img_url: 'img/10.jpg',
            question: 'Would you buy this style at <b>$18?</b>',
            answer: 0,
            comment: ''
        }],
    },
    methods: {
        star: function(index, value) {
            this.vote[index].answer = value;
        },
        submit_vote: function(){
            if( this.vote_count == this.vote.length){
                // $.post('###', this.vote, function(data){
                //     if(data){

                //     }
                // })
            }
        }
    },
    computed: {
        vote_count: function() {
            var i = 0;
            for (item in this.vote) {
                if (this.vote[item].answer > 0) {
                    i++;
                }
            }
            if( i != this.vote.length ){
                $('#submit_vote').attr('disabled','disabled')
            }else{
                $('#submit_vote').removeAttr('disabled')
            }
            return i;
        }
    }
});
