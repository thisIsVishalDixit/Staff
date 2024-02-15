window.onload = function () {
    if (window.history && window.history.pushState) {
        window.history.pushState('forward', null, './#');
        window.onpopstate = function () {
            window.history.pushState('forward', null, './#');
            location.replace('signin.php');
        };
    }
};