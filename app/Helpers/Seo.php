<?php

namespace App\Helpers;

use CoffeeCode\Optimizer\Optimizer;

class Seo
{
    protected $optmizer;

    public function __construct($schema = "article")
    {
        $this->optmizer = new Optimizer();
        $this->optmizer->openGraph(
            "SulRifas",
            "pt-br",
            $schema
        )->publisher(
            "pagina facebook",
            "autor id"
        )->twitterCard(
            "user twitter",
            "@perfil do twitter",
            "dominio do site"
        )->facebook(
            "app id - so pode escolher um ou outro"
        );
    }

    public function render($title, $description, $url, $image, $follow = true)
    {
        $seo = $this->optmizer->optimize(
            $title,
            $description,
            $url,
            $image,
            $follow
        );

        var_dump($seo->debug());

        return $seo->render();
    }
}
