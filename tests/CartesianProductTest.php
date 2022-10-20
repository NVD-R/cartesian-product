<?php

namespace Tests;

use Illuminate\Support\Arr;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class CartesianProductTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_cartesian_product()
    {
        $data = [[1, 2, 3], ['a', 'b'], ['blue', 'red']];
        $startTime = microtime(true);
        $trueResult = Arr::crossJoin(...$data);
        $endTime = microtime(true);
        $executeTime['Laravel_Helper'] = $endTime - $startTime;
        $startTime = microtime(true);
        $testResult = cartesian_product($data)->toArray();
        $endTime = microtime(true);
        $executeTime['Custom_Helper'] = $endTime - $startTime;
        foreach ($testResult as $index => $item) {
            echo PHP_EOL . $index + 1 . ' => ' . implode(', ', $item);
        }
        echo PHP_EOL . "Laravel Helper(microtime): {$executeTime['Laravel_Helper']}";
        echo PHP_EOL . "Custom Helper(microtime): {$executeTime['Custom_Helper']}";
        $this->assertEquals(
            $trueResult,
            $testResult
        );
    }
}