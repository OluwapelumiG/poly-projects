<div>
    <h1>{{ $user->name }}'s Live Location</h1>
    <div id="map" style="height: 500px; width: 100%;"></div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let map;
            let marker;

            async function initMap() {
                const initialLocation = { lat: parseFloat({{ $location->latitude }}) || 0, lng: parseFloat({{ $location->longitude }}) || 0 };

                map = new google.maps.Map(document.getElementById("map"), {
                    center: initialLocation,
                    zoom: 15,
                });

                marker = new google.maps.Marker({
                    position: initialLocation,
                    map: map,
                    title: "{{ $user->name }}'s location",
                });

                // Optional: Add more functionality to update location in real-time
                setInterval(async () => {
                    try {
                        const response = await fetch('{{ route('drivers.fetchLocation', ['user' => $user->id]) }}');
                        const data = await response.json();
                        const pos = { lat: parseFloat(data.latitude), lng: parseFloat(data.longitude) };
                        marker.setPosition(pos);
                        map.setCenter(pos);
                    } catch (error) {
                        console.error('Error fetching location:', error);
                    }
                }, 5000);
            }

            initMap();
        });
    </script>
</div>
