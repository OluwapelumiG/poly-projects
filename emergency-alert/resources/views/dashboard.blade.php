<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 sm:p-8 w-full">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Dashboard') }}
                    </h2>
                    <!-- Notification Area -->
                    <div id="notifications" class="mt-4"></div>
                </div>
            </div>
        </div>
    </div>
   
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 sm:p-8 w-full">
                    <div class="flex flex-col gap-5 w-full">
                        <div class="flex flex-col sm:flex-row">
                            <div class="flex w-full sm:w-1/3"></div>
                            <div class="w-full sm:w-1/3 flex-col gap-3 rounded-xl border p-5 shadow text-center bg-red-400">
                                <a href="/emergencies/create">
                                    <svg class="mx-auto w-20 h-20 sm:w-44 sm:h-44" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-bell text-gray-50">
                                        <path d="M18 8a6 6 0 0 0-12 0c0 7-3 9-3 9h18s-3-2-3-9"></path>
                                        <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                                    </svg>
                                    <h2 class="text-white text-lg sm:text-2xl">Emergency</h2>
                                </a>
                            </div>
                            <div class="flex w-full sm:w-1/3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Audio element for notification sound -->
    <audio id="notification-sound" src="/sound/loud.mp3"></audio>

    <script>
        const notifications = document.getElementById('notifications');
        const audioElement = document.getElementById('notification-sound');

        function checkNotifications() {
            fetch('/notifications')
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    data.forEach(notification => {
                        const alertBox = document.createElement('div');
                        alertBox.className = 'bg-red-500 text-white p-4 rounded shadow mb-4';
                        alertBox.innerHTML = `
                            <strong>Title:</strong> ${notification.title} <br>
                            <strong>Description:</strong> ${notification.description} <br>
                            <strong>Location:</strong> ${notification.location} <br>
                            <strong>Severity:</strong> ${notification.severity} <br>
                            <strong>Author Name:</strong> ${notification.author_name} <br>
                            <strong>Author Email:</strong> ${notification.author_email} <br>
                            <strong>Author Phone:</strong> ${notification.author_phone}
                        `;
                        notifications.appendChild(alertBox);

                        // Play sound
                        audioElement.play().catch(error => {
                            console.log('Failed to play sound:', error);
                        });
                    });
                });
        }

        // Check for notifications every 10 seconds
        setInterval(checkNotifications, 10000);

        // Initial check
        checkNotifications();
    </script>
    
</x-app-layout>
