<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Testing\TestResponse;
use Tests\TestCase;

class UsersTest extends TestCase
{
  /**
   * A basic feature test example.
   *
   * @return void
   */
  public function test_login_admin_()
  {
    // check wrong example
    $response = $this->json('post', 'api/login', [ 'email' => 'unknown', 'password' => 'unknown' ]);
    $response->assertStatus(422);

    // sign in admin
    $response = $this->json('post', 'api/login', [ 'email' => 'admin@elbop.uz', 'password' => 'b19971997' ]);
    $response->assertStatus(200);
    $response->assertJsonCount(4);
    $response->assertJson(['name' => 'Admin']);
    $response->assertJson(['email' => 'admin@elbop.uz']);
    $response->assertJson(['role' => '1']);
  }

  public function test_register_new_moderator(){

    // sign in admin
    $response = $this->json('post', 'api/login', [ 'email' => 'admin@elbop.uz', 'password' => 'b19971997' ]);
    // get admin token
    $this->token = $response->json(['token']);

    // Few argument test
    $response = $this->json('post', 'api/user/new', [ 'email' => 'moderator@elbop.uz', 'password' => 'b19971997' ]);
    $response->assertStatus(422);

    // no bearer token
    $response = $this->json('post', 'api/user/new', [ 'name' => 'moderator', 'email' => 'moderator2@elbop.uz', 'password' => 'b19971997', 'password_confirmation' => 'b19971997', 'role' => 2, 'state_id' => 3 ]);
    $response->assertStatus(200);

    DB::table('users')->where('email', '=', 'moderator2@elbop.uz')->delete();
  }
}
