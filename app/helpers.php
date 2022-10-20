<?php
if (!function_exists('cartesian_product')) {
    function cartesian_product(array $set)
    {
        return new App\Lib\CartesianProduct($set);
    }
}