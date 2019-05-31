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
