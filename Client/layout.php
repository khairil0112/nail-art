<?php
// Simple layout helper functions to mimic Laravel Blade's section and yield

$sections = [];
$currentSection = null;

function startSection($name) {
    global $currentSection;
    $currentSection = $name;
    ob_start();
}

function endSection() {
    global $sections, $currentSection;
    $sections[$currentSection] = ob_get_clean();
    $currentSection = null;
}

function yieldSection($name) {
    global $sections;
    echo isset($sections[$name]) ? $sections[$name] : '';
}
