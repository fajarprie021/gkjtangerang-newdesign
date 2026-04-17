<?php
$dir = "d:\\AI\\gkjtangerang.org - new design\\application\\controllers\\admin\\";
$files = scandir($dir);
foreach($files as $file) {
    if(pathinfo($file, PATHINFO_EXTENSION) == 'php') {
        $content = file_get_contents($dir . $file);
        if(strpos($content, "v_menu_admin") !== false) {
            echo "Module: $file\n";
            preg_match_all("/\\\$this->load->view\(['\"]([^'\"]+)['\"]/s", $content, $matches);
            $views = array_unique($matches[1]);
            foreach($views as $v) {
                if($v != 'admin/v_menu_admin' && $v != 'admin/layout/main') {
                    echo "  - view: $v.php\n";
                }
            }
        }
    }
}
