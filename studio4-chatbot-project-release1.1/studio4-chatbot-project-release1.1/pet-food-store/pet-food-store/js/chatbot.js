$(document).ready(function() {
    const chatMessages = document.getElementById("chatMessages");
    const messageInput = document.getElementById("messageInput");
    const chatForm = document.getElementById("myForm");

    function openForm() {
        chatForm.style.display = "block";
    }

    function closeForm() {
        chatForm.style.display = "none";
    }

    function addMessage(sender, content) {
        const senderClass = sender === "user" ? "user-message" : "chatbot-message";
        const messageColor = sender === "user" ? "blue" : "green";

        const chatMessage = document.createElement("div");
        chatMessage.classList.add("chat-message", senderClass);
        chatMessage.style.color = messageColor;
        chatMessage.textContent = content;

        chatMessages.appendChild(chatMessage);

        // Scroll to the bottom of the chat container
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    function getChatbotResponse(message) {
        // Make a POST request to the API endpoint
        $.post("chatbot.php", { message: message }, function(response) {
            addMessage("chatbot", response);
        });
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

            getChatbotResponse(message);
        }
    }

    document.getElementById("chat-icon").addEventListener("click", openForm);
    document.getElementById("close-button").addEventListener("click", closeForm);
    document.getElementById("sendButton").addEventListener("click", sendMessage);
    messageInput.addEventListener("keypress", function(event) {
        if (event.which === 13) {
            sendMessage();
        }
    });
});
