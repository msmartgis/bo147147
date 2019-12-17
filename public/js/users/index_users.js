function getUser(user_id) {
    var user = null;

    $.ajax({
        async: false,
        global: false,
        url: "/users/" + user_id,
        type: "GET",
        dataType: 'JSON',
        data: {},
        success: function (res) {
            user = res;
        }
    });

    return user;
}
