<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Skill;
use App\Models\Project;
use App\Models\Testimonial;
use App\Models\Service;

class PortfolioController extends Controller
{
    public function index()
    {
        $profile = Profile::first();

        $skills = Skill::all()->map(fn ($s) => [
            'label' => $s->label,
            'group' => $s->group,
        ])->toArray();

        $projects = Project::all()->map(fn ($p) => [
            'title'   => $p->title,
            'summary' => $p->summary,
            'stack'   => $p->stack,
            'url'     => $p->url,
            'year'    => $p->year,
        ])->toArray();

        $testimonials = Testimonial::all()->map(fn ($t) => [
            'name'  => $t->name,
            'role'  => $t->role,
            'quote' => $t->quote,
        ])->toArray();

        $services = Service::all()->map(fn ($s) => [
            'title'       => $s->title,
            'description' => $s->description,
        ])->toArray();

        $profileData = $profile ? [
            'name'     => $profile->name,
            'role'     => $profile->role,
            'tagline'  => $profile->tagline,
            'bio'      => $profile->bio,
            'photo'    => $profile->photo,
            'cv_path'  => $profile->cv_path,
            'location' => $profile->location,
            'email'    => $profile->email,
            'phone'    => $profile->phone,
            'socials'  => $profile->socials ?? [],
        ] : [];

        return view('portfolio.index', [
            'profile'      => $profileData,
            'skills'       => $skills,
            'projects'     => $projects,
            'testimonials' => $testimonials,
            'services'     => $services,
        ]);
    }
}
