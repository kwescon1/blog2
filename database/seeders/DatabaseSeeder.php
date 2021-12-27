<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Post;

use App\Models\User;
use App\Models\Roles;
use App\Models\Comment;
use App\Models\Category;
use App\Models\Permissions;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;

class DatabaseSeeder extends Seeder
{
    use WithFaker;
    private $permission, $role;


    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {

            $user =  \App\Models\User::factory()->state([
                "username" => "kwesikod"
            ])->create();



            $role = Roles::create(['name' => 'Super Admin']);

            //super admin role
            $permission0 = Permissions::create(['item' => 'Super Admin', 'name' => 'super_admin']);

            //create articles
            $permission1 = Permissions::create(['item' => 'Create Posts', 'name' => 'can-create-post']);

            //create articles
            $permission = Permissions::create(['item' => 'Publish Posts', 'name' => 'can-publish-post']);
            $permission7 = Permissions::create(['item' => 'Unpublish Posts', 'name' => 'can-unpublish-post']);

            //edit articles
            $permission2 = Permissions::create(['item' => 'Edit Posts', 'name' => 'can-edit-post']);

            //delete articles
            $permission3 = Permissions::create(['item' => 'Delete Posts', 'name' => 'can-delete-post']);

            //create users
            $permission4 = Permissions::create(['item' => 'Create Users', 'name' => 'can-create-users']);

            //edit users
            $permission5 = Permissions::create(['item' => 'Edit Users', 'name' => 'can-edit-users']);

            //delete users
            $permission6 = Permissions::create(['item' => 'Delete Users', 'name' => 'can-delete-users']);

            //archive posts
            $permission8 = Permissions::create(['item' => 'Archive Posts', 'name' => 'can-archive-post']);

            //unarchive posts
            $permission9 = Permissions::create(['item' => 'Unarchive Posts', 'name' => 'can-unarchive-post']);

            $role->syncPermissions([$permission0, $permission1, $permission2, $permission3, $permission4, $permission5, $permission6, $permission, $permission7, $permission8, $permission9]);

            $user->assignRole($role);

            echo "Creating Category \n";
            Category::factory()->count(5)->create()->each(function ($category) {
                //create user
                echo "creating user \n";
                User::factory()->state([
                    "name" => "Default Name",
                    "password" => Hash::make("6767890")
                ])->create()->each(function ($user) use ($category) {

                    echo "Creating post \n";
                    Post::factory()->state(['user_id' => $user->id, 'category_id' => $category->id, 'deleted_by' => $user->id])->count(50)->create()->each(function ($post) {

                        //creating comments
                        echo "creating comment";
                        Comment::factory()->count(10)->state(["post_id" => $post->id])->create();
                        //creating tags
                        Tag::factory()->count(5)->create()->each(function ($tag) use ($post) {
                            echo "inserting into db\n";

                            DB::table('post_tag')->insert([
                                'post_id' => $post->id,
                                'tag_id' => $tag->id
                            ]);
                        });
                    });
                });
            });
        });
    }
}
