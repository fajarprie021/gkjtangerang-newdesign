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

if (!function_exists('resolve_image')) {
    function resolve_image($filename, $module = 'default')
    {
        $filename = trim($filename, '/');
        if (empty($filename)) {
            return get_default_image($module);
        }

        $candidates = [];
        if ($module === 'header' || $module === 'hero' || $module === 'slider') {
            $candidates[] = 'assets/images/header/' . $filename;
            $candidates[] = 'assets/images/' . $filename;
        } elseif ($module === 'galeri' || $module === 'gallery') {
            $candidates[] = 'assets/images/galeri/' . $filename;
            $candidates[] = 'assets/images/' . $filename;
        } elseif ($module === 'berita' || $module === 'artikel' || $module === 'tulisan' || $module === 'tentang') {
            $candidates[] = 'assets/images/' . $filename;
            $candidates[] = 'assets/images/galeri/' . $filename;
            $candidates[] = 'assets/images/header/' . $filename;
        } elseif ($module === 'guru' || $module === 'majelis') {
            $candidates[] = 'assets/images/' . $filename;
            $candidates[] = 'assets/images/blank.png';
        } elseif ($module === 'siswa' || $module === 'jemaat') {
            $candidates[] = 'assets/images/' . $filename;
            $candidates[] = 'assets/images/blank.png';
        } else {
            $candidates[] = 'assets/images/' . $filename;
            $candidates[] = 'assets/images/galeri/' . $filename;
            $candidates[] = 'assets/images/header/' . $filename;
        }

        foreach ($candidates as $path) {
            if (file_exists(FCPATH . $path) && is_file(FCPATH . $path)) {
                return base_url($path);
            }
        }

        return get_default_image($module);
    }
}

if (!function_exists('get_default_image')) {
    function get_default_image($module)
    {
        if ($module === 'header' || $module === 'hero' || $module === 'slider') {
            return base_url('assets/images/header/image-slide-1.jpg');
        } elseif ($module === 'galeri' || $module === 'gallery') {
            return base_url('assets/images/tangerang-tangerang01.jpg');
        } elseif ($module === 'guru' || $module === 'majelis') {
            return base_url('assets/images/user_blank.png');
        } elseif ($module === 'siswa' || $module === 'jemaat') {
            return base_url('assets/images/user_blank.png');
        } else {
            return base_url('assets/images/sejarah.jpg');
        }
    }
}