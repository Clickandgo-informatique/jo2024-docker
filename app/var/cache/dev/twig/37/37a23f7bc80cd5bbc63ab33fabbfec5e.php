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
            'javascripts' => [$this, 'block_javascripts'],
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
            yield "\t<article
\t\tclass=\"offer-card\">
\t\t";
            // line 7
            yield "\t\t";
            if (CoreExtension::getAttribute($this->env, $this->source, $context["offre"], "categorie", [], "any", true, true, false, 7)) {
                // line 8
                yield "\t\t\t<div class=\"offer-header\">
\t\t\t\t<span class=\"offer-category\">";
                // line 9
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["offre"], "categorie", [], "any", false, false, false, 9), "nom", [], "any", false, false, false, 9), "html", null, true);
                yield "</span>
\t\t\t\t&nbsp;
\t\t\t\t";
                // line 12
                yield "\t\t\t\t<div class=\"persons-number\">
\t\t\t\t\t";
                // line 13
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(range(1, CoreExtension::getAttribute($this->env, $this->source, $context["offre"], "nbrAdultes", [], "any", false, false, false, 13)));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 14
                    yield "\t\t\t\t\t\t<i class=\"fa-solid fa-person adult-icon\"></i>
\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['i'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 16
                yield "\t\t\t\t\t";
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["offre"], "nbrEnfants", [], "any", false, false, false, 16) > 0)) {
                    // line 17
                    yield "\t\t\t\t\t\t<span class=\"add-child-plus-sign\">+</span>
\t\t\t\t\t\t";
                    // line 18
                    $context['_parent'] = $context;
                    $context['_seq'] = CoreExtension::ensureTraversable(range(1, CoreExtension::getAttribute($this->env, $this->source, $context["offre"], "nbrEnfants", [], "any", false, false, false, 18)));
                    foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                        // line 19
                        yield "\t\t\t\t\t\t\t<i class=\"fa-solid fa-child child-icon\"></i>
\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_key'], $context['i'], $context['_parent']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 21
                    yield "\t\t\t\t\t";
                }
                // line 22
                yield "\t\t\t\t</div>
\t\t\t</div>
\t\t";
            }
            // line 25
            yield "
\t\t\t\t";
            // line 27
            yield "\t\t<div class=\"offer-sports\">
\t\t\t<span class=\"sport-emoji\">";
            // line 28
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["offre"], "sports", [], "any", false, false, false, 28), 0, [], "array", false, false, false, 28), "emoji", [], "any", false, false, false, 28), "html", null, true);
            yield "</span>&nbsp;<span class=\"sport-intitule\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["offre"], "sports", [], "any", false, false, false, 28), 0, [], "array", false, false, false, 28), "intitule", [], "any", false, false, false, 28), "html", null, true);
            yield "</span>
\t\t</div>


\t\t";
            // line 33
            yield "

\t\t";
            // line 36
            yield "\t\t<div class=\"offer-content\">
\t\t\t<div class=\"offer-meta\">
\t\t\t\t";
            // line 38
            if (CoreExtension::getAttribute($this->env, $this->source, $context["offre"], "dateDebut", [], "any", true, true, false, 38)) {
                // line 39
                yield "\t\t\t\t\t<span class=\"offer-date\">Du
\t\t\t\t\t\t";
                // line 40
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["offre"], "dateDebut", [], "any", false, false, false, 40), "d/m/Y"), "html", null, true);
                yield "
\t\t\t\t\t\tau
\t\t\t\t\t\t";
                // line 42
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["offre"], "dateFin", [], "any", false, false, false, 42), "d/m/Y"), "html", null, true);
                yield "</span>
\t\t\t\t";
            }
            // line 44
            yield "\t\t\t\t<div class=\"offer-emplacement\">
\t\t\t\t\t";
            // line 45
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["offre"], "lieux", [], "any", false, false, false, 45));
            foreach ($context['_seq'] as $context["_key"] => $context["lieu"]) {
                // line 46
                yield "\t\t\t\t\t\t<span>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["lieu"], "html", null, true);
                yield "</span>
\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['lieu'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 48
            yield "\t\t\t\t</div>
\t\t\t\t";
            // line 49
            if (CoreExtension::getAttribute($this->env, $this->source, $context["offre"], "prix", [], "any", true, true, false, 49)) {
                // line 50
                yield "\t\t\t\t\t<span class=\"offer-price\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["offre"], "prix", [], "any", false, false, false, 50), "html", null, true);
                yield "
\t\t\t\t\t\t€</span>
\t\t\t\t";
            }
            // line 53
            yield "\t\t\t</div>
\t\t</div>
\t\t<div class=\"offer-footer\">
\t\t\t<form method=\"POST\" action=\"";
            // line 56
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("panier_add", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["offre"], "id", [], "any", false, false, false, 56)]), "html", null, true);
            yield "\">
\t\t\t\t<button type=\"submit\" class=\"btn btn-primary\">
\t\t\t\t\t<i class=\"fa-solid fa-basket-shopping cart-icon\"></i>Ajouter au panier</button>
\t\t\t</form>

\t\t</div>
\t</article>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['offre'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 64
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

        // line 65
        yield "\t<script src=";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/cart.js"), "html", null, true);
        yield "></script>
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
        return array (  218 => 65,  195 => 64,  181 => 56,  176 => 53,  169 => 50,  167 => 49,  164 => 48,  155 => 46,  151 => 45,  148 => 44,  143 => 42,  138 => 40,  135 => 39,  133 => 38,  129 => 36,  125 => 33,  116 => 28,  113 => 27,  110 => 25,  105 => 22,  102 => 21,  95 => 19,  91 => 18,  88 => 17,  85 => 16,  78 => 14,  74 => 13,  71 => 12,  66 => 9,  63 => 8,  60 => 7,  56 => 4,  52 => 3,  49 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# templates/_partials/_catalogue-offres-clients.html.twig #}

{% for offre in offres %}
\t<article
\t\tclass=\"offer-card\">
\t\t{# Affiche la catégorie de l'offre et le nombre de personnes #}
\t\t{% if offre.categorie is defined %}
\t\t\t<div class=\"offer-header\">
\t\t\t\t<span class=\"offer-category\">{{ offre.categorie.nom }}</span>
\t\t\t\t&nbsp;
\t\t\t\t{# affiche visuellement le nombre de personnes adultes et enfants #}
\t\t\t\t<div class=\"persons-number\">
\t\t\t\t\t{% for i in 1..offre.nbrAdultes %}
\t\t\t\t\t\t<i class=\"fa-solid fa-person adult-icon\"></i>
\t\t\t\t\t{% endfor %}
\t\t\t\t\t{% if offre.nbrEnfants>0 %}
\t\t\t\t\t\t<span class=\"add-child-plus-sign\">+</span>
\t\t\t\t\t\t{% for i in 1..offre.nbrEnfants %}
\t\t\t\t\t\t\t<i class=\"fa-solid fa-child child-icon\"></i>
\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t{% endif %}
\t\t\t\t</div>
\t\t\t</div>
\t\t{% endif %}

\t\t\t\t{# Affiche les sports en body #}
\t\t<div class=\"offer-sports\">
\t\t\t<span class=\"sport-emoji\">{{offre.sports[0].emoji}}</span>&nbsp;<span class=\"sport-intitule\">{{offre.sports[0].intitule}}</span>
\t\t</div>


\t\t{# Affiche l'image du sport / pictogramme #}


\t\t{# Affiche les détails de l'offre #}
\t\t<div class=\"offer-content\">
\t\t\t<div class=\"offer-meta\">
\t\t\t\t{% if offre.dateDebut is defined %}
\t\t\t\t\t<span class=\"offer-date\">Du
\t\t\t\t\t\t{{ offre.dateDebut|date('d/m/Y') }}
\t\t\t\t\t\tau
\t\t\t\t\t\t{{ offre.dateFin|date('d/m/Y') }}</span>
\t\t\t\t{% endif %}
\t\t\t\t<div class=\"offer-emplacement\">
\t\t\t\t\t{% for lieu in offre.lieux %}
\t\t\t\t\t\t<span>{{lieu}}</span>
\t\t\t\t\t{% endfor %}
\t\t\t\t</div>
\t\t\t\t{% if offre.prix is defined %}
\t\t\t\t\t<span class=\"offer-price\">{{ offre.prix }}
\t\t\t\t\t\t€</span>
\t\t\t\t{% endif %}
\t\t\t</div>
\t\t</div>
\t\t<div class=\"offer-footer\">
\t\t\t<form method=\"POST\" action=\"{{ path('panier_add', {'id': offre.id}) }}\">
\t\t\t\t<button type=\"submit\" class=\"btn btn-primary\">
\t\t\t\t\t<i class=\"fa-solid fa-basket-shopping cart-icon\"></i>Ajouter au panier</button>
\t\t\t</form>

\t\t</div>
\t</article>
{% endfor %}
{% block javascripts %}
\t<script src={{asset('assets/js/cart.js')}}></script>
{% endblock %}
", "_partials/_catalogue-offres-clients.html.twig", "/var/www/symfony/templates/_partials/_catalogue-offres-clients.html.twig");
    }
}
