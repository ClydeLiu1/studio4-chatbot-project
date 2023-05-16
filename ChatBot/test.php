<?php
// 如果收到用户的消息，则进行处理并返回响应
if (isset($_POST['message'])) {
    $userMessage = $_POST['message'];
    
    // 调用 ChatGPT 或其他类似的 AI 模型来生成回复
    $botResponse = generateBotResponse($userMessage);
    
    // 将回复作为 JSON 数据返回给前端
    header('Content-Type: application/json');
    echo json_encode(['message' => $botResponse]);
    exit;
}

// 生成聊天页面
?>
<!DOCTYPE html>
<html>
<head>
    <title>ChatGPT-Like Chatbot</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#chatForm').submit(function(event) {
                event.preventDefault();
                var userMessage = $('#userMessage').val();
                
                // 向服务器发送用户消息并获取回复
                $.ajax({
                    type: 'POST',
                    url: 'index.php',
                    data: { message: userMessage },
                    dataType: 'json',
                    success: function(response) {
                        var botResponse = response.message;
                        
                        // 在聊天框中显示用户消息和机器人回复
                        $('#chatContainer').append('<div class="userMessage">' + userMessage + '</div>');
                        $('#chatContainer').append('<div class="botMessage">' + botResponse + '</div>');
                        
                        // 清空输入框
                        $('#userMessage').val('');
                        
                        // 滚动到聊天框底部
                        $('#chatContainer').scrollTop($('#chatContainer')[0].scrollHeight);
                    }
                });
            });
        });
    </script>
    <style>
        #chatContainer {
            height: 300px;
            overflow-y: scroll;
            border: 1px solid #ccc;
            padding: 10px;
        }
        .userMessage {
            background-color: #eee;
            padding: 5px;
            margin-bottom: 5px;
        }
        .botMessage {
            background-color: #f5f5f5;
            padding: 5px;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <h1>ChatGPT-Like Chatbot</h1>
    <div id="chatContainer"></div>
    <form id="chatForm" method="post">
        <input type="text" id="userMessage" placeholder="Type your message here" required>
        <button type="submit">Send</button>
    </form>
</body>
</html>
