<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Job;
use Carbon\Carbon;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jobs = [
            [
                'title' => 'IT Support',
                'description' => 'Menangani dukungan teknis & maintenance sistem kantor.',
                'qualifications' => [
                    'Minimal lulusan D3/S1 Teknik Informatika',
                    'Memahami troubleshooting hardware dan software',
                    'Mampu bekerja dalam tim',
                    'Pengalaman minimal 1 tahun di bidang IT Support'
                ],
                'requirements' => [
                    'CV dan surat lamaran',
                    'Portofolio proyek (jika ada)',
                    'KTP dan ijazah terakhir',
                    'Sertifikat keahlian IT (jika ada)'
                ],
                'status' => 'active',
                'salary_min' => 4000000,
                'salary_max' => 6000000,
                'location' => 'Jakarta',
                'employment_type' => 'full-time',
                'deadline' => Carbon::now()->addMonths(2)
            ],
            [
                'title' => 'UI/UX Designer',
                'description' => 'Menangani desain antarmuka web, aplikasi, dan produk digital lainnya.',
                'qualifications' => [
                    'Pemahaman prinsip desain UI/UX',
                    'Mampu menggunakan Figma, Adobe XD, Sketch',
                    'Kreatif dan detail-oriented',
                    'Portfolio desain yang menarik'
                ],
                'requirements' => [
                    'CV dan surat lamaran',
                    'Portofolio desain wajib',
                    'KTP dan ijazah terakhir',
                    'Link portfolio online'
                ],
                'status' => 'active',
                'salary_min' => 5000000,
                'salary_max' => 8000000,
                'location' => 'Jakarta',
                'employment_type' => 'full-time',
                'deadline' => Carbon::now()->addMonths(1)
            ],
            [
                'title' => 'Frontend Developer',
                'description' => 'Mengembangkan antarmuka website dan aplikasi web responsif.',
                'qualifications' => [
                    'Menguasai HTML, CSS, JavaScript',
                    'Familiar dengan React/Vue/Angular',
                    'Pemahaman responsive design',
                    'Pengalaman minimal 2 tahun'
                ],
                'requirements' => [
                    'CV dan surat lamaran',
                    'Portofolio project frontend',
                    'KTP dan ijazah terakhir',
                    'Link GitHub/GitLab'
                ],
                'status' => 'active',
                'salary_min' => 6000000,
                'salary_max' => 10000000,
                'location' => 'Jakarta',
                'employment_type' => 'full-time',
                'deadline' => Carbon::now()->addMonths(3)
            ],
            [
                'title' => 'Backend Developer',
                'description' => 'Mengembangkan sistem backend dan API untuk aplikasi web.',
                'qualifications' => [
                    'Menguasai PHP/Laravel atau Node.js',
                    'Pemahaman database MySQL/PostgreSQL',
                    'Familiar dengan RESTful API',
                    'Pengalaman dengan cloud services (AWS/GCP)'
                ],
                'requirements' => [
                    'CV dan surat lamaran',
                    'Portofolio project backend',
                    'KTP dan ijazah terakhir',
                    'Technical test akan diberikan'
                ],
                'status' => 'active',
                'salary_min' => 7000000,
                'salary_max' => 12000000,
                'location' => 'Jakarta',
                'employment_type' => 'full-time',
                'deadline' => Carbon::now()->addMonths(2)
            ],
            [
                'title' => 'Digital Marketing Specialist',
                'description' => 'Mengelola strategi pemasaran digital dan media sosial perusahaan.',
                'qualifications' => [
                    'Pengalaman digital marketing min. 2 tahun',
                    'Menguasai Google Ads, Facebook Ads, Instagram Ads',
                    'Kemampuan analisis data marketing',
                    'Kreatif dalam membuat konten'
                ],
                'requirements' => [
                    'CV dan surat lamaran',
                    'Portofolio campaign marketing',
                    'KTP dan ijazah terakhir',
                    'Sertifikat Google/Facebook Ads (nilai plus)'
                ],
                'status' => 'active',
                'salary_min' => 5000000,
                'salary_max' => 8000000,
                'location' => 'Jakarta',
                'employment_type' => 'full-time',
                'deadline' => Carbon::now()->addMonth()
            ],
            [
                'title' => 'Data Analyst',
                'description' => 'Menganalisis data bisnis dan memberikan insight untuk pengambilan keputusan.',
                'qualifications' => [
                    'Menguasai SQL dan Excel/Google Sheets',
                    'Familiar dengan Python/R untuk analisis data',
                    'Kemampuan visualisasi data (Tableau/Power BI)',
                    'Pemahaman statistik dasar'
                ],
                'requirements' => [
                    'CV dan surat lamaran',
                    'Portofolio analisis data',
                    'KTP dan ijazah terakhir',
                    'Case study akan diberikan'
                ],
                'status' => 'active',
                'salary_min' => 6000000,
                'salary_max' => 9000000,
                'location' => 'Jakarta',
                'employment_type' => 'full-time',
                'deadline' => Carbon::now()->addMonths(2)
            ],
            [
                'title' => 'Project Manager',
                'description' => 'Mengelola dan mengkoordinasi proyek-proyek IT perusahaan.',
                'qualifications' => [
                    'Pengalaman project management min. 3 tahun',
                    'Sertifikasi PMP/Scrum Master (nilai plus)',
                    'Leadership dan komunikasi yang baik',
                    'Familiar dengan tools project management'
                ],
                'requirements' => [
                    'CV dan surat lamaran',
                    'Portofolio project yang dikelola',
                    'KTP dan ijazah terakhir',
                    'Referensi dari tempat kerja sebelumnya'
                ],
                'status' => 'active',
                'salary_min' => 10000000,
                'salary_max' => 15000000,
                'location' => 'Jakarta',
                'employment_type' => 'full-time',
                'deadline' => Carbon::now()->addMonths(3)
            ],
            [
                'title' => 'Quality Assurance Engineer',
                'description' => 'Melakukan testing dan memastikan kualitas aplikasi sebelum release.',
                'qualifications' => [
                    'Pemahaman software testing methodology',
                    'Familiar dengan automation testing tools',
                    'Detail oriented dan teliti',
                    'Pengalaman manual dan automation testing'
                ],
                'requirements' => [
                    'CV dan surat lamaran',
                    'Portofolio test case/bug report',
                    'KTP dan ijazah terakhir',
                    'Technical test akan diberikan'
                ],
                'status' => 'active',
                'salary_min' => 5500000,
                'salary_max' => 8500000,
                'location' => 'Jakarta',
                'employment_type' => 'full-time',
                'deadline' => Carbon::now()->addMonths(2)
            ],
            [
                'title' => 'DevOps Engineer',
                'description' => 'Mengelola infrastruktur cloud dan deployment aplikasi.',
                'qualifications' => [
                    'Pengalaman dengan AWS/GCP/Azure',
                    'Menguasai Docker, Kubernetes',
                    'Familiar dengan CI/CD pipeline',
                    'Pengalaman infrastructure as code'
                ],
                'requirements' => [
                    'CV dan surat lamaran',
                    'Portofolio infrastruktur project',
                    'KTP dan ijazah terakhir',
                    'Sertifikat cloud provider (nilai plus)'
                ],
                'status' => 'active',
                'salary_min' => 8000000,
                'salary_max' => 13000000,
                'location' => 'Jakarta',
                'employment_type' => 'full-time',
                'deadline' => Carbon::now()->addMonths(3)
            ],
            [
                'title' => 'Content Writer',
                'description' => 'Membuat konten artikel, blog, dan materi marketing perusahaan.',
                'qualifications' => [
                    'Kemampuan menulis yang baik dalam Bahasa Indonesia dan Inggris',
                    'Pemahaman SEO content writing',
                    'Kreatif dan up-to-date dengan tren',
                    'Portfolio tulisan yang beragam'
                ],
                'requirements' => [
                    'CV dan surat lamaran',
                    'Portofolio tulisan/artikel wajib',
                    'KTP dan ijazah terakhir',
                    'Test menulis akan diberikan'
                ],
                'status' => 'active',
                'salary_min' => 4000000,
                'salary_max' => 6500000,
                'location' => 'Jakarta',
                'employment_type' => 'full-time',
                'deadline' => Carbon::now()->addMonth()
            ],
            [
                'title' => 'HR Specialist',
                'description' => 'Mengelola rekrutmen, training, dan pengembangan SDM perusahaan.',
                'qualifications' => [
                    'Lulusan Psikologi/Manajemen SDM',
                    'Pengalaman HR minimal 2 tahun',
                    'Kemampuan komunikasi dan interpersonal yang baik',
                    'Familiar dengan HR tools dan systems'
                ],
                'requirements' => [
                    'CV dan surat lamaran',
                    'Sertifikat pelatihan HR (jika ada)',
                    'KTP dan ijazah terakhir',
                    'Referensi dari tempat kerja sebelumnya'
                ],
                'status' => 'active',
                'salary_min' => 5000000,
                'salary_max' => 7500000,
                'location' => 'Jakarta',
                'employment_type' => 'full-time',
                'deadline' => Carbon::now()->addMonths(2)
            ],
            [
                'title' => 'Finance Staff',
                'description' => 'Mengelola laporan keuangan dan administrasi keuangan perusahaan.',
                'qualifications' => [
                    'Lulusan Akuntansi/Keuangan',
                    'Menguasai aplikasi akuntansi (MYOB, SAP, dll)',
                    'Teliti dan jujur',
                    'Pemahaman perpajakan dasar'
                ],
                'requirements' => [
                    'CV dan surat lamaran',
                    'Transkrip nilai',
                    'KTP dan ijazah terakhir',
                    'Sertifikat Brevet A/B (nilai plus)'
                ],
                'status' => 'active',
                'salary_min' => 4500000,
                'salary_max' => 7000000,
                'location' => 'Jakarta',
                'employment_type' => 'full-time',
                'deadline' => Carbon::now()->addMonths(1)
            ],
            [
                'title' => 'Mobile App Developer',
                'description' => 'Mengembangkan aplikasi mobile untuk platform Android dan iOS.',
                'qualifications' => [
                    'Menguasai Flutter/React Native atau Native Development',
                    'Pengalaman minimal 2 tahun mobile development',
                    'Familiar dengan API integration',
                    'Portfolio aplikasi mobile yang telah dipublish'
                ],
                'requirements' => [
                    'CV dan surat lamaran',
                    'Portofolio aplikasi mobile',
                    'KTP dan ijazah terakhir',
                    'Link aplikasi di Play Store/App Store'
                ],
                'status' => 'active',
                'salary_min' => 7000000,
                'salary_max' => 11000000,
                'location' => 'Jakarta',
                'employment_type' => 'full-time',
                'deadline' => Carbon::now()->addMonths(2)
            ],
            [
                'title' => 'Sales Executive',
                'description' => 'Menjalankan strategi penjualan dan mencari klien baru untuk produk perusahaan.',
                'qualifications' => [
                    'Pengalaman sales minimal 1 tahun',
                    'Kemampuan komunikasi dan negosiasi yang baik',
                    'Target oriented dan proaktif',
                    'Memiliki network yang luas (nilai plus)'
                ],
                'requirements' => [
                    'CV dan surat lamaran',
                    'KTP dan ijazah terakhir',
                    'Referensi dari tempat kerja sebelumnya',
                    'Surat keterangan sehat'
                ],
                'status' => 'active',
                'salary_min' => 4000000,
                'salary_max' => 8000000,
                'location' => 'Jakarta',
                'employment_type' => 'full-time',
                'deadline' => Carbon::now()->addMonth()
            ],
            [
                'title' => 'Graphic Designer',
                'description' => 'Membuat desain grafis untuk kebutuhan marketing, branding, dan komunikasi visual.',
                'qualifications' => [
                    'Menguasai Adobe Creative Suite (Photoshop, Illustrator, InDesign)',
                    'Pemahaman prinsip desain grafis',
                    'Kreatif dan mengikuti tren desain terkini',
                    'Portfolio desain yang menarik dan beragam'
                ],
                'requirements' => [
                    'CV dan surat lamaran',
                    'Portofolio desain wajib',
                    'KTP dan ijazah terakhir',
                    'File portfolio dalam format PDF'
                ],
                'status' => 'active',
                'salary_min' => 4500000,
                'salary_max' => 7000000,
                'location' => 'Jakarta',
                'employment_type' => 'full-time',
                'deadline' => Carbon::now()->addMonths(1)
            ]
            ];
    }
}