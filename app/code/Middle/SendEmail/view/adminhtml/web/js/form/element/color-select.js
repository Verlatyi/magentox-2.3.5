define(['Magento_Ui/js/form/element/abstract'],function(Abstract) {
    return Abstract.extend({
        defaults: {
            items: [
                {
                    name: 'yellow',
                    val: '#ec971f'
                },
                {
                    name:'green',
                    val:'#5cb85c'
                },
                {
                    name:'blue',
                    val:'#28a4c9'
                },
                {
                    name:'red',
                    val:'#e9322d'
                },
                {
                    name: 'black',
                    val: '#430073'
                },
                {
                    name: 'pink',
                    val: '#ef34ff'
                },
                {
                    name: 'white',
                    val: '#ffffff'
                },
                {
                    name: 'light-pink',
                    val: '#cdcdff'
                }
            ]
        },

        /**
         * Initializes component, invokes initialize method of Abstract class.
         *
         *  @returns {Object} Chainable.
         */
        initialize: function () {
            return this._super();
        },


        /**
         * Init observables
         *
         * @returns {Object} Chainable.
         */
        initObservable: function () {
            return this._super()
                .observe([
                    'items'
                ]);
        },

        /**
         * Change currently selected color
         *
         * @param {String} color
         */
        selectColor: function(color){
            this.value(color);

        },

        /**
         * Returns class based on current selected color
         *
         * @param {String} color
         * @returns {String}
         */
        isSelected: function (color) {

            return color === this.value() ? 'selected' : '';

        }
    });
});
