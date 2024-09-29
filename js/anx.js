const questions = [
    "Over the last two weeks, how often have you felt nervous, anxious, or on edge?",
    "Over the last two weeks, how often have you not been able to stop or control worrying?",
    "Over the last two weeks, how often have you worried too much about different things?",
    "Over the last two weeks, how often have you had trouble relaxing?",
    "Over the last two weeks, how often have you been so restless that it is hard to sit still?",
    "Over the last two weeks, how often have you become easily annoyed or irritable?",
    "Over the last two weeks, how often have you felt afraid as if something awful might happen?",
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

    if (totalScore <= 5) {
        result = "Low Anxiety level";
    } else if (totalScore <= 10) {
        result = "Little Anxiety level";
    } else if (totalScore <=15 ) {
        result = "Moderate Anxiety level";
    } else {
        result = "High Anxiety level";
    }

    document.getElementById("result").innerText = `Your stress level: ${result}`;
}
