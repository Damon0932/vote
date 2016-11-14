var vm = new Vue({
    el: 'body',
    data: {
        vote: data;
    },
    methods: {
        star: function(index, value) {
            this.vote[index].answer = value;
        },
        submit_vote: function(){
            if( this.vote_count == this.vote.length){
                $.post(window.location.href, {answer:this.vote}, function(data){
                    if(data){

                    }
                })
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
