<?php

namespace Src\Views;

class View {
    private $layout;

    public function __construct(string $layout)
    {
        $this->layout = $layout;
        
    }
    public function renderHtml(string $viewName, array $vars = []) {
        $layoutFile = "Layouts/{$this->layout}.php";
        // Тут достается из конечного вью html разметка с подстановкой articles (за счет extract)
        $content = $this->renderFile($viewName, $vars);
        echo $this->renderFile($layoutFile, ['content' => $content]);
    }
    private function renderFile(string $fileName, array $vars) {
        extract($vars);
        $fileName = __DIR__ . '/' . $fileName;
        if (file_exists($fileName)) {
            // Буферизированный вывод
            ob_start();
                // Include видит предыдущее окружение $articles из extract($vars);
                include $fileName;
                $buffer = ob_get_contents();
            ob_get_clean();
            return $buffer;
        } else {
            echo "Не найден файл пути $fileName"; die();
        }
    }
}