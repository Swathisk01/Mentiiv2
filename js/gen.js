const questions = [
    "How satisfied are you with your overall life at the moment?",
    "How often do you engage in activities that bring you joy?",
    "How would you rate your current physical health?",
    "How connected do you feel to friends and family?",
    "How often do you take time for self-care?"
];

const answerOptions = [
    [
        { text: "Very dissatisfied", value: 0 },
        { text: "Dissatisfied", value: 1 },
        { text: "Neutral", value: 2 },
        { text: "Satisfied", value: 3 },
        { text: "Very satisfied", value: 4 }
    ],
    [
        { text: "Never", value: 0 },
        { text: "Rarely", value: 1 },
        { text: "Sometimes", value: 2 },
        { text: "Often", value: 3 },
        { text: "Always", value: 4 }
    ],
    [
        { text: "Very poor", value: 0 },
        { text: "Poor", value: 1 },
        { text: "Fair", value: 2 },
        { text: "Good", value: 3 },
        { text: "Excellent", value: 4 }
    ],
    [
        { text: "Not at all connected", value: 0 },
        { text: "Slightly connected", value: 1 },
        { text: "Somewhat connected", value: 2 },
        { text: "Very connected", value: 3 },
        { text: "Extremely connected", value: 4 }
    ],
    [
        { text: "Never", value: 0 },
        { text: "Rarely", value: 1 },
        { text: "Sometimes", value: 2 },
        { text: "Often", value: 3 },
        { text: "Always", value: 4 }
    ]
];

document.addEventListener("DOMContentLoaded", function () {
    const questionsDiv = document.getElementById("questions");
    questions.forEach((question, index) => {
        const div = document.createElement("div");
        div.classList.add("question");
        div.innerHTML = `
            <label>${question}</label>
            <div class="toggle-buttons">
                ${answerOptions[index].map(option => `
                    <input type="radio" id="q${index}_${option.value}" name="q${index}" value="${option.value}">
                    <label for="q${index}_${option.value}">${option.text}</label>
                `).join('')}
            </div>
        `;
        questionsDiv.appendChild(div);
    });

    const submitBtn = document.getElementById("submit");
    submitBtn.addEventListener("click", calculateResult);
});

function calculateResult() {
    const responses = [];
    for (let i = 0; i < questions.length; i++) {
        const response = document.querySelector(`input[name="q${i}"]:checked`);
        if (response) {
            responses.push(parseInt(response.value));
        } else {
            responses.push(0); // Default to 0 if no answer is selected
        }
    }

    const totalScore = responses.reduce((acc, curr) => acc + curr, 0);
    let result = "";

    if (totalScore >= 1 && totalScore <= 4) {
        result = "Minimal well-being";
    } else if (totalScore >= 5 && totalScore <= 9) {
        result = "Mild well-being";
    } else if (totalScore >= 10 && totalScore <= 14) {
        result = "Moderate well-being";
    } else if (totalScore >= 15 && totalScore <= 19) {
        result = "Moderately high well-being";
    } else if (totalScore >= 20 && totalScore <= 25) {
        result = "High well-being";
    } else {
        result = "No well-being issues";
    }

    document.getElementById("result").innerText = `Your well-being level: ${result}`;
}

