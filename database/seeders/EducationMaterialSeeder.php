<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EducationMaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('education_contents')->insert([
            [
                'title' => 'Macam-macam Olahraga untuk Pasien Diabetes Melitus',
                'type' => 'video',
                'content' => 'Olahraga memiliki banyak manfaat bagi penderita Diabetes Melitus. Dalam video ini dijelaskan berbagai jenis olahraga yang direkomendasikan untuk diabetesi, mulai dari aktivitas fisik ringan seperti jalan kaki hingga latihan intensitas sedang. Olahraga membantu meningkatkan sensitivitas insulin, menjaga kestabilan kadar gula darah, serta mendukung pengelolaan berat badan. Video ini juga menekankan pentingnya menyesuaikan jenis dan intensitas olahraga dengan kondisi fisik masing-masing pasien.',
                'url' => 'https://www.youtube.com/embed/f2BXeJovyAg?si=E07-gCJV-UFEbiRo',
                'category' => 'olahraga diabetes',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Senam Kaki untuk Pasien Diabetes Melitus',
                'type' => 'video',
                'content' => 'Senam kaki merupakan bagian penting dalam perawatan harian penderita diabetes, terutama untuk mencegah komplikasi seperti ulkus atau luka pada kaki. Video ini memperagakan gerakan senam kaki yang bertujuan melancarkan sirkulasi darah, meningkatkan kekuatan otot, dan menjaga fleksibilitas sendi. Dengan melakukan senam kaki secara rutin, penderita diabetes dapat menjaga kesehatan kaki dan mengurangi risiko amputasi.',
                'url' => 'https://www.youtube.com/embed/rdVXSJBJzBc?si=XKd0Azs3JUYrwZT6',
                'category' => 'senam kaki',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Peregangan Tubuh (Stretching) untuk Pasien Diabetes',
                'type' => 'video',
                'content' => 'Peregangan tubuh atau stretching merupakan salah satu bentuk latihan ringan yang bisa dilakukan kapan saja dan di mana saja. Video ini dipandu oleh instruktur senam diabetes dan memperlihatkan gerakan peregangan sederhana untuk membantu meningkatkan fleksibilitas tubuh, mengurangi stres, serta memperlancar sirkulasi darah. Stretching sangat dianjurkan bagi penderita DM karena aman, mudah dilakukan, dan dapat menjadi bagian dari rutinitas harian.',
                'url' => 'https://www.youtube.com/embed/EFTQmUYPNPM?si=kDgzRHZW_R6NbVH6',
                'category' => 'stretching',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Yoga untuk Penderita Diabetes',
                'type' => 'video',
                'content' => 'Yoga adalah olahraga yang tidak hanya melatih tubuh, tetapi juga pikiran. Bagi penderita diabetes, yoga dapat membantu menurunkan kadar gula darah melalui peningkatan sensitivitas insulin dan pengurangan stres. Dalam video ini ditunjukkan berbagai gerakan yoga yang lembut dan aman dilakukan oleh diabetesi, serta manfaatnya dalam memperbaiki kualitas tidur dan meningkatkan metabolisme tubuh.',
                'url' => 'https://www.youtube.com/embed/PUG6KHmFAi8?si=ttJARbvxiMLJyiIt',
                'category' => 'yoga diabetes',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Senam Aerobik untuk Diabetes',
                'type' => 'video',
                'content' => 'Senam aerobik merupakan latihan yang sangat baik untuk menjaga kebugaran jantung dan paru-paru, sekaligus membantu mengontrol kadar gula darah. Dalam video ini, instruktur senam khusus diabetes memandu gerakan-gerakan aerobik yang cocok untuk penderita diabetes maupun orang sehat. Selain itu, senam ini juga dapat meningkatkan energi dan membantu menurunkan berat badan.',
                'url' => 'https://www.youtube.com/embed/uN4xRJVOn2E?si=CiTxQcl3ldBgPsaO',
                'category' => 'senam aerobik',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Latihan Fisik dengan Posisi Duduk untuk Penderita Diabetes',
                'type' => 'video',
                'content' => 'Latihan ini merupakan hasil penelitian yang dirancang khusus untuk penderita diabetes yang memiliki keterbatasan gerak atau kondisi fisik tertentu. Dilakukan dalam posisi duduk, latihan ini tetap memberikan manfaat seperti meningkatkan kebugaran, memperbaiki sensitivitas insulin, dan menurunkan rasa lelah (fatigue). Cocok dilakukan oleh lansia atau pasien dengan mobilitas terbatas.',
                'url' => 'https://www.youtube.com/embed/b8sVYngBnWE?si=uKPnX4sAMMIRM-jX',
                'category' => 'latihan ringan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Rekomendasi Olahraga Terbaik Menurunkan Gula Darah',
                'type' => 'video',
                'content' => 'Dalam video ini dijelaskan berbagai pilihan olahraga terbaik yang terbukti efektif membantu menurunkan kadar gula darah. Mulai dari jalan cepat, berenang, hingga bersepeda. Olahraga yang tepat tidak hanya menjaga kestabilan gula darah, tetapi juga meningkatkan kualitas hidup secara keseluruhan. Dilengkapi dengan tips untuk memulai kebiasaan olahraga secara konsisten dan aman untuk penderita diabetes.',
                'url' => 'https://www.youtube.com/embed/KxPA8HrHKdc?si=xwsjRdy3-DvWObOy',
                'category' => 'rekomendasi olahraga',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => '5 Penyakit Serius yang Kini Banyak Menyerang Usia 20-an di Indonesia',
                'type' => 'berita',
                'content' => 'Artikel dari detikHealth ini mengungkapkan bahwa usia 20-an saat ini semakin rentan terkena penyakit serius seperti diabetes melitus, hipertensi, dan kolesterol tinggi. Penyebabnya termasuk gaya hidup tidak sehat, stres, serta kurang olahraga.',
                'url' => 'https://health.detik.com/berita-detikhealth/d-8004656/5-penyakit-serius-yang-kini-banyak-menyerang-usia-20-an-di-indonesia',
                'category' => 'informasi kesehatan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Penjelasan Lengkap tentang Diabetes',
                'type' => 'berita',
                'content' => 'Halaman Alodokter ini menyajikan informasi lengkap mengenai penyakit diabetes, mulai dari gejala, penyebab, hingga cara pengobatannya. Artikel ini cocok untuk pemula yang ingin memahami penyakit ini dengan bahasa yang mudah.',
                'url' => 'https://www.alodokter.com/diabetes',
                'category' => 'edukasi diabetes',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Diabetes Melitus Tipe 2 - Kemenkes RI',
                'type' => 'berita',
                'content' => 'Artikel resmi dari Kementerian Kesehatan ini menjelaskan lebih dalam tentang diabetes melitus tipe 2, penyebabnya, serta cara penanganan dan pencegahan melalui pola hidup sehat.',
                'url' => 'https://ayosehat.kemkes.go.id/topik-penyakit/diabetes--penyakit-ginjal/diabetes-melitus-tipe-2',
                'category' => 'kementerian kesehatan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Pengantar Diabetes Indonesia 14 Januari 2025',
                'type' => 'berita',
                'content' => 'Pengantar dari Diabetes-Indonesia.net membahas pentingnya edukasi, pencegahan, dan manajemen penyakit diabetes di Indonesia sebagai upaya nasional mengurangi angka komplikasi dan kematian akibat diabetes.',
                'url' => 'https://diabetes-indonesia.net/2025/01/pengantar-14-januari-2025/',
                'category' => 'komunitas diabetes',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
