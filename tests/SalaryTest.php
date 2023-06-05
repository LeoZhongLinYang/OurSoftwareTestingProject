<?php
// ---tests---
use PHPUnit\Framework\TestCase;
require __DIR__ . '/../src/Salary.php';
class SalaryTest extends TestCase
{
    /**
     * @covers Salary::set_data
     */
    public function testset_data(){
        $tmp_salary = new Salary();
        $tmp_salary->set_data("Louis", 100);
        $this->assertEquals($tmp_salary->name, "Louis");
        $this->assertEquals($tmp_salary->value, 100);
    }
}
?>