<?php
// Path to the CSV file
$file = 'data/color_mood.csv';

// Check if the file exists
if (!file_exists($file)) {
    die("Error: File not found. Please ensure the file exists at the specified path.");
}

// Read the CSV file
$data = array_map('str_getcsv', file($file));
if ($data === false) {
    die("Error: Unable to read the file.");
}

$header = array_shift($data); // Remove the header row

// Create an associative array for easy lookup
$moodData = [];
foreach ($data as $row) {
    $moodData[] = array_combine($header, $row);
}

// Map hex colors to their respective names
$colorMap = [
    '#FF5733' => 'Red',
    '#FFA500' => 'Orange',
    '#FFFF00' => 'Yellow',
    '#008000' => 'Green',
    '#0000FF' => 'Blue',
    '#800080' => 'Purple',
    '#FFC0CB' => 'Pink',
    '#000000' => 'Black',
    '#FFFFFF' => 'White',
    '#8B4513' => 'Brown',
    '#808080' => 'Gray'
];

// Get selected colors from the POST request
$selectedColors = json_decode($_POST['colors'], true);

// Count occurrences of each color
$colorCounts = array_count_values($selectedColors);

// Find the most frequently used colors
arsort($colorCounts);
$mostFrequentColors = array_slice(array_keys($colorCounts), 0, 3); // Top 3 colors

// Prepare the response
$response = [];

foreach ($mostFrequentColors as $color) {
    if (isset($colorMap[$color])) {
        $colorName = $colorMap[$color]; // Get the name of the color
        $moodFound = false;

        // Search for the mood data matching the color
        foreach ($moodData as $entry) {
            if (
                $entry['PrimaryColor'] == $colorName ||
                $entry['SecondaryColor'] == $colorName ||
                $entry['AccentColor'] == $colorName
            ) {
             //   $response[] = "Mood analysis for color $colorName: {$entry['Mood']} (Intensity: {$entry['MoodIntensity']}) - {$entry['Description']}";
                $response[] = "Mood analysis : {$entry['Mood']} (Intensity: {$entry['MoodIntensity']}) - {$entry['Description']}";
                $moodFound = true;
                break;
            }
        }

        // If no mood data was found for this color
        if (!$moodFound) {
            $response[] = "No mood data found for color: $colorName";
        }
    } else {
        // If color is not found in the color map
        $response[] = "No mood data found for color: $color";
    }
}

// Output the response
echo implode("<br>", $response);
?>
