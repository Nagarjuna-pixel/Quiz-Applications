document.addEventListener("DOMContentLoaded", function () {
    // Fetch questions from the server using AJAX (assumed)
    fetchQuestions();
});

function fetchQuestions() {
    // Simulate fetching questions from the server
    // Replace this with your actual API endpoint or data source
    const questionsData = [
        {
            id: 1,
            question: "What is the capital of France?",
            options: ["Paris", "Berlin", "London", "Madrid"],
            correctOption: 1, // Index of the correct option (starting from 0)
        },
        // Add more questions as needed
    ];

    // Display questions on the page
    displayQuestions(questionsData);
}

function displayQuestions(questionsData) {
    const questionContainer = document.getElementById("question-container");

    questionsData.forEach((questionData) => {
        const questionDiv = document.createElement("div");
        questionDiv.classList.add("question");

        const questionText = document.createElement("p");
        questionText.textContent = questionData.question;
        questionDiv.appendChild(questionText);

        const optionsDiv = document.createElement("div");
        optionsDiv.classList.add("options");

        questionData.options.forEach((option, index) => {
            const radioInput = document.createElement("input");
            radioInput.type = "radio";
            radioInput.name = `question_${questionData.id}`;
            radioInput.value = index;

            const optionLabel = document.createElement("label");
            optionLabel.textContent = option;

            optionsDiv.appendChild(radioInput);
            optionsDiv.appendChild(optionLabel);
            optionsDiv.appendChild(document.createElement("br"));
        });

        questionDiv.appendChild(optionsDiv);

        questionContainer.appendChild(questionDiv);
    });
}
