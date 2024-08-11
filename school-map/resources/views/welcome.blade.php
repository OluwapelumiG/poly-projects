<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Map</title>
    <!-- TailwindCSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.0/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Custom styles */
        #map {
            height: 75vh;
        }

        .location-card {
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .location-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body class="bg-gray-100 flex flex-col items-center justify-center min-h-screen">
    <div class="w-full max-w-6xl p-5">
        <h1 class="text-4xl font-bold text-center mb-10">School Map</h1>
        <div id="location-list" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($locations as $location)
                <div class="location-card bg-white p-5 rounded-lg shadow-md cursor-pointer"
                    data-lat="{{ $location->latitude }}" data-lng="{{ $location->longitude }}"
                    data-name="{{ $location->name }}">
                    <h2 class="text-xl font-semibold mb-2">{{ $location->name }}</h2>
                    <p class="text-gray-600">Click to view on map</p>
                </div>
            @endforeach
        </div>
    </div>
    <div id="map" class="w-full mt-10 hidden"></div> <!-- Initially hidden -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY"></script>
    <script>
        let map;
        let marker;

        function initMap(lat, lng, name) {
            const position = {
                lat,
                lng
            };

            if (!map) {
                map = new google.maps.Map(document.getElementById('map'), {
                    center: position,
                    zoom: 15
                });
            } else {
                map.setCenter(position);
            }

            if (marker) {
                marker.setMap(null);
            }

            marker = new google.maps.Marker({
                position,
                map,
                title: name
            });

            document.getElementById('map').classList.remove('hidden'); // Show the map
        }

        document.addEventListener('DOMContentLoaded', () => {
            const cards = document.querySelectorAll('.location-card');
            cards.forEach(card => {
                card.addEventListener('click', () => {
                    const lat = parseFloat(card.getAttribute('data-lat'));
                    const lng = parseFloat(card.getAttribute('data-lng'));
                    const name = card.getAttribute('data-name');

                    initMap(lat, lng, name);
                });
            });
        });
    </script>
</body>

</html>
