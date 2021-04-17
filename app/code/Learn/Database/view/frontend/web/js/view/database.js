define([
    'uiComponent',
    'jquery',
    'Learn_Database/js/operation/databaseModel'
], function (Component, $, databaseModel){
    'use strict';

    return Component.extend({
       defaults: {
           databases: [],
           oid: 0
       },

        initObservable: function () {
            this._super().observe(['databases', 'oid']);
            return this;
       },


        addDatabase: function () {

            var self = this;


            var label = self.oid();
            console.log(typeof Number(label));

            databaseModel.getById(Number(label)).then(function (databases) {
                self.databases(databases);
                console.log(databases);
                return databases;
            });
        },

/*get*/
/*        defaults: {
            databaseId: 2
        },

        initObservable: function () {
            this._super().observe(['databaseId']);

            var self = this;

            console.log(databaseModel.getElement());

            return this;
        }*/
    });
});
