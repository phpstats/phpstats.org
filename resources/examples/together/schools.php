<?php

chdir(database_path('data'));

// ---
$schools = \Phpolars\scan_csv('schools.csv')
    ->select(['school', 'study_hours', 'score'])
    ->collect();

// A data frame prints as a table.
echo $schools->head(5);

// ---
$data = $schools->toColumns();

$fit = \Phit\fit_mixed_gaussian(
    'score ~ study_hours + (1 | school)',
    $data,
);

// A fit prints an R-style summary.
echo $fit;

$data['fitted'] = $fit['fitted'];

// ---
// Map columns to aesthetics and add layers, as in ggplot2.
$chart = \Phiz\Plot::of($data)
    ->aes(x: 'study_hours', y: 'score', color: 'school')
    ->point(alpha: 0.4)
    ->line(aes: ['y' => 'fitted'], alpha: 0.8)
    ->guides(color: 'none')
    ->labs(x: 'Study hours', y: 'Test score');

// Embeds the chart in the page.
echo $chart->embed();
