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

export default PageFactory;
