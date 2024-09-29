// script.js

const questions = [
    "How do you feel today?",
    "What was the highlight of your day?",
    "Did you face any challenges?",
    "What are you grateful for?",
    "How did you manage stress today?",
    "What positive thing happened today?",
    "Any thoughts you'd like to share?"
];

document.addEventListener("DOMContentLoaded", () => {
    loadQuestions();
});

function loadQuestions() {
    const questionsContainer = document.getElementById('questions-container');
    questions.forEach((question, index) => {
        const questionBlock = document.createElement('div');
        questionBlock.className = 'question-block';

        questionBlock.innerHTML = `
            <p>Question ${index + 1}: ${question}</p>
            <div class="response-container">
                <textarea id="text-response-${index}" placeholder="Type here..."></textarea>
                <button type="button" id="record-btn-${index}" class="record-btn">🎤</button>
            </div>
        `;

        questionsContainer.appendChild(questionBlock);

        // Add event listener for voice recording
        document.getElementById(`record-btn-${index}`).addEventListener('click', () => {
            startRecording(index);
        });
    });
}

function startRecording(index) {
    const recognition = new (window.SpeechRecognition || window.webkitSpeechRecognition)();
    recognition.lang = 'en-US';
    recognition.interimResults = false;
    recognition.maxAlternatives = 1;

    recognition.start();

    recognition.onresult = (event) => {
        const transcript = event.results[0][0].transcript;
        document.getElementById(`text-response-${index}`).value = transcript;
    };

    recognition.onerror = (event) => {
        console.error('Error occurred in recognition: ' + event.error);
    };
}

document.getElementById('dailyTestForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent form submission
    const message = document.getElementById('message');

    // Simulating successful submission
    message.textContent = 'Test submitted successfully! Thank you for participating.';
    document.getElementById('submit-btn').disabled = true;
});
