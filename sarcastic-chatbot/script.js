const input = document.querySelector('input');
const send = document.querySelector('button');
const chatContainer = document.querySelector('chats');

send.onclick = () => {
    if (input.value) {
        const message = `
            <div class="message">
                <div>
                    ${input.value}
                </div>
            </div>
        `
        chatContainer.innerHTML += message;
        scrollDown();
        bot();
        input.value = '';
    }
};
// when click enter
input.addEventListener('keypress', function (e){
    if(e.key === 'Enter'){
         e.preventDefault();
         send.click();
    }
});
    
// scroll down when new message added
function scrollDown(){
    chatContainer.scrollTop = chatContainer. scrollHeight;
}
function bot (){
    var http = new XMLHttpRequest();
    var data = new FormData();
    data.append('message', input.value); 
    http.open('POST', 'request.php', true);
    http.send(data);
    setTimeout(() => {
            chatContainer. innerHTHL += `
                <div class= "message response">
                    <div> 
                        <img src="img/preloader.gif" alt="preloader">
                    </div> 
            </div>
        `;
        scrollDown();
    }, 1000);
    http.onload = () => {
        var response = JSON.parse(http.responseText);
        var replyText = processResponse(response);
        var replyContainer = document.querySelectorAll('.response');
        replyContainer[replyContainer.length-1].querySelector('div').innerHTML = replyText;
        scrollDown();
    };
}

function processResponse(res){
    var arr = res;
}