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
            'instagram'=> null,
            'tiktok'   => null,
            'whatsapp' => 'https://wa.me/6281200000000',
        ],
    ],

    'skills' => [
        // ── Keahlian Teknis (Hard Skills) ──
        ['label' => 'Laravel', 'group' => 'Backend', 'category' => 'hard'],
        ['label' => 'PHP', 'group' => 'Backend', 'category' => 'hard'],
        ['label' => 'MySQL', 'group' => 'Backend', 'category' => 'hard'],
        ['label' => 'REST API', 'group' => 'Backend', 'category' => 'hard'],
        ['label' => 'Blade / Tailwind', 'group' => 'Frontend', 'category' => 'hard'],
        ['label' => 'JavaScript', 'group' => 'Frontend', 'category' => 'hard'],
        ['label' => 'Alpine.js', 'group' => 'Frontend', 'category' => 'hard'],
        ['label' => 'Git & GitHub', 'group' => 'Tools', 'category' => 'hard'],
        ['label' => 'Docker (dasar)', 'group' => 'Tools', 'category' => 'hard'],
        ['label' => 'Linux Server', 'group' => 'Tools', 'category' => 'hard'],

        // ── Keahlian Interpersonal (Soft Skills) ──
        ['label' => 'Komunikasi', 'group' => 'Komunikasi & Kolaborasi', 'category' => 'soft'],
        ['label' => 'Kerja Tim', 'group' => 'Komunikasi & Kolaborasi', 'category' => 'soft'],
        ['label' => 'Negosiasi', 'group' => 'Komunikasi & Kolaborasi', 'category' => 'soft'],
        ['label' => 'Manajemen Waktu', 'group' => 'Manajemen Kerja', 'category' => 'soft'],
        ['label' => 'Problem Solving', 'group' => 'Manajemen Kerja', 'category' => 'soft'],
        ['label' => 'Attention to Detail', 'group' => 'Manajemen Kerja', 'category' => 'soft'],
        ['label' => 'Manajemen Proyek', 'group' => 'Kepemimpinan', 'category' => 'soft'],
        ['label' => 'Koordinasi Tim', 'group' => 'Kepemimpinan', 'category' => 'soft'],
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

    // Sertifikat & Pencapaian
    'certifications' => [
        [
            'name'          => 'Laravel (Intermediate)',
            'issuer'        => 'HackerRank',
            'date'          => '2024',
            'credential_id' => null,
            'description'   => 'Sertifikasi kompetensi Laravel melalui HackerRank.',
            'url'           => null,
        ],
        [
            'name'          => 'JavaScript Algorithms and Data Structures',
            'issuer'        => 'freeCodeCamp',
            'date'          => '2023',
            'credential_id' => null,
            'description'   => null,
            'url'           => null,
        ],
    ],

    // Riwayat pendidikan
    'educations' => [
        [
            'institution'    => 'Universitas Lampung',
            'degree'         => 'S.Kom',
            'field_of_study' => 'Teknik Informatika',
            'start_year'     => '2020',
            'end_year'       => '2024',
            'description'    => null,
        ],
        [
            'institution'    => 'SMA Negeri 1 Bandar Lampung',
            'degree'         => 'SMA',
            'field_of_study' => 'IPA',
            'start_year'     => '2017',
            'end_year'       => '2020',
            'description'    => null,
        ],
    ],

    // Pengalaman kerja
    'experiences' => [
        [
            'company'     => 'PT Contoh Digital',
            'position'    => 'Fullstack Developer',
            'start_date'  => 'Jan 2023',
            'end_date'    => 'Sekarang',
            'description' => 'Mengembangkan aplikasi web berbasis Laravel untuk klien korporasi.',
        ],
        [
            'company'     => 'Freelance',
            'position'    => 'Web Developer',
            'start_date'  => '2021',
            'end_date'    => '2023',
            'description' => 'Mengerjakan berbagai proyek website profil dan e-commerce.',
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
