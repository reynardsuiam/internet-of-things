const quizData = [
{
    question: "What is the capital of France?",
    options: ["Madrid", "Paris", "Rome", "Berlin"],
    answer: "Paris"
},
{
    question: "Which is the largest ocean on Earth?",
    options: ["Atlantic Ocean", "Indian Ocean", "Pacific Ocean", "Arctic Ocean"],
    answer: "Pacific Ocean"
},
{
    question: "Which country is home to the Great Pyramid of Giza?",
    options: ["Mexico", "Greece", "Egypt", "Turkey"],
    answer: "Egypt"
},
{
    question: "Which continent is the Amazon Rainforest primarily located in?",
    options: ["Africa", "Asia", "South America", "Australia"],
    answer: "South America"
},
{
    question: "What is the capital city of Japan?",
    options: ["Osaka", "Kyoto", "Tokyo", "Hiroshima"],
    answer: "Tokyo"
},
{
    question: "Which is the longest river in South America?",
    options: ["Amazon River", "Paraná River", "Orinoco River", "Madeira River"],
    answer: "Amazon River"
},
{
    question: "Which country shares the longest international border with the United States?",
    options: ["Mexico", "Canada", "Russia", "Guatemala"],
    answer: "Canada"
},
{
    question: "Which mountain range separates Europe and Asia?",
    options: ["Andes", "Alps", "Rocky Mountains", "Ural Mountains"],
    answer: "Ural Mountains"
},
{
    question: "Which African country is completely surrounded by South Africa?",
    options: ["Botswana", "Eswatini", "Lesotho", "Namibia"],
    answer: "Lesotho"
},
{
    question: "What is the capital of Argentina?",
    options: ["Santiago", "Buenos Aires", "Lima", "Montevideo"],
    answer: "Buenos Aires"
},
{
    question: "Which movie features the character Jack Sparrow?",
    options: ["The Lord of the Rings", "Pirates of the Caribbean", "Indiana Jones", "Harry Potter"],
    answer: "Pirates of the Caribbean"
},
{
    question: "Who directed the movie 'Jurassic Park'?",
    options: ["James Cameron", "Steven Spielberg", "Christopher Nolan", "Peter Jackson"],
    answer: "Steven Spielberg"
},
{
    question: "Which movie won the Academy Award for Best Picture in 1998?",
    options: ["Titanic", "Avatar", "Gladiator", "The Matrix"],
    answer: "Titanic"
},
{
    question: "What is the name of the fictional African kingdom in 'Black Panther'?",
    options: ["Zamunda", "Wakanda", "Genovia", "Asgard"],
    answer: "Wakanda"
},
{
    question: "Which actor played Iron Man in the Marvel Cinematic Universe?",
    options: ["Chris Evans", "Chris Hemsworth", "Robert Downey Jr.", "Mark Ruffalo"],
    answer: "Robert Downey Jr."
},
{
    question: "Which movie features the song 'Let It Go'?",
    options: ["Moana", "Frozen", "Tangled", "Encanto"],
    answer: "Frozen"
},
{
    question: "In the movie 'The Lion King', what is Simba's father called?",
    options: ["Scar", "Mufasa", "Timon", "Rafiki"],
    answer: "Mufasa"
},
{
    question: "Which film series features the character Harry Potter?",
    options: ["The Chronicles of Narnia", "The Hunger Games", "Harry Potter", "Twilight"],
    answer: "Harry Potter"
},
{
    question: "Which science fiction movie features the character Neo?",
    options: ["Interstellar", "The Matrix", "Blade Runner", "Avatar"],
    answer: "The Matrix"
},
{
    question: "Which movie is about a theme park filled with cloned dinosaurs?",
    options: ["King Kong", "Jurassic Park", "Godzilla", "Jumanji"],
    answer: "Jurassic Park"
},

{
    question: "Who is known as the 'King of Pop'?",
    options: ["Elvis Presley", "Michael Jackson", "Freddie Mercury", "Prince"],
    answer: "Michael Jackson"
},
{
    question: "Which instrument has 88 keys in its standard form?",
    options: ["Guitar", "Piano", "Violin", "Trumpet"],
    answer: "Piano"
},
{
    question: "Which singer is famous for the song 'Rolling in the Deep'?",
    options: ["Adele", "Rihanna", "Taylor Swift", "Beyoncé"],
    answer: "Adele"
},
{
    question: "Which band released the song 'Bohemian Rhapsody'?",
    options: ["The Beatles", "Queen", "ABBA", "Coldplay"],
    answer: "Queen"
},
{
    question: "Which music symbol indicates silence?",
    options: ["Note", "Rest", "Chord", "Scale"],
    answer: "Rest"
},
{
    question: "Who composed the famous piece 'Für Elise'?",
    options: ["Mozart", "Beethoven", "Bach", "Chopin"],
    answer: "Beethoven"
},
{
    question: "Which country is the birthplace of reggae music?",
    options: ["Brazil", "Jamaica", "USA", "Spain"],
    answer: "Jamaica"
},
{
    question: "Which instrument is played with a bow?",
    options: ["Drums", "Violin", "Piano", "Flute"],
    answer: "Violin"
},
{
    question: "How many strings does a standard guitar usually have?",
    options: ["4", "5", "6", "8"],
    answer: "6"
},
{
    question: "Which singer is known as the 'Queen of Pop'?",
    options: ["Madonna", "Adele", "Celine Dion", "Shakira"],
    answer: "Madonna"
},

{
    question: "Who painted the Mona Lisa?",
    options: ["Leonardo da Vinci", "Van Gogh", "Picasso", "Michelangelo"],
    answer: "Leonardo da Vinci"
},
{
    question: "Which artist painted 'Starry Night'?",
    options: ["Pablo Picasso", "Vincent van Gogh", "Claude Monet", "Rembrandt"],
    answer: "Vincent van Gogh"
},
{
    question: "Which art movement is Picasso associated with?",
    options: ["Cubism", "Realism", "Pop Art", "Baroque"],
    answer: "Cubism"
},
{
    question: "Which material is commonly used for sculptures?",
    options: ["Stone", "Paper", "Water", "Glass"],
    answer: "Stone"
},
{
    question: "Who painted the ceiling of the Sistine Chapel?",
    options: ["Michelangelo", "Da Vinci", "Raphael", "Monet"],
    answer: "Michelangelo"
},
{
    question: "Which art style uses dots of color to create images?",
    options: ["Cubism", "Pointillism", "Surrealism", "Minimalism"],
    answer: "Pointillism"
},
{
    question: "Which museum houses the Mona Lisa?",
    options: ["The Louvre", "The Met", "The Prado", "The British Museum"],
    answer: "The Louvre"
},
{
    question: "What is a self-portrait?",
    options: ["Painting of nature", "Painting of oneself", "Painting of animals", "Painting of buildings"],
    answer: "Painting of oneself"
},
{
    question: "Which artist is famous for painting melting clocks?",
    options: ["Salvador Dalí", "Picasso", "Van Gogh", "Warhol"],
    answer: "Salvador Dalí"
},
{
    question: "Pop Art became popular during which century?",
    options: ["18th", "19th", "20th", "17th"],
    answer: "20th"
},

{
    question: "What is the largest planet in our Solar System?",
    options: ["Earth", "Mars", "Jupiter", "Saturn"],
    answer: "Jupiter"
},
{
    question: "How many continents are there on Earth?",
    options: ["5", "6", "7", "8"],
    answer: "7"
},
{
    question: "What is the chemical symbol for gold?",
    options: ["Ag", "Au", "Go", "Gd"],
    answer: "Au"
},
{
    question: "What is the fastest land animal?",
    options: ["Lion", "Cheetah", "Horse", "Tiger"],
    answer: "Cheetah"
},
{
    question: "Which gas do humans need to breathe?",
    options: ["Carbon dioxide", "Oxygen", "Nitrogen", "Hydrogen"],
    answer: "Oxygen"
},
{
    question: "How many sides does a hexagon have?",
    options: ["5", "6", "7", "8"],
    answer: "6"
},
{
    question: "Which is the largest ocean?",
    options: ["Atlantic", "Indian", "Pacific", "Arctic"],
    answer: "Pacific"
},
{
    question: "What is the currency of Japan?",
    options: ["Won", "Dollar", "Yen", "Euro"],
    answer: "Yen"
},
{
    question: "Which planet is known as the Red Planet?",
    options: ["Mars", "Venus", "Jupiter", "Mercury"],
    answer: "Mars"
},
{
    question: "What is the human body's largest organ?",
    options: ["Heart", "Skin", "Brain", "Liver"],
    answer: "Skin"
},

{
    question: "How many players are on a football team on the field?",
    options: ["9", "10", "11", "12"],
    answer: "11"
},
{
    question: "Which sport uses a racket and shuttlecock?",
    options: ["Tennis", "Badminton", "Squash", "Table Tennis"],
    answer: "Badminton"
},
{
    question: "The Olympics are held every how many years?",
    options: ["2", "3", "4", "5"],
    answer: "4"
},
{
    question: "Which country invented cricket?",
    options: ["India", "Australia", "England", "South Africa"],
    answer: "England"
},
{
    question: "How many rings are on the Olympic flag?",
    options: ["4", "5", "6", "7"],
    answer: "5"
},
{
    question: "Which sport is played at Wimbledon?",
    options: ["Football", "Tennis", "Golf", "Cricket"],
    answer: "Tennis"
},
{
    question: "Which country won the FIFA World Cup 2022?",
    options: ["France", "Brazil", "Argentina", "Germany"],
    answer: "Argentina"
},
{
    question: "How many players are in a basketball team on court?",
    options: ["4", "5", "6", "7"],
    answer: "5"
},
{
    question: "Which sport uses a bat and wickets?",
    options: ["Baseball", "Cricket", "Hockey", "Golf"],
    answer: "Cricket"
},
{
    question: "Which athlete is known as the fastest man alive?",
    options: ["Usain Bolt", "Michael Phelps", "Ronaldo", "Messi"],
    answer: "Usain Bolt"

},

{
    question: "Which country is famous for inventing sushi?",
    options: ["China", "Japan", "Korea", "Thailand"],
    answer: "Japan"
},
{
    question: "What is the main ingredient in guacamole?",
    options: ["Tomato", "Avocado", "Potato", "Onion"],
    answer: "Avocado"
},
{
    question: "Which type of pasta is shaped like small rice grains?",
    options: ["Spaghetti", "Penne", "Orzo", "Fusilli"],
    answer: "Orzo"
},
{
    question: "Which fruit is used to make wine?",
    options: ["Apple", "Grape", "Orange", "Mango"],
    answer: "Grape"
},
{
    question: "What is tofu mainly made from?",
    options: ["Rice", "Soybeans", "Wheat", "Corn"],
    answer: "Soybeans"
},
{
    question: "Which country is famous for tacos?",
    options: ["Italy", "Mexico", "France", "India"],
    answer: "Mexico"
},
{
    question: "Which spice gives curry its yellow color?",
    options: ["Pepper", "Turmeric", "Cinnamon", "Ginger"],
    answer: "Turmeric"
},
{
    question: "What is the main ingredient in bread?",
    options: ["Flour", "Sugar", "Cheese", "Oil"],
    answer: "Flour"
},
{
    question: "Which dessert is made from frozen milk?",
    options: ["Cake", "Ice cream", "Pie", "Brownie"],
    answer: "Ice cream"
},
{
    question: "Which country is famous for chocolate and cheese?",
    options: ["Switzerland", "Brazil", "Egypt", "Australia"],
    answer: "Switzerland"
},

{
    question: "What is the largest land animal?",
    options: ["Elephant", "Giraffe", "Rhino", "Hippo"],
    answer: "Elephant"
},
{
    question: "Which animal is known as the 'Ship of the Desert'?",
    options: ["Horse", "Camel", "Donkey", "Llama"],
    answer: "Camel"
},
{
    question: "How many legs does a spider have?",
    options: ["6", "8", "10", "12"],
    answer: "8"
},
{
    question: "Which bird is known for not being able to fly?",
    options: ["Eagle", "Penguin", "Sparrow", "Parrot"],
    answer: "Penguin"
},
{
    question: "Which animal is the fastest in water?",
    options: ["Dolphin", "Blue Whale", "Sailfish", "Shark"],
    answer: "Sailfish"
},
{
    question: "What is a baby frog called?",
    options: ["Cub", "Tadpole", "Calf", "Chick"],
    answer: "Tadpole"
},
{
    question: "Which animal is known for changing its color?",
    options: ["Tiger", "Chameleon", "Elephant", "Bear"],
    answer: "Chameleon"
},
{
    question: "Which is the largest bird in the world?",
    options: ["Eagle", "Ostrich", "Penguin", "Peacock"],
    answer: "Ostrich"
},
{
    question: "Which animal produces honey?",
    options: ["Butterfly", "Bee", "Ant", "Spider"],
    answer: "Bee"
},
{
    question: "What type of animal is a dolphin?",
    options: ["Fish", "Mammal", "Reptile", "Bird"],
    answer: "Mammal"
},

{
    question: "What does CPU stand for?",
    options: [
        "Central Processing Unit",
        "Computer Personal Unit",
        "Central Program Utility",
        "Computer Processing User"
    ],
    answer: "Central Processing Unit"
},
{
    question: "Which language is used to style web pages?",
    options: ["HTML", "CSS", "Python", "SQL"],
    answer: "CSS"
},
{
    question: "Which company developed the Windows operating system?",
    options: ["Apple", "Google", "Microsoft", "IBM"],
    answer: "Microsoft"
},
{
    question: "What does RAM stand for?",
    options: [
        "Random Access Memory",
        "Read Access Memory",
        "Rapid Action Memory",
        "Run Access Module"
    ],
    answer: "Random Access Memory"
},
{
    question: "Which device is used to move the cursor on a computer?",
    options: ["Keyboard", "Mouse", "Printer", "Speaker"],
    answer: "Mouse"
},
{
    question: "Which programming language is mainly used for web interactivity?",
    options: ["JavaScript", "HTML", "CSS", "SQL"],
    answer: "JavaScript"
},
{
    question: "What is the brain of a computer called?",
    options: ["Monitor", "CPU", "Keyboard", "Hard Disk"],
    answer: "CPU"
},
{
    question: "Which company created the Android operating system?",
    options: ["Google", "Apple", "Microsoft", "Intel"],
    answer: "Google"
},
{
    question: "Which file extension is commonly used for JavaScript files?",
    options: [".html", ".css", ".js", ".py"],
    answer: ".js"
},
{
    question: "What does URL stand for?",
    options: [
        "Uniform Resource Locator",
        "Universal Reading Link",
        "User Resource List",
        "United Resource Location"
    ],
    answer: "Uniform Resource Locator"
},

{
    question: "Who was the first President of the United States?",
    options: [
        "Abraham Lincoln",
        "George Washington",
        "Thomas Jefferson",
        "John Adams"
    ],
    answer: "George Washington"
},
{
    question: "Which civilization built the pyramids of Giza?",
    options: ["Romans", "Egyptians", "Greeks", "Mayans"],
    answer: "Egyptians"
},
{
    question: "Who discovered America in 1492?",
    options: [
        "Christopher Columbus",
        "Marco Polo",
        "Vasco da Gama",
        "James Cook"
    ],
    answer: "Christopher Columbus"
},
{
    question: "The Great Wall is located in which country?",
    options: ["Japan", "China", "India", "Korea"],
    answer: "China"
},
{
    question: "Who was known as the 'Mahatma' of India?",
    options: [
        "Jawaharlal Nehru",
        "Mahatma Gandhi",
        "Subhas Chandra Bose",
        "Sardar Patel"
    ],
    answer: "Mahatma Gandhi"
},
{
    question: "Which empire was ruled by Julius Caesar?",
    options: [
        "Roman Empire",
        "Ottoman Empire",
        "Mughal Empire",
        "British Empire"
    ],
    answer: "Roman Empire"
},
{
    question: "In which year did World War II end?",
    options: ["1942", "1945", "1950", "1939"],
    answer: "1945"
},
{
    question: "Who was the first person to walk on the Moon?",
    options: [
        "Neil Armstrong",
        "Buzz Aldrin",
        "Yuri Gagarin",
        "John Glenn"
    ],
    answer: "Neil Armstrong"
},
{
    question: "Which ancient city was destroyed by Mount Vesuvius?",
    options: ["Athens", "Pompeii", "Rome", "Sparta"],
    answer: "Pompeii"
},
{
    question: "The French Revolution began in which year?",
    options: ["1776", "1789", "1804", "1815"],
    answer: "1789"
}
];

let currentQuiz = [];

let currentQuestion = 0;
let score = 0;
let selectedAnswer = "";

let timer;
let timeLeft = 15;

const question = document.getElementById("question");
const options = document.getElementById("options");
const questionNumber = document.getElementById("questionNumber");
const nextBtn = document.getElementById("nextBtn");
const quiz = document.getElementById("quiz");
const result = document.getElementById("result");
const scoreText = document.getElementById("score");
const restartBtn = document.getElementById("restartBtn");

const timerDisplay = document.getElementById("timer");


// Shuffle function
function shuffleArray(array) {

    let shuffled = [...array];

    for (let i = shuffled.length - 1; i > 0; i--) {

        let j = Math.floor(Math.random() * (i + 1));

        [shuffled[i], shuffled[j]] = 
        [shuffled[j], shuffled[i]];
    }

    return shuffled;
}


// Start new quiz with random 20 questions
function startQuiz() {

    currentQuiz = shuffleArray(quizData).slice(0, 20);

    // Also shuffle answer choices
    currentQuiz.forEach(question => {
        question.options = shuffleArray(question.options);
    });


    currentQuestion = 0;
    score = 0;

    quiz.style.display = "block";
    result.style.display = "none";

    loadQuestion();
}


// Load question
function loadQuestion() {

    clearInterval(timer);

    selectedAnswer = "";

    const current = currentQuiz[currentQuestion];

    questionNumber.textContent =
    `Question ${currentQuestion + 1} of ${currentQuiz.length}`;

    question.textContent = current.question;

    options.innerHTML = "";

    current.options.forEach(option => {

        const button = document.createElement("button");

        button.textContent = option;

        button.classList.add("option");

        button.addEventListener("click", () => {

            document.querySelectorAll(".option")
            .forEach(btn => {

                btn.classList.remove("selected");

            });

            button.classList.add("selected");

            selectedAnswer = option;

        });

        options.appendChild(button);

    });

    startTimer();

}

// Timer function
function startTimer() {

    timeLeft = 15;

    timerDisplay.textContent =
    `Time Left: ${timeLeft}s`;

    timer = setInterval(() => {

        timeLeft--;

        timerDisplay.textContent =
        `Time Left: ${timeLeft}s`;

        if(timeLeft <= 0) {
            clearInterval(timer);

            // Automatically move to next question
            nextQuestion();
        }

    },1000);

}

// Move to next question
function nextQuestion() {

    clearInterval(timer);

    if(selectedAnswer === currentQuiz[currentQuestion].answer){
        score++;
    }

    currentQuestion++;

    if(currentQuestion < currentQuiz.length){
        loadQuestion();
    }

    else {
        quiz.style.display="none";

        result.style.display="block";

        scoreText.textContent =
        `Your Score: ${score} / ${currentQuiz.length}`;
    }
}

// Next button
nextBtn.addEventListener("click",()=>{
    if(selectedAnswer===""){
        alert("Please select an answer.");
        return;
    }
    nextQuestion();
});

// Restart quiz
restartBtn.addEventListener("click",()=>{
    startQuiz();
});

// Start first quiz
startQuiz();