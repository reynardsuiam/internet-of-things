const quizData = [
{
question: "1. What does HTML stand for?",
options: ["Hyper Text Markup Language", "High Text Machine Language", "Hyper Tool Multi Language", "Home Text Markup Language"],
answer: "Hyper Text Markup Language"
},
{
question: "2. Which language is used for styling web pages?",
options: ["HTML", "CSS", "Python", "Java"],
answer: "CSS"
},
{
question: "3. Which language makes web pages interactive?",
options: ["CSS", "HTML", "JavaScript", "SQL"],
answer: "JavaScript"
},
{
question: "4. Which company developed JavaScript?",
options: ["Microsoft", "Netscape", "Google", "Apple"],
answer: "Netscape"
},
{
question: "5. Which HTML tag creates a hyperlink?",
options: ["<link>", "<a>", "<href>", "<url>"],
answer: "<a>"
},
{
question: "6. Which CSS property changes text color?",
options: ["font-color", "text-color", "color", "background"],
answer: "color"
},
{
question: "7. Which symbol is used for IDs in CSS?",
options: [".", "#", "*", "@"],
answer: "#"
},
{
question: "8. Which symbol selects classes in CSS?",
options: ["#", ".", "*", "@"],
answer: "."
},
{
question: "9. Which JavaScript method displays a popup?",
options: ["alert()", "popup()", "show()", "display()"],
answer: "alert()"
},
{
question: "10. Which keyword declares a variable?",
options: ["var", "int", "string", "define"],
answer: "var"
},
{
question: "11. Which operator checks equality and type?",
options: ["==", "=", "===", "!="],
answer: "==="
},
{
question: "12. Which loop repeats while a condition is true?",
options: ["for", "while", "repeat", "loop"],
answer: "while"
},
{
question: "13. Which array method adds an element to the end?",
options: ["push()", "pop()", "shift()", "slice()"],
answer: "push()"
},
{
question: "14. Which HTML tag inserts an image?",
options: ["<img>", "<image>", "<picture>", "<src>"],
answer: "<img>"
},
{
question: "15. Which HTML tag creates a paragraph?",
options: ["<p>", "<para>", "<text>", "<paragraph>"],
answer: "<p>"
},
{
question: "16. Which event occurs when a button is clicked?",
options: ["onclick", "onhover", "onmouse", "onfocus"],
answer: "onclick"
},
{
question: "17. Which object represents the web page?",
options: ["window", "document", "screen", "history"],
answer: "document"
},
{
question: "18. Which HTML element is the largest heading?",
options: ["<h1>", "<h6>", "<heading>", "<head>"],
answer: "<h1>"
},
{
question: "19. Which CSS property changes the background color?",
options: ["background", "bgcolor", "background-color", "color"],
answer: "background-color"
},
{
question: "20. Which JavaScript function writes to the browser console?",
options: ["print()", "console.log()", "write()", "log()"],
answer: "console.log()"
}
];

let currentQuestion = 0;
let score = 0;
let selectedAnswer = "";

const question = document.getElementById("question");
const options = document.getElementById("options");
const questionNumber = document.getElementById("questionNumber");
const nextBtn = document.getElementById("nextBtn");
const quiz = document.getElementById("quiz");
const result = document.getElementById("result");
const scoreText = document.getElementById("score");
const restartBtn = document.getElementById("restartBtn");

function loadQuestion() {
    selectedAnswer = "";

    const current = quizData[currentQuestion];

    questionNumber.textContent = `Question ${currentQuestion + 1} of ${quizData.length}`;
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
}

nextBtn.addEventListener("click", () => {

    if (selectedAnswer === "") {
        alert("Please select an answer.");
        return;
    }

    if (selectedAnswer === quizData[currentQuestion].answer) {
        score++;
    }

    currentQuestion++;

    if (currentQuestion < quizData.length) {
        loadQuestion();
    } else {
        quiz.style.display = "none";
        result.style.display = "block";
        scoreText.textContent = `Your Score: ${score} / ${quizData.length}`;
    }
});

restartBtn.addEventListener("click", () => {
    currentQuestion = 0;
    score = 0;
    quiz.style.display = "block";
    result.style.display = "none";
    loadQuestion();
});

loadQuestion();