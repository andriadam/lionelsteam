
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}

 // Enter your own Pusher App key
 var pusher = new Pusher('a946a973c5332a8dfa48', {
  cluster: 'ap1'
});
// Enter a unique channel you wish your users to be subscribed in.
var channel = pusher.subscribe('my-channel');
channel.bind('my_event', function(data) {
  // Add the new message to the container
  $('.messages_display').append('<p class = "message_item">' + data.message + '</p>');
  // Display the send button
  $('.input_send_holder').html('<button type="submit" class="btn input_send">Send</button>');
  // Scroll to the bottom of the container when a new message becomes available
  $(".messages_display").scrollTop($(".messages_display")[0].scrollHeight);
});

// AJAX request
function ajaxCall(ajax_url, ajax_data) {
  $.ajax({
    type: "POST",
    url: ajax_url,
    dataType: "json",
    data: ajax_data,
    success: function(response, textStatus, jqXHR) {
      console.log(jqXHR.responseText);
    },
    error: function(msg) {}
  });
}

// Trigger for the Enter key when clicked.
$.fn.enterKey = function(fnc) {
  return this.each(function() {
    $(this).keypress(function(ev) {
      var keycode = (ev.keyCode ? ev.keyCode : ev.which);
      if (keycode == '13') {
        fnc.call(this, ev);
      }
    });
  });
}

// Send the Message
$('body').on('click', '.chat_box .input_send', function(e) {
  e.preventDefault();

  var message = $('.chat_box .input_message').val();
  var name = $('.chat_box .input_name').val();

  // Validate Name field
  if (name === '') {
    bootbox.alert('<br /><p class = "bg-danger">Please enter a Name.</p>');

  } else if (message !== '') {
    // Define ajax data
    var chat_message = {
      name: $('.chat_box .input_name').val(),
      message: '<strong>' + $('.chat_box .input_name').val() + '</strong>: ' + message
    }
    // Send the message to the server
    ajaxCall('message_relay.php', chat_message);

    // Clear the message input field
    $('.chat_box .input_message').val('');
    // Show a loading image while sending
    $('.input_send_holder').html('<button type="submit" class="btn input_send">Send &nbsp;<img src = "assets/img/loading.gif" /></button>');
  }
});

// Send the message when enter key is clicked
$('.chat_box .input_message').enterKey(function(e) {
  e.preventDefault();
  $('.chat_box .input_send').click();
});