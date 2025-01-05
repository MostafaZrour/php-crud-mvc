<?php

namespace App\Core;

class Controller
{
    public function laodView($view, $data = [])
    {
        extract($data);

        ob_start();
        include "../src/Views/$view.php";
        $content = ob_get_clean();
        
        include "../src/Views/layout/App.php";
    }
}
