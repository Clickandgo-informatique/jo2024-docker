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

/* _partials/_sidenav.html.twig */
class __TwigTemplate_422a9fa75612e4edd8f1e72e3854cecd extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "_partials/_sidenav.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "_partials/_sidenav.html.twig"));

        // line 1
        yield "<div class=\"sidenav\">
\t<details>
\t\t<summary>
\t\t\t<i class=\"fa-solid fa-users\"></i>Utilisateurs
\t\t</summary>
\t\t<a href=\"";
        // line 6
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_utilisateurs_index");
        yield "\">
\t\t\t<i class=\"fa-solid fa-list\"></i>Liste</a>
\t</details>
\t<details>
\t\t<summary>Offres</summary>
        <a href=\"";
        // line 11
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_offres_index");
        yield "\">
\t\t\t<i class=\"fa-solid fa-list\"></i>Liste</a>
\t</details>
\t<details>
\t\t<summary>Sports</summary>
\t\t  <a href=\"";
        // line 16
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_sports_index");
        yield "\">
\t\t\t<i class=\"fa-solid fa-list\"></i>Liste</a>
\t</details>
</div>
";
        // line 20
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

        // line 21
        yield "    <link rel=\"stylesheet\" href=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/css/sidenav.css"), "html", null, true);
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
        return "_partials/_sidenav.html.twig";
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
        return array (  102 => 21,  79 => 20,  72 => 16,  64 => 11,  56 => 6,  49 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<div class=\"sidenav\">
\t<details>
\t\t<summary>
\t\t\t<i class=\"fa-solid fa-users\"></i>Utilisateurs
\t\t</summary>
\t\t<a href=\"{{path('app_utilisateurs_index')}}\">
\t\t\t<i class=\"fa-solid fa-list\"></i>Liste</a>
\t</details>
\t<details>
\t\t<summary>Offres</summary>
        <a href=\"{{path('app_offres_index')}}\">
\t\t\t<i class=\"fa-solid fa-list\"></i>Liste</a>
\t</details>
\t<details>
\t\t<summary>Sports</summary>
\t\t  <a href=\"{{path('app_sports_index')}}\">
\t\t\t<i class=\"fa-solid fa-list\"></i>Liste</a>
\t</details>
</div>
{% block stylesheets %}
    <link rel=\"stylesheet\" href=\"{{asset('assets/css/sidenav.css')}}\">
{% endblock %}
", "_partials/_sidenav.html.twig", "/var/www/symfony/templates/_partials/_sidenav.html.twig");
    }
}
