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
class __TwigTemplate_bd478c8eb62440370db9eb207a717ad6 extends Template
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
        yield "    Liste des sports
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
<h1 class=\"text-center\">Liste des disciplines sportives</h1>
<a href=\"";
        // line 8
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_sports_new");
        yield "\" class=\"btn btn-primary\">
    <i class=\"fa-solid fa-circle-plus\"></i> Ajouter une discipline sportive
</a>

<div class=\"table-container\">
    <div class=\"table-header flex\">
        <div class=\"cell flex-1\">Modifier</div>
        <div class=\"cell flex-1\">Supprimer</div>
        <div class=\"cell flex-3\">Intitulé</div>
    </div>

    ";
        // line 19
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["sports"]) || array_key_exists("sports", $context) ? $context["sports"] : (function () { throw new RuntimeError('Variable "sports" does not exist.', 19, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["d"]) {
            // line 20
            yield "        <div class=\"table-row flex\">
            <div class=\"cell flex-1 text-center\">
                <a href=\"";
            // line 22
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_sports_edit", ["slug" => CoreExtension::getAttribute($this->env, $this->source, $context["d"], "slug", [], "any", false, false, false, 22)]), "html", null, true);
            yield "\" class=\"btn btn-open\">
                    <i class=\"fa-solid fa-pen-to-square\"></i>
                </a>
            </div>
            <div class=\"cell flex-1 text-center\">
                <a href=\"#\" class=\"btn btn-delete\">
                    <i class=\"fa-solid fa-trash-can\"></i>
                </a>
            </div>
            <div class=\"cell flex-3\">";
            // line 31
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["d"], "emoji", [], "any", false, false, false, 31), "html", null, true);
            yield " ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["d"], "intitule", [], "any", false, false, false, 31), "html", null, true);
            yield "</div>
        </div>
    ";
            $context['_iterated'] = true;
        }
        // line 33
        if (!$context['_iterated']) {
            // line 34
            yield "        <div class=\"table-row flex\">
            <div class=\"cell\" style=\"flex:1 1 100%;\" colspan=\"3\">
                Il n'existe encore aucune discipline sportive enregistrée dans la base.
            </div>
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['d'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 40
        yield "</div>

";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 44
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

        // line 45
        yield "<link rel=\"stylesheet\" href=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/css/table.css"), "html", null, true);
        yield "\">
<style>
/* Container global */
.table-container {
    width: 100%;
    border-collapse: collapse;
}

/* Flex row */
.flex {
    display: flex;
    align-items: center;
    border-bottom: 1px solid #ddd;
    padding: 0.5rem 0;
}

/* Cellules */
.cell {
    padding: 0.5rem;
}

/* Largeurs flex */
.flex-1 { flex: 1; }
.flex-2 { flex: 2; }
.flex-3 { flex: 3; }

/* Responsive mobile */
@media (max-width: 768px) {
    .flex {
        flex-direction: column;
        align-items: flex-start;
    }
    .cell {
        width: 100%;
        padding-left: 0;
        text-align: left;
    }
}
</style>
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
        return array (  190 => 45,  177 => 44,  164 => 40,  153 => 34,  151 => 33,  142 => 31,  130 => 22,  126 => 20,  121 => 19,  107 => 8,  103 => 6,  90 => 5,  78 => 3,  65 => 2,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}
{% block title %}
    Liste des sports
{% endblock %}
{% block body %}

<h1 class=\"text-center\">Liste des disciplines sportives</h1>
<a href=\"{{ path('app_sports_new') }}\" class=\"btn btn-primary\">
    <i class=\"fa-solid fa-circle-plus\"></i> Ajouter une discipline sportive
</a>

<div class=\"table-container\">
    <div class=\"table-header flex\">
        <div class=\"cell flex-1\">Modifier</div>
        <div class=\"cell flex-1\">Supprimer</div>
        <div class=\"cell flex-3\">Intitulé</div>
    </div>

    {% for d in sports %}
        <div class=\"table-row flex\">
            <div class=\"cell flex-1 text-center\">
                <a href=\"{{ path('app_sports_edit', {slug:d.slug}) }}\" class=\"btn btn-open\">
                    <i class=\"fa-solid fa-pen-to-square\"></i>
                </a>
            </div>
            <div class=\"cell flex-1 text-center\">
                <a href=\"#\" class=\"btn btn-delete\">
                    <i class=\"fa-solid fa-trash-can\"></i>
                </a>
            </div>
            <div class=\"cell flex-3\">{{ d.emoji }} {{ d.intitule }}</div>
        </div>
    {% else %}
        <div class=\"table-row flex\">
            <div class=\"cell\" style=\"flex:1 1 100%;\" colspan=\"3\">
                Il n'existe encore aucune discipline sportive enregistrée dans la base.
            </div>
        </div>
    {% endfor %}
</div>

{% endblock %}

{% block stylesheets %}
<link rel=\"stylesheet\" href=\"{{ asset('assets/css/table.css') }}\">
<style>
/* Container global */
.table-container {
    width: 100%;
    border-collapse: collapse;
}

/* Flex row */
.flex {
    display: flex;
    align-items: center;
    border-bottom: 1px solid #ddd;
    padding: 0.5rem 0;
}

/* Cellules */
.cell {
    padding: 0.5rem;
}

/* Largeurs flex */
.flex-1 { flex: 1; }
.flex-2 { flex: 2; }
.flex-3 { flex: 3; }

/* Responsive mobile */
@media (max-width: 768px) {
    .flex {
        flex-direction: column;
        align-items: flex-start;
    }
    .cell {
        width: 100%;
        padding-left: 0;
        text-align: left;
    }
}
</style>
{% endblock %}
", "admin/sports/index.html.twig", "/var/www/symfony/templates/admin/sports/index.html.twig");
    }
}
