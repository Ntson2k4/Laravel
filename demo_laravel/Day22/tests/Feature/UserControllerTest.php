<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

     use RefreshDatabase;

     protected function setUp(): void
     {
         parent::setUp();
         $this->admin = User::factory()->create(['role' => 'admin']);
     }
 
     public function test_index_returns_users_view()
     {
         $this->actingAs($this->admin);
 
         $response = $this->get(route('admin.users'));
 
         $response->assertStatus(200);
         $response->assertViewIs('admin.users.index');
         $response->assertViewHas('users');
     }
 
     public function test_create_user()
     {
         $this->actingAs($this->admin);
 
         $response = $this->post(route('admin.users.store'), [
             'name' => 'New User',
             'email' => 'newuser@example.com',
             'password' => 'password',
             'role' => 'user',
         ]);
 
         $response->assertRedirect(route('admin.users'));
         $this->assertDatabaseHas('users', [
             'name' => 'New User',
             'email' => 'newuser@example.com',
         ]);
     }
 
     public function test_update_user()
     {
         $user = User::factory()->create(['role' => 'user']);
 
         $this->actingAs($this->admin);
 
         $response = $this->put(route('admin.users.update', $user), [
             'name' => 'Updated User',
             'email' => 'updateduser@example.com',
             'password' => 'newpassword',
             'role' => 'editor',
         ]);
 
         $response->assertRedirect(route('admin.users'));
         $this->assertDatabaseHas('users', [
             'name' => 'Updated User',
             'email' => 'updateduser@example.com',
             'role' => 'editor',
         ]);
         $this->assertTrue(Hash::check('newpassword', $user->fresh()->password));
     }
 
     public function test_delete_user()
     {
         $admin = User::factory()->create(['role' => 'admin']);
         $this->actingAs($admin);

         $user = User::factory()->create();
     
         $response = $this->delete(route('admin.users.destroy', $user->id));
     
         $response->assertRedirect(route('admin.users'));
     
         // Kiểm tra xem người dùng đã bị xóa hay chưa
         $this->assertDatabaseMissing('users', ['id' => $user->id]);
     }
     

 
}
