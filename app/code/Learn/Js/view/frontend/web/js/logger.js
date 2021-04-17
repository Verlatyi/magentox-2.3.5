

define(function() {
    "use strict";

    return {
        log : function(param, state){
            console.log(state + param + " Date in ms: " + new Date().valueOf());
        }
    };
});