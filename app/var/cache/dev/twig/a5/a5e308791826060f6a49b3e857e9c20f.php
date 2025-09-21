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

/* admin/sports/index.html.twig */
class __TwigTemplate_5192e8b244abf17a9582da556db3eb17 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/sports/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/sports/index.html.twig"));

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
        yield "\tListe des sports
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
\t<H1 class=\"text-center\">Liste des sports sportives</H1>
\t<a href=\"";
        // line 8
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_sports_new");
        yield "\">
\t\t<i class=\"fa-solid fa-circle-plus\"></i>Ajouter une discipline sportive</a>
\t<table>

\t\t<thead>
\t\t\t<th></th>
\t\t\t<th></th>
\t\t\t<th>intitulé</th>
\t\t</thead>
\t\t<tbody>

\t\t\t";
        // line 19
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["sports"]) || array_key_exists("sports", $context) ? $context["sports"] : (function () { throw new RuntimeError('Variable "sports" does not exist.', 19, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["d"]) {
            // line 20
            yield "\t\t\t\t<tr>
\t\t\t\t\t<td class=\"text-center\">
\t\t\t\t\t\t<a href=\"";
            // line 22
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_sports_edit", ["slug" => CoreExtension::getAttribute($this->env, $this->source, $context["d"], "slug", [], "any", false, false, false, 22)]), "html", null, true);
            yield "\">
\t\t\t\t\t\t\t<i class=\"fa-solid fa-pen-to-square\"></i>
\t\t\t\t\t\t</a>
\t\t\t\t\t</td>
\t\t\t\t\t<td class=\"text-center\">
\t\t\t\t\t\t<a href=\"#\">
\t\t\t\t\t\t\t<i class=\"fa-solid fa-trash-can\"></i>
\t\t\t\t\t\t</a>
\t\t\t\t\t</td>
\t\t\t\t\t<td>";
            // line 31
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["d"], "intitule", [], "any", false, false, false, 31), "html", null, true);
            yield "</td>
\t\t\t\t</tr>
\t\t\t";
            $context['_iterated'] = true;
        }
        // line 33
        if (!$context['_iterated']) {
            // line 34
            yield "\t\t\t\t<p>Il n'existe encore aucune discipline sportive enregistrée dans la base.</p>
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['d'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 36
        yield "\t\t</tbody>
\t</table>

";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 40
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

        // line 41
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
        return "admin/sports/index.html.twig";
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
        return array (  185 => 41,  172 => 40,  158 => 36,  151 => 34,  149 => 33,  142 => 31,  130 => 22,  126 => 20,  121 => 19,  107 => 8,  103 => 6,  90 => 5,  78 => 3,  65 => 2,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}
{% block title %}
\tListe des sports
{% endblock %}
{% block body %}

\t<H1 class=\"text-center\">Liste des sports sportives</H1>
\t<a href=\"{{path('app_sports_new')}}\">
\t\t<i class=\"fa-solid fa-circle-plus\"></i>Ajouter une discipline sportive</a>
\t<table>

\t\t<thead>
\t\t\t<th></th>
\t\t\t<th></th>
\t\t\t<th>intitulé</th>
\t\t</thead>
\t\t<tbody>

\t\t\t{% for d in sports %}
\t\t\t\t<tr>
\t\t\t\t\t<td class=\"text-center\">
\t\t\t\t\t\t<a href=\"{{path('app_sports_edit',{slug:d.slug})}}\">
\t\t\t\t\t\t\t<i class=\"fa-solid fa-pen-to-square\"></i>
\t\t\t\t\t\t</a>
\t\t\t\t\t</td>
\t\t\t\t\t<td class=\"text-center\">
\t\t\t\t\t\t<a href=\"#\">
\t\t\t\t\t\t\t<i class=\"fa-solid fa-trash-can\"></i>
\t\t\t\t\t\t</a>
\t\t\t\t\t</td>
\t\t\t\t\t<td>{{d.intitule}}</td>
\t\t\t\t</tr>
\t\t\t{% else %}
\t\t\t\t<p>Il n'existe encore aucune discipline sportive enregistrée dans la base.</p>
\t\t\t{% endfor %}
\t\t</tbody>
\t</table>

{% endblock %}
{% block stylesheets %}
\t<link rel=\"stylesheet\" href=\"{{asset('assets/css/table.css')}}\">
{% endblock %}
", "admin/sports/index.html.twig", "/var/www/symfony/templates/admin/sports/index.html.twig");
    }
}
