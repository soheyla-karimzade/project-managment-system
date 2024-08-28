<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }


    public function test_projects_route_requires_authontication(){
        $response=$this->get('/projects');
        $response->assertRedirect('/login');
    }

    public  function  test_project_index_view_is_returned(){

        $user=User::factory()->create();
        // شبیه‌سازی ورود کاربر
        $this->actingAs($user);
       $projects= Project::factory(3)->create();
       $response=$this->get('/projects');
       $response->assertViewIs('projects.index');
        // بررسی اینکه متغیر projects در ویو وجود دارد و داده‌ها را شامل می‌شود
        $response->assertViewHas('projects', function($users) {
            return $users->count() === 3;
        });
        // بررسی وضعیت موفقیت آمیز درخواست
        $response->assertStatus(200);
    }

    public function test_projects_create_view_is_returned(){
        $user=User::factory()->create();
        $this->actingAs($user);
        $projects= Project::factory(3)->create();
        $response=$this->get('/project');
        $response->assertViewIs('projects.create');
    }

    public function test_projects_store(){
        $user=User::factory()->create();
        $this->actingAs($user);
        // داده‌های نمونه برای ایجاد پروزه
        $data = [
            'name' => 'project_test',
            'user_id' => $user->get('id')
        ];
        $response=$this->post('/project',$data);
        $response->assertStatus(302);
        $this->assertDatabaseHas('projects', [
            'name' => 'project_test',
        ]);
    }

    public function test_projects_update(){
        $user=User::factory()->create();
        $this->actingAs($user);
        $data = [
            'name' => 'project_update_test',
            'user_id' => $user->get('id')
        ];
        $this->post('/project',$data);

        $projectId= Project::where('name','project_update_test')->first()->id;
        $data = [
            'name' => 'project_update',
        ];
        $response=$this->put('/project/update/'.$projectId,$data );

        $response->assertStatus(302);
        $this->assertDatabaseHas('projects', [
            'name' => 'project_update',
        ]);
    }
}
