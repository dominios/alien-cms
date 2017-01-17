'use strict';

function UserFactory () {

    function User (name, role) {
        this.name = name;
        this.role = role;
    }

    User.prototype = {
        setData: function (data) {
            angular.extend(this, data);
        }
    };

    return User;
}

export default UserFactory;
