<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Profile;
use App\Models\Skill;
use App\Models\Project;
use App\Models\Testimonial;
use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        User::factory()->create([
            'name'     => 'Admin',
            'email'    => 'admin@admin.com',
            'password' => Hash::make('password'),
        ]);

        $cfg = config('portfolio');

        Profile::create($cfg['profile']);

        foreach ($cfg['skills'] as $s) {
            Skill::create($s);
        }

        foreach ($cfg['projects'] as $p) {
            Project::create($p);
        }

        foreach ($cfg['testimonials'] as $t) {
            Testimonial::create($t);
        }

        foreach ($cfg['services'] as $s) {
            Service::create($s);
        }
    }
}
