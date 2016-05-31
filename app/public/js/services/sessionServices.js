/**
 * Created by Taban on 5/29/16.
 */


apartmentSearch.factory("SessionService", function () {

    return {
        set: function (key, value) {
            return sessionStorage.setItem(key, value);
        },

        get: function (key) {
            return sessionStorage.getItem(key);
        }
        ,

        destroy: function () {
            for (var key in sessionStorage) {
                sessionStorage.removeItem(sessionStorage.getItem[key]);
            }
        }
    }
});