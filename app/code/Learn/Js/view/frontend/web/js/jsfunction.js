define([
    "jquery",
    "logger",
    "counter"
], function ($, logger, counter) {
    "use strict";

    logger.log("congratulation: jsfunction.js is loaded. ", " Before return ");

    return function(config, element) {
            if(element) {
                dataElement(element);
            } else {
                dataConfig(config.id);
            }
    }

    function dataConfig(element) {
        $(element).append(element.slice(1));
        initializationComponent(element, element.slice(1));
    }

    function dataElement(element) {
        $(element).append(element.id);
        initializationComponent(element, element.id);
    }

    function initializationComponent(element, id) {
        counter.count("Component --Function-- div ID: " + id +
            " initialization time: " + new Date().valueOf() + " ms");
        logger.log(id, " In return ");

        $(element).click(function (e) {
            logger.log("You click on element " + e.target.id, " In return ");
            console.log("Type: function" + "  Element id: " + this.id);
        });
    }
});