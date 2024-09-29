const questions = [
    "Over the last two weeks, how often have you had little interest or pleasure in doing things?",
    "Over the last two weeks, how often have you felt down, depressed, or hopeless?",
    "Over the last two weeks, how often have you had trouble falling or staying asleep, or sleeping too much?",
    "Over the last two weeks, how often have you felt tired or had little energy",
    "Over the last two weeks, how often have you had a poor appetite or overeating?",
    "Over the last two weeks, how often have you felt bad about yourself — or that you are a failure or have let yourself or your family down?",
    "Over the last two weeks, how often have you had trouble concentrating on things, such as reading the newspaper or watching television?",
    "Over the last two weeks, how often have you thought that you would be better off dead or of hurting yourself in some way?",
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
                <label for="q${index}_0">Not at all</label>

                <input type="radio" id="q${index}_1" name="q${index}" value="1">
                <label for="q${index}_1">Several days</label>

                <input type="radio" id="q${index}_2" name="q${index}" value="2">
                <label for="q${index}_2">More than half the days</label>

                <input type="radio" id="q${index}_3" name="q${index}" value="3">
                <label for="q${index}_3">Nearly every day</label>
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
        result = "Minimal depression";
    } else if (totalScore >= 5 && totalScore <= 9) {
        result = "Mild depression";
    } else if (totalScore >= 10 && totalScore <= 14) {
        result = "Moderate depression";
    } else if (totalScore >= 15 && totalScore <= 19) {
        result = "Moderately severe depression";
    } else if (totalScore >= 20 && totalScore <= 27) {
        result = "Severe depression";
    } else {
        result = "No depression";
    }

    document.getElementById("result").innerText = `Your depression level: ${result}`;
}