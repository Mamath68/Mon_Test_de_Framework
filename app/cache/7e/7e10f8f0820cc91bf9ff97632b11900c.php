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

/* home/index.html.twig */
class __TwigTemplate_393081b0460e6013310d80294372abfe extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "layouts/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("layouts/base.html.twig", "home/index.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        yield "\t\t\t";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["title"] ?? null), "html", null, true);
        yield "
\t\t";
        return; yield '';
    }

    // line 7
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 8
        yield "
\t\t\t";
        // line 9
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 9)) {
            // line 10
            yield "\t\t\t\t<h1>
\t\t\t\t\tBienvenue
\t\t\t\t\t";
            // line 12
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 12), "pseudo", [], "any", false, false, false, 12), "html", null, true);
            yield "
\t\t\t\t</h1>
\t\t\t";
        } else {
            // line 15
            yield "\t\t\t\t<h1>
\t\t\t\t\t";
            // line 16
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["title"] ?? null), "html", null, true);
            yield "
\t\t\t\t</h1>

\t\t\t";
        }
        // line 20
        yield "
\t\t";
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "home/index.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable()
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo()
    {
        return array (  89 => 20,  82 => 16,  79 => 15,  73 => 12,  69 => 10,  67 => 9,  64 => 8,  60 => 7,  52 => 4,  48 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'layouts/base.html.twig' %}

\t\t{% block title %}
\t\t\t{{title}}
\t\t{% endblock %}

\t\t{% block body %}

\t\t\t{% if app.user %}
\t\t\t\t<h1>
\t\t\t\t\tBienvenue
\t\t\t\t\t{{ app.user.pseudo}}
\t\t\t\t</h1>
\t\t\t{% else %}
\t\t\t\t<h1>
\t\t\t\t\t{{title}}
\t\t\t\t</h1>

\t\t\t{% endif %}

\t\t{% endblock %}

", "home/index.html.twig", "C:\\laragon\\www\\Projets_Persos\\Mon_Framework\\views\\home\\index.html.twig");
    }
}
