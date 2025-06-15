{{-- Custom Client Js Start --}}
<script>
  // Chatbox Widget/box + Message button Start
  const chatWidgetToggle = document.getElementById('chat-widget-toggle');
  const chatWidget = document.getElementById('chat-widget');
  const chatBodyToggle = document.getElementById('chat-body-toggle');
  const chatBody = document.getElementById('chat-body');
  const icon = document.getElementById('toggle-icon');

  // ChatWidget Collapse Toggle
  chatWidgetToggle.addEventListener('click', () => {
    const isWidgetCollapsed = chatWidget.classList.contains('translate-y-full');
    const isBodyCollapsed = chatBody.classList.contains('max-h-0');

    if(isWidgetCollapsed){
      if(chatWidget.classList.contains('duration-300')){
          chatWidget.classList.remove('duration-300')
          chatWidget.classList.add('duration-500')
      };
      chatWidget.classList.toggle('translate-y-full');
      chatWidgetToggle.innerHTML=`<x-icon_lucid name="message-circle-x" class="w-[32px] h-[32px]" stroke-width="3" />`;
      greetIfEmpty();
      if(isBodyCollapsed){
        const chatBodyToggleClasses = ['max-h-0', 'max-h-[35rem]'];
        chatBodyToggleClasses.forEach(cls => {
          chatBody.classList.toggle(cls);
        });
        icon.classList.toggle('rotate-[-180deg]')
      }
    }else{
      chatWidget.classList.toggle('translate-y-full');
      chatWidgetToggle.innerHTML=`<x-icon_lucid name="message-circle-more" class="w-[32px] h-[32px]" stroke-width="3" />`;
      if(isBodyCollapsed){
        if(chatWidget.classList.contains('duration-500')){
          chatWidget.classList.remove('duration-500')
          chatWidget.classList.add('duration-300')
        }
      }else{
        const chatBodyToggleClasses = ['max-h-0', 'max-h-[35rem]'];
        chatBodyToggleClasses.forEach(cls => {
          chatBody.classList.toggle(cls);
        });
        icon.classList.toggle('rotate-[-180deg]')
      }
    }
  });
  
  // ChatBody Collapse Toggle
  chatBodyToggle.addEventListener('click', () => {
    const isBodyCollapsed = chatBody.classList.contains('max-h-0');

    if(window.innerWidth >= 800){
      const chatBodyToggleClasses = ['max-h-0', 'max-h-[35rem]'];
      chatBodyToggleClasses.forEach(cls => {
        chatBody.classList.toggle(cls);
      });
      icon.classList.toggle('rotate-[-180deg]');
      if(isBodyCollapsed){
      }
    };
  });

  const historyBox = document.getElementById('chat-history');
  const isGuest = {{ auth()->check() ? 'false' : 'true' }};
  const SESSION_KEY = 'guest_chat';
  const clearBtn = document.getElementById('clear-chat-btn');
  const clearContainer = document.getElementById('clear-chat-container');

  // Append Message Function to chat history
  const appendMessage = (from, text) => {
    const bubble = document.createElement('div');
    bubble.className = from === 'user' ? 'text-right' : 'text-left';
    bubble.innerHTML = `
      <p class="${from === 'user'
        ? 'bg-frontend-highlight-4 text-frontend-dark-9'
        : 'bg-frontend-dark-6'} inline-block px-3 py-2 rounded-md max-w-[80%] break-words">
        ${text}
      </p>`;
    historyBox.appendChild(bubble);
    historyBox.scrollTop = historyBox.scrollHeight;
    toggleClearChatButton();
  };

  // Greet the user if chat is empty Function
  const greetIfEmpty = () => {
    const isEmpty = historyBox.children.length === 0;
    if (isEmpty) {
      fetch('api/chatbot/send', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
        },
        body: JSON.stringify({ message: 'hello' })
      })
      .then(res => res.json())
      .then(data => {
        if (data.reply) {
          appendMessage('bot', data.reply);
        }
      });
    }
  }

  // Clear Chat Button Display Toggle Function
  const toggleClearChatButton = () => {
    if (historyBox.children.length > 1) {
      clearContainer.classList.remove('hidden');
    } else {
      clearContainer.classList.add('hidden');
    }
  }

  // Clear Chat history Fucntion
  clearBtn.addEventListener('click', () => {
    // Clear from view
    historyBox.innerHTML = '';
    toggleClearChatButton();
    if (isGuest) {
      sessionStorage.removeItem(SESSION_KEY);
      toastr.success('Chat history cleared.');
    } else {
      fetch('api/chatbot/clear', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
        },
      })
      .then(res => res.json())
      .then(data => {
        if (data.type && data.message) {
          toastr[data.type](data.message, data.title ?? '');
        }
      });
    }
  });

  // Clear Guest Chat On Reload
  window.addEventListener('beforeunload', () => {
    if (!{{ auth()->check() ? 'true' : 'false' }}) {
      sessionStorage.removeItem('guest_chat');
    }
  });

  // Chat Bot Message Input/Store/Display Logic
  document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('chat-input');
    const sendBtn = document.getElementById('chat-send-btn');
    const saveGuestMessage = (from, text) => {
      if (!isGuest) return;
      const messages = JSON.parse(sessionStorage.getItem(SESSION_KEY) || '[]');
      messages.push({ from, text });
      sessionStorage.setItem(SESSION_KEY, JSON.stringify(messages));
    };
    const sendMessage = () => {
      const text = input.value.trim();
      if (!text) return;

      appendMessage('user', text);
      saveGuestMessage('user', text);
      input.value = '';

      fetch('api/chatbot/send', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
        },
        body: JSON.stringify({ message: text }),
      })
      .then(res => res.json())
      .then(data => {
        if (data.reply) {
          appendMessage('bot', data.reply);
          saveGuestMessage('bot', data.reply);
        }
      });
    };
    sendBtn.addEventListener('click', sendMessage);

    input.addEventListener('keydown', e => {
      if (e.key === 'Enter') sendMessage();
    });
    // Load chat history
    if (isGuest) {
      const messages = JSON.parse(sessionStorage.getItem(SESSION_KEY) || '[]');
      messages.forEach(m => appendMessage(m.from, m.text));
    } else {
      fetch('api/chatbot/history')
        .then(res => res.json())
        .then(messages => {
          messages.forEach(m => appendMessage(m.from, m.text));
        });
    }
  });
  // Chatbox Widget/box + Message button Start
</script>
{{-- Custom Client Js End --}}