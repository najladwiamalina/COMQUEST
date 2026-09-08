<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Matkul;
use App\Models\Bab;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Answer;

class DummyAcademicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $academicData = [
            [
                'code' => 'KOM120B',
                'name' => 'Algoritme dan Dasar Pemrograman',
                'semester' => 3,
                'photo' => null,
                'bab' => 'Pengenalan Algoritma & Pemrograman',
                'quiz' => 'Kuis 1: Daspro & Logika',
                'questions' => [
                    [
                        'question' => 'Manakah tipe data dalam bahasa C/C++ yang digunakan untuk menyimpan bilangan bulat?',
                        'answers' => [
                            ['answer' => 'float', 'is_correct' => false],
                            ['answer' => 'char', 'is_correct' => false],
                            ['answer' => 'int', 'is_correct' => true],
                            ['answer' => 'double', 'is_correct' => false],
                        ]
                    ],
                    [
                        'question' => 'Struktur kontrol yang digunakan untuk melakukan perulangan selama kondisi tertentu bernilai true adalah...',
                        'answers' => [
                            ['answer' => 'if-else', 'is_correct' => false],
                            ['answer' => 'while loop', 'is_correct' => true],
                            ['answer' => 'switch-case', 'is_correct' => false],
                            ['answer' => 'break', 'is_correct' => false],
                        ]
                    ],
                    [
                        'question' => 'Istilah untuk kesalahan penulisan aturan atau sintaks dalam kode program adalah...',
                        'answers' => [
                            ['answer' => 'Runtime Error', 'is_correct' => false],
                            ['answer' => 'Logical Error', 'is_correct' => false],
                            ['answer' => 'Syntax Error', 'is_correct' => true],
                            ['answer' => 'Compiler Error', 'is_correct' => false],
                        ]
                    ],
                    [
                        'question' => 'Struktur data linier yang bekerja dengan prinsip Last In First Out (LIFO) adalah...',
                        'answers' => [
                            ['answer' => 'Queue', 'is_correct' => false],
                            ['answer' => 'Stack', 'is_correct' => true],
                            ['answer' => 'Array', 'is_correct' => false],
                            ['answer' => 'Tree', 'is_correct' => false],
                        ]
                    ],
                    [
                        'question' => 'Fungsi utama dari simbol belah ketupat (diamond) pada bagan alir (flowchart) adalah...',
                        'answers' => [
                            ['answer' => 'Menandai awal dan akhir program', 'is_correct' => false],
                            ['answer' => 'Keputusan / Pemilihan kondisi (Decision)', 'is_correct' => true],
                            ['answer' => 'Proses perhitungan aritmatika', 'is_correct' => false],
                            ['answer' => 'Input dan output data', 'is_correct' => false],
                        ]
                    ],
                ]
            ],
            [
                'code' => 'KOM120F',
                'name' => 'Basis Data',
                'semester' => 3,
                'photo' => null,
                'bab' => 'SQL & Desain Basis Data Relasional',
                'quiz' => 'Kuis 1: Perintah DDL & DML',
                'questions' => [
                    [
                        'question' => 'Perintah SQL yang digunakan untuk mengambil data dari satu atau lebih tabel adalah...',
                        'answers' => [
                            ['answer' => 'UPDATE', 'is_correct' => false],
                            ['answer' => 'SELECT', 'is_correct' => true],
                            ['answer' => 'INSERT', 'is_correct' => false],
                            ['answer' => 'DELETE', 'is_correct' => false],
                        ]
                    ],
                    [
                        'question' => 'Kunci utama yang digunakan untuk mengidentifikasi setiap record/baris secara unik dalam tabel adalah...',
                        'answers' => [
                            ['answer' => 'Foreign Key', 'is_correct' => false],
                            ['answer' => 'Primary Key', 'is_correct' => true],
                            ['answer' => 'Candidate Key', 'is_correct' => false],
                            ['answer' => 'Super Key', 'is_correct' => false],
                        ]
                    ],
                    [
                        'question' => 'Perintah SQL yang termasuk dalam kelompok Data Definition Language (DDL) adalah...',
                        'answers' => [
                            ['answer' => 'INSERT', 'is_correct' => false],
                            ['answer' => 'UPDATE', 'is_correct' => false],
                            ['answer' => 'CREATE', 'is_correct' => true],
                            ['answer' => 'SELECT', 'is_correct' => false],
                        ]
                    ],
                    [
                        'question' => 'Klausa SQL mana yang digunakan untuk menyaring baris data berdasarkan kondisi tertentu?',
                        'answers' => [
                            ['answer' => 'GROUP BY', 'is_correct' => false],
                            ['answer' => 'ORDER BY', 'is_correct' => false],
                            ['answer' => 'WHERE', 'is_correct' => true],
                            ['answer' => 'HAVING', 'is_correct' => false],
                        ]
                    ],
                    [
                        'question' => 'Proses pengorganisasian data dalam basis data untuk mengurangi redundansi data disebut...',
                        'answers' => [
                            ['answer' => 'Denormalisasi', 'is_correct' => false],
                            ['answer' => 'Normalisasi', 'is_correct' => true],
                            ['answer' => 'Indexing', 'is_correct' => false],
                            ['answer' => 'Encapsulation', 'is_correct' => false],
                        ]
                    ],
                ]
            ],
            [
                'code' => 'KOM1231',
                'name' => 'Rekayasa Perangkat Lunak',
                'semester' => 4,
                'photo' => null,
                'bab' => 'Metodologi Pengembangan Perangkat Lunak',
                'quiz' => 'Kuis 1: SDLC & Agilism',
                'questions' => [
                    [
                        'question' => 'Model pengembangan perangkat lunak klasik yang bersifat sekuensial dan linier adalah...',
                        'answers' => [
                            ['answer' => 'Agile', 'is_correct' => false],
                            ['answer' => 'Waterfall', 'is_correct' => true],
                            ['answer' => 'Scrum', 'is_correct' => false],
                            ['answer' => 'Extreme Programming', 'is_correct' => false],
                        ]
                    ],
                    [
                        'question' => 'Tahapan SDLC di mana pengembang mengumpulkan dan menganalisis kebutuhan pengguna dinamakan...',
                        'answers' => [
                            ['answer' => 'System Design', 'is_correct' => false],
                            ['answer' => 'Requirements Analysis', 'is_correct' => true],
                            ['answer' => 'Implementation', 'is_correct' => false],
                            ['answer' => 'Testing', 'is_correct' => false],
                        ]
                    ],
                    [
                        'question' => 'Jenis pengujian perangkat lunak yang berfokus pada pengujian alur logika internal kode program adalah...',
                        'answers' => [
                            ['answer' => 'Black Box Testing', 'is_correct' => false],
                            ['answer' => 'White Box Testing', 'is_correct' => true],
                            ['answer' => 'User Acceptance Testing', 'is_correct' => false],
                            ['answer' => 'System Testing', 'is_correct' => false],
                        ]
                    ],
                    [
                        'question' => 'Dalam metode Scrum, pertemuan harian berdurasi singkat untuk memantau progres tim dinamakan...',
                        'answers' => [
                            ['answer' => 'Sprint Planning', 'is_correct' => false],
                            ['answer' => 'Daily Scrum / Standup', 'is_correct' => true],
                            ['answer' => 'Sprint Review', 'is_correct' => false],
                            ['answer' => 'Sprint Retrospective', 'is_correct' => false],
                        ]
                    ],
                    [
                        'question' => 'Diagram UML yang menggambarkan fungsi sistem dari sudut pandang interaksi aktor adalah...',
                        'answers' => [
                            ['answer' => 'Class Diagram', 'is_correct' => false],
                            ['answer' => 'Use Case Diagram', 'is_correct' => true],
                            ['answer' => 'Sequence Diagram', 'is_correct' => false],
                            ['answer' => 'Activity Diagram', 'is_correct' => false],
                        ]
                    ],
                ]
            ],
            [
                'code' => 'KOM1327',
                'name' => 'Kecerdasan Buatan',
                'semester' => 5,
                'photo' => null,
                'bab' => 'Pengenalan AI & Algoritma Pencarian',
                'quiz' => 'Kuis 1: Search & Machine Learning',
                'questions' => [
                    [
                        'question' => 'Sub-bidang AI yang memungkinkan sistem komputer belajar dari data secara otomatis dinamakan...',
                        'answers' => [
                            ['answer' => 'Expert System', 'is_correct' => false],
                            ['answer' => 'Machine Learning', 'is_correct' => true],
                            ['answer' => 'Natural Language Processing', 'is_correct' => false],
                            ['answer' => 'Computer Vision', 'is_correct' => false],
                        ]
                    ],
                    [
                        'question' => 'Algoritma pencarian yang menjelajahi simpul (node) anak terdalam pada pohon pencarian terlebih dahulu adalah...',
                        'answers' => [
                            ['answer' => 'Breadth-First Search (BFS)', 'is_correct' => false],
                            ['answer' => 'Depth-First Search (DFS)', 'is_correct' => true],
                            ['answer' => 'A* Search', 'is_correct' => false],
                            ['answer' => 'Greedy Best-First Search', 'is_correct' => false],
                        ]
                    ],
                    [
                        'question' => 'Jenis pembelanjaan mesin (Machine Learning) yang menggunakan data terlabel (labeled data) adalah...',
                        'answers' => [
                            ['answer' => 'Unsupervised Learning', 'is_correct' => false],
                            ['answer' => 'Supervised Learning', 'is_correct' => true],
                            ['answer' => 'Reinforcement Learning', 'is_correct' => false],
                            ['answer' => 'Semi-supervised Learning', 'is_correct' => false],
                        ]
                    ],
                    [
                        'question' => 'Arsitektur algoritma AI yang terinspirasi oleh jaringan saraf biologis otak manusia adalah...',
                        'answers' => [
                            ['answer' => 'Decision Tree', 'is_correct' => false],
                            ['answer' => 'Artificial Neural Network (ANN)', 'is_correct' => true],
                            ['answer' => 'Genetic Algorithm', 'is_correct' => false],
                            ['answer' => 'Support Vector Machine', 'is_correct' => false],
                        ]
                    ],
                    [
                        'question' => 'Uji coba ilmiah yang dibuat oleh Alan Turing untuk menguji apakah mesin memiliki kecerdasan setara manusia dinamakan...',
                        'answers' => [
                            ['answer' => 'Voight-Kampff Test', 'is_correct' => false],
                            ['answer' => 'Turing Test', 'is_correct' => true],
                            ['answer' => 'CAPTCHA Test', 'is_correct' => false],
                            ['answer' => 'Lovelace Test', 'is_correct' => false],
                        ]
                    ],
                ]
            ],
        ];

        foreach ($academicData as $m) {
            $matkul = Matkul::updateOrCreate(
                ['code' => $m['code']],
                [
                    'name' => $m['name'],
                    'semester' => $m['semester'],
                    'photo' => $m['photo'],
                ]
            );

            $bab = Bab::updateOrCreate(
                [
                    'matkul_id' => $matkul->id,
                    'name' => $m['bab'],
                ]
            );

            $quiz = Quiz::updateOrCreate(
                [
                    'bab_id' => $bab->id,
                    'name' => $m['quiz'],
                ]
            );

            foreach ($m['questions'] as $qData) {
                $question = Question::updateOrCreate(
                    [
                        'quiz_id' => $quiz->id,
                        'question' => $qData['question'],
                    ]
                );

                // Re-create answers to ensure clean options state
                $question->answers()->delete();

                foreach ($qData['answers'] as $aData) {
                    Answer::create([
                        'question_id' => $question->id,
                        'answer' => $aData['answer'],
                        'is_correct' => $aData['is_correct'],
                    ]);
                }
            }
        }
    }
}
