new Vue({
    el: '#component',

    data: {
        newRental: {
            Start_date : '',
            End_date   : '',
            Group      : '',
            Email      : ''
        },

        newUser: {
            email  : '',
            gsm    : '',
            name   : ''
        },

        submitted: false
    },

    computed: {
        errorsNewRental: function() {
            for (var key in this.newRental) {
                if ( ! this.newRental[key]) return true;
            }

            return false;
        },

        errorsNewUser: function() {
            for (var key in this.newUser) {
                if ( ! this.newUser[key]) return true;
            }

            return false;
        }
    },

    methods: {
        // paste here your methods.
    }
});
