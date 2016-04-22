new Vue({
    el: '#rental',

    data: {
        newRental: {
            Start_date : '',
            End_date   : '',
            Group      : '',
            Email      : ''
        },

        submitted: false
    },

    computed: {
        errors: function() {
            for (var key in this.newRental) {
                if ( ! this.newRental[key]) return true;
            }

            return false;
        }
    },

    methods: {
        onSubmitForm: function(e) {
            e.preventDefault();
            this.newRental = {
                Start_date : '',
                End_date   : '',
                Group      : '',
                Email      : ''
            };
            this.submitted = true;
            console.log('submitting');
        }
    }
});
