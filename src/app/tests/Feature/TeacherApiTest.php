<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\TeacherModel;

class TeacherApiTest extends BaseTestCase
{
    use WithFaker;
    const COUNT_ITEMS = 3;
    const HTTP_200 = 200;
    const HTTP_201 = 201;
    private $url = '/api/teacher/';
    public function factory($count = null)
    {
        return factory(TeacherModel::class, $count);
    }
    public function testsTeacherGet()
    {
        $teacher = $this->factory()->create();
        $response = $this->json(self::GET_METHOD, $this->url.$teacher->id);
        $teacher->delete();
        $response
            ->assertStatus(self::HTTP_200)
            ->assertJson(array(
                'data' => array(
                    'id' => $teacher->id,
                    'first_name' => $teacher->first_name,
                    'last_name' => $teacher->last_name,
                    'job_title' => $teacher->job_title,
                    'age' => $teacher->age
                )
            ));
    }
    public function testsTeacherGetAll()
    {
        $teachers = $this->factory(self::COUNT_ITEMS)->create();
        $response = $this->json(self::GET_METHOD, $this->url);
        $teachers->each(function($item){$item->delete();});
        $response
            ->assertStatus(self::HTTP_200)
            ->assertJsonStructure(array(
                'data' => array(
                    '*' => array(
                        'id',
                        'first_name',
                        'last_name',
                        'job_title',
                        'age'
                    )
                )
            ));
    }
    public function testsTeacherCreate()
    {
        $payload = array(
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'job_title' => $this->faker->jobTitle,
            'age' => rand(17, 25),
        );
        $response = $this->json(self::POST_METHOD, $this->url, $payload);
        $response
            ->assertStatus(self::HTTP_201)
            ->assertJson(array(
                'data' => $payload
            ));
        $id = $response->decodeResponseJson()['data']['id'];
        TeacherModel::destroy($id);
    }
    public function testsTeacherUpdate()
    {
        $teacher = $this->factory()->create();
        $payload = array(
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'job_title' => $this->faker->jobTitle,
            'age' => rand(17, 25),
        );
        $response = $this->json(self::PUT_METHOD, $this->url.$teacher->id, $payload);
        $teacher->delete();
        $response
            ->assertStatus(self::HTTP_200)
            ->assertSee(self::HTTP_SUCCESS);
    }
    public function testsTeacherDelete()
    {
        $teacher = $this->factory()->create();
        $response = $this->json(self::DELETE_METHOD, $this->url.$teacher->id);
        $teacher->delete();
        $response->assertStatus(self::HTTP_200);
    }
}
