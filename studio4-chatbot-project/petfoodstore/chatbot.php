<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
    }

    * {
      box-sizing: border-box;
    }

    /* Chat icon */
    .chat-icon {
      background-color: #4285F4;
      color: white;
      border: none;
      cursor: pointer;
      opacity: 0.8;
      position: fixed;
      bottom: 20px;
      right: 20px;
      width: 60px;
      height: 60px;
      border-radius: 50%;
      text-align: center;
      line-height: 60px;
      font-size: 24px;
      transition: background-color 0.3s, right 0.3s, bottom 0.3s;
    }

    /* Chat icon on hover */
    .chat-icon:hover {
      background-color: #0D47A1;
    }

    /* The popup chat - hidden by default */
    .chat-popup {
      display: none;
      position: fixed;
      bottom: 80px;
      right: 20px;
      width: 320px;
      background-color: #fff;
      border: 1px solid #ccc;
      border-radius: 4px;
      z-index: 99;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
    }

    /* Chat header */
    .chat-header {
      padding: 15px;
      background-color: #4285F4;
      color: white;
      border-top-left-radius: 4px;
      border-top-right-radius: 4px;
    }

    /* Chat content */
    .chat-content {
      padding: 15px;
      max-height: 300px;
      overflow-y: auto;
    }

    /* Chat input */
    .chat-input {
      display: flex;
      align-items: center;
      padding: 10px;
      background-color: #f2f2f2;
    }

    .chat-input textarea {
      flex: 1;
      padding: 8px;
      border: none;
      resize: none;
      background-color: #fff;
      border-radius: 4px;
      font-size: 14px;
    }

    .chat-input button {
      margin-left: 10px;
      background-color: #4285F4;
      color: white;
      border: none;
      padding: 8px 15px;
      border-radius: 4px;
      cursor: pointer;
      font-size: 14px;
      transition: background-color 0.3s;
    }

    .chat-input button:hover {
      background-color: #0D47A1;
    }

    /* Chat message style */
    .chat-message {
      margin-bottom: 10px;
    }

    .chat-message .sender {
      font-weight: bold;
      color: #4285F4;
    }

    .chat-message .timestamp {
      font-size: 12px;
      color: gray;
    }
  </style>
</head>
<body>

  <h2>Popup Chat Window</h2>
  <p>Click on the chat icon at the bottom of this page to open the chat form.</p>
  <p>Note that the chat icon and the form are fixed - they will always be positioned at the bottom of the browser window.</p>

  <button class="chat-icon" onclick="toggleForm()">&#9993;</button>

  <div class="chat-popup" id="myForm">
    <div class="chat-header">
      <h1>Chat</h1>
      <button class="close-button" onclick="closeForm()">&times;</button>
    </div>
    <div class="chat-content" id="chatMessages"></div>
    <div class="chat-input">
      <textarea id="messageInput" placeholder="Type message.." required></textarea>
      <button type="button" onclick="sendMessage()">Send</button>
    </div>
  </div>

  <script>
    const chatMessages = document.getElementById("chatMessages");
    const messageInput = document.getElementById("messageInput");
    const chatIcon = document.querySelector(".chat-icon");
    const chatPopup = document.getElementById("myForm");

    function toggleForm() {
      if (chatPopup.style.display === "block") {
        closeForm();
      } else {
        openForm();
      }
    }

    function openForm() {
      chatPopup.style.display = "block";
      chatIcon.style.right = "340px";
      chatIcon.style.bottom = "120px";
    }

    function closeForm() {
      chatPopup.style.display = "none";
      chatIcon.style.right = "20px";
      chatIcon.style.bottom = "20px";
    }

    function sendMessage() {
      const message = messageInput.value;
      if (message.trim() !== "") {
        const sender = "You";
        const timestamp = new Date().toLocaleTimeString();

        const chatMessage = document.createElement("div");
        chatMessage.classList.add("chat-message");
        chatMessage.innerHTML = `<span class="sender">${sender}:</span> ${message} <span class="timestamp">${timestamp}</span>`;

        chatMessages.appendChild(chatMessage);
        messageInput.value = "";
      }
    }
  </script>

</body>
</html>
