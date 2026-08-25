<?php

// =========================================================================
// SEMUA KONTEN WEBSITE ADA DI SINI.
// Edit array di bawah ini untuk mengubah isi website tanpa menyentuh Blade.
// =========================================================================

return [

    'profile' => [
        'name'       => 'Nama Anda',
        'role'       => 'Web Developer — Laravel Specialist',
        'tagline'    => 'Membangun aplikasi web yang rapi, cepat, dan mudah dirawat.',
        'bio'        => 'Saya adalah developer web dengan fokus pada ekosistem Laravel. Beberapa tahun terakhir saya membantu individu maupun bisnis kecil membangun website profil, sistem internal, hingga aplikasi custom — mulai dari perencanaan struktur data sampai deployment.',
        'photo'      => null, // isi path foto di public/images/profile.jpg lalu ganti null jadi 'images/profile.jpg'
        'cv_path'    => null, // taruh file CV di public/files/cv.pdf lalu isi 'files/cv.pdf'
        'location'   => 'Lampung, Indonesia',
        'email'      => 'nama@email.com',
        'phone'      => '+62 812-0000-0000',
        'socials'    => [
            'github'   => 'https://github.com/username',
            'linkedin' => 'https://linkedin.com/in/username',
            'whatsapp' => 'https://wa.me/6281200000000',
        ],
    ],

    'skills' => [
        ['label' => 'Laravel', 'group' => 'Backend'],
        ['label' => 'PHP', 'group' => 'Backend'],
        ['label' => 'MySQL', 'group' => 'Backend'],
        ['label' => 'REST API', 'group' => 'Backend'],
        ['label' => 'Blade / Tailwind', 'group' => 'Frontend'],
        ['label' => 'JavaScript', 'group' => 'Frontend'],
        ['label' => 'Alpine.js', 'group' => 'Frontend'],
        ['label' => 'Git & GitHub', 'group' => 'Tools'],
        ['label' => 'Docker (dasar)', 'group' => 'Tools'],
        ['label' => 'Linux Server', 'group' => 'Tools'],
    ],

    'projects' => [
        [
            'title'   => 'Nama Proyek Satu',
            'summary' => 'Deskripsi singkat proyek: masalah yang diselesaikan dan hasilnya.',
            'stack'   => ['Laravel', 'MySQL', 'Tailwind'],
            'url'     => '#',
            'year'    => '2025',
        ],
        [
            'title'   => 'Nama Proyek Dua',
            'summary' => 'Deskripsi singkat proyek: masalah yang diselesaikan dan hasilnya.',
            'stack'   => ['Laravel', 'Livewire'],
            'url'     => '#',
            'year'    => '2024',
        ],
        [
            'title'   => 'Nama Proyek Tiga',
            'summary' => 'Deskripsi singkat proyek: masalah yang diselesaikan dan hasilnya.',
            'stack'   => ['Laravel', 'REST API'],
            'url'     => '#',
            'year'    => '2024',
        ],
    ],

    'testimonials' => [
        [
            'name'  => 'Nama Klien Satu',
            'role'  => 'Pemilik Usaha',
            'quote' => 'Prosesnya jelas, komunikatif, dan hasil websitenya sesuai kebutuhan kami.',
        ],
        [
            'name'  => 'Nama Klien Dua',
            'role'  => 'Founder Startup',
            'quote' => 'Pengerjaan cepat dan revisi ditangani dengan baik tanpa banyak drama.',
        ],
    ],

    // Layanan yang ditawarkan pada bagian CTA "Jasa Pembuatan Website"
    'services' => [
        [
            'title'       => 'Website Profil / Company Profile',
            'description' => 'Website informatif untuk personal maupun bisnis kecil.',
        ],
        [
            'title'       => 'Aplikasi Web Custom (Laravel)',
            'description' => 'Sistem sesuai kebutuhan: admin panel, booking, manajemen data, dsb.',
        ],
        [
            'title'       => 'Maintenance & Pengembangan',
            'description' => 'Perbaikan bug, penambahan fitur, dan optimasi performa.',
        ],
    ],

];
