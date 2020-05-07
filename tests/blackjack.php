<?php

require '../blackjack.php';

use PHPUnit\Framework\TestCase;

class FunctionTest extends TestCase
{
    // Success test, every function in a test must
    // start with the word test
    public function test_success_hand__score_builder()
    {
        // input for the test to get the expected
        // result
        $input = [
            ['card' => 'Ace of Spades', 'score' => 11],
            ['card' => 'Two of Spades', 'score' => 2]
        ];
        // Run the real function we're testing
        // by passing in our input
        $case = handScoreBuilder($input);

        // test to see if the result contains cards & score
        $this->assertArrayHasKey('cards', $case);
        $this->assertArrayHasKey('score', $case);
    }
    // failure test
//    public function testFailureMultiplyByTwo()
//    {
//        // expected result
//        $expected = -6.0;
//        // input for the test negative numbers
//        $input = -3;
//        // Run the actual function to be tested
//        $case = multiplyByTwo($input);
//        // Check to see if the result matches expected
//        $this->assertEquals($expected, $case);
//    }
//
    public function testMalformedMultiplyByTwo()
    {
        // input to test wrong datatype
        $input = [3];
        // sets the test up to expect an error
        // so the error doesn't break the test
        $this->expectException(TypeError::class);
        // test the actual function
        $case = handScoreBuilder($input);
    }
}