<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Skill;
use App\Models\Project;
use App\Models\Testimonial;
use App\Models\Service;
use App\Models\Education;
use App\Models\Certification;
use App\Models\Experience;

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

        $educations = Education::all()->map(fn ($e) => [
            'institution'   => $e->institution,
            'degree'        => $e->degree,
            'field_of_study'=> $e->field_of_study,
            'start_year'    => $e->start_year,
            'end_year'      => $e->end_year,
            'description'   => $e->description,
        ])->toArray();

        $certifications = Certification::all()->map(fn ($c) => [
            'name'          => $c->name,
            'issuer'        => $c->issuer,
            'date'          => $c->date,
            'credential_id' => $c->credential_id,
            'description'   => $c->description,
            'url'           => $c->url,
            'image'         => $c->image,
        ])->toArray();

        $experiences = Experience::all()->map(fn ($e) => [
            'company'     => $e->company,
            'position'    => $e->position,
            'start_date'  => $e->start_date,
            'end_date'    => $e->end_date,
            'description' => $e->description,
            'logo'        => $e->logo,
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
            'educations'   => $educations,
            'certifications' => $certifications,
            'experiences'  => $experiences,
        ]);
    }
}
