<div>
    <div id="map" style="height: 500px; width: 100%;"></div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let map;
            let marker;
            // const defaultLocation = { lat: 7.851042, lng: 6.710465 }; // Default location if geolocation fails

            async function getLocation() {
                return new Promise((resolve, reject) => {
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(
                            (position) => {
                                const latitude = position.coords.latitude;
                                const longitude = position.coords.longitude;
                                console.log(`Latitude: ${latitude}, Longitude: ${longitude}`);
                                resolve({ latitude, longitude });
                            },
                            (error) => {
                                console.error("Error getting location:", error);
                                reject("Unable to retrieve your location");
                            }, {
                                enableHighAccuracy: true,
                                timeout: 30000,
                                maximumAge: 0
                            }
                        );
                    } else {
                        reject("Geolocation is not supported by this browser.");
                    }
                });
            }

            // async function getLocation() {
            //     try {
            //         const response = await fetch('https://www.googleapis.com/geolocation/v1/geolocate?key=AIzaSyDW-vl7XMK8EHVR1Lvr5J2xySfv5t5NcuA', {
            //             method: 'POST',
            //             headers: {
            //                 'Content-Type': 'application/json'
            //             },
            //             body: JSON.stringify({})
            //         });

            //         if (!response.ok) {
            //             throw new Error('Unable to retrieve your location');
            //         }

            //         const data = await response.json();
            //         const { location } = data;
            //         console.log("Location", data);
            //         return { latitude: location.lat, longitude: location.lng };

            //     } catch (error) {
            //         console.error("Error getting location:", error);
            //         throw error; // Propagate error to handle it in initMap()
            //     }
            // }

            async function updateServerLocation(latitude, longitude) {
                try {
                    const response = await fetch('{{ route('updateLocation') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            latitude: latitude,
                            longitude: longitude
                        })
                    });

                    const data = await response.json();
                    // console.log(data);
                } catch (error) {
                    console.error('Error updating location:', error);
                }
            }

            async function initMap() {
                let initialLocation;

                try {
                    const location = await getLocation();
                    initialLocation = { lat: location.latitude, lng: location.longitude };
                } catch (error) {
                    console.error("Using default location:", error);
                    initialLocation = defaultLocation;
                }

                map = new google.maps.Map(document.getElementById("map"), {
                    center: initialLocation,
                    zoom: 15,
                });

                marker = new google.maps.Marker({
                    position: initialLocation,
                    map: map,
                    title: "Your location",
                });

                if (navigator.geolocation) {
                    navigator.geolocation.watchPosition((position) => {
                        const pos = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude
                        };

                        marker.setPosition(pos);
                        map.setCenter(pos);

                        updateServerLocation(pos.lat, pos.lng);

                    }, (error) => {
                        console.error("Error watching position:", error);
                    }, {
                        enableHighAccuracy: true,
                        timeout: 10000,
                        maximumAge: 0
                    });

                    // Refresh the map and marker every 5 seconds
                    setInterval(async () => {
                        try {
                            const location = await getLocation();
                            const pos = { lat: location.latitude, lng: location.longitude };
                            marker.setPosition(pos);
                            map.setCenter(pos);

                            updateServerLocation(pos.lat, pos.lng);
                        } catch (error) {
                            console.error("Error refreshing location:", error);
                        }
                    }, 5000);
                } else {
                    console.log("Browser doesn't support Geolocation");
                }
            }

            initMap();
        });
    </script>
</div>
