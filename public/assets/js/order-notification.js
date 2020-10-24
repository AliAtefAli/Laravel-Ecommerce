var notificationsWrapper = $('.dropdown-notifications');
var notificationsToggle = notificationsWrapper.find('a[data-toggle]');
var notificationsCountElem = notificationsToggle.find('span[data-count]');
var notificationsCount = parseInt(notificationsWrapper.find('.notification-badge').text());
var notifications = notificationsWrapper.find('ul.notification-dropdown');

// Subscribe to the channel we specified in our Laravel Event
var channel = pusher.subscribe('make-order');
// Bind a function to a Event (the full Laravel class)
channel.bind('App\\Events\\NotificationEvent', function (data) {
    var existingNotifications = notifications.html();
    var newNotificationHtml = `

<li class="scrollable-container">
    <a href="#">
        <div class="media">
            <div class="media-body">
                <h6 class="mt-0"><span><i class="shopping-color"
                                          data-feather="shopping-bag"></i>
                    </span>You've a new order !</h6>
                <p class="mb-0">Total: `+ data['order']['total'] +`, City: `+ data['order']['billing_address'] +`</p>
            </div>
        </div>
    </a>
</li>
`;
    notifications.html(newNotificationHtml + existingNotifications);
    notificationsCount += 1;
    notificationsCountElem.attr('data-count', notificationsCount);
    notificationsWrapper.find('.notification-badge').text(notificationsCount);
    notificationsWrapper.show();
});
