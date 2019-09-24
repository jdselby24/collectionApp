<?php
    require '../functions.php';
    use PHPUnit\Framework\TestCase;

    class StackTest extends TestCase {
        public function testSuccessDisplayCollection() {
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

        public function testFailureDisplayCollection() {
            $inputTestCollection = [['hello'=>'Yo Waddup',]];
            $expectedOutput = "<div class=\"car\">";
            $expectedOutput .= "<div class=\"tableRow\">";
            $expectedOutput .= "<div class=\"dataElement tableHeader\"></div>";
            $expectedOutput .= "<div class=\"dataElement\">Yo Waddup</div></div></div>";

            $case = displayCollection($inputTestCollection);
            $this->assertEquals($case, $expectedOutput);
        }

        public function testMalformedDisplayCollection() {
            $input = "hello";
            $this->expectException(TypeError::class);
            $case = displayCollection($input);

        }
    }