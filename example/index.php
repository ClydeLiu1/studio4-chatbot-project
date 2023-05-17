<!DOCTYPE html>
<html>
<head>
    <title>Chatbot</title>
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
    <h1>Chatbot </h1>
    <div id="chatbox"></div>
    <form id="chat-form">
        <input type="text" id="user-message" autocomplete="off" autofocus/>
        <button type="submit">Send Message</button>
    </form>
</body>
</html>
