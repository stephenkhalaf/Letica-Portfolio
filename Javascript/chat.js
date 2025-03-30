const apiKey = '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';

document.getElementById('sendButton').addEventListener('click', sendMessage);
document.getElementById('messageInput').addEventListener('keypress', function(event) {
    if (event.key === 'Enter') {
        sendMessage();
    }
});


document.getElementById('chatIcon').addEventListener('click', function() {
    const chatContainer = document.getElementById('chatContainer');
    chatContainer.classList.toggle('open');
});

document.getElementById('closeButton').addEventListener('click', function() {
    const chatContainer = document.getElementById('chatContainer');
    chatContainer.classList.remove('open');
});

showTypingIndicator(false);

function sendMessage() {
    const messageInput = document.getElementById('messageInput');
    const messageText = messageInput.value.trim();
    if (messageText !== '') {
        appendMessage('self', messageText);
        messageInput.value = ''

        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'https://api-inference.huggingface.co/models/microsoft/DialoGPT-medium', true);
        xhr.setRequestHeader('Authorization', `Bearer ${apiKey}`);
        xhr.setRequestHeader('Content-Type', 'application/json');

        showTypingIndicator(true);
        xhr.onreadystatechange = function () {
            if(xhr.readyState==4 && xhr.status==200){
                const result = JSON.parse(xhr.responseText)
                setTimeout(()=>{
                    showTypingIndicator(false)
                    appendMessage('other', result[0].generated_text)
                },0)
            
            }

            if(xhr.status == 503){
                setTimeout(()=>{
                    showTypingIndicator(false)
                },1000)
            }
        };


        showTypingIndicator(true)
        xhr.onerror = function(){
                setTimeout(()=>{
                    showTypingIndicator(false)
                    appendMessage('other', 'Please, check your internet connection')
                },1000)
        }


        xhr.send(JSON.stringify({ inputs: messageText }));

    }else{
        appendMessage('other', 'Please, type something...')
    }
}

function appendMessage(sender, message) {
    const chatMessages = document.getElementById('chatMessages');
    const messageElement = document.createElement('div');
    messageElement.classList.add('message', sender);
    messageElement.textContent = message;
    chatMessages.appendChild(messageElement);
    chatMessages.scrollTop = chatMessages.scrollHeight;
}



function showTypingIndicator(show) {
    const typingIndicator = document.getElementById('typing-indicator');
    if (show) {
        typingIndicator.style.display = 'block';
    } else {
        typingIndicator.style.display = 'none';
    }
}


