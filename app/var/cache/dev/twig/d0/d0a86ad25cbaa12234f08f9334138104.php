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
use Twig\TemplateWrapper;

/* _partials/_sidebar.html.twig */
class __TwigTemplate_b1575e4e74a5729cc6f70e75f58ff9cf extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "_partials/_sidebar.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "_partials/_sidebar.html.twig"));

        // line 2
        yield "<div id=\"sidebar\" class=\"sidebar\">
    <div class=\"sidebar-item\">
        <div class=\"sidebar-item-title\">
            <i class=\"fa-solid fa-users\"></i> Utilisateurs
        </div>
        <div class=\"sidebar-item-link\">
            <a href=\"";
        // line 8
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_utilisateurs_index");
        yield "\" class=\"sidebar-link\">
                <i class=\"fa-solid fa-list\"></i> Liste
            </a>
        </div>
    </div>

    <div class=\"sidebar-item\">
        <div class=\"sidebar-item-title\">
            <i class=\"fa-solid fa-briefcase\"></i> Offres
        </div>
        <div class=\"sidebar-item-link\">
            <a href=\"";
        // line 19
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_offres_index");
        yield "\" class=\"sidebar-link\">
                <i class=\"fa-solid fa-list\"></i> Liste
            </a>
        </div>
    </div>

    <div class=\"sidebar-item\">
        <div class=\"sidebar-item-title\">
            <i class=\"fa-solid fa-futbol\"></i> Sports
        </div>
        <div class=\"sidebar-item-link\">
            <a href=\"";
        // line 30
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_sports_index");
        yield "\" class=\"sidebar-link\">
                <i class=\"fa-solid fa-list\"></i> Liste
            </a>
        </div>
    </div>

    <button id=\"sidebarClose\" class=\"sidebar-close\">×</button>
</div>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "_partials/_sidebar.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  84 => 30,  70 => 19,  56 => 8,  48 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# _sidebar.html.twig #}
<div id=\"sidebar\" class=\"sidebar\">
    <div class=\"sidebar-item\">
        <div class=\"sidebar-item-title\">
            <i class=\"fa-solid fa-users\"></i> Utilisateurs
        </div>
        <div class=\"sidebar-item-link\">
            <a href=\"{{ path('app_utilisateurs_index') }}\" class=\"sidebar-link\">
                <i class=\"fa-solid fa-list\"></i> Liste
            </a>
        </div>
    </div>

    <div class=\"sidebar-item\">
        <div class=\"sidebar-item-title\">
            <i class=\"fa-solid fa-briefcase\"></i> Offres
        </div>
        <div class=\"sidebar-item-link\">
            <a href=\"{{ path('app_offres_index') }}\" class=\"sidebar-link\">
                <i class=\"fa-solid fa-list\"></i> Liste
            </a>
        </div>
    </div>

    <div class=\"sidebar-item\">
        <div class=\"sidebar-item-title\">
            <i class=\"fa-solid fa-futbol\"></i> Sports
        </div>
        <div class=\"sidebar-item-link\">
            <a href=\"{{ path('app_sports_index') }}\" class=\"sidebar-link\">
                <i class=\"fa-solid fa-list\"></i> Liste
            </a>
        </div>
    </div>

    <button id=\"sidebarClose\" class=\"sidebar-close\">×</button>
</div>
", "_partials/_sidebar.html.twig", "/var/www/symfony/templates/_partials/_sidebar.html.twig");
    }
}
