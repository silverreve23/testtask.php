<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\StudentModel;

class StudentApiTest extends BaseTestCase
{
    use WithFaker;
    const COUNT_ITEMS = 3;
    const HTTP_200 = 200;
    const HTTP_201 = 201;
    private $url = '/api/student/';
    public function factory($count = null)
    {
        return factory(StudentModel::class, $count);
    }
    public function testsStudentGet()
    {
        $student = $this->factory()->create();
        $response = $this->json(self::GET_METHOD, $this->url.$student->id);
        $student->delete();
        $response
            ->assertStatus(self::HTTP_200)
            ->assertJson(array(
                'data' => array(
                    'id' => $student->id,
                    'first_name' => $student->first_name,
                    'last_name' => $student->last_name,
                    'age' => $student->age,
                    'group' => $student->group
                )
            ));
    }
    public function testsStudentGetAll()
    {
        $students = $this->factory(self::COUNT_ITEMS)->create();
        $response = $this->json(self::GET_METHOD, $this->url);
        $students->each(function($item){$item->delete();});
        $response
            ->assertStatus(self::HTTP_200)
            ->assertJsonStructure(array(
                'data' => array(
                    '*' => array(
                        'id',
                        'first_name',
                        'last_name',
                        'age',
                        'group'
                    )
                )
            ));
    }
    public function testsStudentCreate()
    {
        $payload = array(
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'age' => rand(17, 25),
            'group' => $student->lexify('Group ??.??')
        );
        $response = $this->json(self::POST_METHOD, $this->url, $payload);
        $response
            ->assertStatus(self::HTTP_201)
            ->assertJson(array(
                'data' => $payload
            ));
        $id = $response->decodeResponseJson()['data']['id'];
        StudentModel::destroy($id);
    }
    public function testsStudentUpdate()
    {
        $student = $this->factory()->create();
        $payload = array(
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'age' => rand(17, 25),
            'group' => $student->lexify('Group ??.??')
        );
        $response = $this->json(self::PUT_METHOD, $this->url.$student->id, $payload);
        $student->delete();
        $response
            ->assertStatus(self::HTTP_200)
            ->assertSee(self::HTTP_SUCCESS);
    }
    public function testsStudentDelete()
    {
        $student = $this->factory()->create();
        $response = $this->json(self::DELETE_METHOD, $this->url.$student->id);
        $student->delete();
        $response->assertStatus(self::HTTP_200);
    }
}
