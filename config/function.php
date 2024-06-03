<?// Fonction simple de routage
function route($page) {
    $controllerPath = __DIR__ . '/controllers/' . $page . '.php';
    $viewPath = __DIR__ . '/pages/' . $page . '.php';
    $modelsPath = __DIR__ . '/models/' . $page . '.php';

    // Inclure le contrôleur s'il existe
    if (file_exists($controllerPath)) {
        include $controllerPath;
    }

    // Inclure le modèle s'il existe
    if (file_exists($modelsPath)) {
        include $modelsPath;
    }

    // Inclure la vue s'il existe
    if (file_exists($viewPath)) {
        include $viewPath;
    } else {
        include __DIR__ . 'index.php?page=404'; // Page 404 si la vue n'existe pas
    }
} ?>