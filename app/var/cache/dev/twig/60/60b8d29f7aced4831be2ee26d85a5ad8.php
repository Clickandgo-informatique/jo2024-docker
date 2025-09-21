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

/* _partials/_catalogue-offres-ajax-wrapper.html.twig */
class __TwigTemplate_7283f3824a20e9ea30ec38c2faaa2fbd extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "_partials/_catalogue-offres-ajax-wrapper.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "_partials/_catalogue-offres-ajax-wrapper.html.twig"));

        // line 2
        yield "
";
        // line 3
        $context["paginationData"] = CoreExtension::getAttribute($this->env, $this->source, (isset($context["offres"]) || array_key_exists("offres", $context) ? $context["offres"] : (function () { throw new RuntimeError('Variable "offres" does not exist.', 3, $this->source); })()), "getPaginationData", [], "any", false, false, false, 3);
        // line 4
        $context["start"] = (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["paginationData"]) || array_key_exists("paginationData", $context) ? $context["paginationData"] : (function () { throw new RuntimeError('Variable "paginationData" does not exist.', 4, $this->source); })()), "current", [], "any", false, false, false, 4) - 1) * CoreExtension::getAttribute($this->env, $this->source, (isset($context["paginationData"]) || array_key_exists("paginationData", $context) ? $context["paginationData"] : (function () { throw new RuntimeError('Variable "paginationData" does not exist.', 4, $this->source); })()), "numItemsPerPage", [], "any", false, false, false, 4)) + 1);
        // line 5
        $context["end"] = (((isset($context["start"]) || array_key_exists("start", $context) ? $context["start"] : (function () { throw new RuntimeError('Variable "start" does not exist.', 5, $this->source); })()) + Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["offres"]) || array_key_exists("offres", $context) ? $context["offres"] : (function () { throw new RuntimeError('Variable "offres" does not exist.', 5, $this->source); })()))) - 1);
        // line 6
        $context["total"] = CoreExtension::getAttribute($this->env, $this->source, (isset($context["offres"]) || array_key_exists("offres", $context) ? $context["offres"] : (function () { throw new RuntimeError('Variable "offres" does not exist.', 6, $this->source); })()), "getTotalItemCount", [], "any", false, false, false, 6);
        // line 7
        yield "
";
        // line 9
        yield "<div class=\"offres-counter\">
    Affichage <strong>";
        // line 10
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["start"]) || array_key_exists("start", $context) ? $context["start"] : (function () { throw new RuntimeError('Variable "start" does not exist.', 10, $this->source); })()), "html", null, true);
        yield "–";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["end"]) || array_key_exists("end", $context) ? $context["end"] : (function () { throw new RuntimeError('Variable "end" does not exist.', 10, $this->source); })()), "html", null, true);
        yield "</strong>
    sur <strong>";
        // line 11
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["total"]) || array_key_exists("total", $context) ? $context["total"] : (function () { throw new RuntimeError('Variable "total" does not exist.', 11, $this->source); })()), "html", null, true);
        yield "</strong>
    offre";
        // line 12
        yield ((((isset($context["total"]) || array_key_exists("total", $context) ? $context["total"] : (function () { throw new RuntimeError('Variable "total" does not exist.', 12, $this->source); })()) > 1)) ? ("s") : (""));
        yield "
</div>

";
        // line 16
        yield "<div class=\"offers-grid\">
    ";
        // line 17
        yield from $this->load("_partials/_catalogue-offres-clients.html.twig", 17)->unwrap()->yield(CoreExtension::toArray(["offres" => (isset($context["offres"]) || array_key_exists("offres", $context) ? $context["offres"] : (function () { throw new RuntimeError('Variable "offres" does not exist.', 17, $this->source); })())]));
        // line 18
        yield "</div>

";
        // line 21
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["offres"]) || array_key_exists("offres", $context) ? $context["offres"] : (function () { throw new RuntimeError('Variable "offres" does not exist.', 21, $this->source); })()), "pageCount", [], "any", false, false, false, 21) > 1)) {
            // line 22
            yield "    <div class=\"pagination-container\">
        ";
            // line 23
            yield from $this->load("_partials/_pagination-offres.html.twig", 23)->unwrap()->yield(CoreExtension::toArray(["offres" => (isset($context["offres"]) || array_key_exists("offres", $context) ? $context["offres"] : (function () { throw new RuntimeError('Variable "offres" does not exist.', 23, $this->source); })())]));
            // line 24
            yield "    </div>
";
        }
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "_partials/_catalogue-offres-ajax-wrapper.html.twig";
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
        return array (  97 => 24,  95 => 23,  92 => 22,  90 => 21,  86 => 18,  84 => 17,  81 => 16,  75 => 12,  71 => 11,  65 => 10,  62 => 9,  59 => 7,  57 => 6,  55 => 5,  53 => 4,  51 => 3,  48 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# _partials/_catalogue-offres-ajax-wrapper.html.twig #}

{% set paginationData = offres.getPaginationData %}
{% set start = (paginationData.current - 1) * paginationData.numItemsPerPage + 1 %}
{% set end = start + offres|length - 1 %}
{% set total = offres.getTotalItemCount %}

{# Compteur au-dessus de la grille #}
<div class=\"offres-counter\">
    Affichage <strong>{{ start }}–{{ end }}</strong>
    sur <strong>{{ total }}</strong>
    offre{{ total > 1 ? 's' : '' }}
</div>

{# La grille avec uniquement les cards #}
<div class=\"offers-grid\">
    {% include '_partials/_catalogue-offres-clients.html.twig' with { 'offres': offres } only %}
</div>

{# Pagination en dessous de la grille #}
{% if offres.pageCount > 1 %}
    <div class=\"pagination-container\">
        {% include '_partials/_pagination-offres.html.twig' with { 'offres': offres } only %}
    </div>
{% endif %}
", "_partials/_catalogue-offres-ajax-wrapper.html.twig", "/var/www/symfony/templates/_partials/_catalogue-offres-ajax-wrapper.html.twig");
    }
}
