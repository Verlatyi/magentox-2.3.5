
define(function() {
    "use strict";
    var arr = [];
    var arr2 = [];
    var i = 0;
    return {
        count : function(name){
            i++;
            arr2[i] = name;
            //arr[name] = parseInt(new Date().valueOf());
            console.log(" Component: " + name + " Time ready: " + new Date().valueOf());
        },

        resaultCount : function () {
            console.log(arr2);

            /*arr2.sort(function(a, b) {
                return parseInt(a) - parseInt(b);
            })*/
            /*arr.sort(function(a, b) {
                return parseInt(a)- parseInt(b);
            });*/

            //console.log(arr);
        }
    };
});