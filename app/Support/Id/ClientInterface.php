<?php
namespace App\Support\Id;


interface ClientInterface
{
    public static function getInstance();

    public function getBeginAt();
}