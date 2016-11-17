define([], function () {
    'use strict';

    function PageFactory () {

        function Page () {
        }

        Page.prototype = {
            setData: function (data) {
                angular.extend(this, data);
            }
        };

        return Page;
    }

    return PageFactory;

});