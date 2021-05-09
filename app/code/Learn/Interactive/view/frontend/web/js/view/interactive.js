define([
    'uiComponent',
    'jquery',
    'Magento_Ui/js/modal/confirm',
    'Learn_Interactive/js/operation/color',
    'Learn_Interactive/js/check/check',
    'mage/translate'
], function (Component, $, confirmModal, colorOperation, colorCheck, $t) {
    'use strict';

    return Component.extend({

        defaults: {
            buttonEnterClick: '#add-new-btn-color-id',
            classSelector: '.li-label',
            newColorLabel: '',
            red: 'red',
            colors: [],
            customColors: [
                {color: $t('red')},
                {color: "blue"},
                {color: "yellow"},
                {color: "green"},
                {color: "pink"},
                {color: "orange"},
                {color: "white"},
                {color: "black"},
                {color: "gray"},
                {color: "brown"}
            ],
            selectedItem: ''
        },

        initObservable: function () {
            this._super().observe(['colors', 'newColorLabel', 'customColors', 'selectedItem']);

            var self = this;

            console.log("color operation" + colorOperation.getList());

            colorOperation.getList().then(function (colors) {
                console.log("colors " + colors.items[1].color);

                self.colors(colors.items);

                $(self.classSelector).each(function(index){
                    console.log("colors " + colors.items[index].color)
                    self.addClassColor(this, colors.items[index].color);
                });

                return colors;
            });

/*            colorOperation.getList().then(function (colors) {
                console.log("colors " + colors[1].color);

                self.colors(colors);

               $(self.classSelector).each(function(index){
                   console.log(colors[index].color);
                   self.addClassColor(this, colors[index].color);
                });

                return colors;
            });*/

            return this;
        },

        deleteColor: function (colorId) {
            var self = this;
            confirmModal({
                content: 'Are you sure you want to remove this beautiful color?',
                actions: {
                    confirm: function () {
                        var colors = [];

                        colorOperation.delete(self.colors().find(function (color) {
                            if(color.color_id === colorId) {
                                return color;
                            }
                        }));

                        if(self.colors().length === 1) {
                            self.colors(colors);
                            return;
                        }

                        self.colors().forEach(function (color) {
                            if (color.color_id !== colorId) {
                                colors.push(color);
                            }
                        });

                        $(self.classSelector).each(function(index){
                            $(this).removeClass().addClass("li-label");
                        });

                        self.initObservable();
                    }
                }
            });
        },

        addColor: function () {

            var color = {
                color: this.newColorLabel()
            };

            this.newDataColor(color);
        },

        addToClickEnter: function (data, event) {
            if(event.keyCode === 13) {
                event.preventDefault();
                $(this.buttonEnterClick).click();
            }
        },

        addClassColor: function (selector, color) {
            $(selector).addClass(color);
        },

        removeClassColor: function (selector) {
            $(selector).removeClass();
        },

        clickIcoColor: function (data, event) {
            const newColor = $(event.target).data('color');

            var color = {
                color: newColor
            };

            this.newDataColor(color);
        },

        newDataColor: function (color) {
            const self = this;

            if(colorCheck.checkColors(color) === true) {
                colorOperation.create(color).then(function (colorId) {
                    color.color_id = colorId;

                    self.colors.push(color);

                    console.log(colorCheck.checkColors(color));

                    $(self.classSelector).each(function(index){
                        $(this).removeClass().addClass("li-label");
                    });

                    self.initObservable();
                    self.selectedItem('');
                    self.newColorLabel('');
                });
            } else {
                alert("Color not found!");
            }
        },

        selectColor: function () {
            const select = this.selectedItem();

            this.newDataColor(select);
        }
    });
});
