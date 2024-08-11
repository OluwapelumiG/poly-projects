<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Math Quiz</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />

    <style>
        .tab-content {
            display: none;
        }
        .tab-content.active {
            display: block;
        }
    </style>
    <script>
        let score = 0;

        function showTab(event, tabId) {
            const tabs = document.querySelectorAll('.tab-content');
            const labels = document.querySelectorAll('.tab-label');
            
            tabs.forEach(tab => tab.classList.remove('active'));
            labels.forEach(label => label.classList.remove('bg-blue-500', 'text-white'));

            document.getElementById(tabId).classList.add('active');
            event.currentTarget.classList.add('bg-blue-500', 'text-white');

            generateQuiz(tabId);
        }

        function generateQuiz(tabId) {
            const quizContainer = document.getElementById(`${tabId}-quiz`);
            quizContainer.innerHTML = '';

            let num1, num2, correctAnswer, wrongAnswer1, wrongAnswer2, question;
            switch (tabId) {
                case 'tab-addition':
                    num1 = Math.floor(Math.random() * 10);
                    num2 = Math.floor(Math.random() * 10);
                    correctAnswer = num1 + num2;
                    question = `${num1} + ${num2} = ?`;
                    break;
                case 'tab-subtraction':
                    num1 = Math.floor(Math.random() * 10);
                    num2 = Math.floor(Math.random() * 10);
                    correctAnswer = num1 - num2;
                    question = `${num1} - ${num2} = ?`;
                    break;
                case 'tab-multiplication':
                    num1 = Math.floor(Math.random() * 10);
                    num2 = Math.floor(Math.random() * 10);
                    correctAnswer = num1 * num2;
                    question = `${num1} x ${num2} = ?`;
                    break;
                case 'tab-division':
                    num1 = Math.floor(Math.random() * 10) + 1;
                    num2 = Math.floor(Math.random() * 10) + 1;
                    correctAnswer = Math.floor(num1 / num2);
                    question = `${num1} / ${num2} = ?`;
                    break;
            }

            wrongAnswer1 = correctAnswer + Math.floor(Math.random() * 5) + 1;
            wrongAnswer2 = correctAnswer - Math.floor(Math.random() * 5) - 1;

            const answers = [correctAnswer, wrongAnswer1, wrongAnswer2].sort(() => Math.random() - 0.5);

            const questionElement = document.createElement('div');
            questionElement.innerHTML = `<h2 class="text-lg font-semibold mb-4">${question}</h2>`;
            quizContainer.appendChild(questionElement);

            answers.forEach(answer => {
                const button = document.createElement('button');
                button.textContent = answer;
                button.className = 'bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 m-2';
                button.onclick = () => checkAnswer(answer, correctAnswer);
                quizContainer.appendChild(button);
            });
        }

        function showNotification(message, isCorrect) {
            const notification = document.getElementById('notification');
            notification.textContent = message;
            notification.className = `fixed top-4 left-1/2 transform -translate-x-1/2 px-4 py-2 rounded shadow-lg ${isCorrect ? 'bg-green-500' : 'bg-red-500'} text-white`;
            notification.style.display = 'block';

            setTimeout(() => {
                notification.style.display = 'none';
            }, 2000);
        }

        function checkAnswer(selectedAnswer, correctAnswer) {
            if (selectedAnswer === correctAnswer) {
                showNotification('Correct!', true);
                score++;
            } else {
                showNotification('Wrong!', false);
            }
            updateScore();
            generateQuiz(document.querySelector('.tab-content.active').id);
        }

        function updateScore() {
            document.getElementById('score').textContent = `Score: ${score}`;
        }

        function resetScore() {
            score = 0;
            updateScore();
        }

        document.addEventListener('DOMContentLoaded', () => {
            updateScore();
            generateQuiz('tab-addition');
        });
    </script>
</head>
<body class="font-sans antialiased dark:bg-black dark:text-white">

    <div class="bg-gray-50 dark:bg-black">
        
        <div class="relative min-h-screen flex flex-col items-center justify-center">
            <img class="mt-4 pt-4" src="https://store-images.s-microsoft.com/image/apps.6304.13510798886387592.4a8d06e3-e73e-4110-820c-ade390eae30a.b54e543d-cfde-4ee6-a622-6833fa164a60?mode=scale&q=90&h=400&w=800&background=%23000000" />
            <h1 class="text-3xl font-bold mb-6">Math Quiz</h1>
            <div id="notification" class="fixed top-4 left-1/2 transform -translate-x-1/2 px-4 py-2 rounded shadow-lg text-white"></div>

            <div class="flex space-x-4 mb-6">
                <button class="tab-label px-6 py-2 border rounded-lg text-gray-600 bg-gray-200 hover:bg-blue-500 hover:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
                    onclick="showTab(event, 'tab-addition')">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M4 12H20M12 4V20" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                    Addition
                </button>
                <button class="tab-label px-6 py-2 border rounded-lg text-gray-600 bg-gray-200 hover:bg-blue-500 hover:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
                    onclick="showTab(event, 'tab-subtraction')">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M6 12L18 12" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                    Subtraction
                </button>
                <button class="tab-label px-6 py-2 border rounded-lg text-gray-600 bg-gray-200 hover:bg-blue-500 hover:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
                    onclick="showTab(event, 'tab-multiplication')">
                    <svg fill="#000000" viewBox="0 0 56 56" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M 13.0117 40.0117 C 12.2148 40.8086 12.1914 42.1680 13.0117 42.9883 C 13.8086 43.8086 15.1680 43.7851 15.9883 42.9883 L 27.9883 30.9648 L 40.0117 42.9883 C 40.8086 43.7851 42.1680 43.8086 42.9648 42.9883 C 43.8086 42.1680 43.7851 40.8086 42.9648 40.0117 L 30.9648 27.9883 L 42.9648 15.9883 C 43.7851 15.1914 43.8086 13.8086 42.9648 13.0117 C 42.1680 12.1914 40.8086 12.2148 40.0117 13.0117 L 27.9883 25.0352 L 15.9883 13.0117 C 15.1680 12.2148 13.8086 12.1914 13.0117 13.0117 C 12.1914 13.8086 12.2148 15.1914 13.0117 15.9883 L 25.0117 27.9883 Z"></path></g></svg>
                    Multiplication
                </button>
                <button class="tab-label px-6 py-2 border rounded-lg text-gray-600 bg-gray-200 hover:bg-blue-500 hover:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
                    onclick="showTab(event, 'tab-division')">
                    <svg fill="#000000" viewBox="-3 0 19 19" xmlns="http://www.w3.org/2000/svg" class="cf-icon-svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M12.711 9.182a1.03 1.03 0 0 1-1.03 1.03H1.319a1.03 1.03 0 1 1 0-2.059h10.364a1.03 1.03 0 0 1 1.029 1.03zM5.03 4.586a1.47 1.47 0 1 1 1.47 1.47 1.47 1.47 0 0 1-1.47-1.47zm2.94 9.193a1.47 1.47 0 1 1-1.47-1.47 1.47 1.47 0 0 1 1.47 1.47z"></path></g></svg>
                    Division
                </button>
            </div>
            <div id="score" class="mb-6 text-2xl">Score: 0</div>
            <button onclick="resetScore()" class="mb-6 bg-red-500 text-white px-6 py-2 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500">Reset Score</button>
            <div id="tab-addition" class="tab-content active">
                <div id="tab-addition-quiz"></div>
            </div>
            <div id="tab-subtraction" class="tab-content">
                <div id="tab-subtraction-quiz"></div>
            </div>
            <div id="tab-multiplication" class="tab-content">
                <div id="tab-multiplication-quiz"></div>
            </div>
            <div id="tab-division" class="tab-content">
                <div id="tab-division-quiz"></div>
            </div>
        </div>
    </div>
</body>
</html>
