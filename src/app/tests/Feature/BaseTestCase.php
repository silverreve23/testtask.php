<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BaseTestCase extends TestCase
{
    use WithFaker;
    const COUNT_ITEMS = 3;
    const HTTP_200 = 200;
    const HTTP_201 = 201;
    const GET_METHOD = 'GET';
    const POST_METHOD = 'POST';
    const PUT_METHOD = 'PUT';
    const DELETE_METHOD = 'DELETE';
    const HTTP_SUCCESS = 'OK';
}
