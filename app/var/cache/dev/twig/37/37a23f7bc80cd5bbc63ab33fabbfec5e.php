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

/* _partials/_catalogue-offres-clients.html.twig */
class __TwigTemplate_259b994389174ea6ace970c90196e7d0 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "_partials/_catalogue-offres-clients.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "_partials/_catalogue-offres-clients.html.twig"));

        // line 2
        yield "
";
        // line 3
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["offres"]) || array_key_exists("offres", $context) ? $context["offres"] : (function () { throw new RuntimeError('Variable "offres" does not exist.', 3, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["offre"]) {
            // line 4
            yield "\t<article class=\"offer-card\">
\t\t";
            // line 5
            if (CoreExtension::getAttribute($this->env, $this->source, $context["offre"], "categorie", [], "any", true, true, false, 5)) {
                // line 6
                yield "\t\t\t<span class=\"offer-category\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["offre"], "categorie", [], "any", false, false, false, 6), "nom", [], "any", false, false, false, 6), "html", null, true);
                yield "</span>
\t\t";
            }
            // line 8
            yield "\t\t<h3 class=\"offer-title\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["offre"], "intitule", [], "any", false, false, false, 8), "html", null, true);
            yield "</h3>
\t\t<div class=\"offer-image\">
\t\t\t";
            // line 10
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["offre"], "imagePath", [], "any", true, true, false, 10) && CoreExtension::getAttribute($this->env, $this->source, $context["offre"], "imagePath", [], "any", false, false, false, 10))) {
                // line 11
                yield "\t\t\t\t<img src=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(CoreExtension::getAttribute($this->env, $this->source, $context["offre"], "imagePath", [], "any", false, false, false, 11)), "html", null, true);
                yield "\" alt=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["offre"], "intitule", [], "any", false, false, false, 11), "html", null, true);
                yield "\">
\t\t\t";
            } else {
                // line 13
                yield "\t\t\t\t";
                // line 14
                yield "\t\t\t\t<img src=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/img/no-image.png"), "html", null, true);
                yield "\" alt=\"Pas d’image disponible\">

\t\t\t";
            }
            // line 17
            yield "\t\t</div>

\t\t<div class=\"offer-content\">
\t\t\t<div class=\"offer-sports\">
\t\t\t\t<ul class=\"sport-list\">\t\t
\t\t\t\t\t";
            // line 22
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["offre"], "sports", [], "any", false, false, false, 22));
            foreach ($context['_seq'] as $context["_key"] => $context["sport"]) {
                // line 23
                yield "\t\t\t\t\t\t<li class=\"sport-items\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["sport"], "emoji", [], "any", false, false, false, 23), "html", null, true);
                yield "&nbsp;";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["sport"], "intitule", [], "any", false, false, false, 23), "html", null, true);
                yield "</li>
\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['sport'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 25
            yield "\t\t\t\t</ul>
\t\t\t</div>

\t\t\t<div class=\"offer-meta\">
\t\t\t\t";
            // line 29
            if (CoreExtension::getAttribute($this->env, $this->source, $context["offre"], "dateDebut", [], "any", true, true, false, 29)) {
                // line 30
                yield "\t\t\t\t\t<span class=\"offer-date\">Du
\t\t\t\t\t\t";
                // line 31
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["offre"], "dateDebut", [], "any", false, false, false, 31), "d/m/Y"), "html", null, true);
                yield " au ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["offre"], "dateFin", [], "any", false, false, false, 31), "d/m/Y"), "html", null, true);
                yield "</span>
\t\t\t\t";
            }
            // line 33
            yield "\t\t\t\t<div class=\"offer-emplacement\">
\t\t\t\t";
            // line 34
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["offre"], "lieux", [], "any", false, false, false, 34));
            foreach ($context['_seq'] as $context["_key"] => $context["lieu"]) {
                // line 35
                yield "\t\t\t\t\t<span>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["lieu"], "html", null, true);
                yield "</span>
\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['lieu'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 37
            yield "\t\t\t\t</div>
\t\t\t\t";
            // line 38
            if (CoreExtension::getAttribute($this->env, $this->source, $context["offre"], "prix", [], "any", true, true, false, 38)) {
                // line 39
                yield "\t\t\t\t\t<span class=\"offer-price\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["offre"], "prix", [], "any", false, false, false, 39), "html", null, true);
                yield "
\t\t\t\t\t\t€</span>
\t\t\t\t";
            }
            // line 42
            yield "\t\t\t</div>
\t\t</div>
\t\t<div class=\"offer-footer\">
\t\t<a href=\"";
            // line 45
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_cart_add", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["offre"], "id", [], "any", false, false, false, 45)]), "html", null, true);
            yield "\" class=\"btn btn-primary btn-add-cart\"><i class=\"fa-solid fa-cart-plus\"></i>Ajouter au panier</a>
\t\t</div>
\t</article>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['offre'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "_partials/_catalogue-offres-clients.html.twig";
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
        return array (  164 => 45,  159 => 42,  152 => 39,  150 => 38,  147 => 37,  138 => 35,  134 => 34,  131 => 33,  124 => 31,  121 => 30,  119 => 29,  113 => 25,  102 => 23,  98 => 22,  91 => 17,  84 => 14,  82 => 13,  74 => 11,  72 => 10,  66 => 8,  60 => 6,  58 => 5,  55 => 4,  51 => 3,  48 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# templates/_partials/_catalogue-offres-clients.html.twig #}

{% for offre in offres %}
\t<article class=\"offer-card\">
\t\t{% if offre.categorie is defined %}
\t\t\t<span class=\"offer-category\">{{ offre.categorie.nom }}</span>
\t\t{% endif %}
\t\t<h3 class=\"offer-title\">{{ offre.intitule }}</h3>
\t\t<div class=\"offer-image\">
\t\t\t{% if offre.imagePath is defined and offre.imagePath %}
\t\t\t\t<img src=\"{{ asset(offre.imagePath) }}\" alt=\"{{ offre.intitule }}\">
\t\t\t{% else %}
\t\t\t\t{# ✅ fallback si pas d’image, version locale #}
\t\t\t\t<img src=\"{{ asset('assets/img/no-image.png') }}\" alt=\"Pas d’image disponible\">

\t\t\t{% endif %}
\t\t</div>

\t\t<div class=\"offer-content\">
\t\t\t<div class=\"offer-sports\">
\t\t\t\t<ul class=\"sport-list\">\t\t
\t\t\t\t\t{% for sport in offre.sports %}
\t\t\t\t\t\t<li class=\"sport-items\">{{sport.emoji}}&nbsp;{{sport.intitule}}</li>
\t\t\t\t\t{% endfor %}
\t\t\t\t</ul>
\t\t\t</div>

\t\t\t<div class=\"offer-meta\">
\t\t\t\t{% if offre.dateDebut is defined %}
\t\t\t\t\t<span class=\"offer-date\">Du
\t\t\t\t\t\t{{ offre.dateDebut|date('d/m/Y') }} au {{ offre.dateFin|date('d/m/Y') }}</span>
\t\t\t\t{% endif %}
\t\t\t\t<div class=\"offer-emplacement\">
\t\t\t\t{% for lieu in offre.lieux %}
\t\t\t\t\t<span>{{lieu}}</span>
\t\t\t\t{% endfor %}
\t\t\t\t</div>
\t\t\t\t{% if offre.prix is defined %}
\t\t\t\t\t<span class=\"offer-price\">{{ offre.prix }}
\t\t\t\t\t\t€</span>
\t\t\t\t{% endif %}
\t\t\t</div>
\t\t</div>
\t\t<div class=\"offer-footer\">
\t\t<a href=\"{{path('app_cart_add',{id:offre.id})}}\" class=\"btn btn-primary btn-add-cart\"><i class=\"fa-solid fa-cart-plus\"></i>Ajouter au panier</a>
\t\t</div>
\t</article>
{% endfor %}
", "_partials/_catalogue-offres-clients.html.twig", "/home/clavi/jo2024-docker/app/templates/_partials/_catalogue-offres-clients.html.twig");
    }
}
