<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
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
        // function speakText(text) {
        //     if ('speechSynthesis' in window) {
        //         const utterance = new SpeechSynthesisUtterance(text);
        //         utterance.lang = 'en-US';
        //         window.speechSynthesis.speak(utterance);
        //     } else {
        //         alert('Sorry, your browser does not support text-to-speech!');
        //     }
        // }

        function speakText(text) {
            if ('speechSynthesis' in window) {
                console.log("talking");
                // Create a new SpeechSynthesisUtterance instance
                const utterance = new SpeechSynthesisUtterance();
                utterance.lang = 'en-US';
                utterance.rate = 0.5; // Slow down the speech rate (default is 1)
                
                if (text.length > 1) {
                    // Prepare the spell-out text
                    const spellOut = text.split('').map(letter => letter.toUpperCase()).join(' ');

                    // Set the text to spell out the letters and then say the word
                    utterance.text = `${spellOut}. - ${text}.`;
                } else {
                    // Pronounce the text as is for single characters
                    utterance.text = text;
                }

                // Speak the utterance
                window.speechSynthesis.speak(utterance);
            } else {
                alert('Sorry, your browser does not support text-to-speech!');
            }
        }


        function showTab(event, tabId) {
            const tabs = document.querySelectorAll('.tab-content');
            const labels = document.querySelectorAll('.tab-label');
            
            tabs.forEach(tab => tab.classList.remove('active'));
            labels.forEach(label => label.classList.remove('bg-blue-500', 'text-white'));

            document.getElementById(tabId).classList.add('active');
            event.currentTarget.classList.add('bg-blue-500', 'text-white');
        }

        function reveal(tabId){
            document.getElementById("alp").style.display = 'none';
            document.getElementById("lw2").style.display = 'none';
            document.getElementById("lw3").style.display = 'none';
            document.getElementById("lw4").style.display = 'none';
            document.getElementById("pic").style.display = 'none';
            document.getElementById("tribe").style.display = 'none';

            document.getElementById(tabId).style.display = 'block';

        }
    </script>
</head>
<body class="font-sans antialiased dark:bg-black dark:text-white">
    <div class="bg-gray-50 dark:bg-black">


<div class="sm:hidden">
    <label for="tabs" class="sr-only">Select your country</label>
<select id="tabs" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option>Alphabets</option>
        <option>2 letter words</option>
        <option>3 letter words</option>
        <option>4 letter words</option>
        <option>Pictures</option>

    </select>
</div>
<ul class="hidden text-sm font-medium text-center text-gray-500 rounded-lg shadow sm:flex dark:divide-gray-700 dark:text-gray-400">
    <li class="w-full focus-within:z-10">
        <button onclick="reveal('alp')" class="inline-block w-full p-4 text-gray-900 bg-gray-100 border-r border-gray-200 dark:border-gray-700 rounded-s-lg focus:ring-4 focus:ring-blue-300 active focus:outline-none dark:bg-gray-700 dark:text-white" aria-current="page">Alphabets</button>
    </li>
    <li class="w-full focus-within:z-10">
        <button onclick="reveal('lw2')" class="inline-block w-full p-4 bg-white border-r border-gray-200 dark:border-gray-700 hover:text-gray-700 hover:bg-gray-50 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700">2 letter words</button>
    </li>
    <li class="w-full focus-within:z-10">
        <button onclick="reveal('lw3')"  class="inline-block w-full p-4 bg-white border-r border-gray-200 dark:border-gray-700 hover:text-gray-700 hover:bg-gray-50 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700">3 leter words</button>
    </li>
    <li class="w-full focus-within:z-10">
        <button onclick="reveal('lw4')" class="inline-block w-full p-4 bg-white border-s-0 border-gray-200 dark:border-gray-700 rounded-e-lg hover:text-gray-700 hover:bg-gray-50 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700">4 letter words</button>
    </li>
    <li class="w-full focus-within:z-10">
        <button onclick="reveal('pic')" class="inline-block w-full p-4 bg-white border-s-0 border-gray-200 dark:border-gray-700 rounded-e-lg hover:text-gray-700 hover:bg-gray-50 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700">Pictures</button>
    </li>
    <li class="w-full focus-within:z-10">
        <button onclick="reveal('tribe')" class="inline-block w-full p-4 bg-white border-s-0 border-gray-200 dark:border-gray-700 rounded-e-lg hover:text-gray-700 hover:bg-gray-50 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700">Tribes</button>
    </li>
</ul>

<div class="mx-auto my-4 p-4 max-w-7xl shadow-md rounded-md border ">
    <div id="alp" class="hidden">
        <h2 class="text-lg font-semibold mb-4">Alphabets</h2>
        <div class="grid grid-cols-4 gap-4">
            <button onclick="speakText('A')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">A</button>
            <button onclick="speakText('B')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">B</button>
            <button onclick="speakText('C')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">C</button>
            <button onclick="speakText('D')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">D</button>
            <button onclick="speakText('E')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">E</button>
            <button onclick="speakText('F')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">F</button>
            <button onclick="speakText('G')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">G</button>
            <button onclick="speakText('H')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">H</button>
            <button onclick="speakText('I')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">I</button>
            <button onclick="speakText('J')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">J</button>
            <button onclick="speakText('K')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">K</button>
            <button onclick="speakText('L')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">L</button>
            <button onclick="speakText('M')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">M</button>
            <button onclick="speakText('N')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">N</button>
            <button onclick="speakText('O')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">O</button>
            <button onclick="speakText('P')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">P</button>
            <button onclick="speakText('Q')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Q</button>
            <button onclick="speakText('R')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">R</button>
            <button onclick="speakText('S')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">S</button>
            <button onclick="speakText('T')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">T</button>
            <button onclick="speakText('U')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">U</button>
            <button onclick="speakText('V')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">V</button>
            <button onclick="speakText('W')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">W</button>
            <button onclick="speakText('X')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">X</button>
            <button onclick="speakText('Y')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Y</button>
            <button onclick="speakText('Z')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Z</button>
        </div>
    </div>

    <div id="lw2" class="hidden">
        <h2 class="text-lg font-semibold mb-4">2 Letter words</h2>
        <div class="grid grid-cols-4 gap-4">
            <button onclick="speakText('an')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">an</button>
            <button onclick="speakText('by')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">by</button>
            <button onclick="speakText('do')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">do</button>
            <button onclick="speakText('go')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">go</button>
            <button onclick="speakText('he')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">he</button>
            <button onclick="speakText('it')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">it</button>
            <button onclick="speakText('is')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">is</button>
            <button onclick="speakText('me')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">me</button>
            <button onclick="speakText('my')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">my</button>
            <button onclick="speakText('no')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">no</button>
            <button onclick="speakText('of')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">of</button>
            <button onclick="speakText('on')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">on</button>
            <button onclick="speakText('or')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">or</button>
            <button onclick="speakText('so')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">so</button>
            <button onclick="speakText('to')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">to</button>
            <button onclick="speakText('up')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">up</button>
            <button onclick="speakText('we')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">we</button>
            <button onclick="speakText('at')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">at</button>
            <button onclick="speakText('as')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">as</button>
            <button onclick="speakText('by')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">by</button>
            <button onclick="speakText('he')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">he</button>
            <button onclick="speakText('in')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">in</button>
            <button onclick="speakText('if')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">if</button>
            <button onclick="speakText('is')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">is</button>
            <button onclick="speakText('it')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">it</button>
            <button onclick="speakText('me')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">me</button>
            <button onclick="speakText('my')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">my</button>
            <button onclick="speakText('no')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">no</button>
            <button onclick="speakText('or')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">or</button>
            <button onclick="speakText('so')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">so</button>
            <button onclick="speakText('to')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">to</button>
            <button onclick="speakText('up')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">up</button>
            <button onclick="speakText('we')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">we</button>
            <button onclick="speakText('am')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">am</button>
            <button onclick="speakText('at')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">at</button>
            <button onclick="speakText('be')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus="focus:outline-none focus:ring-2 focus:ring-blue-500">be</button>
            <button onclick="speakText('do')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">do</button>
            <button onclick="speakText('go')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">go</button>
            <button onclick="speakText('he')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">he</button>
            <button onclick="speakText('if')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">if</button>
            <button onclick="speakText('in')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">in</button>
            <button onclick="speakText('it')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">it</button>
            <button onclick="speakText('me')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">me</button>
            <button onclick="speakText('no')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">no</button>
            <button onclick="speakText('of')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">of</button>
            <button onclick="speakText('or')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">or</button>
            <button onclick="speakText('so')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">so</button>
            <button onclick="speakText('to')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">to</button>
            <button onclick="speakText('up')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">up</button>
            <button onclick="speakText('we')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">we</button>
            <button onclick="speakText('am')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">am</button>
            <button onclick="speakText('be')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">be</button>
            <button onclick="speakText('do')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">do</button>
            <button onclick="speakText('go')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">go</button>
            <button onclick="speakText('he')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">he</button>
            <button onclick="speakText('if')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">if</button>
            <button onclick="speakText('in')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">in</button>
            <button onclick="speakText('it')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">it</button>
        </div>

    </div>
    <div id="lw3" class="hidden">
        <h2 class="text-lg font-semibold mb-4">3 Letter words</h2>
        <div class="grid grid-cols-4 gap-4">
            <button onclick="speakText('cat')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">cat</button>
            <button onclick="speakText('dog')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">dog</button>
            <button onclick="speakText('sun')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">sun</button>
            <button onclick="speakText('bat')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">bat</button>
            <button onclick="speakText('bed')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">bed</button>
            <button onclick="speakText('bus')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">bus</button>
            <button onclick="speakText('car')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">car</button>
            <button onclick="speakText('cup')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">cup</button>
            <button onclick="speakText('egg')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">egg</button>
            <button onclick="speakText('fan')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">fan</button>
            <button onclick="speakText('fly')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">fly</button>
            <button onclick="speakText('hat')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">hat</button>
            <button onclick="speakText('ice')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">ice</button>
            <button onclick="speakText('jam')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">jam</button>
            <button onclick="speakText('key')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">key</button>
            <button onclick="speakText('leg')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">leg</button>
            <button onclick="speakText('lip')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">lip</button>
            <button onclick="speakText('map')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">map</button>
            <button onclick="speakText('net')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">net</button>
            <button onclick="speakText('pan')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">pan</button>
            <button onclick="speakText('pot')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">pot</button>
            <button onclick="speakText('pen')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">pen</button>
            <button onclick="speakText('rat')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">rat</button>
            <button onclick="speakText('row')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">row</button>
            <button onclick="speakText('sat')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">sat</button>
            <button onclick="speakText('sea')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">sea</button>
            <button onclick="speakText('sky')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">sky</button>
            <button onclick="speakText('tag')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">tag</button>
            <button onclick="speakText('top')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">top</button>
            <button onclick="speakText('zip')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">zip</button>
            <button onclick="speakText('bag')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">bag</button>
            <button onclick="speakText('bat')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">bat</button>
            <button onclick="speakText('bun')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">bun</button>
            <button onclick="speakText('bus')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">bus</button>
            <button onclick="speakText('cab')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">cab</button>
            <button onclick="speakText('dam')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">dam</button>
            <button onclick="speakText('egg')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">egg</button>
            <button onclick="speakText('fun')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">fun</button>
            <button onclick="speakText('gum')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">gum</button>
            <button onclick="speakText('hot')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">hot</button>
            <button onclick="speakText('jar')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">jar</button>
            <button onclick="speakText('log')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">log</button>
            <button onclick="speakText('mat')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">mat</button>
            <button onclick="speakText('mud')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">mud</button>
            <button onclick="speakText('nut')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">nut</button>
            <button onclick="speakText('pan')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">pan</button>
            <button onclick="speakText('peg')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">peg</button>
            <button onclick="speakText('pit')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">pit</button>
            <button onclick="speakText('pot')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">pot</button>
            <button onclick="speakText('rat')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">rat</button>
            <button onclick="speakText('red')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">red</button>
            <button onclick="speakText('row')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">row</button>
            <button onclick="speakText('set')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">set</button>
            <button onclick="speakText('top')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">top</button>
            <button onclick="speakText('web')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">web</button>
            <button onclick="speakText('yes')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">yes</button>
            <button onclick="speakText('zip')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">zip</button>
        </div>
        
    </div>
    <div id="lw4" class="hidden">
        <h2 class="text-lg font-semibold mb-4">4 Letter words</h2>
        <div class="grid grid-cols-4 gap-4">
            <button onclick="speakText('tree')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">tree</button>
            <button onclick="speakText('book')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">book</button>
            <button onclick="speakText('milk')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">milk</button>
            <button onclick="speakText('boat')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">boat</button>
            <button onclick="speakText('fish')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">fish</button>
            <button onclick="speakText('lamp')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">lamp</button>
            <button onclick="speakText('star')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">star</button>
            <button onclick="speakText('desk')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">desk</button>
            <button onclick="speakText('door')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">door</button>
            <button onclick="speakText('ball')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">ball</button>
            <button onclick="speakText('sand')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">sand</button>
            <button onclick="speakText('chair')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">chair</button>
            <button onclick="speakText('card')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">card</button>
            <button onclick="speakText('shoes')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">shoes</button>
            <button onclick="speakText('frog')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">frog</button>
            <button onclick="speakText('piano')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">piano</button>
            <button onclick="speakText('cake')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">cake</button>
            <button onclick="speakText('moon')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">moon</button>
            <button onclick="speakText('pear')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">pear</button>
            <button onclick="speakText('rose')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">rose</button>
            <button onclick="speakText('tree')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">tree</button>
            <button onclick="speakText('zone')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">zone</button>
            <button onclick="speakText('coin')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">coin</button>
            <button onclick="speakText('wind')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">wind</button>
            <button onclick="speakText('wolf')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">wolf</button>
            <button onclick="speakText('sail')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">sail</button>
            <button onclick="speakText('fish')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">fish</button>
            <button onclick="speakText('gold')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">gold</button>
            <button onclick="speakText('hand')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">hand</button>
            <button onclick="speakText('jeans')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">jeans</button>
            <button onclick="speakText('kick')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">kick</button>
            <button onclick="speakText('lamp')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">lamp</button>
            <button onclick="speakText('news')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">news</button>
            <button onclick="speakText('oven')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">oven</button>
            <button onclick="speakText('park')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">park</button>
            <button onclick="speakText('rope')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">rope</button>
            <button onclick="speakText('sand')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">sand</button>
            <button onclick="speakText('seal')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">seal</button>
            <button onclick="speakText('tent')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">tent</button>
            <button onclick="speakText('wind')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">wind</button>
            <button onclick="speakText('yarn')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">yarn</button>
            <button onclick="speakText('zoo')" class="bg-blue-500 text-white px-4 py-6 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500">zoo</button>
        </div>
        
    </div>
    <div id="pic" class="">
        <h2 class="text-lg font-semibold mb-4">Pictures</h2>
        <div class="grid grid-cols-3 gap-4">
            
            <div class="relative flex flex-col text-gray-700  bg-white shadow-md bg-clip-border rounded-xl w-96">
                <a  onclick="speakText('apple')">
                    <div class="relative mx-4 mt-4 overflow-hidden text-gray-700 bg-white shadow-lg bg-clip-border rounded-xl h-80">
                        <svg class=" mx-auto h-72" viewBox="-1.5 0 250 250" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <defs> <style> .cls-3 { fill: #987160; } .cls-4 { fill: #00e2a5; } .cls-5 { fill: url(#linear-gradient-1); } </style> <linearGradient id="linear-gradient-1" gradientUnits="userSpaceOnUse" x1="118.5" y1="250" x2="118.5" y2="60"> <stop offset="0" stop-color="#fce202"></stop> <stop offset="1" stop-color="#cfe700"></stop> </linearGradient> </defs> <g id="apple"> <path d="M111.020,70.812 C110.505,63.506 109.359,55.069 107.000,46.812 C102.740,31.902 91.438,14.459 89.438,11.259 C87.438,8.059 86.800,3.412 92.000,0.812 C97.200,-1.788 101.800,2.394 105.000,6.812 C105.000,6.812 116.400,23.213 122.000,42.812 C124.659,52.119 125.965,62.213 126.588,70.812 C126.588,70.812 111.020,70.812 111.020,70.812 Z" id="path-1" class="cls-3" fill-rule="evenodd"></path> <path d="M183.065,5.528 C217.473,-3.692 244.464,4.784 245.972,10.413 C247.653,16.685 228.344,36.877 193.935,46.097 C159.527,55.317 133.743,51.348 131.027,41.212 C128.311,31.076 148.656,14.748 183.065,5.528 Z" id="path-2" class="cls-4" fill-rule="evenodd"></path> <path d="M148.000,249.812 C137.636,249.812 127.701,247.839 118.500,244.225 C109.299,247.839 99.364,249.812 89.000,249.812 C41.503,249.812 -0.000,187.399 -0.000,136.312 C-0.000,85.226 21.503,59.812 69.000,59.812 C85.139,59.812 100.167,69.219 118.500,69.219 C136.833,69.219 151.861,59.812 168.000,59.812 C215.496,59.812 237.000,85.226 237.000,136.312 C237.000,187.399 195.496,249.812 148.000,249.812 Z" id="path-3" class="cls-5" fill-rule="evenodd"></path> </g> </g></svg>
                    </div>
                    <div class="p-6 text-center">
                        <h4 class="block mb-2 font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                        Apple
                        </h4>
                    </div>
                </a>
                
            </div>

            <div class="relative flex flex-col text-gray-700 bg-white shadow-md bg-clip-border rounded-xl w-96">
                <a  onclick="speakText('ball')">
                    <div class="relative mx-4 mt-4 overflow-hidden text-gray-700 bg-white shadow-lg bg-clip-border rounded-xl h-80">
                        <img class="mx-auto h-72" src="https://cdn.britannica.com/68/195168-050-BBAE019A/football.jpg" />
                        {{-- <svg class="mx-auto h-72" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="50" cy="50" r="48" stroke="black" stroke-width="2" fill="red"/>
                            <line x1="50" y1="2" x2="50" y2="98" stroke="black" stroke-width="2"/>
                            <line x1="2" y1="50" x2="98" y2="50" stroke="black" stroke-width="2"/>
                        </svg> --}}
                    </div>
                    <div class="p-6 text-center">
                        <h4 class="block mb-2 font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                        Ball
                        </h4>
                    </div>
                </a>
            </div>

            <!-- Card Template for 'c' -->
            <div class="relative flex flex-col text-gray-700 bg-white shadow-md bg-clip-border rounded-xl w-96">
                <a  onclick="speakText('cat')">
                    <div class="relative mx-4 mt-4 overflow-hidden text-gray-700 bg-white shadow-lg bg-clip-border rounded-xl h-80">
                        {{-- <svg class="mx-auto h-72" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="50" cy="50" r="40" fill="gray"/>
                            <circle cx="35" cy="40" r="5" fill="black"/>
                            <circle cx="65" cy="40" r="5" fill="black"/>
                            <polygon points="50,55 45,65 55,65" fill="black"/>
                            <polygon points="40,20 30,10 50,10" fill="gray"/>
                            <polygon points="60,20 70,10 50,10" fill="gray"/>
                        </svg> --}}
                        <img class="mx-auto h-72" src="https://cdn.pixabay.com/photo/2017/02/20/18/03/cat-2083492_640.jpg" />
                    </div>
                    <div class="p-6 text-center">
                        <h4 class="block mb-2 font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                        Cat
                        </h4>
                    </div>
                </a>
            </div>

            <!-- Card Template for 'd' -->
            <div class="relative flex flex-col text-gray-700 bg-white shadow-md bg-clip-border rounded-xl w-96">
                <a  onclick="speakText('dog')">
                    <div class="relative mx-4 mt-4 overflow-hidden text-gray-700 bg-white shadow-lg bg-clip-border rounded-xl h-80">
                        {{-- <svg class="mx-auto h-72" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="50" cy="50" r="40" fill="brown"/>
                            <circle cx="35" cy="40" r="5" fill="black"/>
                            <circle cx="65" cy="40" r="5" fill="black"/>
                            <polygon points="50,55 45,65 55,65" fill="black"/>
                            <polygon points="40,20 30,10 50,10" fill="brown"/>
                            <polygon points="60,20 70,10 50,10" fill="brown"/>
                        </svg> --}}
                        <img class="mx-auto h-72" src="https://www.thesprucepets.com/thmb/y4YEErOurgco9QQO-zJ6Ld1yVkQ=/3000x0/filters:no_upscale():strip_icc()/english-dog-breeds-4788340-hero-14a64cf053ca40f78e5bd078b052d97f.jpg" />
                    </div>
                    <div class="p-6 text-center">
                        <h4 class="block mb-2 font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                        Dog
                        </h4>
                    </div>
                </a>
            </div>

            <!-- Repeat the structure for other letters -->
            
            <!-- Card Template for 'e' -->
            <div class="relative flex flex-col text-gray-700 bg-white shadow-md bg-clip-border rounded-xl w-96">
                <a  onclick="speakText('elephant')">
                    <div class="relative mx-4 mt-4 overflow-hidden text-gray-700 bg-white shadow-lg bg-clip-border rounded-xl h-80">
                        {{-- <svg class="mx-auto h-72" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="50" cy="50" r="40" fill="gray"/>
                            <rect x="40" y="60" width="20" height="30" fill="gray"/>
                            <circle cx="35" cy="40" r="5" fill="black"/>
                            <circle cx="65" cy="40" r="5" fill="black"/>
                            <polygon points="50,55 45,65 55,65" fill="black"/>
                            <rect x="30" y="30" width="10" height="10" fill="gray"/>
                            <rect x="60" y="30" width="10" height="10" fill="gray"/>
                        </svg> --}}
                        <img class="mx-auto h-72" src="https://images.pexels.com/photos/133394/pexels-photo-133394.jpeg?cs=srgb&dl=pexels-inspiredimages-133394.jpg&fm=jpg" />
                    </div>
                    <div class="p-6 text-center">
                        <h4 class="block mb-2 font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                        Elephant
                        </h4>
                    </div>
                </a>
            </div>

            <!-- Card Template for 'f' -->
            <div class="relative flex flex-col text-gray-700 bg-white shadow-md bg-clip-border rounded-xl w-96">
                <a  onclick="speakText('fish')">
                    <div class="relative mx-4 mt-4 overflow-hidden text-gray-700 bg-white shadow-lg bg-clip-border rounded-xl h-80">
                        {{-- <svg class="mx-auto h-72" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                            <ellipse cx="50" cy="50" rx="30" ry="20" fill="blue"/>
                            <polygon points="20,50 10,40 10,60" fill="blue"/>
                            <circle cx="60" cy="50" r="5" fill="white"/>
                            <circle cx="60" cy="50" r="2" fill="black"/>
                        </svg> --}}
                        <img class="mx-auto h-72" src="https://c02.purpledshub.com/uploads/sites/62/2022/09/GettyImages-200386624-001-d80a3ec.jpg?w=1029&webp=1" />
                    </div>
                    <div class="p-6 text-center">
                        <h4 class="block mb-2 font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                        Fish
                        </h4>
                    </div>
                </a>
            </div>

            <!-- Card Template for 'g' -->
            <div class="relative flex flex-col text-gray-700 bg-white shadow-md bg-clip-border rounded-xl w-96">
                <a  onclick="speakText('giraffe')">
                    <div class="relative mx-4 mt-4 overflow-hidden text-gray-700 bg-white shadow-lg bg-clip-border rounded-xl h-80">
                        {{-- <svg class="mx-auto h-72" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                            <rect x="45" y="20" width="10" height="50" fill="orange"/>
                            <circle cx="50" cy="30" r="5" fill="orange"/>
                            <circle cx="45" cy="15" r="2" fill="orange"/>
                            <circle cx="55" cy="15" r="2" fill="orange"/>
                        </svg> --}}
                        <img class="mx-auto h-72" src="https://thegraphicsfairy.com/wp-content/uploads/2022/10/Giraffe-Clipart-Color-GraphicsFairy.jpg" />
                    </div>
                    <div class="p-6 text-center">
                        <h4 class="block mb-2 font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                        Giraffe
                        </h4>
                    </div>
                </a>
            </div>

            <!-- Card Template for 'h' -->
            <div class="relative flex flex-col text-gray-700 bg-white shadow-md bg-clip-border rounded-xl w-96">
                <a  onclick="speakText('hat')">
                    <div class="relative mx-4 mt-4 overflow-hidden text-gray-700 bg-white shadow-lg bg-clip-border rounded-xl h-80">
                        {{-- <svg class="mx-auto h-72" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                            <rect x="30" y="40" width="40" height="10" fill="black"/>
                            <ellipse cx="50" cy="50" rx="20" ry="10" fill="black"/>
                        </svg> --}}
                        <img class="mx-auto h-72" src="data:image/jpeg;base64,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" />
                    </div>
                    <div class="p-6 text-center">
                        <h4 class="block mb-2 font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                        Hat
                        </h4>
                    </div>
                </a>
            </div>

            <!-- Card Template for 'i' -->
            <div class="relative flex flex-col text-gray-700 bg-white shadow-md bg-clip-border rounded-xl w-96">
                <a  onclick="speakText('ice cream')">
                    <div class="relative mx-4 mt-4 overflow-hidden text-gray-700 bg-white shadow-lg bg-clip-border rounded-xl h-80">
                        {{-- <svg class="mx-auto h-72" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                            <polygon points="50,10 40,50 60,50" fill="pink"/>
                            <rect x="45" y="50" width="10" height="30" fill="brown"/>
                        </svg> --}}
                        <img class="mx-auto h-72" src="data:image/jpeg;base64,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" />
                    </div>
                    <div class="p-6 text-center">
                        <h4 class="block mb-2 font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                        Ice Cream
                        </h4>
                    </div>
                </a>
            </div>

            <!-- Card Template for 'j' -->
            <div class="relative flex flex-col text-gray-700 bg-white shadow-md bg-clip-border rounded-xl w-96">
                <a  onclick="speakText('jacket')">
                    <div class="relative mx-4 mt-4 overflow-hidden text-gray-700 bg-white shadow-lg bg-clip-border rounded-xl h-80">
                        {{-- <svg class="mx-auto h-72" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                            <rect x="30" y="30" width="40" height="40" fill="blue"/>
                            <rect x="40" y="30" width="10" height="40" fill="darkblue"/>
                            <rect x="50" y="30" width="10" height="40" fill="darkblue"/>
                        </svg> --}}
                        <img class="mx-auto h-72" src="data:image/jpeg;base64,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" />
                    </div>
                    <div class="p-6 text-center">
                        <h4 class="block mb-2 font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                        Jacket
                        </h4>
                    </div>
                </a>
            </div>

            <!-- Card Template for 'k' -->
            <div class="relative flex flex-col text-gray-700 bg-white shadow-md bg-clip-border rounded-xl w-96">
                <a  onclick="speakText('kite')">
                    <div class="relative mx-4 mt-4 overflow-hidden text-gray-700 bg-white shadow-lg bg-clip-border rounded-xl h-80">
                        {{-- <svg class="mx-auto h-72" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                            <polygon points="50,10 30,50 50,90 70,50" fill="red"/>
                            <line x1="50" y1="90" x2="50" y2="100" stroke="black" stroke-width="2"/>
                        </svg> --}}
                        <img class="mx-auto h-72" src="https://cdn.britannica.com/68/195168-050-BBAE019A/football.jpg" />
                    </div>
                    <div class="p-6 text-center">
                        <h4 class="block mb-2 font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                        Kite
                        </h4>
                    </div>
                </a>
            </div>

            <!-- Card Template for 'l' -->
            <div class="relative flex flex-col text-gray-700 bg-white shadow-md bg-clip-border rounded-xl w-96">
                <a  onclick="speakText('lion')">
                    <div class="relative mx-4 mt-4 overflow-hidden text-gray-700 bg-white shadow-lg bg-clip-border rounded-xl h-80">
                        {{-- <svg class="mx-auto h-72" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="50" cy="50" r="30" fill="yellow"/>
                            <circle cx="35" cy="40" r="5" fill="black"/>
                            <circle cx="65" cy="40" r="5" fill="black"/>
                            <polygon points="50,55 45,65 55,65" fill="black"/>
                            <polygon points="50,20 40,10 60,10" fill="yellow"/>
                        </svg> --}}
                        <img class="mx-auto h-72" src="https://cdn.britannica.com/68/195168-050-BBAE019A/football.jpg" />
                    </div>
                    <div class="p-6 text-center">
                        <h4 class="block mb-2 font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                        Lion
                        </h4>
                    </div>
                </a>
            </div>

            <!-- Card Template for 'm' -->
            <div class="relative flex flex-col text-gray-700 bg-white shadow-md bg-clip-border rounded-xl w-96">
                <a  onclick="speakText('monkey')">
                    <div class="relative mx-4 mt-4 overflow-hidden text-gray-700 bg-white shadow-lg bg-clip-border rounded-xl h-80">
                        {{-- <svg class="mx-auto h-72" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="50" cy="50" r="40" fill="brown"/>
                            <circle cx="35" cy="40" r="5" fill="black"/>
                            <circle cx="65" cy="40" r="5" fill="black"/>
                            <polygon points="50,55 45,65 55,65" fill="black"/>
                            <polygon points="30,20 20,10 40,10" fill="brown"/>
                            <polygon points="70,20 80,10 60,10" fill="brown"/>
                        </svg> --}}
                        <img class="mx-auto h-72" src="https://cdn.britannica.com/68/195168-050-BBAE019A/football.jpg" />
                    </div>
                    <div class="p-6 text-center">
                        <h4 class="block mb-2 font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                        Monkey
                        </h4>
                    </div>
                </a>
            </div>

            <!-- Card Template for 'n' -->
            <div class="relative flex flex-col text-gray-700 bg-white shadow-md bg-clip-border rounded-xl w-96">
                <a  onclick="speakText('nest')">
                    <div class="relative mx-4 mt-4 overflow-hidden text-gray-700 bg-white shadow-lg bg-clip-border rounded-xl h-80">
                        {{-- <svg class="mx-auto h-72" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="50" cy="50" r="40" fill="brown"/>
                            <circle cx="50" cy="50" r="30" fill="white"/>
                        </svg> --}}
                        <img class="mx-auto h-72" src="https://cdn.britannica.com/68/195168-050-BBAE019A/football.jpg" />
                    </div>
                    <div class="p-6 text-center">
                        <h4 class="block mb-2 font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                        Nest
                        </h4>
                    </div>
                </a>
            </div>

            <!-- Card Template for 'o' -->
            <div class="relative flex flex-col text-gray-700 bg-white shadow-md bg-clip-border rounded-xl w-96">
                <a  onclick="speakText('orange')">
                    <div class="relative mx-4 mt-4 overflow-hidden text-gray-700 bg-white shadow-lg bg-clip-border rounded-xl h-80">
                        {{-- <svg class="mx-auto h-72" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="50" cy="50" r="40" fill="orange"/>
                        </svg> --}}
                        <img class="mx-auto h-72" src="https://cdn.britannica.com/68/195168-050-BBAE019A/football.jpg" />
                    </div>
                    <div class="p-6 text-center">
                        <h4 class="block mb-2 font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                        Orange
                        </h4>
                    </div>
                </a>
            </div>

            <!-- Card Template for 'p' -->
            <div class="relative flex flex-col text-gray-700 bg-white shadow-md bg-clip-border rounded-xl w-96">
                <a  onclick="speakText('parrot')">
                    <div class="relative mx-4 mt-4 overflow-hidden text-gray-700 bg-white shadow-lg bg-clip-border rounded-xl h-80">
                        {{-- <svg class="mx-auto h-72" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="50" cy="50" r="40" fill="green"/>
                            <circle cx="35" cy="40" r="5" fill="black"/>
                            <circle cx="65" cy="40" r="5" fill="black"/>
                            <polygon points="50,55 45,65 55,65" fill="black"/>
                            <polygon points="50,20 40,10 60,10" fill="red"/>
                        </svg> --}}
                        <img class="mx-auto h-72" src="https://cdn.britannica.com/68/195168-050-BBAE019A/football.jpg" />
                    </div>
                    <div class="p-6 text-center">
                        <h4 class="block mb-2 font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                        Parrot
                        </h4>
                    </div>
                </a>
            </div>

            <!-- Card Template for 'q' -->
            <div class="relative flex flex-col text-gray-700 bg-white shadow-md bg-clip-border rounded-xl w-96">
                <a  onclick="speakText('queen')">
                    <div class="relative mx-4 mt-4 overflow-hidden text-gray-700 bg-white shadow-lg bg-clip-border rounded-xl h-80">
                        {{-- <svg class="mx-auto h-72" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="50" cy="50" r="40" fill="gold"/>
                            <polygon points="50,10 45,20 55,20" fill="red"/>
                            <polygon points="40,20 30,30 70,30 60,20" fill="red"/>
                            <polygon points="30,30 25,50 75,50 70,30" fill="red"/>
                        </svg> --}}
                        <img class="mx-auto h-72" src="https://cdn.britannica.com/68/195168-050-BBAE019A/football.jpg" />
                    </div>
                    <div class="p-6 text-center">
                        <h4 class="block mb-2 font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                        Queen
                        </h4>
                    </div>
                </a>
            </div>

            <!-- Card Template for 'r' -->
            <div class="relative flex flex-col text-gray-700 bg-white shadow-md bg-clip-border rounded-xl w-96">
                <a  onclick="speakText('rabbit')">
                    <div class="relative mx-4 mt-4 overflow-hidden text-gray-700 bg-white shadow-lg bg-clip-border rounded-xl h-80">
                        {{-- <svg class="mx-auto h-72" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="50" cy="50" r="40" fill="white"/>
                            <circle cx="35" cy="40" r="5" fill="black"/>
                            <circle cx="65" cy="40" r="5" fill="black"/>
                            <polygon points="50,55 45,65 55,65" fill="black"/>
                            <polygon points="30,20 20,10 40,10" fill="white"/>
                            <polygon points="70,20 80,10 60,10" fill="white"/>
                        </svg> --}}
                        <img class="mx-auto h-72" src="https://cdn.britannica.com/68/195168-050-BBAE019A/football.jpg" />
                    </div>
                    <div class="p-6 text-center">
                        <h4 class="block mb-2 font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                        Rabbit
                        </h4>
                    </div>
                </a>
            </div>

            <!-- Card Template for 's' -->
            <div class="relative flex flex-col text-gray-700 bg-white shadow-md bg-clip-border rounded-xl w-96">
                <a  onclick="speakText('sun')">
                    <div class="relative mx-4 mt-4 overflow-hidden text-gray-700 bg-white shadow-lg bg-clip-border rounded-xl h-80">
                        {{-- <svg class="mx-auto h-72" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="50" cy="50" r="30" fill="yellow"/>
                            <line x1="50" y1="10" x2="50" y2="0" stroke="black" stroke-width="2"/>
                            <line x1="50" y1="90" x2="50" y2="100" stroke="black" stroke-width="2"/>
                            <line x1="10" y1="50" x2="0" y2="50" stroke="black" stroke-width="2"/>
                            <line x1="90" y1="50" x2="100" y2="50" stroke="black" stroke-width="2"/>
                        </svg> --}}
                        <img class="mx-auto h-72" src="https://cdn.britannica.com/68/195168-050-BBAE019A/football.jpg" />
                    </div>
                    <div class="p-6 text-center">
                        <h4 class="block mb-2 font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                        Sun
                        </h4>
                    </div>
                </a>
            </div>

            <!-- Card Template for 't' -->
            <div class="relative flex flex-col text-gray-700 bg-white shadow-md bg-clip-border rounded-xl w-96">
                <a  onclick="speakText('turtle')">
                    <div class="relative mx-4 mt-4 overflow-hidden text-gray-700 bg-white shadow-lg bg-clip-border rounded-xl h-80">
                        {{-- <svg class="mx-auto h-72" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="50" cy="50" r="40" fill="green"/>
                            <rect x="45" y="10" width="10" height="10" fill="darkgreen"/>
                            <rect x="45" y="80" width="10" height="10" fill="darkgreen"/>
                            <rect x="10" y="45" width="10" height="10" fill="darkgreen"/>
                            <rect x="80" y="45" width="10" height="10" fill="darkgreen"/>
                        </svg> --}}
                        <img class="mx-auto h-72" src="https://cdn.britannica.com/68/195168-050-BBAE019A/football.jpg" />
                    </div>
                    <div class="p-6 text-center">
                        <h4 class="block mb-2 font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                        Turtle
                        </h4>
                    </div>
                </a>
            </div>

            <!-- Card Template for 'u' -->
            <div class="relative flex flex-col text-gray-700 bg-white shadow-md bg-clip-border rounded-xl w-96">
                <a  onclick="speakText('umbrella')">
                    <div class="relative mx-4 mt-4 overflow-hidden text-gray-700 bg-white shadow-lg bg-clip-border rounded-xl h-80">
                        <img class="mx-auto h-72" src="https://cdn.britannica.com/68/195168-050-BBAE019A/football.jpg" />
                        {{-- <svg class="mx-auto h-72" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 50 C 20 30, 80 30, 90 50" stroke="black" stroke-width="2" fill="blue"/>
                            <line x1="50" y1="50" x2="50" y2="90" stroke="black" stroke-width="2"/>
                        </svg> --}}
                    </div>
                    <div class="p-6 text-center">
                        <h4 class="block mb-2 font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                        Umbrella
                        </h4>
                    </div>
                </a>
            </div>

            <!-- Card Template for 'v' -->
            <div class="relative flex flex-col text-gray-700 bg-white shadow-md bg-clip-border rounded-xl w-96">
                <a  onclick="speakText('violin')">
                    <div class="relative mx-4 mt-4 overflow-hidden text-gray-700 bg-white shadow-lg bg-clip-border rounded-xl h-80">
                        {{-- <svg class="mx-auto h-72" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                            <rect x="45" y="10" width="10" height="60" fill="brown"/>
                            <circle cx="50" cy="80" r="10" fill="brown"/>
                        </svg> --}}
                        <img class="mx-auto h-72" src="https://cdn.britannica.com/68/195168-050-BBAE019A/football.jpg" />
                    </div>
                    <div class="p-6 text-center">
                        <h4 class="block mb-2 font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                        Violin
                        </h4>
                    </div>
                </a>
            </div>

            <!-- Card Template for 'w' -->
            <div class="relative flex flex-col text-gray-700 bg-white shadow-md bg-clip-border rounded-xl w-96">
                <a  onclick="speakText('watch')">
                    <div class="relative mx-4 mt-4 overflow-hidden text-gray-700 bg-white shadow-lg bg-clip-border rounded-xl h-80">
                        {{-- <svg class="mx-auto h-72" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="50" cy="50" r="30" fill="silver"/>
                            <line x1="50" y1="0" x2="50" y2="10" stroke="black" stroke-width="2"/>
                            <line x1="50" y1="90" x2="50" y2="100" stroke="black" stroke-width="2"/>
                            <line x1="0" y1="50" x2="10" y2="50" stroke="black" stroke-width="2"/>
                            <line x1="90" y1="50" x2="100" y2="50" stroke="black" stroke-width="2"/>
                        </svg> --}}
                        <img class="mx-auto h-72" src="https://cdn.britannica.com/68/195168-050-BBAE019A/football.jpg" />
                    </div>
                    <div class="p-6 text-center">
                        <h4 class="block mb-2 font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                        Watch
                        </h4>
                    </div>
                </a>
            </div>

            <!-- Card Template for 'x' -->
            <div class="relative flex flex-col text-gray-700 bg-white shadow-md bg-clip-border rounded-xl w-96">
                <a  onclick="speakText('xylophone')">
                    <div class="relative mx-4 mt-4 overflow-hidden text-gray-700 bg-white shadow-lg bg-clip-border rounded-xl h-80">
                        {{-- <svg class="mx-auto h-72" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                            <rect x="30" y="40" width="40" height="10" fill="red"/>
                            <rect x="30" y="50" width="40" height="10" fill="orange"/>
                            <rect x="30" y="60" width="40" height="10" fill="yellow"/>
                            <rect x="30" y="70" width="40" height="10" fill="green"/>
                            <rect x="30" y="80" width="40" height="10" fill="blue"/>
                            <rect x="30" y="90" width="40" height="10" fill="purple"/>
                        </svg> --}}
                        <img class="mx-auto h-72" src="https://cdn.britannica.com/68/195168-050-BBAE019A/football.jpg" />
                    </div>
                    <div class="p-6 text-center">
                        <h4 class="block mb-2 font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                        Xylophone
                        </h4>
                    </div>
                </a>
            </div>

            <!-- Card Template for 'y' -->
            <div class="relative flex flex-col text-gray-700 bg-white shadow-md bg-clip-border rounded-xl w-96">
                <a  onclick="speakText('yo-yo')">
                    <div class="relative mx-4 mt-4 overflow-hidden text-gray-700 bg-white shadow-lg bg-clip-border rounded-xl h-80">
                        {{-- <svg class="mx-auto h-72" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="50" cy="50" r="30" fill="red"/>
                            <line x1="50" y1="80" x2="50" y2="100" stroke="black" stroke-width="2"/>
                        </svg> --}}
                        <img class="mx-auto h-72" src="https://cdn.britannica.com/68/195168-050-BBAE019A/football.jpg" />
                    </div>
                    <div class="p-6 text-center">
                        <h4 class="block mb-2 font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                        Yo-Yo
                        </h4>
                    </div>
                </a>
            </div>

            <!-- Card Template for 'z' -->
            <div class="relative flex flex-col text-gray-700 bg-white shadow-md bg-clip-border rounded-xl w-96">
                <a  onclick="speakText('zebra')">
                    <div class="relative mx-4 mt-4 overflow-hidden text-gray-700 bg-white shadow-lg bg-clip-border rounded-xl h-80">
                        {{-- <svg class="mx-auto h-72" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="50" cy="50" r="40" fill="white"/>
                            <line x1="30" y1="30" x2="70" y2="30" stroke="black" stroke-width="2"/>
                            <line x1="30" y1="40" x2="70" y2="40" stroke="black" stroke-width="2"/>
                            <line x1="30" y1="50" x2="70" y2="50" stroke="black" stroke-width="2"/>
                            <line x1="30" y1="60" x2="70" y2="60" stroke="black" stroke-width="2"/>
                            <line x1="30" y1="70" x2="70" y2="70" stroke="black" stroke-width="2"/>
                        </svg> --}}
                        <img class="mx-auto h-72" src="https://cdn.britannica.com/68/195168-050-BBAE019A/football.jpg" />
                    </div>
                    <div class="p-6 text-center">
                        <h4 class="block mb-2 font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                        Zebra
                        </h4>
                    </div>
                </a>
            </div>

        </div>
        
    </div>

    <div id="tribe" class="">
        <h2 class="text-lg font-semibold mb-4">Pictures</h2>
        <div class="grid grid-cols-3 gap-4">
            
            <div class="relative flex flex-col text-gray-700  bg-white shadow-md bg-clip-border rounded-xl w-96">
                <a  onclick="speakText('igbo')">
                    <div class="relative mx-4 mt-4 overflow-hidden text-gray-700 bg-white shadow-lg bg-clip-border rounded-xl h-80">
                        <img src="https://www.dimazbrand.com/cdn/shop/products/image_3b575884-f2a7-46b6-beb9-ad488afb3c8a.png?v=1674119007" />
                    </div>
                    <div class="p-6 text-center">
                        <h4 class="block mb-2 font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                        Igbo
                        </h4>
                    </div>
                </a>
            </div>

            <div class="relative flex flex-col text-gray-700  bg-white shadow-md bg-clip-border rounded-xl w-96">
                <a  onclick="speakText('hausa')">
                    <div class="relative mx-4 mt-4 overflow-hidden text-gray-700 bg-white shadow-lg bg-clip-border rounded-xl h-80">
                        <img src="https://nicholasidoko.com/blog/wp-content/uploads/2023/03/Hausa-dress-afrinik.jpg" />
                    </div>
                    <div class="p-6 text-center">
                        <h4 class="block mb-2 font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                        Hausa
                        </h4>
                    </div>
                </a>
            </div>


            <div class="relative flex flex-col text-gray-700  bg-white shadow-md bg-clip-border rounded-xl w-96">
                <a  onclick="speakText('yoruba')">
                    <div class="relative mx-4 mt-4 overflow-hidden text-gray-700 bg-white shadow-lg bg-clip-border rounded-xl h-80">
                        <img src="https://www.couturecrib.com/wp-content/uploads/2018/10/Latest-Nigerian-Native-Attire-Styles-For-Men-23.jpg" />
                    </div>
                    <div class="p-6 text-center">
                        <h4 class="block mb-2 font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                        Yoruba
                        </h4>
                    </div>
                </a>
            </div>


            <div class="relative flex flex-col text-gray-700  bg-white shadow-md bg-clip-border rounded-xl w-96">
                <a  onclick="speakText('fulani')">
                    <div class="relative mx-4 mt-4 overflow-hidden text-gray-700 bg-white shadow-lg bg-clip-border rounded-xl h-80">
                        <img src="https://ibiene.com/wp-content/uploads/2019/02/Fulani-3.jpg" />
                    </div>
                    <div class="p-6 text-center">
                        <h4 class="block mb-2 font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                        Fulani
                        </h4>
                    </div>
                </a>
            </div>


            <div class="relative flex flex-col text-gray-700  bg-white shadow-md bg-clip-border rounded-xl w-96">
                <a  onclick="speakText('ijaw')">
                    <div class="relative mx-4 mt-4 overflow-hidden text-gray-700 bg-white shadow-lg bg-clip-border rounded-xl h-80">
                        <img src="https://cdn.legit.ng/images/1120/vllkyt4f16ph51qmd.jpeg?v=1" />
                    </div>
                    <div class="p-6 text-center">
                        <h4 class="block mb-2 font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                        Ijaw
                        </h4>
                    </div>
                </a>
            </div>


            <div class="relative flex flex-col text-gray-700  bg-white shadow-md bg-clip-border rounded-xl w-96">
                <a  onclick="speakText('kanuri')">
                    <div class="relative mx-4 mt-4 overflow-hidden text-gray-700 bg-white shadow-lg bg-clip-border rounded-xl h-80">
                        <img src="https://lh3.googleusercontent.com/blogger_img_proxy/AEn0k_t9HSvjfQoxZlIoyCjHgHgPdGcSWhAC64juscnKB9evZWp9EW_7eFfNTQ6OwUw0or17Dzw-ty0CWXdlB9Tk0MrA0yrdGd-Y7GOuPRY_1MvkLgMjRc8frszCYFC7OkA6gzA7=s0-d" />
                    </div>
                    <div class="p-6 text-center">
                        <h4 class="block mb-2 font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                        Kanuri
                        </h4>
                    </div>
                </a>
            </div>


            <div class="relative flex flex-col text-gray-700  bg-white shadow-md bg-clip-border rounded-xl w-96">
                <a  onclick="speakText('ibibio')">
                    <div class="relative mx-4 mt-4 overflow-hidden text-gray-700 bg-white shadow-lg bg-clip-border rounded-xl h-80">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/5/5d/Ibibio_Culture.jpg" />
                    </div>
                    <div class="p-6 text-center">
                        <h4 class="block mb-2 font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                        Ibibio
                        </h4>
                    </div>
                </a>
            </div>


            <div class="relative flex flex-col text-gray-700  bg-white shadow-md bg-clip-border rounded-xl w-96">
                <a  onclick="speakText('tiv')">
                    <div class="relative mx-4 mt-4 overflow-hidden text-gray-700 bg-white shadow-lg bg-clip-border rounded-xl h-80">
                        <img src="https://fatherlandgazette.com/wp-content/uploads/2022/03/Tiv-people.jpg" />
                    </div>
                    <div class="p-6 text-center">
                        <h4 class="block mb-2 font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                        Tiv
                        </h4>
                    </div>
                </a>
            </div>


            <div class="relative flex flex-col text-gray-700  bg-white shadow-md bg-clip-border rounded-xl w-96">
                <a  onclick="speakText('nupe')">
                    <div class="relative mx-4 mt-4 overflow-hidden text-gray-700 bg-white shadow-lg bg-clip-border rounded-xl h-80">
                        <img src="https://c8.alamy.com/comp/2K15H56/retainers-of-the-etsu-or-leader-of-the-nupe-people-in-niger-blowing-a-fanfare-on-bronze-trumpets-called-kakati-2K15H56.jpg" />
                    </div>
                    <div class="p-6 text-center">
                        <h4 class="block mb-2 font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                        Nupe
                        </h4>
                    </div>
                </a>
            </div>


            <div class="relative flex flex-col text-gray-700  bg-white shadow-md bg-clip-border rounded-xl w-96">
                <a  onclick="speakText('efik')">
                    <div class="relative mx-4 mt-4 overflow-hidden text-gray-700 bg-white shadow-lg bg-clip-border rounded-xl h-80">
                        <img src="https://c8.alamy.com/comp/2F5G0TR/efik-students-performing-during-their-cultural-day-lagos-nigeria-2F5G0TR.jpg" />
                    </div>
                    <div class="p-6 text-center">
                        <h4 class="block mb-2 font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                            Efik
                        </h4>
                    </div>
                </a>
            </div>


            <div class="relative flex flex-col text-gray-700  bg-white shadow-md bg-clip-border rounded-xl w-96">
                <a  onclick="speakText('ibibio')">
                    <div class="relative mx-4 mt-4 overflow-hidden text-gray-700 bg-white shadow-lg bg-clip-border rounded-xl h-80">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/5/5d/Ibibio_Culture.jpg" />
                    </div>
                    <div class="p-6 text-center">
                        <h4 class="block mb-2 font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                        Ibibio
                        </h4>
                    </div>
                </a>
            </div>


        </div>
    </div>
</div>

    </div>
</body>
</html>
