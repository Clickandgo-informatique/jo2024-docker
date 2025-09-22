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

/* _partials/_sports-filter.html.twig */
class __TwigTemplate_519dbc4f8ebeb174bc0f87f1b05d993b extends Template
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
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "_partials/_sports-filter.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "_partials/_sports-filter.html.twig"));

        // line 2
        yield "<div id=\"sports-filter\" class=\"sports-filter\" data-base-url=\"";
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_offres_filter");
        yield "\">
\t<h5 class=\"mb-2\">Filtrer par sport(s)</h5>
\t<div class=\"sports-checkboxes\">
\t\t";
        // line 5
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["sports"]) || array_key_exists("sports", $context) ? $context["sports"] : (function () { throw new RuntimeError('Variable "sports" does not exist.', 5, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["sport"]) {
            // line 6
            yield "\t\t\t<label class=\"sport-option\">
\t\t\t\t<input type=\"checkbox\" value=\"";
            // line 7
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["sport"], "slug", [], "any", false, false, false, 7), "html", null, true);
            yield "\" ";
            if ((array_key_exists("selectedSlugs", $context) && CoreExtension::inFilter(CoreExtension::getAttribute($this->env, $this->source, $context["sport"], "slug", [], "any", false, false, false, 7), (isset($context["selectedSlugs"]) || array_key_exists("selectedSlugs", $context) ? $context["selectedSlugs"] : (function () { throw new RuntimeError('Variable "selectedSlugs" does not exist.', 7, $this->source); })())))) {
                yield " checked ";
            }
            yield ">

\t\t\t\t<span>";
            // line 9
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["sport"], "emoji", [], "any", false, false, false, 9), "html", null, true);
            yield "
\t\t\t\t\t";
            // line 10
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["sport"], "intitule", [], "any", false, false, false, 10), "html", null, true);
            yield "</span>
\t\t\t</label>
\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['sport'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 13
        yield "\t</div>
</div>
";
        // line 15
        yield from $this->unwrap()->yieldBlock('javascripts', $context, $blocks);
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_javascripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 16
        yield "\t<script type=\"module\" src=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/filters.js"), "html", null, true);
        yield "\"></script>
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
        return "_partials/_sports-filter.html.twig";
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
        return array (  112 => 16,  89 => 15,  85 => 13,  76 => 10,  72 => 9,  63 => 7,  60 => 6,  56 => 5,  49 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# templates/_partials/_sports-filter.html.twig #}
<div id=\"sports-filter\" class=\"sports-filter\" data-base-url=\"{{ path('app_offres_filter') }}\">
\t<h5 class=\"mb-2\">Filtrer par sport(s)</h5>
\t<div class=\"sports-checkboxes\">
\t\t{% for sport in sports %}
\t\t\t<label class=\"sport-option\">
\t\t\t\t<input type=\"checkbox\" value=\"{{ sport.slug }}\" {% if selectedSlugs is defined and sport.slug in selectedSlugs %} checked {% endif %}>

\t\t\t\t<span>{{sport.emoji}}
\t\t\t\t\t{{ sport.intitule }}</span>
\t\t\t</label>
\t\t{% endfor %}
\t</div>
</div>
{% block javascripts %}
\t<script type=\"module\" src=\"{{asset('assets/js/filters.js')}}\"></script>
{% endblock %}
", "_partials/_sports-filter.html.twig", "/var/www/symfony/templates/_partials/_sports-filter.html.twig");
    }
}
