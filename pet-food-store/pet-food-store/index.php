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
   
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // 处理用户发送的消息
            $("#chat-form").submit(function(e) {
                e.preventDefault();
                var message = $("#user-message").val().trim();
                if (message !== "") {
                    appendMessage("user", message);
                    sendMessage(message);
                    $("#user-message").val("");
                }
            });

            // 发送消息到服务器
            function sendMessage(message) {
                $.ajax({
                    url: "chatbot.php",
                    type: "POST",
                    data: { message: message },
                    success: function(response) {
                        appendMessage("chatbot", response);
                    }
                });
            }

            // 将消息添加到对话框
            function appendMessage(sender, message) {
                var className = sender === "user" ? "user-message" : "chatbot-message";
                var messageElement = "<div class='" + className + "'>" + message + "</div>";
                $("#chatbox").append(messageElement);
            }
        });
    </script>
    <style>
        .user-message {
            background-color: lightblue;
        }

        .chatbot-message {
            background-color: lightgreen;
        }
    </style>

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



