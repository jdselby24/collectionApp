<?php
    require '../functions.php';
    use PHPUnit\Framework\TestCase;

    class StackTest extends TestCase {
        public function testSuccessDisplayCollection() 
        {
            $inputTestCollection = [['type'=>'test',]];
            $expectedOutput = "<div class=\"car\">";
            $expectedOutput .= "<div class=\"tableRow\">";
            $expectedOutput .= "<div class=\"dataElement tableHeader\">Type:</div>";
            $expectedOutput .= "<div class=\"dataElement\">test</div>";
            $expectedOutput .= "</div>";
            $expectedOutput .= "</div>";

            $case = displayCollection($inputTestCollection);
            $this->assertEquals($case, $expectedOutput);
        }

        public function testFailureDisplayCollection() 
        {
            $inputTestCollection = ['Yo Waddup'];
            $expectedOutput = 'Error generating HTML from collection';

            $case = displayCollection($inputTestCollection);
            $this->assertEquals($case, $expectedOutput);
        }

        public function testMalformedDisplayCollection() 
        {
            $input = "hello";
            $this->expectException(TypeError::class);
            $case = displayCollection($input);

        }

        public function testSuccessValidateAddData()
        {
            $expected = ["valid" => true, "failedAt" => ""];
            $input = ["model"=>"CarModel"];
            $case = validateAddData($input);
            $this->assertEquals($case,$expected);

        }

        public function testFailureValidateAddData()
        {
            $expected = [false,"Form is incomplete!"];
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

