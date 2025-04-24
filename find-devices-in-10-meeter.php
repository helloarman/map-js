<?php 

namespace Find_devices_in_10_meeter;

class FindDevicesIn10Meeter{

    public function calculate() {
        $targetLat = 23.810331;
        $targetLon = 90.412521;

        $locations = [
            ['lat' => 23.810345, 'lon' => 90.412500],
            ['lat' => 23.811000, 'lon' => 90.413000],
            ['lat' => 23.810300, 'lon' => 90.412480],
            // ... add more
        ];

        $nearby = [];

        foreach ($locations as $location) {
            $distance = $this->distanceInMeters($targetLat, $targetLon, $location['lat'], $location['lon']);
            if ($distance <= 10) {
                $nearby[] = array_merge($location, ['distance' => $distance]);
            }
        }

        print_r($nearby);

    }

    function distanceInMeters($lat1, $lon1, $lat2, $lon2) {
        $earthRadius = 6371000; // Radius in meters
    
        $lat1 = deg2rad($lat1);
        $lon1 = deg2rad($lon1);
        $lat2 = deg2rad($lat2);
        $lon2 = deg2rad($lon2);
    
        $deltaLat = $lat2 - $lat1;
        $deltaLon = $lon2 - $lon1;
    
        $a = sin($deltaLat / 2) * sin($deltaLat / 2) +
             cos($lat1) * cos($lat2) *
             sin($deltaLon / 2) * sin($deltaLon / 2);
    
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
    
        return $earthRadius * $c;
    }
}