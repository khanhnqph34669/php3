@extends('Layout.Admin.main')
@section('title', 'AI')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">AI Chat</h3>
                </div>
                <div class="card-body">
                    <div id="chat-messages" class="mb-3"></div>
                    <div class="input-group">
                        <input type="text" id="user-input" class="form-control" placeholder="Type your message...">
                        <div class="input-group-append">
                            <button id="send-button" class="btn btn-primary">Send</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    #chat-messages {
        height: 400px;
        overflow-y: auto;
        border: 1px solid #e0e0e0;
        background-color: #f8f9fa;
        padding: 15px;
        border-radius: 5px;
    }
    .message {
        margin-bottom: 10px;
        padding: 10px;
        border-radius: 5px;
        max-width: 80%;
    }
    .user-message {
        background-color: #e3f2fd;
        margin-left: auto;
    }
    .ai-message {
        background-color: #f0f0f0;
        margin-right: auto;
    }
    #user-input {
        border-right: none;
    }
    #send-button {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    const chatMessages = document.getElementById('chat-messages');
    const userInput = document.getElementById('user-input');
    const sendButton = document.getElementById('send-button');

    sendButton.addEventListener('click', sendMessage);
    userInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            sendMessage();
        }
    });

    function sendMessage() {
        const message = userInput.value;
        if (message.trim() === '') return;

        appendMessage('You: ' + message, 'user-message');
        userInput.value = '';

        axios.post('/dashboard/chat/send', { message: message })
            .then(function (response) {
                const aiResponse = response.data.result;
                appendMessage('AI: ' + aiResponse, 'ai-message');
            })
            .catch(function (error) {
                console.error('Error:', error);
                appendMessage('Error: Failed to get response from AI', 'ai-message');
            });
    }

    function appendMessage(message, className) {
        const messageElement = document.createElement('div');
        messageElement.textContent = message;
        messageElement.classList.add('message', className);
        chatMessages.appendChild(messageElement);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }
</script>
@endsection