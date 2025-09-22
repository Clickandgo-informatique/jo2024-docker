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

/* admin/offres/index.html.twig */
class __TwigTemplate_f4b171965ffda6fa17e55f6a66205627 extends Template
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

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
            'stylesheets' => [$this, 'block_stylesheets'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/offres/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/offres/index.html.twig"));

        $this->parent = $this->load("base.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield "Gestion des offres
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 6
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 7
        yield "
\t<h1 class=\"text-center\">
\t\t<i class=\"fa-solid fa-clipboard-list\"></i>Gestion des offres</h1>
\t<a href=\"";
        // line 10
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_offres_new");
        yield "\" class=\"btn btn-success\">
\t\t<i class=\"fa-solid fa-circle-plus\"></i>Ajouter une nouvelle offre</a>
\t";
        // line 13
        yield "
\t";
        // line 16
        yield "\t<div
\t\tclass=\"current-range\">";
        // line 18
        yield "\t</div>
\t<table class=\"table table-striped\">
\t\t<thead>
\t\t\t<tr>
\t\t\t\t<th scope=\"col\">ID</th>
\t\t\t\t<th scope=\"col\">Code</th>
\t\t\t\t<th scope=\"col\">Intitulé</th>
\t\t\t\t<th scope=\"col\">Prix</th>
\t\t\t\t<th scope=\"col\">Date de début</th>
\t\t\t\t<th scope=\"col\">Date de fin</th>
\t\t\t\t<th scope=\"col\">Créée le :
\t\t\t\t</th>
\t\t\t\t<th scope=\"col\">Modifiée le :</th>
\t\t\t\t<th scope=\"col\">Actions</th>
\t\t\t</tr>
\t\t</thead>
\t\t<tbody>
\t\t\t";
        // line 35
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["offres"]) || array_key_exists("offres", $context) ? $context["offres"] : (function () { throw new RuntimeError('Variable "offres" does not exist.', 35, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["offre"]) {
            // line 36
            yield "\t\t\t\t<tr>
\t\t\t\t\t<td class=\"text-right\">";
            // line 37
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["offre"], "id", [], "any", false, false, false, 37), "html", null, true);
            yield "</td>
\t\t\t\t\t<td class=\"text-right\">";
            // line 38
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["offre"], "code", [], "any", false, false, false, 38), "html", null, true);
            yield "</td>
\t\t\t\t\t<td>
\t\t\t\t\t\t<strong>";
            // line 40
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["offre"], "intitule", [], "any", false, false, false, 40), "html", null, true);
            yield "</strong>
\t\t\t\t\t</td>
\t\t\t\t\t<td>";
            // line 42
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["offre"], "prix", [], "any", false, false, false, 42), "html", null, true);
            yield "</td>
\t\t\t\t\t<td class='date-italic'>";
            // line 43
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["offre"], "dateDebut", [], "any", false, false, false, 43)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["offre"], "dateDebut", [], "any", false, false, false, 43), "d/m/Y H:i"), "html", null, true)) : ("N/A"));
            yield "</td>
\t\t\t\t\t<td class='date-italic'>";
            // line 44
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["offre"], "dateFin", [], "any", false, false, false, 44)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["offre"], "dateFin", [], "any", false, false, false, 44), "d/m/Y H:i"), "html", null, true)) : ("N/A"));
            yield "</td>
\t\t\t\t\t<td class='date-italic muted'>";
            // line 45
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["offre"], "createdAt", [], "any", false, false, false, 45)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["offre"], "createdAt", [], "any", false, false, false, 45), "d/m/Y H:i"), "html", null, true)) : ("N/A"));
            yield "</td>
\t\t\t\t\t<td class='date-italic muted'>";
            // line 46
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["offre"], "updatedAt", [], "any", false, false, false, 46)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["offre"], "updatedAt", [], "any", false, false, false, 46), "d/m/Y H:i"), "html", null, true)) : ("N/A"));
            yield "</td>
\t\t\t\t\t<td>
\t\t\t\t\t\t<a href=\"";
            // line 48
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_offres_edit", ["slug" => CoreExtension::getAttribute($this->env, $this->source, $context["offre"], "slug", [], "any", false, false, false, 48)]), "html", null, true);
            yield "\" class=\"btn btn-sm btn-primary\">
\t\t\t\t\t\t\t<i class=\"fa-solid fa-pen-to-square\"></i>
\t\t\t\t\t\t</a>
\t\t\t\t\t\t<a href=\"#\" class=\"btn btn-sm btn-danger\">
\t\t\t\t\t\t\t<i class=\"fa-solid fa-trash-can\"></i>
\t\t\t\t\t\t</a>
\t\t\t\t\t</td>
\t\t\t\t</tr>
\t\t\t";
            $context['_iterated'] = true;
        }
        // line 56
        if (!$context['_iterated']) {
            // line 57
            yield "\t\t\t\t<tr>
\t\t\t\t\t<td colspan=\"6\" class=\"text-center\">Aucune offre disponible.</td>
\t\t\t\t</tr>
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['offre'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 61
        yield "\t\t</tbody>
\t</table>


\t";
        // line 66
        yield "\t<div class=\"navigation\">";
        yield $this->env->getRuntime('Knp\Bundle\PaginatorBundle\Twig\Extension\PaginationRuntime')->render($this->env, (isset($context["offres"]) || array_key_exists("offres", $context) ? $context["offres"] : (function () { throw new RuntimeError('Variable "offres" does not exist.', 66, $this->source); })()));
        yield "
\t</div>


";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 71
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

        // line 72
        yield "\t<link rel=\"stylesheet\" href=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/css/table.css"), "html", null, true);
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
        return "admin/offres/index.html.twig";
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
        return array (  240 => 72,  227 => 71,  210 => 66,  204 => 61,  195 => 57,  193 => 56,  180 => 48,  175 => 46,  171 => 45,  167 => 44,  163 => 43,  159 => 42,  154 => 40,  149 => 38,  145 => 37,  142 => 36,  137 => 35,  118 => 18,  115 => 16,  112 => 13,  107 => 10,  102 => 7,  89 => 6,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Gestion des offres
{% endblock %}

{% block body %}

\t<h1 class=\"text-center\">
\t\t<i class=\"fa-solid fa-clipboard-list\"></i>Gestion des offres</h1>
\t<a href=\"{{path('app_offres_new')}}\" class=\"btn btn-success\">
\t\t<i class=\"fa-solid fa-circle-plus\"></i>Ajouter une nouvelle offre</a>
\t{# Compteur offres et pages #}

\t{# {% set start = (offres.currentPageNumber - 1) * offres.itemNumberPerPage + 1 %}
\t\t\t\t\t\t\t\t{% set end = (offres.currentPageNumber * offres.itemNumberPerPage) > offres.getTotalItemCount ? offres.getTotalItemCount : (offres.currentPageNumber * offres.itemNumberPerPage) %} #}
\t<div
\t\tclass=\"current-range\">{# Afficher {{ start }} à {{ end }} sur {{ offres.getTotalItemCount }} #}
\t</div>
\t<table class=\"table table-striped\">
\t\t<thead>
\t\t\t<tr>
\t\t\t\t<th scope=\"col\">ID</th>
\t\t\t\t<th scope=\"col\">Code</th>
\t\t\t\t<th scope=\"col\">Intitulé</th>
\t\t\t\t<th scope=\"col\">Prix</th>
\t\t\t\t<th scope=\"col\">Date de début</th>
\t\t\t\t<th scope=\"col\">Date de fin</th>
\t\t\t\t<th scope=\"col\">Créée le :
\t\t\t\t</th>
\t\t\t\t<th scope=\"col\">Modifiée le :</th>
\t\t\t\t<th scope=\"col\">Actions</th>
\t\t\t</tr>
\t\t</thead>
\t\t<tbody>
\t\t\t{% for offre in offres %}
\t\t\t\t<tr>
\t\t\t\t\t<td class=\"text-right\">{{ offre.id }}</td>
\t\t\t\t\t<td class=\"text-right\">{{ offre.code }}</td>
\t\t\t\t\t<td>
\t\t\t\t\t\t<strong>{{ offre.intitule }}</strong>
\t\t\t\t\t</td>
\t\t\t\t\t<td>{{ offre.prix }}</td>
\t\t\t\t\t<td class='date-italic'>{{ offre.dateDebut ? offre.dateDebut|date('d/m/Y H:i') : 'N/A' }}</td>
\t\t\t\t\t<td class='date-italic'>{{ offre.dateFin ? offre.dateFin|date('d/m/Y H:i') : 'N/A' }}</td>
\t\t\t\t\t<td class='date-italic muted'>{{ offre.createdAt ? offre.createdAt|date('d/m/Y H:i') : 'N/A' }}</td>
\t\t\t\t\t<td class='date-italic muted'>{{ offre.updatedAt ? offre.updatedAt|date('d/m/Y H:i') : 'N/A' }}</td>
\t\t\t\t\t<td>
\t\t\t\t\t\t<a href=\"{{ path('app_offres_edit', { slug: offre.slug }) }}\" class=\"btn btn-sm btn-primary\">
\t\t\t\t\t\t\t<i class=\"fa-solid fa-pen-to-square\"></i>
\t\t\t\t\t\t</a>
\t\t\t\t\t\t<a href=\"#\" class=\"btn btn-sm btn-danger\">
\t\t\t\t\t\t\t<i class=\"fa-solid fa-trash-can\"></i>
\t\t\t\t\t\t</a>
\t\t\t\t\t</td>
\t\t\t\t</tr>
\t\t\t{% else %}
\t\t\t\t<tr>
\t\t\t\t\t<td colspan=\"6\" class=\"text-center\">Aucune offre disponible.</td>
\t\t\t\t</tr>
\t\t\t{% endfor %}
\t\t</tbody>
\t</table>


\t{# Affiche la  navigation #}
\t<div class=\"navigation\">{{ knp_pagination_render(offres) }}
\t</div>


{% endblock %}
{% block stylesheets %}
\t<link rel=\"stylesheet\" href=\"{{ asset('assets/css/table.css') }}\">
{% endblock %}
", "admin/offres/index.html.twig", "/var/www/symfony/templates/admin/offres/index.html.twig");
    }
}
