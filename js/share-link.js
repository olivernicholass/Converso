document.addEventListener('DOMContentLoaded', function() {

    var shareButton = document.getElementById('shareButton');

    shareButton.addEventListener('click', function() {

        var currentUrl = window.location.href;


        navigator.clipboard.writeText(currentUrl).then(function() {

            var notification = document.createElement('div');
            notification.className = 'notification';
            notification.textContent = 'Link copied to clipboard';
            document.body.appendChild(notification);

            setTimeout(function() {
                document.body.removeChild(notification);
            }, 2000);
        }).catch(function(error) {
            console.error('Unable to copy URL to clipboard: ', error);
        });
    });
});