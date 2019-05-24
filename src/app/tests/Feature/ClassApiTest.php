<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\ClassModel;

class ClassApiTest extends BaseTestCase
{
    use WithFaker;
    const COUNT_ITEMS = 3;
    const HTTP_200 = 200;
    const HTTP_201 = 201;
    private $url = '/api/class/';
    public function factory($count = null)
    {
        return factory(ClassModel::class, $count);
    }
    public function testsClassGet()
    {
        $class = $this->factory()->create();
        $response = $this->json(self::GET_METHOD, $this->url.$class->id);
        $class->delete();
        $response
            ->assertStatus(self::HTTP_200)
            ->assertJson(array(
                'data' => array(
                    'id' => $class->id,
                    'title' => $class->title,
                    'day' => $class->day,
                    'time' => $class->time,
                    'teacher_id' => $class->teacher_id
                )
            ));
    }
    public function testsClassGetAll()
    {
        $classs = $this->factory(self::COUNT_ITEMS)->create();
        $response = $this->json(self::GET_METHOD, $this->url);
        $classs->each(function($item){$item->delete();});
        $response
            ->assertStatus(self::HTTP_200)
            ->assertJsonStructure(array(
                'data' => array(
                    '*' => array(
                        'id',
                        'title',
                        'day',
                        'time',
                        'teacher_id'
                    )
                )
            ));
    }
    public function testsClassCreate()
    {
        $payload = array(
            'title' => $this->faker->buildingNumber,
            'day' => $this->faker->dayOfMonth,
            'time' => $this->faker->time,
            'teacher_id' => rand(17, 25),
        );
        $response = $this->json(self::POST_METHOD, $this->url, $payload);
        $response
            ->assertStatus(self::HTTP_201)
            ->assertJson(array(
                'data' => $payload
            ));
        $id = $response->decodeResponseJson()['data']['id'];
        ClassModel::destroy($id);
    }
    public function testsClassUpdate()
    {
        $class = $this->factory()->create();
        $payload = array(
            'title' => $this->faker->buildingNumber,
            'day' => $this->faker->dayOfMonth,
            'time' => $this->faker->time,
            'teacher_id' => rand(17, 25),
        );
        $response = $this->json(self::PUT_METHOD, $this->url.$class->id, $payload);
        $class->delete();
        $response
            ->assertStatus(self::HTTP_200)
            ->assertSee(self::HTTP_SUCCESS);
    }
    public function testsClassDelete()
    {
        $class = $this->factory()->create();
        $response = $this->json(self::DELETE_METHOD, $this->url.$class->id);
        $class->delete();
        $response->assertStatus(self::HTTP_200);
    }
}
