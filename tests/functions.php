<?php
require '../functions.php';
use PHPUnit\Framework\TestCase;

class StackTest extends TestCase {
    // Tests for the validateAddData function
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

    // Tests for the formError function

    public function testSuccessFormError()
    {
        $expected = "Data in 'Type' is invalid or is of the wrong type";
        $input = [false,'type'];
        $case = formError($input);
        $this->assertEquals($case,$expected);

    }

    public function testFailureFormError()
    {
        $expected = "Data in 'yeet' is invalid or is of the wrong type";
        $input = [false,'yeet'];
        $case = formError($input);
        $this->assertEquals($case,$expected);
    }

    public function testMalformedFormError()
    {
        $input = 2;
        $this->expectException(TypeError::class);
        $case = formError($input);
    }


}