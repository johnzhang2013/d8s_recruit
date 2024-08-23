<?php

use PHPUnit\Framework\TestCase;
use Src\MyGreeter;

class MyGreeterTest extends TestCase
{
    private MyGreeter $greeter;

    public function setUp(): void
    {
        $this->greeter = new MyGreeter();
    }

    public function test_init()
    {
        $this->assertInstanceOf(
            MyGreeter::class,
            $this->greeter
        );
    }

    public function test_greeting()
    {
        $hour = date('G');
        $greeting_msg = $this->greeter->greeting();
        $is_must_matched = false;

        //Set the timeframes with the specific hour conditions.
        $timeframes = [];
        $timeframes['morning']     = ['min' => 0,  'max' => 12];
        $timeframes['afternoon']   = ['min' => 12, 'max' => 18];
        $timeframes['evening']     = ['min' => 18, 'max' => 24];

        foreach($timeframes as $_frame => $_condition){
            if(preg_match('/'.$_frame.'$/i', $greeting_msg)){
                $this->assertGreaterThanOrEqual($_condition['min'], $hour);
                $this->assertLessThan($_condition['max'], $hour);

                $is_must_matched = true;
                break;
            }
        }

        $this->assertTrue($is_must_matched, "Unknown greeting way");
    }
}
