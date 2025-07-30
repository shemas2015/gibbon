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

/* finder.twig.html */
class __TwigTemplate_d28d6a019058b49acf43c6d4f11f87be extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 12
        yield "
<style>
    #fastFinder input[type=\"search\"] {
        background-color: #FFFFFF;
        ";
        // line 16
        if ((($context["roleCategory"] ?? null) == "Staff")) {
            // line 17
            yield "            border-top: 1px solid #CBDCE8;
            border-left: 1px solid #CBDCE8;
            border-bottom: 1px solid #CBDCE8;
            border-right: none; 
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;
        ";
        } else {
            // line 24
            yield "            border: 1px solid #CBDCE8;
            border-radius: 5px;
        ";
        }
        // line 27
        yield "

    }

    #fastFinder select {
        background-color: #FFFFFF !important;
        border: 1px solid #CBDCE8 !important;
        border-top-right-radius: 5px;
        border-bottom-right-radius: 5px;
        margin-left: 1px !important;
    }

    #fastFinder input[type=\"search\"]:focus,
    #fastFinder select:focus {
        border: 1px white !important;
        box-shadow: none !important;
    }

</style>

<div id=\"fastFinder\" class=\"sm:relative  sm:max-w-md m-0 p-0\"
    x-data=\"{ finderOpen: false, finderSearch: '' }\"
    x-on:keydown.escape.prevent.stop=\"finderOpen = false\"
    @click.outside=\"finderOpen = false\"
    >

    <div class=\"relative flex\">
        <button type=\"button\" @click=\"finderSearch=''\" class=\"absolute top-0 left-0 mt-2.5 ml-2.5\">
            ";
        // line 55
        yield $this->env->getFunction('icon')->getCallable()("basic", "search", "size-5 text-gray-600 opacity-50");
        yield "
        </button>

        <input class=\"form-control flex-1 text-gray-600 placeholder:text-gray-600 placeholder:text-opacity-60 text-sm pl-10 h-10\" 
            type=\"search\" autocomplete=\"off\" 
            name=\"search\" placeholder=\"";
        // line 60
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Search"), "html", null, true);
        yield "\" 
            hx-post=\"index_fastFinder_ajax.php\" 
            hx-trigger=\"input changed delay:500ms, search\" 
            hx-target=\"#search-results\" 
            hx-include=\"[name='searchType']\"
            hx-indicator=\".htmx-indicator\"
            @click=\"finderOpen = true\"
            x-model=\"finderSearch\"
        >

        ";
        // line 70
        if ((($context["roleCategory"] ?? null) == "Staff")) {
            // line 71
            yield "        <select name=\"searchType\" class=\"w-20 h-10 text-gray-600 text-sm font-bold block\"
            hx-post=\"index_fastFinder_ajax.php\" 
            hx-target=\"#search-results\" 
            hx-include=\"[name='search']\"
            hx-indicator=\".htmx-indicator\"
            >
            <option value=\"all\">";
            // line 77
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("All"), "html", null, true);
            yield "</option>
            <option value=\"students\">";
            // line 78
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Student"), "html", null, true);
            yield "</option>
            <option value=\"staff\">";
            // line 79
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Staff"), "html", null, true);
            yield "</option>
            <option value=\"classes\">";
            // line 80
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Class"), "html", null, true);
            yield "</option>
            <option value=\"departments\">";
            // line 81
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Department"), "html", null, true);
            yield "</option>
            <option value=\"facilities\">";
            // line 82
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Facility"), "html", null, true);
            yield "</option>
            <option value=\"actions\">";
            // line 83
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Action"), "html", null, true);
            yield "</option>
        </select>
        ";
        } else {
            // line 86
            yield "        <input name=\"searchType\" type=\"hidden\" value=\"all\">
        ";
        }
        // line 88
        yield "        
    </div>

    <div id=\"search-wrap\" 
        x-show=\"finderOpen\"
        class=\"absolute top-0 left-0 mt-10 w-full origin-top-right rounded-sm bg-white shadow-lg focus:outline-none\" role=\"menu\" aria-orientation=\"vertical\" aria-labelledby=\"menu-button\" tabindex=\"-1\" style=\"display:none; z-index: 45;\">

        <div class=\"htmx-indicator absolute top-0 left-0 h-10 w-full block px-4 py-2 text-sm italic text-gray-800 pointer-events-none\"> 
            ";
        // line 96
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Searching..."), "html", null, true);
        yield " 
        </div>

        <div id=\"search-results\" class=\"py-1\" role=\"none\">
            <span class=\"block px-4 py-2 text-sm text-gray-800\" @click=\"finderOpen = false\">
                ";
        // line 101
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Start typing a name ..."), "html", null, true);
        yield "
            </span>
        </div>
    </div>
</div>
";
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "finder.twig.html";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable()
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo()
    {
        return array (  173 => 101,  165 => 96,  155 => 88,  151 => 86,  145 => 83,  141 => 82,  137 => 81,  133 => 80,  129 => 79,  125 => 78,  121 => 77,  113 => 71,  111 => 70,  98 => 60,  90 => 55,  60 => 27,  55 => 24,  46 => 17,  44 => 16,  38 => 12,);
    }

    public function getSourceContext()
    {
        return new Source("{#<!--
Gibbon: the flexible, open school platform
Founded by Ross Parker at ICHK Secondary. Built by Ross Parker, Sandra Kuipers and the Gibbon community (https://gibbonedu.org/about/)
Copyright © 2010, Gibbon Foundation
Gibbon™, Gibbon Education Ltd. (Hong Kong)

This is a Gibbon template file, written in HTML and Twig syntax.
For info about editing, see: https://twig.symfony.com/doc/2.x/

Fast Finder
-->#}

<style>
    #fastFinder input[type=\"search\"] {
        background-color: #FFFFFF;
        {% if roleCategory == 'Staff' %}
            border-top: 1px solid #CBDCE8;
            border-left: 1px solid #CBDCE8;
            border-bottom: 1px solid #CBDCE8;
            border-right: none; 
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;
        {% else %}
            border: 1px solid #CBDCE8;
            border-radius: 5px;
        {% endif %}


    }

    #fastFinder select {
        background-color: #FFFFFF !important;
        border: 1px solid #CBDCE8 !important;
        border-top-right-radius: 5px;
        border-bottom-right-radius: 5px;
        margin-left: 1px !important;
    }

    #fastFinder input[type=\"search\"]:focus,
    #fastFinder select:focus {
        border: 1px white !important;
        box-shadow: none !important;
    }

</style>

<div id=\"fastFinder\" class=\"sm:relative  sm:max-w-md m-0 p-0\"
    x-data=\"{ finderOpen: false, finderSearch: '' }\"
    x-on:keydown.escape.prevent.stop=\"finderOpen = false\"
    @click.outside=\"finderOpen = false\"
    >

    <div class=\"relative flex\">
        <button type=\"button\" @click=\"finderSearch=''\" class=\"absolute top-0 left-0 mt-2.5 ml-2.5\">
            {{ icon('basic', 'search', 'size-5 text-gray-600 opacity-50') }}
        </button>

        <input class=\"form-control flex-1 text-gray-600 placeholder:text-gray-600 placeholder:text-opacity-60 text-sm pl-10 h-10\" 
            type=\"search\" autocomplete=\"off\" 
            name=\"search\" placeholder=\"{{ __('Search') }}\" 
            hx-post=\"index_fastFinder_ajax.php\" 
            hx-trigger=\"input changed delay:500ms, search\" 
            hx-target=\"#search-results\" 
            hx-include=\"[name='searchType']\"
            hx-indicator=\".htmx-indicator\"
            @click=\"finderOpen = true\"
            x-model=\"finderSearch\"
        >

        {% if roleCategory == 'Staff' %}
        <select name=\"searchType\" class=\"w-20 h-10 text-gray-600 text-sm font-bold block\"
            hx-post=\"index_fastFinder_ajax.php\" 
            hx-target=\"#search-results\" 
            hx-include=\"[name='search']\"
            hx-indicator=\".htmx-indicator\"
            >
            <option value=\"all\">{{ __('All') }}</option>
            <option value=\"students\">{{ __('Student') }}</option>
            <option value=\"staff\">{{ __('Staff') }}</option>
            <option value=\"classes\">{{ __('Class') }}</option>
            <option value=\"departments\">{{ __('Department') }}</option>
            <option value=\"facilities\">{{ __('Facility') }}</option>
            <option value=\"actions\">{{ __('Action') }}</option>
        </select>
        {% else %}
        <input name=\"searchType\" type=\"hidden\" value=\"all\">
        {% endif %}
        
    </div>

    <div id=\"search-wrap\" 
        x-show=\"finderOpen\"
        class=\"absolute top-0 left-0 mt-10 w-full origin-top-right rounded-sm bg-white shadow-lg focus:outline-none\" role=\"menu\" aria-orientation=\"vertical\" aria-labelledby=\"menu-button\" tabindex=\"-1\" style=\"display:none; z-index: 45;\">

        <div class=\"htmx-indicator absolute top-0 left-0 h-10 w-full block px-4 py-2 text-sm italic text-gray-800 pointer-events-none\"> 
            {{ __('Searching...') }} 
        </div>

        <div id=\"search-results\" class=\"py-1\" role=\"none\">
            <span class=\"block px-4 py-2 text-sm text-gray-800\" @click=\"finderOpen = false\">
                {{ __('Start typing a name ...') }}
            </span>
        </div>
    </div>
</div>
", "finder.twig.html", "/var/www/GibbonEduCore/resources/templates/finder.twig.html");
    }
}
