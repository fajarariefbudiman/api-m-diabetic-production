<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FactMythSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('fact_myths')->insert([
            [
                'myth' => 'Diabetes bukanlah penyakit yang serius.',
                'fact' => 'Diabetes dapat menyebabkan komplikasi serius, termasuk penyakit jantung, gagal ginjal, kebutaan, dan amputasi. Menurut Organisasi Kesehatan Dunia (WHO), diabetes merupakan penyebab utama morbiditas dan mortalitas di seluruh dunia.',
            ],
            [
                'myth' => 'Orang dengan diabetes tidak boleh makan makanan manis atau karbohidrat.',
                'fact' => 'Orang dengan diabetes dapat menikmati makanan manis dalam jumlah yang moderat sebagai bagian dari diet seimbang. Memantau asupan karbohidrat dan kontrol glikemik secara keseluruhan sangat penting. Asosiasi Diabetes Amerika (ADA) menekankan bahwa tidak ada makanan yang sepenuhnya terlarang.',
            ],
            [
                'myth' => 'Hanya orang yang kelebihan berat badan yang terkena diabetes.',
                'fact' => 'Meskipun berat badan berlebih merupakan faktor risiko signifikan untuk diabetes tipe 2, individu dengan berat badan normal juga dapat mengembangkan kondisi ini karena faktor genetik, gaya hidup yang tidak aktif, dan kebiasaan makan yang buruk. Penelitian yang diterbitkan dalam jurnal \"Diabetes Care\" menyoroti bahwa individu kurus juga berisiko.',
            ],
            [
                'myth' => 'Insulin menyembuhkan diabetes.',
                'fact' => 'Insulin adalah pengobatan untuk mengelola kadar gula darah tetapi tidak menyembuhkan diabetes. Pasien dengan diabetes tipe 1 memerlukan insulin untuk bertahan hidup, sementara mereka yang memiliki diabetes tipe 2 mungkin membutuhkannya seiring perkembangan kondisi mereka. Penelitian menunjukkan bahwa manajemen diabetes berfokus pada perubahan gaya hidup dan kepatuhan terhadap pengobatan.',
            ],
            [
                'myth' => 'Diabetes adalah penyakit orang tua.',
                'fact' => 'Meskipun usia adalah faktor risiko, diabetes tipe 2 semakin banyak didiagnosis pada anak-anak dan remaja, terutama karena meningkatnya tingkat obesitas. Menurut Pusat Pengendalian dan Pencegahan Penyakit (CDC), obesitas pada anak adalah prediktor signifikan untuk diabetes tipe 2.',
            ],
            [
                'myth' => 'Anda hanya bisa mendapatkan diabetes jika ada riwayat di keluarga.',
                'fact' => 'Riwayat keluarga meningkatkan risiko diabetes, tetapi faktor gaya hidup seperti pola makan, aktivitas fisik, dan berat badan juga memainkan peran penting. Penelitian di \"The Journal of Clinical Endocrinology & Metabolism\" menunjukkan bahwa faktor lingkungan berkontribusi signifikan terhadap risiko diabetes.',
            ],
            [
                'myth' => 'Orang dengan diabetes seharusnya menghindari olahraga.',
                'fact' => 'Aktivitas fisik yang teratur bermanfaat untuk mengelola diabetes. Olahraga membantu mengontrol berat badan, menurunkan kadar gula darah, dan mengurangi risiko penyakit kardiovaskular. ADA merekomendasikan program olahraga terstruktur untuk individu dengan diabetes.',
            ],
        ]);
    }
}
