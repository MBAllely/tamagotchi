<?php
class Tamagotchi
{
    private $name;
    private $food;
    private $attention;
    private $rest;
    private $image;
    // public $timeCounter;

    function __construct($name, $food = 5, $attention = 5, $rest = 5)
    {
        $this->name = $name;
        $this->food = $food;
        $this->attention = $attention;
        $this->rest = $rest;
        $this->image = "http://kandipatterns.com/images/patterns/characters/12768_Tamagotchi_Kuchipatchi.png";
        // $this->timeCounter = $timeCounter;
    }

    // function setTime()
    // {
    //     $this->timeCounter = 0;
    // }

    function setName($name)
    {
        $this->name = $name;
    }

    function getName()
    {
        return $this->name;
    }

    function setFood($food)
    {
        $this->food = $food;
    }

    function getFood()
    {
        return $this->food;
    }

    function setAttention($attention)
    {
        $this->attention = $attention;
    }

    function getAttention()
    {
        return $this->attention;
    }

    function setRest($rest)
    {
        $this->rest = $rest;
    }

    function getRest()
    {
        return $this->rest;
    }

    function setImage($image)
    {
        $this->image = "http://kandipatterns.com/images/patterns/characters/12768_Tamagotchi_Kuchipatchi.png";
    }

    function getImage()
    {
        return $this->image;
    }

    function save()
    {
        array_push($_SESSION['tamagotchi_stats'], $this);
    }

    static function getAll()
    {
        return $_SESSION['tamagotchi_stats'];
    }

    static function deadTamagotchi()
    {
        $_SESSION['tamagotchi_stats'] = array();
    }

    function foodIncrease()
    {
        $this->food += 1;
    }

    function attentionIncrease()
    {
        $this->attention += 1;
    }

    function restIncrease()
    {
        $this->rest += 1;
    }

    // function timeLapse()
    // {
    //     // $this->timeCounter += 1;
    //     $this->food -= 1;
    //     $this->attention -= 1;
    //     $this->rest -= 1;
    // }

    //feed method

    //play method

    //rest method


}


?>
