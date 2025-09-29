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
            'stylesheets' => [$this, 'block_stylesheets'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "_partials/_sidebar.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "_partials/_sidebar.html.twig"));

        // line 1
        yield "<nav id=\"sidebar\" class=\"sidebar\">
\t<div class=\"sidebar-item\">
\t\t<div class=\"sidebar-item-title\">
\t\t\t<i class=\"fa-solid fa-users\"></i>
\t\t\tUtilisateurs</div>
\t\t<a href=\"";
        // line 6
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_utilisateurs_index");
        yield "\" class=\"sidebar-link\">
\t\t\t<i class=\"fa-solid fa-list\"></i>
\t\t\tListe</a>
\t</div>
\t<div class=\"sidebar-item\">
\t\t<div class=\"sidebar-item-title\">
\t\t\t<i class=\"fa-solid fa-briefcase\"></i>
\t\t\tOffres</div>
\t\t<a href=\"";
        // line 14
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_offres_index");
        yield "\" class=\"sidebar-link\">
\t\t\t<i class=\"fa-solid fa-list\"></i>
\t\t\tListe</a>
\t</div>
\t<div class=\"sidebar-item\">
\t\t<div class=\"sidebar-item-title\">
\t\t\t<i class=\"fa-solid fa-futbol\"></i>
\t\t\tSports</div>
\t\t<a href=\"";
        // line 22
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_sports_index");
        yield "\" class=\"sidebar-link\">
\t\t\t<i class=\"fa-solid fa-list\"></i>
\t\t\tListe</a>
\t</div>
</nav>

";
        // line 28
        yield from $this->unwrap()->yieldBlock('stylesheets', $context, $blocks);
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_stylesheets(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 29
        yield "\t<link rel=\"stylesheet\" href=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/css/sidebar.css"), "html", null, true);
        yield "\">
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

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
        return array (  110 => 29,  87 => 28,  78 => 22,  67 => 14,  56 => 6,  49 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<nav id=\"sidebar\" class=\"sidebar\">
\t<div class=\"sidebar-item\">
\t\t<div class=\"sidebar-item-title\">
\t\t\t<i class=\"fa-solid fa-users\"></i>
\t\t\tUtilisateurs</div>
\t\t<a href=\"{{ path('app_utilisateurs_index') }}\" class=\"sidebar-link\">
\t\t\t<i class=\"fa-solid fa-list\"></i>
\t\t\tListe</a>
\t</div>
\t<div class=\"sidebar-item\">
\t\t<div class=\"sidebar-item-title\">
\t\t\t<i class=\"fa-solid fa-briefcase\"></i>
\t\t\tOffres</div>
\t\t<a href=\"{{ path('app_offres_index') }}\" class=\"sidebar-link\">
\t\t\t<i class=\"fa-solid fa-list\"></i>
\t\t\tListe</a>
\t</div>
\t<div class=\"sidebar-item\">
\t\t<div class=\"sidebar-item-title\">
\t\t\t<i class=\"fa-solid fa-futbol\"></i>
\t\t\tSports</div>
\t\t<a href=\"{{ path('app_sports_index') }}\" class=\"sidebar-link\">
\t\t\t<i class=\"fa-solid fa-list\"></i>
\t\t\tListe</a>
\t</div>
</nav>

{% block stylesheets %}
\t<link rel=\"stylesheet\" href=\"{{ asset('assets/css/sidebar.css') }}\">
{% endblock %}
", "_partials/_sidebar.html.twig", "/var/www/symfony/templates/_partials/_sidebar.html.twig");
    }
}
