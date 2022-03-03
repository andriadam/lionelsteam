<?php
// require('assets/plugins/lib/Pusher.php');
require('assets/plugins/vendor/autoload.php');

// Change the following with your app details:
// Create your own pusher account @ https://app.pusher.com
$options = array(
  'cluster' => 'ap1',
  'useTLS' => true
);
$pusher = new Pusher\Pusher(
  'a946a973c5332a8dfa48',
  '9799f666fb6f0f7b6514',
  '1202128',
  $options
);
// $app_id = '1202128'; // App ID
// $app_key = 'a946a973c5332a8dfa48'; // App Key
// $app_secret = '9799f666fb6f0f7b6514'; // App Secret
// $pusher = new Pusher($app_key, $app_secret, $app_id);

// Check the receive message
if (isset($_POST['message']) && !empty($_POST['message'])) {
  $data['message'] = $_POST['message'];

  // Return the received message
  if ($pusher->trigger('my-channel', 'my_event', $data)) {
    echo 'success';
  } else {
    echo 'error';
  }
}
