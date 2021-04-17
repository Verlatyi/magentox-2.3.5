define([
    "jquery",
    "logger",
    "counter",
    "jquery/ui"
], function ($, logger, counter) {
    "use strict";

    logger.log("congratulation: jsobject.js is loaded. ", " Before return ");

    return  {
        jsobject: function(config, element) {
            if(element) {
                this.dataElement(element);
            } else {
                this.dataConfig(config.id);
            }
        },

        dataConfig: function (element) {
            $(element).append(element.slice(1));
            this.initializationComponent(element, element.slice(1));
        },

        dataElement: function (element) {
            $(element).append(element.id);
            this.initializationComponent(element, element.id);
        },

        initializationComponent: function (element, id) {
            counter.count("Component --Object-- div ID: " + id +
                " initialization time: " + new Date().valueOf() + " ms");
            logger.log(id, " In return ");

            $(element).click(this._clickObject);
        },

        _clickObject: function (e) {
            logger.log("You click on element " + e.target.id, " In return ");
            console.log("Type: Object" + "  Element id: " + this.id);
        },
    }
});
