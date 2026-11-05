<?php

// ---
use App\Models\Order;
use Phibble\DataFrame;
use function Phit\fit_generalized_linear;

$orders = DataFrame::fromQuery(Order::query());
$fit = fit_generalized_linear('returned ~ channel + items',
    $orders, family: 'binomial');

echo $fit;
