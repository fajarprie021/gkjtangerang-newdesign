<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('limit_sentences')) {
    function limit_sentences($text, $limit = 2)
    {
        // Pisahkan teks berdasarkan tag paragraf <p>
        $sentences = preg_split('/(<\/p>)/i', $text, -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);

        $result = '';
        $sentence_count = 0;

        for ($i = 0; $i < count($sentences); $i++) {
            $result .= $sentences[$i];

            // Jika bagian ini mengandung tag penutup paragraf </p>, hitung sebagai satu kalimat
            if (stripos($sentences[$i], '</p>') !== false) {
                $sentence_count++;
            }

            // Jika sudah mencapai batas kalimat, hentikan loop
            if ($sentence_count >= $limit) {
                break;
            }
        }

        // Return hasilnya
        return trim($result);
    }
}