<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
      margin: 0;
      padding: 0;
    }

    /* Chat icon */
    .chat-icon {
      background-color: #4285F4;
      color: white;
      padding: 16px;
      border: none;
      cursor: pointer;
      opacity: 0.8;
      position: fixed;
      bottom: 23px;
      right: 28px;
      width: 60px;
      height: 60px;
      border-radius: 50%;
      text-align: center;
      line-height: 60px;
      font-size: 24px;
      animation: chatIconAnimation 2s infinite;
    }

    /* Animation for chat icon */
    @keyframes chatIconAnimation {
      0% {
        transform: translateX(0);
      }
      50% {
        transform: translateX(-20px);
      }
      100% {
        transform: translateX(0);
      }
    }

    /* Chat popup */
    .chat-popup {
      display: none;
      position: fixed;
      bottom: 80px;
      right: 20px;
      width: 320px;
      background-color: #fff;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
      border-radius: 5px;
      z-index: 9999;
    }

    .open {
      display: block !important;
    }

    .close {
      display: none;
    }

    .chat-header {
      background-color: #4285F4;
      color: #fff;
      padding: 12px;
      font-weight: bold;
      border-top-left-radius: 5px;
      border-top-right-radius: 5px;
    }

    .chat-body {
      padding: 20px;
      max-height: 300px;
      overflow-y: auto;
    }

    .chat-message {
      margin-bottom: 15px;
    }

    .chat-sender {
      font-weight: bold;
      margin-bottom: 5px;
    }

    .chat-timestamp {
      font-size: 12px;
      color: #888;
    }

    .chat-input {
      display: flex;
      align-items: center;
      margin-top: 10px;
    }

    .chat-input textarea {
      flex: 1;
      resize: none;
      border-radius: 3px;
      border: 1px solid #ddd;
      padding: 10px;
      font-size: 14px;
    }

    .chat-input button {
      background-color: #4285F4;
      color: #fff;
      border: none;
      padding: 10px 15px;
      font-size: 14px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .chat-input button:hover {
      background-color: #1967D2;
    }

    .close-form {
      position: absolute;
      top: 5px;
      right: 10px;
      color: #fff;
      cursor: pointer;
    }
  </style>
</head>
<body>

  <div class="chat-icon" id="chatIcon" onclick="toggleChatPopup()">
    <span>&#9993;</span>
  </div>

  <div class="chat-popup" id="chatPopup">
    <div class="chat-header">
      Chat
      <span class="close-form" onclick="toggleChatPopup()">&#10006;</span>
    </div>
    <div class="chat-body" id="chatBody">
      <!-- Chat messages will be displayed here -->
    </div>
    <div class="chat-input">
      <textarea id="messageInput" placeholder="Type a message..."></textarea>
      <button onclick="sendMessage()">Send</button>
    </div>
  </div>

  <script>
    var chatPopup = document.getElementById("chatPopup");
    var chatIcon = document.getElementById("chatIcon");
    var chatBody = document.getElementById("chatBody");
    var messageInput = document.getElementById("messageInput");

    function toggleChatPopup() {
      chatPopup.classList.toggle("open");
      chatIcon.classList.toggle("close");
    }

    function sendMessage() {
      var message = messageInput.value.trim();
      if (message !== "") {
        var sender = "You";
        var timestamp = new Date().toLocaleTimeString();

        var chatMessage = document.createElement("div");
        chatMessage.classList.add("chat-message");
        chatMessage.innerHTML = `
          <div class="chat-sender">${sender}</div>
          <div>${message}</div>
          <div class="chat-timestamp">${timestamp}</div>
        `;

        var responseMessage = document.createElement("div");
        responseMessage.classList.add("chat-message", "response");
        responseMessage.innerHTML = `
          <div class="chat-sender">Chatbot</div>
          <div>This is a response to your message: "${message}"</div>
          <div class="chat-timestamp">${timestamp}</div>
        `;

        chatBody.appendChild(chatMessage);
        chatBody.appendChild(responseMessage);
        chatBody.scrollTop = chatBody.scrollHeight;
        messageInput.value = "";
      }
    }
  </script>

</body>
</html>
