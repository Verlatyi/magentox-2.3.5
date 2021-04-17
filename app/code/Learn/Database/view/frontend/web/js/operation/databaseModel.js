define(['mage/storage'], function (storage) {
    'use strict';

    return {
        getById: async function (oid) {
            console.log("model" + oid);
            return await storage.get('rest/V1/learn/database/iid/' + oid);
        }
    }
});
