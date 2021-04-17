define(['mage/storage'], function (storage) {
    'use strict';

    return {
        getList: async function () {
            return await storage.get('rest/V1/learn/interactive/' +
                'search?searchCriteria[filter_groups][0][filters][0][field]=color&searchCriteria[filter_groups]' +
                '[0][filters][0][value]=%25%25&searchCriteria[filter_groups][0][filters][0][condition_type]=like');
        },

        delete: async function (color) {
            return await storage.post(
                'rest/V1/learn/interactive/delete',
                JSON.stringify({color: color})
            );
        },

        create: async function (color) {
            return await storage.post(
              'rest/V1/learn/interactive/save',
              JSON.stringify({color: color})
            );
        }

    }
});
