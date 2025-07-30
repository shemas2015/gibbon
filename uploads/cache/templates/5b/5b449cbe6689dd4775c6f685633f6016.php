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

/* ui/timetableNav.twig.html */
class __TwigTemplate_e9b69d4dfc5cdcae1c9e67570d2415d6 extends Template
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
        // line 10
        yield "
<form
    hx-post='";
        // line 12
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["apiEndpoint"] ?? null), "html", null, true);
        yield "' 
    hx-trigger='click from:(button.ttNav), change from:(#ttDateChooser)'
    hx-target='closest #timetable' 
    hx-select='#timetable'
    hx-swap='outerHTML' 
    hx-indicator='#indicator'
    hx-include='[name=\"ttDateChooser\"],[name=\"ttCalendarRefresh\"],[name=\"gibbonTTID\"]''
    hx-vals='js:{\"edit\": \"";
        // line 19
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["edit"] ?? null), "html", null, true);
        yield "\"}'
>
    <nav id='#ttNav' cellspacing='0' class='flex justify-between items-end w-full my-2'>
    <input type='hidden' name='ttDateNav' x-model='ttDate'>
    <input type='hidden' name='ttCalendarRefresh' x-model='ttRefresh'>
    <input type='hidden' name='gibbonTTID' x-model='ttID'>

    <div x-data=\"{layersOpen: false, timetablesOpen: false, optionsOpen: false}\" class=\" flex items-start\">
    
        ";
        // line 28
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), ($context["timetables"] ?? null)) > 1)) {
            // line 29
            yield "        <div class=\"relative\">
            <button type='button' class='inline-flex items-center align-middle rounded-l h-8 px-4 text-xs/6 border border-gray-400 text-gray-600 bg-gray-100 font-medium hover:bg-gray-300 hover:text-gray-700' @click=\"timetablesOpen = !timetablesOpen\" :class=\"{'bg-gray-300 text-gray-700': timetablesOpen}\">
            ";
            // line 31
            yield $this->env->getFunction('icon')->getCallable()("solid", "calendar", "inline-block size-4");
            yield "
                <span class='hidden md:inline ml-2'>";
            // line 32
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Timetables"), "html", null, true);
            yield "</span>
            </button>

            <div x-cloak x-transition.opacity x-show=\"timetablesOpen\" @click.outside=\"timetablesOpen = false\" class=\"absolute min-w-48 -mt-px z-20 flex flex-col gap-2 items-start justify-end rounded border bg-white shadow-lg px-3 py-4\">
                ";
            // line 36
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["timetables"] ?? null));
            foreach ($context['_seq'] as $context["timetableID"] => $context["timetableName"]) {
                // line 37
                yield "                
                <button type='button' class=\"ttNav inline-flex items-center gap-2 px-1 text-gray-600 hover:text-gray-800 text-sm\" @click=\"ttID = '";
                // line 38
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["timetableID"], "html", null, true);
                yield "'\">
                    <input type=\"radio\" x-model=\"ttID\" value=\"";
                // line 39
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["timetableID"], "html", null, true);
                yield "\" class=\"border ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["color"] ?? null), "background", [], "any", false, false, false, 39), "html", null, true);
                yield " ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["color"] ?? null), "textLight", [], "any", false, false, false, 39), "html", null, true);
                yield "\" >
                    <label class=\"select-none whitespace-nowrap\">
                    ";
                // line 41
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["timetableName"], "html", null, true);
                yield "
                    </label>
                </button>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['timetableID'], $context['timetableName'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 45
            yield "            </div>
        </div>
        ";
        }
        // line 48
        yield "
        <div class=\"relative\">
            <button type='button' class='inline-flex items-center align-middle  h-8 px-4 text-xs/6 border border-gray-400 text-gray-600 bg-gray-100 font-medium hover:bg-gray-300 hover:text-gray-700 ";
        // line 50
        yield (((Twig\Extension\CoreExtension::length($this->env->getCharset(), ($context["timetables"] ?? null)) > 1)) ? ("-ml-px") : ("rounded-l"));
        yield "' @click=\"layersOpen = !layersOpen\" :class=\"{'bg-gray-300 text-gray-700': layersOpen}\">
            ";
        // line 51
        yield $this->env->getFunction('icon')->getCallable()("outline", "layers", "inline-block size-4");
        yield "
                <span class='hidden md:inline ml-2'>";
        // line 52
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Layers"), "html", null, true);
        yield "</span>
            </button>

            <div x-cloak x-transition.opacity x-show=\"layersOpen\" @click.outside=\"layersOpen = false\" class=\"absolute min-w-48 -ml-px -mt-px z-20 flex flex-col justify-end rounded border bg-white shadow-lg p-3\">
                ";
        // line 56
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["layers"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["layer"]) {
            // line 57
            yield "                    
                    ";
            // line 58
            $context["color"] = CoreExtension::getAttribute($this->env, $this->source, ($context["structure"] ?? null), "getColors", [CoreExtension::getAttribute($this->env, $this->source, $context["layer"], "getColor", [], "any", false, false, false, 58)], "method", false, false, false, 58);
            // line 59
            yield "
                    <div class=\"p-1 flex gap-2 items-center text-gray-700 cursor-pointer mr-4\" @click=\"";
            // line 60
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["layer"], "getID", [], "any", false, false, false, 60), "html", null, true);
            yield " = !";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["layer"], "getID", [], "any", false, false, false, 60), "html", null, true);
            yield "\" hx-get=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["preferencesUrl"] ?? null), "html", null, true);
            yield "\" hx-target=\"this\" hx-trigger=\"click consume\" hx-swap=\"none\" hx-include=\"[name='";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["layer"], "getID", [], "any", false, false, false, 60), "html", null, true);
            yield "']\" hx-vals='{\"scope\": \"ttLayers\", \"key\": \"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["layer"], "getID", [], "any", false, false, false, 60), "html", null, true);
            yield "\", \"default\": 0}' >
                        <input type=\"checkbox\" x-model=\"";
            // line 61
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["layer"], "getID", [], "any", false, false, false, 61), "html", null, true);
            yield "\" name=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["layer"], "getID", [], "any", false, false, false, 61), "html", null, true);
            yield "\" class=\"border p-1 ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["color"] ?? null), "background", [], "any", false, false, false, 61), "html", null, true);
            yield " ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["color"] ?? null), "textLight", [], "any", false, false, false, 61), "html", null, true);
            yield "\" checked=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["layer"], "getID", [], "any", false, false, false, 61), "html", null, true);
            yield "\"  >
                        <label class=\"select-none whitespace-nowrap text-sm\" :class=\"{'line-through opacity-50': !";
            // line 62
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["layer"], "getID", [], "any", false, false, false, 62), "html", null, true);
            yield " }\" for=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["layer"], "getID", [], "any", false, false, false, 62), "html", null, true);
            yield "\">
                            ";
            // line 63
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["layer"], "getName", [], "any", false, false, false, 63), "html", null, true);
            yield "<span class=\"inline-block ml-2 text-gray-400 text-xs\">(";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["layer"], "countItems", [], "any", false, false, false, 63), "html", null, true);
            yield ") </span>
                        </label>
                    </div>
                    
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['layer'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 68
        yield "            </div>
        </div>

        <div class=\"relative\">
            <button type='button' class='inline-flex items-center align-middle h-8 px-2 text-xs/6 border border-gray-400 text-gray-600 bg-gray-100 font-medium hover:bg-gray-300 hover:text-gray-700 ";
        // line 72
        yield (((Twig\Extension\CoreExtension::length($this->env->getCharset(), ($context["layers"] ?? null)) > 1)) ? ("rounded-r -ml-px") : ("rounded"));
        yield "' @click=\"optionsOpen = !optionsOpen\" :class=\"{'bg-gray-300 text-gray-700': optionsOpen}\">
                ";
        // line 73
        yield $this->env->getFunction('icon')->getCallable()("basic", "ellipsis-vertical", "inline-block size-5");
        yield "
            </button>

            <div x-cloak x-transition.opacity x-show=\"optionsOpen\" @click.outside=\"optionsOpen = false\" class=\"absolute min-w-48 -ml-px -mt-px z-20 flex flex-col justify-end rounded border bg-white shadow-lg \">
                
                <nav class=\"py-1\">
                    ";
        // line 79
        if ((($context["gibbonPersonID"] ?? null) || ($context["gibbonSpaceID"] ?? null))) {
            // line 80
            yield "                    <a href=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["absoluteURL"] ?? null), "html", null, true);
            yield "/report.php?q=/modules/Timetable/";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((($context["gibbonPersonID"] ?? null)) ? (("tt_view.php&gibbonPersonID=" . ($context["gibbonPersonID"] ?? null))) : (("tt_space_view.php&gibbonSpaceID=" . ($context["gibbonSpaceID"] ?? null)))), "html", null, true);
            yield "&ttDate=";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["structure"] ?? null), "getCurrentDate", [], "any", false, false, false, 80), "format", ["Y-m-d"], "method", false, false, false, 80), "html", null, true);
            yield "&format=print&hideHeader=true\" target=\"_blank\" class=\"flex justify-start items-center align-middle select-none whitespace-nowrap text-sm px-3 py-1.5 gap-3 text-gray-700 hover:text-gray-800 hover:bg-gray-200\">
                        ";
            // line 81
            yield $this->env->getFunction('icon')->getCallable()("solid", "print", "inline-block size-5 text-gray-600");
            yield "
                        ";
            // line 82
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Print"), "html", null, true);
            yield "
                    </a>
                    
                    <a href=\"";
            // line 85
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["absoluteURL"] ?? null), "html", null, true);
            yield "/index.php?q=/modules/Timetable/";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((($context["gibbonPersonID"] ?? null)) ? (("tt_view.php&gibbonPersonID=" . ($context["gibbonPersonID"] ?? null))) : (("tt_space_view.php&gibbonSpaceID=" . ($context["gibbonSpaceID"] ?? null)))), "html", null, true);
            yield "&ttDate=";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["structure"] ?? null), "getCurrentDate", [], "any", false, false, false, 85), "format", ["Y-m-d"], "method", false, false, false, 85), "html", null, true);
            yield "\" target=\"_blank\" class=\"flex justify-start items-center align-middle select-none whitespace-nowrap text-sm px-3 py-1.5 gap-3 text-gray-700 hover:text-gray-800 hover:bg-gray-200\">
                        ";
            // line 86
            yield $this->env->getFunction('icon')->getCallable()("solid", "external-link", "inline-block size-5 text-gray-600");
            yield "
                        ";
            // line 87
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Open"), "html", null, true);
            yield "
                    </a>

                    ";
        }
        // line 91
        yield "                </nav>

                <nav class=\"py-1 px-2 border-t border-gray-400\">
                    ";
        // line 94
        $context["optionID"] = "showCurrentTime";
        // line 95
        yield "
                    <div class=\"p-1 flex gap-3 items-center text-gray-600 hover:text-gray-800 cursor-pointer mr-4\" @click=\"";
        // line 96
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["optionID"] ?? null), "html", null, true);
        yield " = !";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["optionID"] ?? null), "html", null, true);
        yield "\" hx-get=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["preferencesUrl"] ?? null), "html", null, true);
        yield "\" hx-target=\"this\" hx-trigger=\"click consume\" hx-swap=\"none\" hx-include=\"[name='";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["optionID"] ?? null), "html", null, true);
        yield "']\" hx-vals='{\"scope\": \"ttOptions\", \"key\": \"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["optionID"] ?? null), "html", null, true);
        yield "\", \"default\": 0}' >
                        <input type=\"checkbox\" x-model=\"";
        // line 97
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["optionID"] ?? null), "html", null, true);
        yield "\" name=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["optionID"] ?? null), "html", null, true);
        yield "\" class=\"border mx-0.5 p-1 ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["color"] ?? null), "background", [], "any", false, false, false, 97), "html", null, true);
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["color"] ?? null), "textLight", [], "any", false, false, false, 97), "html", null, true);
        yield "\" value=\"1\" >
                        <label class=\"select-none whitespace-nowrap text-sm\" for=\"";
        // line 98
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["optionID"] ?? null), "html", null, true);
        yield "\">
                            ";
        // line 99
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Show Current Time"), "html", null, true);
        yield "
                        </label>
                    </div>

                </nav>
                
            </div>
        </div>

    </div>

    <div class=\"flex-shrink flex\">
    
        <button type='button' class='ttNav inline-flex items-center align-middle rounded-l h-8 px-3 text-xs/6 border border-gray-400 text-gray-600 bg-gray-100 font-medium hover:bg-gray-300 hover:text-gray-700'
        x-on:click='ttDate=\"";
        // line 113
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["structure"] ?? null), "getCurrentDate", [], "any", false, false, false, 113), "modify", ["-1 week"], "method", false, false, false, 113), "Y-m-d"), "html", null, true);
        yield "\"'>
        ";
        // line 114
        yield $this->env->getFunction('icon')->getCallable()("basic", "chevron-left", "inline-block size-5");
        yield "
        <span class='hidden sm:inline sr-only'>";
        // line 115
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Last Week"), "html", null, true);
        yield "</span></button>

        <button type='button' class='ttNav inline-flex items-center align-middle h-8 px-4 text-xs/6 border border-gray-400 text-gray-600 bg-gray-100 font-medium hover:bg-gray-300 hover:text-gray-700 -ml-px'
            x-on:click='ttDate=\"";
        // line 118
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["structure"] ?? null), "today", [], "any", false, false, false, 118), "format", ["Y-m-d"], "method", false, false, false, 118), "html", null, true);
        yield "\"' title=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("This Week"), "html", null, true);
        yield "\">
            ";
        // line 119
        yield $this->env->getFunction('icon')->getCallable()("basic", "home", "inline-block size-4");
        yield "
            <span class='hidden sm:inline sr-only'>";
        // line 120
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("This Week"), "html", null, true);
        yield "</span>
        </button>

        <div class='relative hidden xl:inline-flex h-8 px-4 text-xs/6  -ml-px items-center border border-gray-400 text-gray-600 bg-gray-100 font-medium'>
            <div id=\"indicator\" class=\"absolute left-0 top-0 w-full h-full htmx-indicator bg-stripe animate-bg-slide opacity-0 transition-opacity duration-300 delay-150\"></div>

            ";
        // line 126
        yield $this->env->getFunction('formatUsing')->getCallable()("dateRangeReadable", CoreExtension::getAttribute($this->env, $this->source, ($context["structure"] ?? null), "getStartDate", [], "any", false, false, false, 126), CoreExtension::getAttribute($this->env, $this->source, ($context["structure"] ?? null), "getEndDate", [], "any", false, false, false, 126));
        yield "
        </div>
            
        <button type='button' class='ttNav inline-flex items-center align-middle rounded-r h-8 px-3 text-xs/6 border border-gray-400 text-gray-600 bg-gray-100 font-medium hover:bg-gray-300 hover:text-gray-700 -ml-px'
            x-on:click='ttDate=\"";
        // line 130
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["structure"] ?? null), "getCurrentDate", [], "any", false, false, false, 130), "modify", ["+1 week"], "method", false, false, false, 130), "Y-m-d"), "html", null, true);
        yield "\"'><span class='hidden sm:inline mr-1 sr-only'>";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Next Week"), "html", null, true);
        yield "</span>
        ";
        // line 131
        yield $this->env->getFunction('icon')->getCallable()("basic", "chevron-right", "inline-block size-5");
        yield "
        </button>

    </div>

    <div class=\" text-right inline-flex justify-end items-center text-xs/6\">

        <button type='button' class='ttNav inline-flex items-center rounded-l px-2 h-8 -mr-px text-base border border-gray-400 bg-gray-100 font-medium hover:bg-gray-300 text-gray-600 hover:text-gray-700' x-on:click='ttRefresh=true'>
            ";
        // line 139
        yield $this->env->getFunction('icon')->getCallable()("basic", "refresh", "size-4");
        yield "
            </span>
        </button>

        <input name='ttDateChooser' id='ttDateChooser' aria-label='";
        // line 143
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Choose Date"), "html", null, true);
        yield "' maxlength=10 value='";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, ($context["structure"] ?? null), "getCurrentDate", [], "any", false, false, false, 143), "Y-m-d"), "html", null, true);
        yield "' type='date' required class='inline-flex border rounded-r bg-gray-100 text-xs/6 h-8 font-sans w-10 md:w-36 px-2 md:px-3'> 
    </div>

    </nav>
</form>

";
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "ui/timetableNav.twig.html";
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
        return array (  366 => 143,  359 => 139,  348 => 131,  342 => 130,  335 => 126,  326 => 120,  322 => 119,  316 => 118,  310 => 115,  306 => 114,  302 => 113,  285 => 99,  281 => 98,  271 => 97,  259 => 96,  256 => 95,  254 => 94,  249 => 91,  242 => 87,  238 => 86,  230 => 85,  224 => 82,  220 => 81,  211 => 80,  209 => 79,  200 => 73,  196 => 72,  190 => 68,  177 => 63,  171 => 62,  159 => 61,  147 => 60,  144 => 59,  142 => 58,  139 => 57,  135 => 56,  128 => 52,  124 => 51,  120 => 50,  116 => 48,  111 => 45,  101 => 41,  92 => 39,  88 => 38,  85 => 37,  81 => 36,  74 => 32,  70 => 31,  66 => 29,  64 => 28,  52 => 19,  42 => 12,  38 => 10,);
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
-->#}

<form
    hx-post='{{ apiEndpoint }}' 
    hx-trigger='click from:(button.ttNav), change from:(#ttDateChooser)'
    hx-target='closest #timetable' 
    hx-select='#timetable'
    hx-swap='outerHTML' 
    hx-indicator='#indicator'
    hx-include='[name=\"ttDateChooser\"],[name=\"ttCalendarRefresh\"],[name=\"gibbonTTID\"]''
    hx-vals='js:{\"edit\": \"{{ edit }}\"}'
>
    <nav id='#ttNav' cellspacing='0' class='flex justify-between items-end w-full my-2'>
    <input type='hidden' name='ttDateNav' x-model='ttDate'>
    <input type='hidden' name='ttCalendarRefresh' x-model='ttRefresh'>
    <input type='hidden' name='gibbonTTID' x-model='ttID'>

    <div x-data=\"{layersOpen: false, timetablesOpen: false, optionsOpen: false}\" class=\" flex items-start\">
    
        {% if timetables|length > 1 %}
        <div class=\"relative\">
            <button type='button' class='inline-flex items-center align-middle rounded-l h-8 px-4 text-xs/6 border border-gray-400 text-gray-600 bg-gray-100 font-medium hover:bg-gray-300 hover:text-gray-700' @click=\"timetablesOpen = !timetablesOpen\" :class=\"{'bg-gray-300 text-gray-700': timetablesOpen}\">
            {{ icon('solid', 'calendar', 'inline-block size-4') }}
                <span class='hidden md:inline ml-2'>{{ __('Timetables') }}</span>
            </button>

            <div x-cloak x-transition.opacity x-show=\"timetablesOpen\" @click.outside=\"timetablesOpen = false\" class=\"absolute min-w-48 -mt-px z-20 flex flex-col gap-2 items-start justify-end rounded border bg-white shadow-lg px-3 py-4\">
                {% for timetableID, timetableName in timetables %}
                
                <button type='button' class=\"ttNav inline-flex items-center gap-2 px-1 text-gray-600 hover:text-gray-800 text-sm\" @click=\"ttID = '{{ timetableID }}'\">
                    <input type=\"radio\" x-model=\"ttID\" value=\"{{ timetableID }}\" class=\"border {{ color.background }} {{ color.textLight }}\" >
                    <label class=\"select-none whitespace-nowrap\">
                    {{ timetableName }}
                    </label>
                </button>
                {% endfor %}
            </div>
        </div>
        {% endif %}

        <div class=\"relative\">
            <button type='button' class='inline-flex items-center align-middle  h-8 px-4 text-xs/6 border border-gray-400 text-gray-600 bg-gray-100 font-medium hover:bg-gray-300 hover:text-gray-700 {{ timetables|length > 1 ? '-ml-px' : 'rounded-l' }}' @click=\"layersOpen = !layersOpen\" :class=\"{'bg-gray-300 text-gray-700': layersOpen}\">
            {{ icon('outline', 'layers', 'inline-block size-4') }}
                <span class='hidden md:inline ml-2'>{{ __('Layers') }}</span>
            </button>

            <div x-cloak x-transition.opacity x-show=\"layersOpen\" @click.outside=\"layersOpen = false\" class=\"absolute min-w-48 -ml-px -mt-px z-20 flex flex-col justify-end rounded border bg-white shadow-lg p-3\">
                {% for layer in layers %}
                    
                    {% set color = structure.getColors(layer.getColor) %}

                    <div class=\"p-1 flex gap-2 items-center text-gray-700 cursor-pointer mr-4\" @click=\"{{ layer.getID }} = !{{ layer.getID }}\" hx-get=\"{{ preferencesUrl }}\" hx-target=\"this\" hx-trigger=\"click consume\" hx-swap=\"none\" hx-include=\"[name='{{ layer.getID }}']\" hx-vals='{\"scope\": \"ttLayers\", \"key\": \"{{ layer.getID }}\", \"default\": 0}' >
                        <input type=\"checkbox\" x-model=\"{{ layer.getID }}\" name=\"{{ layer.getID }}\" class=\"border p-1 {{ color.background }} {{ color.textLight }}\" checked=\"{{ layer.getID }}\"  >
                        <label class=\"select-none whitespace-nowrap text-sm\" :class=\"{'line-through opacity-50': !{{ layer.getID }} }\" for=\"{{ layer.getID }}\">
                            {{ layer.getName }}<span class=\"inline-block ml-2 text-gray-400 text-xs\">({{ layer.countItems }}) </span>
                        </label>
                    </div>
                    
                {% endfor %}
            </div>
        </div>

        <div class=\"relative\">
            <button type='button' class='inline-flex items-center align-middle h-8 px-2 text-xs/6 border border-gray-400 text-gray-600 bg-gray-100 font-medium hover:bg-gray-300 hover:text-gray-700 {{ layers|length > 1 ? 'rounded-r -ml-px' : 'rounded' }}' @click=\"optionsOpen = !optionsOpen\" :class=\"{'bg-gray-300 text-gray-700': optionsOpen}\">
                {{ icon('basic', 'ellipsis-vertical', 'inline-block size-5') }}
            </button>

            <div x-cloak x-transition.opacity x-show=\"optionsOpen\" @click.outside=\"optionsOpen = false\" class=\"absolute min-w-48 -ml-px -mt-px z-20 flex flex-col justify-end rounded border bg-white shadow-lg \">
                
                <nav class=\"py-1\">
                    {% if gibbonPersonID or gibbonSpaceID %}
                    <a href=\"{{ absoluteURL }}/report.php?q=/modules/Timetable/{{ gibbonPersonID ? 'tt_view.php&gibbonPersonID=' ~ gibbonPersonID : 'tt_space_view.php&gibbonSpaceID=' ~ gibbonSpaceID  }}&ttDate={{  structure.getCurrentDate.format('Y-m-d') }}&format=print&hideHeader=true\" target=\"_blank\" class=\"flex justify-start items-center align-middle select-none whitespace-nowrap text-sm px-3 py-1.5 gap-3 text-gray-700 hover:text-gray-800 hover:bg-gray-200\">
                        {{ icon('solid', 'print', 'inline-block size-5 text-gray-600') }}
                        {{ __('Print') }}
                    </a>
                    
                    <a href=\"{{ absoluteURL }}/index.php?q=/modules/Timetable/{{ gibbonPersonID ? 'tt_view.php&gibbonPersonID=' ~ gibbonPersonID : 'tt_space_view.php&gibbonSpaceID=' ~ gibbonSpaceID  }}&ttDate={{ structure.getCurrentDate.format('Y-m-d') }}\" target=\"_blank\" class=\"flex justify-start items-center align-middle select-none whitespace-nowrap text-sm px-3 py-1.5 gap-3 text-gray-700 hover:text-gray-800 hover:bg-gray-200\">
                        {{ icon('solid', 'external-link', 'inline-block size-5 text-gray-600') }}
                        {{ __('Open') }}
                    </a>

                    {% endif %}
                </nav>

                <nav class=\"py-1 px-2 border-t border-gray-400\">
                    {% set optionID = 'showCurrentTime' %}

                    <div class=\"p-1 flex gap-3 items-center text-gray-600 hover:text-gray-800 cursor-pointer mr-4\" @click=\"{{ optionID }} = !{{ optionID }}\" hx-get=\"{{ preferencesUrl }}\" hx-target=\"this\" hx-trigger=\"click consume\" hx-swap=\"none\" hx-include=\"[name='{{ optionID }}']\" hx-vals='{\"scope\": \"ttOptions\", \"key\": \"{{ optionID }}\", \"default\": 0}' >
                        <input type=\"checkbox\" x-model=\"{{ optionID }}\" name=\"{{ optionID }}\" class=\"border mx-0.5 p-1 {{ color.background }} {{ color.textLight }}\" value=\"1\" >
                        <label class=\"select-none whitespace-nowrap text-sm\" for=\"{{ optionID }}\">
                            {{ __('Show Current Time') }}
                        </label>
                    </div>

                </nav>
                
            </div>
        </div>

    </div>

    <div class=\"flex-shrink flex\">
    
        <button type='button' class='ttNav inline-flex items-center align-middle rounded-l h-8 px-3 text-xs/6 border border-gray-400 text-gray-600 bg-gray-100 font-medium hover:bg-gray-300 hover:text-gray-700'
        x-on:click='ttDate=\"{{ structure.getCurrentDate.modify(\"-1 week\")|date('Y-m-d') }}\"'>
        {{ icon('basic', 'chevron-left', 'inline-block size-5') }}
        <span class='hidden sm:inline sr-only'>{{ __('Last Week') }}</span></button>

        <button type='button' class='ttNav inline-flex items-center align-middle h-8 px-4 text-xs/6 border border-gray-400 text-gray-600 bg-gray-100 font-medium hover:bg-gray-300 hover:text-gray-700 -ml-px'
            x-on:click='ttDate=\"{{ structure.today.format('Y-m-d') }}\"' title=\"{{ __('This Week') }}\">
            {{ icon('basic', 'home', 'inline-block size-4') }}
            <span class='hidden sm:inline sr-only'>{{ __('This Week') }}</span>
        </button>

        <div class='relative hidden xl:inline-flex h-8 px-4 text-xs/6  -ml-px items-center border border-gray-400 text-gray-600 bg-gray-100 font-medium'>
            <div id=\"indicator\" class=\"absolute left-0 top-0 w-full h-full htmx-indicator bg-stripe animate-bg-slide opacity-0 transition-opacity duration-300 delay-150\"></div>

            {{ formatUsing('dateRangeReadable', structure.getStartDate, structure.getEndDate) }}
        </div>
            
        <button type='button' class='ttNav inline-flex items-center align-middle rounded-r h-8 px-3 text-xs/6 border border-gray-400 text-gray-600 bg-gray-100 font-medium hover:bg-gray-300 hover:text-gray-700 -ml-px'
            x-on:click='ttDate=\"{{ structure.getCurrentDate.modify(\"+1 week\")|date('Y-m-d') }}\"'><span class='hidden sm:inline mr-1 sr-only'>{{ __('Next Week') }}</span>
        {{ icon('basic', 'chevron-right', 'inline-block size-5') }}
        </button>

    </div>

    <div class=\" text-right inline-flex justify-end items-center text-xs/6\">

        <button type='button' class='ttNav inline-flex items-center rounded-l px-2 h-8 -mr-px text-base border border-gray-400 bg-gray-100 font-medium hover:bg-gray-300 text-gray-600 hover:text-gray-700' x-on:click='ttRefresh=true'>
            {{ icon('basic', 'refresh', 'size-4') }}
            </span>
        </button>

        <input name='ttDateChooser' id='ttDateChooser' aria-label='{{ __('Choose Date') }}' maxlength=10 value='{{ structure.getCurrentDate|date('Y-m-d') }}' type='date' required class='inline-flex border rounded-r bg-gray-100 text-xs/6 h-8 font-sans w-10 md:w-36 px-2 md:px-3'> 
    </div>

    </nav>
</form>

", "ui/timetableNav.twig.html", "/var/www/GibbonEduCore/resources/templates/ui/timetableNav.twig.html");
    }
}
