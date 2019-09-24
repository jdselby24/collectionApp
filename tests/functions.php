<?php
require '../functions.php'; // Links to another php file, needed when testing
use PHPUnit\Framework\TestCase;

class StackTest extends TestCase {
    public function testSuccessValidateAddData()
    {
        $expected = [true,""];
        $input = ["model"=>"CarModel"];
        $case = validateAddData($input);
        $this->assertEquals($case,$expected);

    }

    public function testFailureValidateAddData()
    {
        $expected = [true,""];
        $input = ["mode" => false];
        $case = validateAddData($input);
        $this->assertEquals($case,$expected);
    }

    public function testMalformedValidateAddData()
    {
        $input = 4;
        $this->expectException(TypeError::class);
        $case = validateAddData($input);
    }
}