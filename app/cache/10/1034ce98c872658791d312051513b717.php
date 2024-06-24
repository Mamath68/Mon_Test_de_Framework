<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* layouts/base.html.twig */
class __TwigTemplate_0f7dec700fe66cb795742e375f273bbd extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        yield "<!DOCTYPE html>
\t\t<html lang=\"fr\">

\t\t\t<head>
\t\t\t\t<meta charset=\"UTF-8\">
\t\t\t\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
\t\t\t\t<title>
\t\t\t\t\t";
        // line 8
        yield from $this->unwrap()->yieldBlock('title', $context, $blocks);
        // line 11
        yield "\t\t\t\t</title>
\t\t\t\t<link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css\" rel=\"stylesheet\" integrity=\"sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH\" crossorigin=\"anonymous\">

\t\t\t\t";
        // line 14
        yield from $this->unwrap()->yieldBlock('stylesheets', $context, $blocks);
        // line 17
        yield "
\t\t\t</head>


\t\t\t<body class=\"h-100\">
\t\t\t\t<nav class=\"navbar navbar-dark navbar-expand-xl bg-dark\">
\t\t\t\t\t<div class=\"container px-5 mx-auto\">
\t\t\t\t\t\t<a class=\"navbar-brand\" href=\"/\">
\t\t\t\t\t\t\tMy Framework
\t\t\t\t\t\t</a>
\t\t\t\t\t\t<button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"offcanvas\" data-bs-target=\"#offcanvasDarkNavbar\" aria-controls=\"offcanvasDarkNavbar\" aria-label=\"Toggle navigation\">
\t\t\t\t\t\t\t<span class=\"navbar-toggler-icon\"></span>
\t\t\t\t\t\t</button>
\t\t\t\t\t\t<div class=\"offcanvas offcanvas-end text-bg-dark\" tabindex=\"-1\" id=\"offcanvasDarkNavbar\" aria-labelledby=\"offcanvasDarkNavbarLabel\">
\t\t\t\t\t\t\t<div class=\"offcanvas-header\">
\t\t\t\t\t\t\t\t<h5 class=\"offcanvas-title\" id=\"offcanvasDarkNavbarLabel\">
\t\t\t\t\t\t\t\t\tDark offcanvas
\t\t\t\t\t\t\t\t</h5>
\t\t\t\t\t\t\t\t<button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"offcanvas\" aria-label=\"Close\"></button>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"offcanvas-body\">
\t\t\t\t\t\t\t\t<ul class=\"navbar-nav justify-content-end flex-grow-1 pe-3\">
\t\t\t\t\t\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t\t\t\t\t\t<a href=\"/\" class=\"nav-link\">
\t\t\t\t\t\t\t\t\t\t\tHome
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t\t\t\t\t\t<a href=\"/about\" class=\"nav-link\">
\t\t\t\t\t\t\t\t\t\t\tAbout
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t\t\t\t\t\t<a href=\"/contact\" class=\"nav-link\">
\t\t\t\t\t\t\t\t\t\t\tContact
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t\t\t\t\t\t<a href=\"/cards/1\" class=\"nav-link\">
\t\t\t\t\t\t\t\t\t\t\tLes Cartes
\t\t\t\t\t\t\t\t\t\t</a>

\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t\t<div class=\"flex mt-2\"></div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</nav>

\t\t\t\t<main>
\t\t\t\t\t";
        // line 68
        yield from $this->unwrap()->yieldBlock('body', $context, $blocks);
        // line 70
        yield "\t\t\t\t</main>

\t\t\t\t<script src=\"/js/script.js\"></script>
\t\t\t\t<script src=\"https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js\" integrity=\"sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r\" crossorigin=\"anonymous\"></script>
\t\t\t\t<script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js\" integrity=\"sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy\" crossorigin=\"anonymous\"></script>
\t\t\t\t<script src=\"https://kit.fontawesome.com/f0dc5fab26.js\" crossorigin=\"anonymous\"></script>
\t\t\t\t<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
\t\t\t</body>

\t\t</html>
";
        return; yield '';
    }

    // line 8
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        yield "\t\t\t\t\t\tMon Framework avec twig
\t\t\t\t\t";
        return; yield '';
    }

    // line 14
    public function block_stylesheets($context, array $blocks = [])
    {
        $macros = $this->macros;
        yield "\t\t\t\t\t<link rel=\"stylesheet\" href=\"/css/output.css\">
\t\t\t\t";
        return; yield '';
    }

    // line 68
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        yield "\t\t\t\t\t";
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "layouts/base.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo()
    {
        return array (  147 => 68,  138 => 14,  129 => 8,  114 => 70,  112 => 68,  59 => 17,  57 => 14,  52 => 11,  50 => 8,  41 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
\t\t<html lang=\"fr\">

\t\t\t<head>
\t\t\t\t<meta charset=\"UTF-8\">
\t\t\t\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
\t\t\t\t<title>
\t\t\t\t\t{% block title %}
\t\t\t\t\t\tMon Framework avec twig
\t\t\t\t\t{% endblock %}
\t\t\t\t</title>
\t\t\t\t<link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css\" rel=\"stylesheet\" integrity=\"sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH\" crossorigin=\"anonymous\">

\t\t\t\t{% block stylesheets %}
\t\t\t\t\t<link rel=\"stylesheet\" href=\"/css/output.css\">
\t\t\t\t{% endblock %}

\t\t\t</head>


\t\t\t<body class=\"h-100\">
\t\t\t\t<nav class=\"navbar navbar-dark navbar-expand-xl bg-dark\">
\t\t\t\t\t<div class=\"container px-5 mx-auto\">
\t\t\t\t\t\t<a class=\"navbar-brand\" href=\"/\">
\t\t\t\t\t\t\tMy Framework
\t\t\t\t\t\t</a>
\t\t\t\t\t\t<button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"offcanvas\" data-bs-target=\"#offcanvasDarkNavbar\" aria-controls=\"offcanvasDarkNavbar\" aria-label=\"Toggle navigation\">
\t\t\t\t\t\t\t<span class=\"navbar-toggler-icon\"></span>
\t\t\t\t\t\t</button>
\t\t\t\t\t\t<div class=\"offcanvas offcanvas-end text-bg-dark\" tabindex=\"-1\" id=\"offcanvasDarkNavbar\" aria-labelledby=\"offcanvasDarkNavbarLabel\">
\t\t\t\t\t\t\t<div class=\"offcanvas-header\">
\t\t\t\t\t\t\t\t<h5 class=\"offcanvas-title\" id=\"offcanvasDarkNavbarLabel\">
\t\t\t\t\t\t\t\t\tDark offcanvas
\t\t\t\t\t\t\t\t</h5>
\t\t\t\t\t\t\t\t<button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"offcanvas\" aria-label=\"Close\"></button>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"offcanvas-body\">
\t\t\t\t\t\t\t\t<ul class=\"navbar-nav justify-content-end flex-grow-1 pe-3\">
\t\t\t\t\t\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t\t\t\t\t\t<a href=\"/\" class=\"nav-link\">
\t\t\t\t\t\t\t\t\t\t\tHome
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t\t\t\t\t\t<a href=\"/about\" class=\"nav-link\">
\t\t\t\t\t\t\t\t\t\t\tAbout
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t\t\t\t\t\t<a href=\"/contact\" class=\"nav-link\">
\t\t\t\t\t\t\t\t\t\t\tContact
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t\t\t\t\t\t<a href=\"/cards/1\" class=\"nav-link\">
\t\t\t\t\t\t\t\t\t\t\tLes Cartes
\t\t\t\t\t\t\t\t\t\t</a>

\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t\t<div class=\"flex mt-2\"></div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</nav>

\t\t\t\t<main>
\t\t\t\t\t{% block body %}
\t\t\t\t\t{% endblock %}
\t\t\t\t</main>

\t\t\t\t<script src=\"/js/script.js\"></script>
\t\t\t\t<script src=\"https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js\" integrity=\"sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r\" crossorigin=\"anonymous\"></script>
\t\t\t\t<script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js\" integrity=\"sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy\" crossorigin=\"anonymous\"></script>
\t\t\t\t<script src=\"https://kit.fontawesome.com/f0dc5fab26.js\" crossorigin=\"anonymous\"></script>
\t\t\t\t<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
\t\t\t</body>

\t\t</html>
", "layouts/base.html.twig", "C:\\laragon\\www\\Projets_Persos\\Mon_Framework\\views\\layouts\\base.html.twig");
    }
}
