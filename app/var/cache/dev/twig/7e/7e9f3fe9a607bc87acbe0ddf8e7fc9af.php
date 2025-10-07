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

/* commandes/show.html.twig */
class __TwigTemplate_24ff1e2933818bd7a5c4ce2cc6b37d44 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "commandes/show.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "commandes/show.html.twig"));

        $this->parent = $this->load("base.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 2
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

        // line 3
        yield "\tPayer une commande
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
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

        // line 6
        yield "
\t<a href=\"";
        // line 7
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_offres_catalogue");
        yield "\" class=\"btn btn-primary text-center\">
\t\t<i class=\"fa-solid fa-list\"></i>
\t\tRevenir à la liste d'offres
\t</a>
\t<p class=\"text-center text-blue\">
\t\tDétails de la commande
\t\t";
        // line 13
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 13, $this->source); })()), "reference", [], "any", false, false, false, 13), "html", null, true);
        yield "<br>
\t\tdu
\t\t";
        // line 15
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 15, $this->source); })()), "createdAt", [], "any", false, false, false, 15), "d-m-Y à H:i:s"), "html", null, true);
        yield "
\t</p>
\t<table>
\t\t<thead>
\t\t\t<th>Intitule</th>
\t\t\t<th>Description</th>
\t\t\t<th class=\"text-right\">Total ligne</th>
\t\t</thead>
\t\t<tbody>
\t\t\t";
        // line 24
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 24, $this->source); })()), "detailsCommandes", [], "any", false, false, false, 24));
        foreach ($context['_seq'] as $context["_key"] => $context["ligne"]) {
            // line 25
            yield "\t\t\t\t<tr>
\t\t\t\t\t<td>";
            // line 26
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["ligne"], "offres", [], "any", false, false, false, 26), "sports", [], "any", false, false, false, 26), 0, [], "array", false, false, false, 26), "emoji", [], "any", false, false, false, 26), "html", null, true);
            yield "&nbsp;
\t\t\t\t\t\t";
            // line 27
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["ligne"], "offres", [], "any", false, false, false, 27), "intitule", [], "any", false, false, false, 27), "html", null, true);
            yield "</td>
\t\t\t\t\t<td>";
            // line 28
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["ligne"], "offres", [], "any", false, false, false, 28), "description", [], "any", false, false, false, 28), "html", null, true);
            yield "</td>
\t\t\t\t\t<td class=\"text-right\">";
            // line 29
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["ligne"], "prix", [], "any", false, false, false, 29), "html", null, true);
            yield "€</td>
\t\t\t\t</tr>
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['ligne'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 32
        yield "\t\t\t<tr>
\t\t\t\t<td class=\"text-right\" colspan=\"2\">Total</td>
\t\t\t\t<td class=\"text-right\" colspan=\"3\">
\t\t\t\t\t<strong>";
        // line 35
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 35, $this->source); })()), "totalCommande", [], "any", false, false, false, 35), "html", null, true);
        yield "€</strong>
\t\t\t\t</td>
\t\t\t</tr>
\t\t</tbody>
\t\t<tr>
\t\t\t";
        // line 40
        if ((null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 40, $this->source); })()), "payeeLe", [], "any", false, false, false, 40))) {
            // line 41
            yield "\t\t\t\t<td class=\"text-red\">En attente de paiement</td>
\t\t\t\t<td>
\t\t\t\t\t<a href=\"";
            // line 43
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_paiement_commande", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 43, $this->source); })()), "id", [], "any", false, false, false, 43)]), "html", null, true);
            yield "\" class=\"btn btn-primary\">
\t\t\t\t\t\t<i class=\"fa-regular fa-credit-card\"></i>Procéder au paiement</a>
\t\t\t\t</td>
\t\t\t\t<td>
\t\t\t\t\t";
            // line 48
            yield "\t\t\t\t\t<form action=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_commandes_supprimer", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 48, $this->source); })()), "id", [], "any", false, false, false, 48)]), "html", null, true);
            yield "\" method=\"post\" onsubmit=\"return confirm('Confirmer la suppression ?');\">
\t\t\t\t\t\t<input type=\"hidden\" name=\"_token\" value=\"";
            // line 49
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 49, $this->source); })()), "id", [], "any", false, false, false, 49))), "html", null, true);
            yield "\">
\t\t\t\t\t\t<button type=\"submit\" class=\"btn-action btn-danger btn-delete\">
\t\t\t\t\t\t\t<i class=\"fa-solid fa-trash-can\"></i>Annuler la commande
\t\t\t\t\t\t</button>
\t\t\t\t\t</form>
\t\t\t\t</td>
\t\t\t";
        } else {
            // line 56
            yield "\t\t\t\t<td>
\t\t\t\t\t<p class=\"text-green\">
\t\t\t\t\t\t<i class=\"fa-regular fa-circle-check\"></i>Payée le
\t\t\t\t\t\t";
            // line 59
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 59, $this->source); })()), "payeeLe", [], "any", false, false, false, 59), "d/m/Y H:i"), "html", null, true);
            yield "</p>
\t\t\t\t</td>
\t\t\t";
        }
        // line 62
        yield "\t\t</tr>

\t</table>

";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 67
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

        yield "<link rel=\"stylesheet\" href=\"";
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
        return "commandes/show.html.twig";
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
        return array (  227 => 67,  212 => 62,  206 => 59,  201 => 56,  191 => 49,  186 => 48,  179 => 43,  175 => 41,  173 => 40,  165 => 35,  160 => 32,  151 => 29,  147 => 28,  143 => 27,  139 => 26,  136 => 25,  132 => 24,  120 => 15,  115 => 13,  106 => 7,  103 => 6,  90 => 5,  78 => 3,  65 => 2,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}
{% block title %}
\tPayer une commande
{% endblock %}
{% block body %}

\t<a href=\"{{ path('app_offres_catalogue') }}\" class=\"btn btn-primary text-center\">
\t\t<i class=\"fa-solid fa-list\"></i>
\t\tRevenir à la liste d'offres
\t</a>
\t<p class=\"text-center text-blue\">
\t\tDétails de la commande
\t\t{{commande.reference}}<br>
\t\tdu
\t\t{{commande.createdAt|date(\"d-m-Y à H:i:s\")}}
\t</p>
\t<table>
\t\t<thead>
\t\t\t<th>Intitule</th>
\t\t\t<th>Description</th>
\t\t\t<th class=\"text-right\">Total ligne</th>
\t\t</thead>
\t\t<tbody>
\t\t\t{% for ligne in commande.detailsCommandes %}
\t\t\t\t<tr>
\t\t\t\t\t<td>{{ligne.offres.sports[0].emoji}}&nbsp;
\t\t\t\t\t\t{{ligne.offres.intitule}}</td>
\t\t\t\t\t<td>{{ligne.offres.description}}</td>
\t\t\t\t\t<td class=\"text-right\">{{ligne.prix}}€</td>
\t\t\t\t</tr>
\t\t\t{% endfor %}
\t\t\t<tr>
\t\t\t\t<td class=\"text-right\" colspan=\"2\">Total</td>
\t\t\t\t<td class=\"text-right\" colspan=\"3\">
\t\t\t\t\t<strong>{{commande.totalCommande}}€</strong>
\t\t\t\t</td>
\t\t\t</tr>
\t\t</tbody>
\t\t<tr>
\t\t\t{% if commande.payeeLe is null %}
\t\t\t\t<td class=\"text-red\">En attente de paiement</td>
\t\t\t\t<td>
\t\t\t\t\t<a href=\"{{path('app_paiement_commande',{id:commande.id})}}\" class=\"btn btn-primary\">
\t\t\t\t\t\t<i class=\"fa-regular fa-credit-card\"></i>Procéder au paiement</a>
\t\t\t\t</td>
\t\t\t\t<td>
\t\t\t\t\t{# Formulaire de suppression de commande #}
\t\t\t\t\t<form action=\"{{ path('app_commandes_supprimer', { id: commande.id }) }}\" method=\"post\" onsubmit=\"return confirm('Confirmer la suppression ?');\">
\t\t\t\t\t\t<input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ commande.id) }}\">
\t\t\t\t\t\t<button type=\"submit\" class=\"btn-action btn-danger btn-delete\">
\t\t\t\t\t\t\t<i class=\"fa-solid fa-trash-can\"></i>Annuler la commande
\t\t\t\t\t\t</button>
\t\t\t\t\t</form>
\t\t\t\t</td>
\t\t\t{% else %}
\t\t\t\t<td>
\t\t\t\t\t<p class=\"text-green\">
\t\t\t\t\t\t<i class=\"fa-regular fa-circle-check\"></i>Payée le
\t\t\t\t\t\t{{commande.payeeLe|date('d/m/Y H:i')}}</p>
\t\t\t\t</td>
\t\t\t{% endif %}
\t\t</tr>

\t</table>

{% endblock %}
{% block stylesheets %}<link rel=\"stylesheet\" href=\"{{asset('assets/css/table.css')}}\">
{% endblock %}
", "commandes/show.html.twig", "/var/www/symfony/templates/commandes/show.html.twig");
    }
}
