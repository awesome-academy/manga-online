let main = {
    auth: {
        facebook: () => {
            let btn = $('#login_facebook_btn');
            btn.on('click', main.function.auth_facebook);

        },
    },
    config: {
        firebase: {
            apiKey: "AIzaSyAvL2w6RFtgNQtDA_iNV0cAl9N6BPcKfqI",
            authDomain: "manga-mega.firebaseapp.com",
            databaseURL: "https://manga-mega.firebaseio.com",
            projectId: "manga-mega",
            storageBucket: "manga-mega.appspot.com",
            messagingSenderId: "560891865290",
            appId: "1:560891865290:web:79104537d30e372f"
        }
    },
    function: {
        async auth_facebook () {
            mApp.blockPage();
            let btn = $('#login_facebook_btn');
            let provider = new firebase.auth.FacebookAuthProvider();
            let fb = await firebase.auth().signInWithPopup(provider).catch((error) => mApp.unblockPage());
            if (fb)
            {
                $.ajax({
                    data: {
                        isNewUser: fb.additionalUserInfo.isNewUser,
                        profile: fb.additionalUserInfo.profile,
                        providerId: fb.additionalUserInfo.providerId,
                    },
                    type: 'post',
                    url: btn.attr('route'),
                    success: function (r, s, x) {
                        if (r.status === 'success')
                        {
                            location.href = '.';
                        }
                    },
                    error: function () {

                    },
                    complete: function () {
                        mApp.unblockPage();
                    }
                });
            }
        },
    },
};

$(document).ready(function () {
    main.auth.facebook();
    firebase.initializeApp(main.config.firebase);
});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(window).on('load', function() {
    $('body').removeClass('m-page--loading');
});

$('#header-search').on('keyup', function() {
    var search = $(this).serialize();
    if ($(this).find('.m-input').val() == '') {
        $('#search-suggest div').hide();
    } else {
        $.ajax({
            url: '/search',
            type: 'POST',
            data: search,
        })
        .done(function(res) {
            $('#search-suggest').html('');
            res.forEach(function(data) {
                $('#search-suggest').append("<div class='row'><span><a href='/manga/" + data.slug + "'>&nbsp&nbsp<img class='width70' src='/storage" + data.image + "'></a> &nbsp&nbsp</span><span><h6 class='m--font-brand'><a href='/manga/" + data.slug + "''>" + data.name + "</a></h6></span></div><br>")
            });
        })
    };
});

