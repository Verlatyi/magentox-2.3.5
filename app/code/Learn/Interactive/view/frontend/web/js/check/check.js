define(function() {
    "use strict";
    var arr = ["red", "blue", "yellow", "green", "pink", "orange", "white", "black", "gray", "brown"];

    return {
        checkColors: function(color){
                var bool = false;

                arr.forEach(function (item, i){
                    if(item == color.color) {
                        bool = true;
                    }
                });

                return bool;
        }
    };
});
