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
class __TwigTemplate_b8546b2acaa5e409163a1a3d73ae5001 extends Template
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
        yield "\tCommande
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
        yield "\t<main>
\t\t<h1 class=\"text-center\">
\t\t\tDétails de la commande
\t\t\t";
        // line 9
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 9, $this->source); })()), "reference", [], "any", false, false, false, 9), "html", null, true);
        yield "<br>
\t\t\tle
\t\t\t";
        // line 11
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 11, $this->source); })()), "createdAt", [], "any", false, false, false, 11), "d-m-Y à H:i:s"), "html", null, true);
        yield "
\t\t</h1>
\t\t<table>
\t\t\t<thead>
\t\t\t\t<th>Etat</th>
\t\t\t\t<th>Intitule</th>
\t\t\t\t<th>Total ligne</th>
\t\t\t</thead>
\t\t\t<tbody>
\t\t\t\t";
        // line 20
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 20, $this->source); })()), "detailsCommandes", [], "any", false, false, false, 20));
        foreach ($context['_seq'] as $context["_key"] => $context["ligne"]) {
            // line 21
            yield "\t\t\t\t\t<tr>
\t\t\t\t\t\t<td>";
            // line 22
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["ligne"], "offres", [], "any", false, false, false, 22), "intitule", [], "any", false, false, false, 22), "html", null, true);
            yield "</td>
\t\t\t\t\t\t<td class=\"text-right\">";
            // line 23
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["ligne"], "prix", [], "any", false, false, false, 23), "html", null, true);
            yield "€</td>
\t\t\t\t\t</tr>
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['ligne'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 26
        yield "\t\t\t\t<tr>
\t\t\t\t\t<td>Total</td>
\t\t\t\t\t<td class=\"text-right\">
\t\t\t\t\t\t<strong>";
        // line 29
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 29, $this->source); })()), "totalCommande", [], "any", false, false, false, 29), "html", null, true);
        yield "€</strong>
\t\t\t\t\t</td>
\t\t\t\t</tr>
\t\t\t</tbody>
\t\t\t<tr>
\t\t\t\t";
        // line 34
        if ((null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 34, $this->source); })()), "payeeLe", [], "any", false, false, false, 34))) {
            // line 35
            yield "\t\t\t\t\t<td class=\"text-red\">En attente de paiement
\t\t\t\t\t</td>
\t\t\t\t\t<td>
\t\t\t\t\t\t<a href=\"#\" class=\"btn btn-primary\">
\t\t\t\t\t\t\t<i class=\"fa-regular fa-credit-card\"></i>Procéder au paiement</a>
\t\t\t\t\t</td>

\t\t\t\t";
        } else {
            // line 43
            yield "\t\t\t\t\t<td>
\t\t\t\t\t\t<p class=\"text-green\">
\t\t\t\t\t\t\t<i class=\"fa-regular fa-circle-check\"></i>Payée le
\t\t\t\t\t\t\t";
            // line 46
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 46, $this->source); })()), "payeeLe", [], "any", false, false, false, 46), "d/m/Y H:i"), "html", null, true);
            yield "</p>
\t\t\t\t\t</td>
\t\t\t\t";
        }
        // line 49
        yield "\t\t\t</tr>

\t\t</table>
\t</main>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 54
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
        return array (  196 => 54,  181 => 49,  175 => 46,  170 => 43,  160 => 35,  158 => 34,  150 => 29,  145 => 26,  136 => 23,  132 => 22,  129 => 21,  125 => 20,  113 => 11,  108 => 9,  103 => 6,  90 => 5,  78 => 3,  65 => 2,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}
{% block title %}
\tCommande
{% endblock %}
{% block body %}
\t<main>
\t\t<h1 class=\"text-center\">
\t\t\tDétails de la commande
\t\t\t{{commande.reference}}<br>
\t\t\tle
\t\t\t{{commande.createdAt|date(\"d-m-Y à H:i:s\")}}
\t\t</h1>
\t\t<table>
\t\t\t<thead>
\t\t\t\t<th>Etat</th>
\t\t\t\t<th>Intitule</th>
\t\t\t\t<th>Total ligne</th>
\t\t\t</thead>
\t\t\t<tbody>
\t\t\t\t{% for ligne in commande.detailsCommandes %}
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td>{{ligne.offres.intitule}}</td>
\t\t\t\t\t\t<td class=\"text-right\">{{ligne.prix}}€</td>
\t\t\t\t\t</tr>
\t\t\t\t{% endfor %}
\t\t\t\t<tr>
\t\t\t\t\t<td>Total</td>
\t\t\t\t\t<td class=\"text-right\">
\t\t\t\t\t\t<strong>{{commande.totalCommande}}€</strong>
\t\t\t\t\t</td>
\t\t\t\t</tr>
\t\t\t</tbody>
\t\t\t<tr>
\t\t\t\t{% if commande.payeeLe is null %}
\t\t\t\t\t<td class=\"text-red\">En attente de paiement
\t\t\t\t\t</td>
\t\t\t\t\t<td>
\t\t\t\t\t\t<a href=\"#\" class=\"btn btn-primary\">
\t\t\t\t\t\t\t<i class=\"fa-regular fa-credit-card\"></i>Procéder au paiement</a>
\t\t\t\t\t</td>

\t\t\t\t{% else %}
\t\t\t\t\t<td>
\t\t\t\t\t\t<p class=\"text-green\">
\t\t\t\t\t\t\t<i class=\"fa-regular fa-circle-check\"></i>Payée le
\t\t\t\t\t\t\t{{commande.payeeLe|date('d/m/Y H:i')}}</p>
\t\t\t\t\t</td>
\t\t\t\t{% endif %}
\t\t\t</tr>

\t\t</table>
\t</main>
{% endblock %}
{% block stylesheets %}<link rel=\"stylesheet\" href=\"{{asset('assets/css/table.css')}}\">
{% endblock %}
", "commandes/show.html.twig", "/var/www/symfony/templates/commandes/show.html.twig");
    }
}
