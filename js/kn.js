const questions = [
    "1. Do you often feel overwhelmed?",
    "2. Do you have trouble concentrating?",
    "Do you experience frequent headaches or muscle tension?",
    "Do you have trouble sleeping?",
    "Do you often feel irritable or easily angered?",
];

document.addEventListener("DOMContentLoaded", function () {
    const questionsDiv = document.getElementById("questions");
    questions.forEach((question, index) => {
        const div = document.createElement("div");
        div.classList.add("question");
        div.innerHTML = `
            <label>${question}</label>
            <div class="toggle-buttons">
                <input type="radio" id="q${index}_0" name="q${index}" value="0">
                <label for="q${index}_0">Never</label>

                <input type="radio" id="q${index}_1" name="q${index}" value="1">
                <label for="q${index}_1">Sometimes</label>

                <input type="radio" id="q${index}_2" name="q${index}" value="2">
                <label for="q${index}_2">Often</label>

                <input type="radio" id="q${index}_3" name="q${index}" value="3">
                <label for="q${index}_3">Always</label>
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

    if (totalScore <= 5) {
        result = "Low stress";
    } else if (totalScore <= 10) {
        result = "Moderate stress";
    } else {
        result = "High stress";
    }

    document.getElementById("result").innerText = `Your stress level: ${result}`;
}
