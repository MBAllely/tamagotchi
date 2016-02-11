<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Tamagotchi.php";

    session_start();
    $_SESSION['tamagotchi_stats'] = array();

    $app = new Silex\Application();

    $app['debug'] = true;

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    //gets the '/' page from views folder
    $app->get("/", function() use ($app) {
        return $app['twig']->render('tamagotchi.html.twig', array('tamagotchis' => Tamagotchi::getAll()));
    });

    $app->post("/my_tamagotchi", function() use ($app) {
        $tamagotchi = new Tamagotchi($_POST['name']);
        var_dump($tamagotchi);
        $tamagotchi->save();
        return $app['twig']->render('my_tamagotchi.html.twig', array('tamagotchis' => $tamagotchi));
        //increase food/attention/rest/dead method in here for button presses
    });

    $app->get("/my_tamagotchi_fed", function() use ($app) {
        $tamagotchi = Tamagotchi::getAll();

        $food = $tamagotchi->getFood($food + 1);
        $attention = $tamagotchi[0]->getAttention($attention - 1);
        $rest = $tamagotchi[0]->getRest($rest - 1);
        return $app['twig']->render('my_tamagotchi.html.twig');
    });

    $app->get("/my_tamagotchi_attention", function() use ($app) {
        $tamagotchi = Tamagotchi::getAll();
        $food = $tamagotchi[0]->getFood($food - 1);
        $attention = $tamagotchi[0]->getAttention($attention + 1);
        $rest = $tamagotchi[0]->getRest($rest - 1);
        return $app['twig']->render('my_tamagotchi.html.twig');
    });

    $app->get("/my_tamagotchi_rest", function() use ($app) {
        $tamagotchi = Tamagotchi::getAll();
        $food = $tamagotchi[0]->getFood($food - 1);
        $attention = $tamagotchi[0]->getAttention($attention - 1);
        $rest = $tamagotchi[0]->getRest($rest + 1);
        return $app['twig']->render('my_tamagotchi.html.twig');
    });

    $app->post("/dead_tamagotchi", function() use ($app) {
        Tamagotchi::deadTamagotchi();
        return $app['twig']->render('dead_tamagotchi.html.twig');
    });

    return $app;
?>
