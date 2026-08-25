<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Skill;
use App\Models\Project;
use App\Models\Testimonial;
use App\Models\Service;
use App\Models\FileAttachment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $profile = Profile::first();

        $profileFields = ['name', 'role', 'tagline', 'bio', 'photo', 'cv_path', 'location', 'email', 'phone'];
        $filled = 0;
        foreach ($profileFields as $field) {
            if (!empty($profile->{$field})) $filled++;
        }
        $socials = $profile->socials ?? [];
        if (!empty($socials['github']) || !empty($socials['linkedin']) || !empty($socials['whatsapp'])) {
            $filled++;
        }
        $profilePercent = round(($filled / (count($profileFields) + 1)) * 100);

        return view('admin.dashboard', [
            'profile'         => $profile,
            'skillCount'      => Skill::count(),
            'projectCount'    => Project::count(),
            'testimonialCount'=> Testimonial::count(),
            'serviceCount'    => Service::count(),
            'profilePercent'  => $profilePercent,
            'filledFields'    => $filled,
            'totalFields'     => count($profileFields) + 1,
        ]);
    }

    // ── Profile ──────────────────────────────────
    public function profileEdit()
    {
        return view('admin.profile', ['profile' => Profile::first()]);
    }

    public function profileUpdate(Request $request)
    {
        $data = $request->validate([
            'name'     => ['required', 'string', 'max:100'],
            'role'     => ['nullable', 'string', 'max:150'],
            'tagline'  => ['nullable', 'string', 'max:255'],
            'bio'      => ['nullable', 'string'],
            'photo'    => ['nullable', 'file', 'image', 'max:2048'],
            'cv_path'  => ['nullable', 'file', 'mimes:pdf', 'max:5120'],
            'location' => ['nullable', 'string', 'max:150'],
            'email'    => ['nullable', 'email', 'max:150'],
            'phone'    => ['nullable', 'string', 'max:50'],
            'socials.github'   => ['nullable', 'url'],
            'socials.linkedin' => ['nullable', 'url'],
            'socials.whatsapp' => ['nullable', 'url'],
        ]);

        $socials = collect($data['socials'] ?? [])->filter()->toArray();
        $data['socials'] = $socials;

        $profile = Profile::first();

        if ($request->hasFile('photo')) {
            if ($profile && $profile->photo) {
                FileAttachment::where('id', $profile->photo)->delete();
            }
            $file = $request->file('photo');
            $attachment = FileAttachment::create([
                'name'     => $file->getClientOriginalName(),
                'mime_type' => $file->getMimeType(),
                'size'     => $file->getSize(),
                'content'  => base64_encode(file_get_contents($file->getRealPath())),
            ]);
            $data['photo'] = $attachment->id;
        } else {
            unset($data['photo']);
        }

        if ($request->hasFile('cv_path')) {
            if ($profile && $profile->cv_path) {
                FileAttachment::where('id', $profile->cv_path)->delete();
            }
            $file = $request->file('cv_path');
            $attachment = FileAttachment::create([
                'name'     => $file->getClientOriginalName(),
                'mime_type' => $file->getMimeType(),
                'size'     => $file->getSize(),
                'content'  => base64_encode(file_get_contents($file->getRealPath())),
            ]);
            $data['cv_path'] = $attachment->id;
        } else {
            unset($data['cv_path']);
        }

        if ($profile) {
            $profile->update($data);
        } else {
            Profile::create($data);
        }

        return back()->with('success', 'Profil berhasil diperbarui.');
    }

    // ── Skills ───────────────────────────────────
    public function skillIndex()
    {
        return view('admin.skills', ['skills' => Skill::orderBy('group')->get()]);
    }

    public function skillStore(Request $request)
    {
        $data = $request->validate([
            'label' => ['required', 'string', 'max:100'],
            'group' => ['required', 'string', 'max:50'],
        ]);

        Skill::create($data);

        return back()->with('success', 'Keahlian berhasil ditambahkan.');
    }

    public function skillDestroy(Skill $skill)
    {
        $skill->delete();
        return back()->with('success', 'Keahlian berhasil dihapus.');
    }

    // ── Projects ─────────────────────────────────
    public function projectIndex()
    {
        return view('admin.projects', ['projects' => Project::latest()->get()]);
    }

    public function projectStore(Request $request)
    {
        $data = $request->validate([
            'title'   => ['required', 'string', 'max:150'],
            'summary' => ['nullable', 'string'],
            'stack'   => ['nullable', 'string'],
            'url'     => ['nullable', 'url'],
            'year'    => ['nullable', 'string', 'max:10'],
        ]);

        $data['stack'] = array_map('trim', explode(',', $data['stack'] ?? ''));

        Project::create($data);

        return back()->with('success', 'Proyek berhasil ditambahkan.');
    }

    public function projectEdit(Project $project)
    {
        return view('admin.project-edit', ['project' => $project]);
    }

    public function projectUpdate(Request $request, Project $project)
    {
        $data = $request->validate([
            'title'   => ['required', 'string', 'max:150'],
            'summary' => ['nullable', 'string'],
            'stack'   => ['nullable', 'string'],
            'url'     => ['nullable', 'url'],
            'year'    => ['nullable', 'string', 'max:10'],
        ]);

        $data['stack'] = array_map('trim', explode(',', $data['stack'] ?? ''));

        $project->update($data);

        return redirect()->route('admin.projects')->with('success', 'Proyek berhasil diperbarui.');
    }

    public function projectDestroy(Project $project)
    {
        $project->delete();
        return back()->with('success', 'Proyek berhasil dihapus.');
    }

    // ── Testimonials ─────────────────────────────
    public function testimonialIndex()
    {
        return view('admin.testimonials', ['testimonials' => Testimonial::latest()->get()]);
    }

    public function testimonialStore(Request $request)
    {
        $data = $request->validate([
            'name'  => ['required', 'string', 'max:100'],
            'role'  => ['nullable', 'string', 'max:100'],
            'quote' => ['required', 'string'],
        ]);

        Testimonial::create($data);

        return back()->with('success', 'Testimoni berhasil ditambahkan.');
    }

    public function testimonialDestroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return back()->with('success', 'Testimoni berhasil dihapus.');
    }

    // ── Services ─────────────────────────────────
    public function serviceIndex()
    {
        return view('admin.services', ['services' => Service::latest()->get()]);
    }

    public function serviceStore(Request $request)
    {
        $data = $request->validate([
            'title'       => ['required', 'string', 'max:150'],
            'description' => ['nullable', 'string'],
        ]);

        Service::create($data);

        return back()->with('success', 'Jasa berhasil ditambahkan.');
    }

    public function serviceDestroy(Service $service)
    {
        $service->delete();
        return back()->with('success', 'Jasa berhasil dihapus.');
    }

    // ── Account ──────────────────────────────────
    public function accountEdit()
    {
        return view('admin.account', ['user' => Auth::user()]);
    }

    public function accountUpdate(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'email'    => ['required', 'email', 'max:150', 'unique:users,email,' . $user->id],
            'password' => ['nullable', 'min:8', 'confirmed'],
        ], [
            'email.required'    => 'Email wajib diisi.',
            'email.email'       => 'Format email tidak valid.',
            'email.unique'      => 'Email sudah digunakan.',
            'password.min'      => 'Password minimal 8 karakter.',
            'password.confirmed'=> 'Konfirmasi password tidak cocok.',
        ]);

        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return back()->with('success', 'Akun berhasil diperbarui.');
    }
}
