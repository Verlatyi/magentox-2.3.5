define([
    "jquery",
    "logger",
    "counter",
    'jquery/ui'
], function($, logger, counter) {
    "use strict";

    logger.log("congratulation: jswidget.js is loaded. ", " Before return ");

    $.widget("learn.jswidget", {
        _create: function () {
           if(this.element[0].id) {
               this.dataElement(this.element[0]);

           } else {
               this.dataOptions(this.options.id);
           }
        },
        dataOptions: function (element) {
            $(this.options.id).append(element.slice(1));
            this.initializationComponent(this.options.id, element.slice(1));
        },
        dataElement: function (element) {
            $(element).append(element.id);
            this.initializationComponent(element, element.id);
        },
        initializationComponent: function (element, id) {
            counter.count("Component --Widget-- div ID: " + id +
                " initialization time: " + new Date().valueOf() + " ms");
            logger.log(id, " In return ");

            $(element).on("click", this._clickWidget);
        },
        _clickWidget: function (e) {
            logger.log("You click on element with ID: " + e.target.id, " In return ");
            console.log("Type: Widget" + "  Element id: " + this.id);
        }

    });

    return $.learn.jswidget;
});
