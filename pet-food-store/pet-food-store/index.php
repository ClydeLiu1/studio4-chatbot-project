<?php 
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Ruff</title>

    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&family=Roboto+Condensed:wght@300;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/index.css">

</head>
<body>
    
    <header>
    <nav>
        <a href="index.php">Home</a>
        <a href="aboutus.php">About Us</a>
        <a href="member.php">Login</a>
        <a href="cart.php">Shopping cart</a>
      </nav>
        <div>
            <h1>Pet Ruff</h1>
            <h2>Your pets' favourite place</h2>
            
</div>
	   
	  
       
      
	  
        
     </header>

     <section>
        <div class="container">
            <h3>Best place for all your pets needs</h3>
            <p>
                All your pet need from food to health care for every need we bring the best quality products and service to your fingertip.
            </p>
        </div>

        <div class="row">
            <div class="column">
              <div class="card">
                <h3>Cat Food</h3>
                <a href="catFood.php"><img src="images/cat_food.jpg" class="imgFood"></a>
                <p>10% all cat food items</p>
              </div>
            </div>
          
            <div class="column">
              <div class="card">
                <h3>Dog Food</h3>
                <a href="dogFood.php"><img src="images/dog_food.jpg" class="imgFood"></a>
                <p>20% on selected items</p>
            </div>
            </div>
            
            <div class="column">
              <div class="card">
                <h3>Bird Food</h3>
                <a href="birdFood.php"><img src="images/bird_food.jpg" class="imgFood"></a>
                <p>Buy one Pack and get one free</p>
              </div>
            </div>
            
            <div class="column">
              <div class="card">
                <h3>Fish Food</h3>
                <a href="fishFood.php"><img src="images/fish_food.jpg" class="imgFood"></a>
                <p>Discounts over $20 purchases</p>
              </div>
            </div>
          </div>
     </section>

     <footer>
        <br>
        <p>Author: Pudubu Dasun<br>
        <a href="mailto:info@petruff.com">info@petruff.com</a></p>
     </footer>
    
    </body>
</html>
<!DOCTYPE html>
<html>
<head>
  <title>Pet Food Store Chatbot</title>
  <style>
    /* Chatbot container styles */
    .chatbot-container {
      position: fixed;
      bottom: 20px;
      right: 20px;
      width: 300px;
      height: 400px;
      background-color: #fff;
      border: 1px solid #ccc;
      border-radius: 5px;
      overflow: hidden;
    }

    /* Chatbot header styles */
    .chatbot-header {
      background-color: #000;
      color: #fff;
      padding: 10px;
      text-align: center;
    }

    /* Chatbot body styles */
    .chatbot-body {
      padding: 10px;
      height: 330px;
      overflow-y: scroll;
    }

    /* Chat message styles */
    .message {
      margin-bottom: 10px;
    }

    /* User message styles */
    .user-message {
      text-align: right;
    }

    /* Chatbot message styles */
    .chatbot-message {
      text-align: left;
    }

    /* Chat input styles */
    .chat-input {
      width: 100%;
      padding: 5px;
    }
  </style>
</head>
<body>
  <div class="chatbot-container">
    <div class="chatbot-header">
      <h3>Chatbot</h3>
    </div>
    <div class="chatbot-body">
      <!-- Chat messages will be displayed here -->
    </div>
    <div class="chat-input-container">
      <input type="text" class="chat-input" placeholder="Type your message..." />
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      // Retrieve chat messages from the API and display them
      function fetchChatMessages() {
        // Make an API request to retrieve chat messages
        $.ajax({
          url: "api_endpoint_url",
          method: "GET",
          success: function(response) {
            // Process the response and display chat messages
            var messages = response.messages;
            var chatContainer = $(".chatbot-body");

            chatContainer.empty();

            for (var i = 0; i < messages.length; i++) {
              var message = messages[i];

              if (message.sender === "user") {
                chatContainer.append('<div class="message user-message">' + message.content + '</div>');
              } else {
                chatContainer.append('<div class="message chatbot-message">' + message.content + '</div>');
              }
            }

            // Scroll to the bottom of the chat container
            chatContainer.scrollTop(chatContainer.prop("scrollHeight"));
          },
          error: function() {
            console.error("Failed to fetch chat messages.");
          }
        });
      }

      // Send user messages to the API and update the chat
      function sendMessage(message) {
        // Make an API request to send the user message
        $.ajax({
          url: "api_endpoint_url",
          method: "POST",
          data: { message: message },
          success: function(response) {
            // Fetch the updated chat messages
            fetchChatMessages();
         



