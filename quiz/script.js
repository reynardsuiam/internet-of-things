let quizData = [];

let currentQuestion = 0;
let score = 0;
let selectedAnswer = "";

let timeLeft = 15;
let timer;

const question = document.getElementById("question");
const options = document.getElementById("options");
const questionNumber = document.getElementById("questionNumber");
const nextBtn = document.getElementById("nextBtn");
const quiz = document.getElementById("quiz");
const result = document.getElementById("result");
const scoreText = document.getElementById("score");
const restartBtn = document.getElementById("restartBtn");
const timerText = document.getElementById("timer");

// Decode HTML entities from the API
function decodeHTML(text) {
    const txt = document.createElement("textarea");
    txt.innerHTML = text;
    return txt.value;
}

// Fetch questions from Open Trivia DB
async function loadQuestions() {

    try {

        const response = await fetch(
            "https://opentdb.com/api.php?amount=20&type=multiple"
        );

        const data = await response.json();

        quizData = data.results.map(q => {

            const options = [
                ...q.incorrect_answers.map(decodeHTML),
                decodeHTML(q.correct_answer)
            ];

            // Shuffle answer choices
            options.sort(() => Math.random() - 0.5);

            return {
                question: decodeHTML(q.question),
                options: options,
                answer: decodeHTML(q.correct_answer)
            };

        });

        currentQuestion = 0;
        score = 0;

        quiz.style.display = "block";
        result.style.display = "none";

        loadQuestion();

    } catch (error) {
        question.textContent = "Failed to load questions.";
        console.error(error);
    }

}

// Load one question
function loadQuestion() {

    clearInterval(timer);

    selectedAnswer = "";

    const current = quizData[currentQuestion];

    questionNumber.textContent =
        `Question ${currentQuestion + 1} of ${quizData.length}`;

    question.textContent = current.question;

    options.innerHTML = "";

    current.options.forEach(option => {

        const button = document.createElement("button");

        button.textContent = option;
        button.classList.add("option");

        button.addEventListener("click", () => {

            document.querySelectorAll(".option").forEach(btn => {
                btn.classList.remove("selected");
            });

            button.classList.add("selected");
            selectedAnswer = option;

        });

        options.appendChild(button);

    });

    startTimer();

}

// Timer
function startTimer() {

    clearInterval(timer);

    timeLeft = 15;

    timerText.textContent = `Time Left: ${timeLeft}s`;

    timer = setInterval(() => {

        timeLeft--;

        timerText.textContent = `Time Left: ${timeLeft}s`;

        if (timeLeft <= 0) {

            clearInterval(timer);

            // Treat unanswered question as incorrect
            nextQuestion();

        }

    }, 1000);

}

// Move to next question
function nextQuestion() {

    clearInterval(timer);

    if (selectedAnswer === quizData[currentQuestion].answer) {
        score++;
    }

    currentQuestion++;

    if (currentQuestion < quizData.length) {

        loadQuestion();

    } else {

        quiz.style.display = "none";
        result.style.display = "block";

        scoreText.textContent =
            `Your Score: ${score} / ${quizData.length}`;

    }

}

// Next button
nextBtn.addEventListener("click", () => {

    if (selectedAnswer === "") {

        alert("Please select an answer.");

        return;

    }

    nextQuestion();

});

// Restart button
restartBtn.addEventListener("click", () => {

    loadQuestions();

});

// Start quiz
loadQuestions();