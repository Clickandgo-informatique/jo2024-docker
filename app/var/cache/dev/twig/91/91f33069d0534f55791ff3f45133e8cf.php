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

/* _partials/_categories-offres.html.twig */
class __TwigTemplate_96070405b53f8a2c7d78aadccc41b8ba extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "_partials/_categories-offres.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "_partials/_categories-offres.html.twig"));

        // line 2
        yield "<div class=\"filtre-categories-offres\">
\tFiltrer par type d'offre :
\t<a href=\"";
        // line 4
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_offres-par-categories", ["slug" => "toutes"]);
        yield "\" class=\"categorie-offres-item\" data-url=\"/offres-par-categorie/toutes\">Toutes</a>
\t";
        // line 5
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["categoriesOffres"]) || array_key_exists("categoriesOffres", $context) ? $context["categoriesOffres"] : (function () { throw new RuntimeError('Variable "categoriesOffres" does not exist.', 5, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["cat"]) {
            // line 6
            yield "\t\t<a href=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_offres-par-categories", ["slug" => CoreExtension::getAttribute($this->env, $this->source, $context["cat"], "slug", [], "any", false, false, false, 6)]), "html", null, true);
            yield "\" class=\"categorie-offres-item\" data-url=\"/offres-par-categorie/";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["cat"], "slug", [], "any", false, false, false, 6), "html", null, true);
            yield "\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["cat"], "nom", [], "any", false, false, false, 6), "html", null, true);
            yield "</a>
\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['cat'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 8
        yield "</div>
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
        return "_partials/_categories-offres.html.twig";
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
        return array (  73 => 8,  60 => 6,  56 => 5,  52 => 4,  48 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# _partials/_categories-offres.html.twig #}
<div class=\"filtre-categories-offres\">
\tFiltrer par type d'offre :
\t<a href=\"{{path('app_offres-par-categories',{slug:'toutes'})}}\" class=\"categorie-offres-item\" data-url=\"/offres-par-categorie/toutes\">Toutes</a>
\t{% for cat in categoriesOffres %}
\t\t<a href=\"{{path('app_offres-par-categories',{slug:cat.slug})}}\" class=\"categorie-offres-item\" data-url=\"/offres-par-categorie/{{cat.slug}}\">{{cat.nom}}</a>
\t{% endfor %}
</div>
", "_partials/_categories-offres.html.twig", "/var/www/symfony/templates/_partials/_categories-offres.html.twig");
    }
}
