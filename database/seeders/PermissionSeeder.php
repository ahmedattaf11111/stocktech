<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Permission::insert(
            [
                ["name" => "create team", "guard_name" => "admin"],
                ["name" => "update team", "guard_name" => "admin"],
                ["name" => "delete team", "guard_name" => "admin"],
                ["name" => "view team", "guard_name" => "admin"],
            ]
        );

        Permission::insert(
            [
                ["name" => "create review", "guard_name" => "admin"],
                ["name" => "update review", "guard_name" => "admin"],
                ["name" => "delete review", "guard_name" => "admin"],
                ["name" => "view review", "guard_name" => "admin"],
            ]
        );
        
        Permission::insert(
            [
                ["name" => "create partner", "guard_name" => "admin"],
                ["name" => "update partner", "guard_name" => "admin"],
                ["name" => "delete partner", "guard_name" => "admin"],
                ["name" => "view partner", "guard_name" => "admin"],
            ]
        );
        
        Permission::insert(
            [
                ["name" => "update user", "guard_name" => "admin"],
                ["name" => "delete user", "guard_name" => "admin"],
                ["name" => "view user", "guard_name" => "admin"],
            ]
        );
        
        Permission::insert(
            [
                ["name" => "create employee", "guard_name" => "admin"],
                ["name" => "update employee", "guard_name" => "admin"],
                ["name" => "delete employee", "guard_name" => "admin"],
                ["name" => "view employee", "guard_name" => "admin"],
            ]
        );
        
        Permission::insert(
            [
                ["name" => "create service", "guard_name" => "admin"],
                ["name" => "update service", "guard_name" => "admin"],
                ["name" => "delete service", "guard_name" => "admin"],
                ["name" => "view service", "guard_name" => "admin"],
            ]
        );

        Permission::insert(
            [
                ["name" => "create career", "guard_name" => "admin"],
                ["name" => "update career", "guard_name" => "admin"],
                ["name" => "delete career", "guard_name" => "admin"],
                ["name" => "view career", "guard_name" => "admin"],
            ]
        );
        
        Permission::insert(
            [
                ["name" => "create career-type", "guard_name" => "admin"],
                ["name" => "update career-type", "guard_name" => "admin"],
                ["name" => "delete career-type", "guard_name" => "admin"],
                ["name" => "view career-type", "guard_name" => "admin"],
            ]
        );


        Permission::insert(
            [
                ["name" => "create career-team", "guard_name" => "admin"],
                ["name" => "update career-team", "guard_name" => "admin"],
                ["name" => "delete career-team", "guard_name" => "admin"],
                ["name" => "view career-team", "guard_name" => "admin"],
            ]
        );

        Permission::insert(
            [
                ["name" => "delete application", "guard_name" => "admin"],
                ["name" => "view application", "guard_name" => "admin"],
            ]
        );

        Permission::insert(
            [
                ["name" => "create blog", "guard_name" => "admin"],
                ["name" => "update blog", "guard_name" => "admin"],
                ["name" => "delete blog", "guard_name" => "admin"],
                ["name" => "view blog", "guard_name" => "admin"],
            ]
        );
        
        Permission::insert(
            [
                ["name" => "create blog-category", "guard_name" => "admin"],
                ["name" => "update blog-category", "guard_name" => "admin"],
                ["name" => "delete blog-category", "guard_name" => "admin"],
                ["name" => "view blog-category", "guard_name" => "admin"],
            ]
        );
        
        Permission::insert(
            [
                ["name" => "create blog-tag", "guard_name" => "admin"],
                ["name" => "update blog-tag", "guard_name" => "admin"],
                ["name" => "delete blog-tag", "guard_name" => "admin"],
                ["name" => "view blog-tag", "guard_name" => "admin"],
            ]
        );
        
        Permission::insert(
            [
                ["name" => "create project", "guard_name" => "admin"],
                ["name" => "update project", "guard_name" => "admin"],
                ["name" => "delete project", "guard_name" => "admin"],
                ["name" => "view project", "guard_name" => "admin"],
            ]
        );
        
        Permission::insert(
            [
                ["name" => "create project-category", "guard_name" => "admin"],
                ["name" => "update project-category", "guard_name" => "admin"],
                ["name" => "delete project-category", "guard_name" => "admin"],
                ["name" => "view project-category", "guard_name" => "admin"],
            ]
        );

        Permission::insert(
            [
                ["name" => "create lang", "guard_name" => "admin"],
                ["name" => "update lang", "guard_name" => "admin"],
                ["name" => "delete lang", "guard_name" => "admin"],
                ["name" => "view lang", "guard_name" => "admin"],
            ]
        );

        
        Permission::insert(
            [
                ["name" => "update home", "guard_name" => "admin"],
                ["name" => "view home", "guard_name" => "admin"],
            ]
        );

        Permission::insert(
            [
                ["name" => "update about", "guard_name" => "admin"],
                ["name" => "view about", "guard_name" => "admin"],
            ]
        );
        
        Permission::insert(
            [
                ["name" => "update setting", "guard_name" => "admin"],
                ["name" => "view setting", "guard_name" => "admin"],
            ]
        );
        
        Permission::insert(
            [
                ["name" => "update contact", "guard_name" => "admin"],
                ["name" => "view contact", "guard_name" => "admin"],
            ]
        );
        

        Permission::insert(
            [
                ["name" => "create faq", "guard_name" => "admin"],
                ["name" => "update faq", "guard_name" => "admin"],
                ["name" => "delete faq", "guard_name" => "admin"],
                ["name" => "view faq", "guard_name" => "admin"],
            ]
        );        
    }
}
