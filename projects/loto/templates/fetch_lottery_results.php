<?php

// URL of the website
$url = 'https://www.millipiyangoonline.com/sayisal-loto/cekilis-sonuclari.61.2024';

// Create a DOMDocument object
$dom = new DOMDocument();

// Load the HTML from the URL
$dom->loadHTMLFile($url);

// Create a DOMXPath object
$xpath = new DOMXPath($dom);

// Define the XPath query to locate the winning numbers
$query = "//div[@class='kt-portlet__body']//strong";

// Query the DOM with the XPath expression
$result = $xpath->query($query);

// Check if there are any results
if ($result->length > 0) {
    // Extract and display the winning numbers
    $winningNumbers = [];
    foreach ($result as $node) {
        $winningNumbers[] = $node->nodeValue;
    }
    echo "Winning Numbers: " . implode(", ", $winningNumbers);
} else {
    echo "Winning numbers not found!";
}
?>
