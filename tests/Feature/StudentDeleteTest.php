<?php

namespace Tests\Feature;

use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


use function PHPUnit\Framework\assertNotCount;

class StudentDeleteTest extends TestCase
{

    use RefreshDatabase;

    private $data;



    public function test_student_delete()
    {
        $name = 'Osshdfhsadfhdsakdfj';
        $id = 99;
        $this->data = Student::create([
            'student' => $name,
            'user_id' => $id,
            ]);

            $this->postJson(route('student.destroy', $this->data->id))->assertStatus(201);
            $this->assertDatabaseMissing('students',['student' => $this->data->student]);
    }
}