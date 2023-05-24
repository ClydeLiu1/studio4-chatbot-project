 <?php 
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Ruff</title>

    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&family=Roboto+Condensed:wght@300;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="chatbot.css">
    <script type="text/javascript" src="js/chatbot.js"></script>


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
     <form method="post" action="">
        <label for="message">User Input:</label>
        <input type="text" name="message" id="message" required>
        <br>
        <input type="submit" value="Send">
    </form>
    <div id="chat-container" class="message-container">
        <?php
        require 'chatbot.php';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $message = $_POST['message'];
            $timestamp = date('Y-m-d H:i:s');

            // User message HTML
            $userMessageHTML = '<div class="user-message">
                                    <p class="timestamp">' . $timestamp . '</p>
                                    <p>You: ' . $message . '</p>
                                </div>';
            echo $userMessageHTML;

            // Process the user message and generate the bot response
            $botResponse = $chatbot->processMessage($message);

            // Bot response HTML
            $botResponseHTML = '<div class="bot-response">
                                    <p class="timestamp">' . $timestamp . '</p>
                                    <p>Bot: ' . $botResponse . '</p>
                                </div>';
            echo $botResponseHTML;
        }
        ?>
    </div>
    <button id="close-button" onclick="closeChat()">Close</button>

    <script>
        function closeChat() {
            var chatContainer = document.getElementById("chat-container");
            chatContainer.style.display = "none";
        }
    </script>
  </div>
</section>
     <footer>
        <br>
        <p>Author: Pudubu Dasun<br>
        <a href="mailto:info@petruff.com">info@petruff.com</a></p>
     </footer>
    
    </body>
</html>



