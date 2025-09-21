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
class __TwigTemplate_2565a0c48c728e17518c4e5138ed0056 extends Template
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
        // line 11
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_offres_new");
        yield "\" class=\"btn btn-success\">
\t\t<i class=\"fa-solid fa-circle-plus\"></i>Ajouter une nouvelle offre</a>
\t";
        // line 14
        yield "
\t";
        // line 17
        yield "\t<div
\t\tclass=\"current-range\">";
        // line 19
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
        // line 36
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["offres"]) || array_key_exists("offres", $context) ? $context["offres"] : (function () { throw new RuntimeError('Variable "offres" does not exist.', 36, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["offre"]) {
            // line 37
            yield "\t\t\t\t<tr>
\t\t\t\t\t<td class=\"text-right\">";
            // line 38
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["offre"], "id", [], "any", false, false, false, 38), "html", null, true);
            yield "</td>
\t\t\t\t\t<td class=\"text-right\">";
            // line 39
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["offre"], "code", [], "any", false, false, false, 39), "html", null, true);
            yield "</td>
\t\t\t\t\t<td>
\t\t\t\t\t\t<strong>";
            // line 41
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["offre"], "intitule", [], "any", false, false, false, 41), "html", null, true);
            yield "</strong>
\t\t\t\t\t</td>
\t\t\t\t\t<td>";
            // line 43
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["offre"], "prix", [], "any", false, false, false, 43), "html", null, true);
            yield "</td>
\t\t\t\t\t<td class='date-italic'>";
            // line 44
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["offre"], "dateDebut", [], "any", false, false, false, 44)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["offre"], "dateDebut", [], "any", false, false, false, 44), "d/m/Y H:i"), "html", null, true)) : ("N/A"));
            yield "</td>
\t\t\t\t\t<td class='date-italic'>";
            // line 45
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["offre"], "dateFin", [], "any", false, false, false, 45)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["offre"], "dateFin", [], "any", false, false, false, 45), "d/m/Y H:i"), "html", null, true)) : ("N/A"));
            yield "</td>
\t\t\t\t\t<td class='date-italic muted'>";
            // line 46
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["offre"], "createdAt", [], "any", false, false, false, 46)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["offre"], "createdAt", [], "any", false, false, false, 46), "d/m/Y H:i"), "html", null, true)) : ("N/A"));
            yield "</td>
\t\t\t\t\t<td class='date-italic muted'>";
            // line 47
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["offre"], "updatedAt", [], "any", false, false, false, 47)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["offre"], "updatedAt", [], "any", false, false, false, 47), "d/m/Y H:i"), "html", null, true)) : ("N/A"));
            yield "</td>
\t\t\t\t\t<td>
\t\t\t\t\t\t<a href=\"";
            // line 49
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_offres_edit", ["slug" => CoreExtension::getAttribute($this->env, $this->source, $context["offre"], "slug", [], "any", false, false, false, 49)]), "html", null, true);
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
        // line 57
        if (!$context['_iterated']) {
            // line 58
            yield "\t\t\t\t<tr>
\t\t\t\t\t<td colspan=\"6\" class=\"text-center\">Aucune offre disponible.</td>
\t\t\t\t</tr>
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['offre'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 62
        yield "\t\t</tbody>
\t</table>


\t";
        // line 67
        yield "\t<div class=\"navigation\">";
        yield $this->env->getRuntime('Knp\Bundle\PaginatorBundle\Twig\Extension\PaginationRuntime')->render($this->env, (isset($context["offres"]) || array_key_exists("offres", $context) ? $context["offres"] : (function () { throw new RuntimeError('Variable "offres" does not exist.', 67, $this->source); })()));
        yield "
\t</div>


";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 72
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

        // line 73
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
        return array (  241 => 73,  228 => 72,  211 => 67,  205 => 62,  196 => 58,  194 => 57,  181 => 49,  176 => 47,  172 => 46,  168 => 45,  164 => 44,  160 => 43,  155 => 41,  150 => 39,  146 => 38,  143 => 37,  138 => 36,  119 => 19,  116 => 17,  113 => 14,  108 => 11,  102 => 7,  89 => 6,  65 => 3,  42 => 1,);
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
\t\t\t\t\t\t\t{% set end = (offres.currentPageNumber * offres.itemNumberPerPage) > offres.getTotalItemCount ? offres.getTotalItemCount : (offres.currentPageNumber * offres.itemNumberPerPage) %} #}
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
