var vm = new Vue( {
    el: 'body',
    data: {
        vote: [
            { value: 0 },
            { value: 0 },
            { value: 0 },
            { value: 0 },
            { value: 0 },
            { value: 0 },
            { value: 0 },
            { value: 0 },
            { value: 0 },
            { value: 0 }
        ],
    },
    methods: {
        star: function( index, value ) {
            this.vote[index].value = value;
        }
    },
    computed: {
        vote_count: function() {
            console.log(this.vote[0]);
            var i = 0;
            for(item in this.vote) {
                if(this.vote[item].value > 0){
                    i++;
                }
            }
            return i;
        }
    }
} );
