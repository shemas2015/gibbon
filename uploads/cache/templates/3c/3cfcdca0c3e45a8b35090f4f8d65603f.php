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

/* components/form.twig.html */
class __TwigTemplate_19ff69a194dfdad310922edc4da671b3 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'header' => [$this, 'block_header'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 10
        yield "
";
        // line 11
        $context["standardLayout"] = ((!CoreExtension::inFilter("noIntBorder", CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "getClass", [], "any", false, false, false, 11)) && !CoreExtension::inFilter("form-small", CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "getClass", [], "any", false, false, false, 11))) && !CoreExtension::inFilter("blank", CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "getClass", [], "any", false, false, false, 11)));
        // line 12
        $context["smallLayout"] = CoreExtension::inFilter("form-small", CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "getClass", [], "any", false, false, false, 12));
        // line 13
        $context["useSections"] = (!CoreExtension::inFilter("noIntBorder", CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "getClass", [], "any", false, false, false, 13)) && !CoreExtension::inFilter("blank", CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "getClass", [], "any", false, false, false, 13)));
        // line 14
        $context["useSaveWarning"] = (!CoreExtension::inFilter("noIntBorder", CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "getClass", [], "any", false, false, false, 14)) && !CoreExtension::inFilter("disable-warnings", CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "getClass", [], "any", false, false, false, 14)));
        // line 15
        yield "
";
        // line 16
        if ((($context["quickSave"] ?? null) && CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "getAction", [], "any", false, false, false, 16))) {
            // line 17
            yield "    <form x-validate ";
            yield CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "getAttributeString", [], "any", false, false, false, 17);
            yield " hx-trigger=\"quicksave, keydown[metaKey&&key=='s'] from:body\" hx-post=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "getAction", [], "any", false, false, false, 17), "html", null, true);
            yield "\" hx-target=\".formStatusReturn\" hx-select=\"#alerts\" hx-swap=\"innerHTML show:none swap:0.5s\" hx-disinherit=\"*\" hx-vals='{\"HX-QuickSave\": true}' x-data=\"{'show': true, 'saving': false, 'invalid': false, 'submitting': false, 'showTimeout': false}\" x-on:htmx:before-request=\"if (\$event.detail.requestConfig.elt.nodeName == 'FORM') { saving = true; show = true;  clearTimeout(showTimeout); }\" x-on:htmx:after-swap=\"saving = false\" x-on:htmx:after-settle=\"showTimeout = setTimeout(() => show = false, 5000); \$dispatch('saved');\" x-ref=\"form\" @submit=\"\$validate.submit; invalid = !\$validate.isComplete(\$el); if (invalid) submitting = false;\" @change.debounce.750ms=\"if (invalid) invalid = !\$validate.isComplete(\$el); \">

    <div class=\"formStatus fixed bottom-0 right-4 z-50\" x-cloak>
        <div class=\"formIndicator magic drop-shadow-md\" x-show=\"saving\" >";
            // line 20
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Saving"), "html", null, true);
            yield " ...</div>
        <div class=\"formStatusReturn drop-shadow-md\" x-show=\"!saving && show\" ></div>
    </div>
";
        } elseif ((CoreExtension::getAttribute($this->env, $this->source,         // line 23
($context["form"] ?? null), "getAction", [], "any", false, false, false, 23) != "ajax")) {
            // line 24
            yield "    <form x-validate ";
            yield CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "getAttributeString", [], "any", false, false, false, 24);
            yield " x-data=\"{'advancedOptions': ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "getData", ["advanced-options"], "method", true, true, false, 24)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "getData", ["advanced-options"], "method", false, false, false, 24), "false")) : ("false")), "html", null, true);
            yield ", 'invalid': false, 'submitting': false}\"  x-ref=\"form\" @submit=\"\$validate.submit; invalid = !\$validate.isComplete(\$el); if (invalid) submitting = false;\" @change.debounce.750ms=\"if (invalid) invalid = !\$validate.isComplete(\$el); \">
";
        }
        // line 26
        yield "
    ";
        // line 27
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "hasPages", [], "any", false, false, false, 27)) {
            // line 28
            yield "        <ul class=\"multiPartForm my-6\">
            ";
            // line 29
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "getPages", [], "any", false, false, false, 29));
            foreach ($context['_seq'] as $context["_key"] => $context["page"]) {
                // line 30
                yield "            <li class=\"step ";
                yield (((CoreExtension::getAttribute($this->env, $this->source, $context["page"], "number", [], "any", false, false, false, 30) <= CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "getCurrentPage", [], "any", false, false, false, 30))) ? ("active") : (""));
                yield "\">
                ";
                // line 31
                if (((CoreExtension::getAttribute($this->env, $this->source, $context["page"], "url", [], "any", false, false, false, 31) && (CoreExtension::getAttribute($this->env, $this->source, $context["page"], "number", [], "any", false, false, false, 31) <= CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "getMaxPage", [], "any", false, false, false, 31))) && (CoreExtension::getAttribute($this->env, $this->source, $context["page"], "number", [], "any", false, false, false, 31) != CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "getCurrentPage", [], "any", false, false, false, 31)))) {
                    // line 32
                    yield "                    <a href=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["page"], "url", [], "any", false, false, false, 32), "html", null, true);
                    yield "\" class=\"-mt-10 pt-10 text-gray-800 hover:text-purple-600 hover:underline\">
                ";
                }
                // line 34
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["page"], "name", [], "any", false, false, false, 34), "html", null, true);
                // line 35
                if (((CoreExtension::getAttribute($this->env, $this->source, $context["page"], "url", [], "any", false, false, false, 35) && (CoreExtension::getAttribute($this->env, $this->source, $context["page"], "number", [], "any", false, false, false, 35) <= CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "getMaxPage", [], "any", false, false, false, 35))) && (CoreExtension::getAttribute($this->env, $this->source, $context["page"], "number", [], "any", false, false, false, 35) != CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "getCurrentPage", [], "any", false, false, false, 35)))) {
                    // line 36
                    yield "                    </a>
                ";
                }
                // line 38
                yield "            </li>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['page'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 40
            yield "        </ul>
    ";
        }
        // line 42
        yield "
    ";
        // line 43
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "getTitle", [], "any", false, false, false, 43) &&  !CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "getHeader", [], "any", false, false, false, 43))) {
            // line 44
            yield "        <h2>";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "getTitle", [], "any", false, false, false, 44), "html", null, true);
            yield "</h2>
    ";
        }
        // line 46
        yield "
    ";
        // line 47
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "getDescription", [], "any", false, false, false, 47)) {
            // line 48
            yield "        <p>";
            yield CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "getDescription", [], "any", false, false, false, 48);
            yield "</p>
    ";
        }
        // line 50
        yield "
    ";
        // line 51
        if (($context["introduction"] ?? null)) {
            // line 52
            yield "        <p>";
            yield ($context["introduction"] ?? null);
            yield "</p>
    ";
        }
        // line 54
        yield "
    ";
        // line 55
        yield from $this->unwrap()->yieldBlock('header', $context, $blocks);
        // line 67
        yield "
    ";
        // line 68
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "getHiddenValues", [], "any", false, false, false, 68));
        foreach ($context['_seq'] as $context["_key"] => $context["values"]) {
            // line 69
            yield "        <input type=\"hidden\" name=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["values"], "name", [], "any", false, false, false, 69), "html", null, true);
            yield "\" value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["values"], "value", [], "any", false, false, false, 69), "html", null, true);
            yield "\">
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['values'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 71
        yield "
    ";
        // line 72
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "getRows", [], "any", false, false, false, 72)) > 0)) {
            // line 73
            yield "    <div id=\"form\" class=\"w-full grid grid-cols-5 xl:grid-cols-8 gap-2 sm:gap-4 font-sans text-xs text-gray-700  ";
            yield ((CoreExtension::inFilter("noIntBorder", CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "getClass", [], "any", false, false, false, 73))) ? ("border bg-blue-50 rounded p-4") : (""));
            yield "\" style=\"\" cellspacing=\"0\" 
        ";
            // line 74
            if (($context["useSaveWarning"] ?? null)) {
                // line 75
                yield "        x-data=\"{changed: false, 
            checkInput(formElement) {  
                document.getElementById(formElement.id).addEventListener('input', (evt) => {
                    this.changed = true;
                    window.onbeforeunload = function(event) {
                        if (event.target.activeElement.nodeName == 'INPUT' || event.target.activeElement.type=='submit' || event.target.activeElement.classList.contains('submit-button')) return;
                        return Gibbon.config.htmx.unload_confirm;
                    };
                });
            },
            afterSave() {
                this.changed = false;
                window.onbeforeunload = null;
            },
        }\" x-init=\"checkInput(\$el)\" @saved.window=\"afterSave()\"
        ";
            }
            // line 91
            yield "        >

        <div class=\"";
            // line 93
            yield (((($context["standardLayout"] ?? null) && CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "hasMeta", [], "any", false, false, false, 93))) ? ("col-span-6") : ("col-span-8"));
            yield "\">

        ";
            // line 95
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "getRowsByHeading", [], "any", false, false, false, 95));
            $context['loop'] = [
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            ];
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["section"] => $context["rows"]) {
                // line 96
                yield "            ";
                $context["sectionLoop"] = $context["loop"];
                // line 97
                yield "
            ";
                // line 98
                if (($context["useSections"] ?? null)) {
                    // line 99
                    yield "            <section class=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::first($this->env->getCharset(), Twig\Extension\CoreExtension::split($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, Twig\Extension\CoreExtension::first($this->env->getCharset(), $context["rows"]), "class", [], "any", false, false, false, 99), " ")), "html", null, true);
                    yield " mb-6 pb-4 rounded bg-gray-50 border  ";
                    yield (( !CoreExtension::getAttribute($this->env, $this->source, ($context["sectionLoop"] ?? null), "last", [], "any", false, false, false, 99)) ? ("border-t-4 focus-within:border-t-blue-500 transition") : (""));
                    yield " ";
                    yield ((($context["section"] == "submit")) ? ("w-full sm:sticky -bottom-px -mt-px mb-px z-40") : (((($context["standardLayout"] ?? null)) ? ("  ") : (""))));
                    yield "\" >
            ";
                }
                // line 101
                yield "
            ";
                // line 102
                $context["isformTable"] = CoreExtension::getAttribute($this->env, $this->source, Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, Twig\Extension\CoreExtension::first($this->env->getCharset(), $context["rows"]), "getElements", [], "any", false, false, false, 102)), "isInstanceOf", ["Gibbon\\Forms\\Layout\\Table"], "method", false, false, false, 102);
                // line 103
                yield "
            ";
                // line 104
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable($context["rows"]);
                $context['loop'] = [
                  'parent' => $context['_parent'],
                  'index0' => 0,
                  'index'  => 1,
                  'first'  => true,
                ];
                if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                    $length = count($context['_seq']);
                    $context['loop']['revindex0'] = $length - 1;
                    $context['loop']['revindex'] = $length;
                    $context['loop']['length'] = $length;
                    $context['loop']['last'] = 1 === $length;
                }
                foreach ($context['_seq'] as $context["num"] => $context["row"]) {
                    // line 105
                    yield "
                ";
                    // line 106
                    $context["rowLoop"] = $context["loop"];
                    // line 107
                    yield "
                ";
                    // line 108
                    $context["rowClass"] = ((($context["section"] == "submit")) ? ("flex flex-row content-center p-0 gap-2 sm:gap-4 justify-end sm:items-center") : ("flex flex-col sm:flex-row  content-center p-0 gap-2 sm:gap-4 justify-between sm:items-start"));
                    // line 112
                    yield "                
                <div id=\"";
                    // line 113
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["row"], "getID", [], "any", false, false, false, 113), "html", null, true);
                    yield "\" class=\"";
                    yield (((($context["standardLayout"] ?? null) &&  !($context["isformTable"] ?? null))) ? (" px-4 sm:px-8 py-4") : (((($context["smallLayout"] ?? null)) ? ("px-2 py-2") : (((CoreExtension::inFilter("noIntBorder", CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "getClass", [], "any", false, false, false, 113))) ? ("py-2") : (""))))));
                    yield "  ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::replace(CoreExtension::getAttribute($this->env, $this->source, $context["row"], "getClass", [], "any", false, false, false, 113), ["standardWidth" => ""]), "html", null, true);
                    yield " ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["rowClass"] ?? null), "html", null, true);
                    yield "  \" ";
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["row"], "getAttributeString", ["", "id,class"], "method", false, false, false, 113);
                    yield ">
  
                ";
                    // line 115
                    if ((($context["quickSave"] ?? null) && ($context["section"] == "submit"))) {
                        // line 116
                        yield "                    <span class=\"text-xs text-gray-600 flex-1\">
                        ";
                        // line 117
                        yield $this->env->getFunction('__')->getCallable()("Press {shortcut} to {action}", ["shortcut" => "<kbd class=\"bg-white\">⌘ Cmd</kbd> + <kbd class=\"bg-white\">S</kbd>", "action" => $this->env->getFunction('__')->getCallable()("quick save")]);
                        yield "
                    </span>
                ";
                    }
                    // line 120
                    yield "
                ";
                    // line 121
                    if (CoreExtension::inFilter("draggableRow", CoreExtension::getAttribute($this->env, $this->source, $context["row"], "getClass", [], "any", false, false, false, 121))) {
                        // line 122
                        yield "                    <div class=\"drag-handle w-2 h-6 -ml-4 px-px border-4 border-dotted cursor-move\"></div>
                ";
                    }
                    // line 124
                    yield "        
                ";
                    // line 125
                    $context['_parent'] = $context;
                    $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["row"], "getElements", [], "any", false, false, false, 125));
                    $context['loop'] = [
                      'parent' => $context['_parent'],
                      'index0' => 0,
                      'index'  => 1,
                      'first'  => true,
                    ];
                    if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                        $length = count($context['_seq']);
                        $context['loop']['revindex0'] = $length - 1;
                        $context['loop']['revindex'] = $length;
                        $context['loop']['length'] = $length;
                        $context['loop']['last'] = 1 === $length;
                    }
                    foreach ($context['_seq'] as $context["_key"] => $context["element"]) {
                        // line 126
                        yield "
                    ";
                        // line 127
                        if (CoreExtension::getAttribute($this->env, $this->source, $context["element"], "isInstanceOf", ["Gibbon\\Forms\\Layout\\Heading"], "method", false, false, false, 127)) {
                            // line 128
                            yield "                        ";
                            $context["class"] = "flex-grow justify-center";
                            // line 129
                            yield "                    ";
                        } elseif (CoreExtension::getAttribute($this->env, $this->source, $context["element"], "isInstanceOf", ["Gibbon\\Forms\\Layout\\Label"], "method", false, false, false, 129)) {
                            // line 130
                            yield "                        ";
                            $context["class"] = "sm:w-2/5 flex flex-col justify-center sm:mb-0";
                            // line 131
                            yield "                    ";
                        } elseif (CoreExtension::getAttribute($this->env, $this->source, $context["element"], "isInstanceOf", ["Gibbon\\Forms\\Layout\\Column"], "method", false, false, false, 131)) {
                            // line 132
                            yield "                        ";
                            $context["class"] = (((CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "last", [], "any", false, false, false, 132) && (CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "length", [], "any", false, false, false, 132) == 2))) ? ("flex-1 relative flex justify-end items-center") : (""));
                            // line 133
                            yield "                    ";
                        } elseif ((CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "last", [], "any", false, false, false, 133) && ((CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "length", [], "any", false, false, false, 133) == 2) || CoreExtension::inFilter("noIntBorder", CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "getClass", [], "any", false, false, false, 133))))) {
                            // line 134
                            yield "                        ";
                            $context["class"] = "flex-1 relative flex justify-end items-center";
                            // line 135
                            yield "                    ";
                        } else {
                            // line 136
                            yield "                        ";
                            $context["class"] = "";
                            // line 137
                            yield "                    ";
                        }
                        // line 138
                        yield "
                    ";
                        // line 139
                        $context["hasClass"] = (CoreExtension::getAttribute($this->env, $this->source, $context["element"], "instanceOf", ["Gibbon\\Forms\\Layout\\Element"], "method", false, false, false, 139) || CoreExtension::getAttribute($this->env, $this->source, $context["element"], "instanceOf", ["Gibbon\\Forms\\Layout\\Row"], "method", false, false, false, 139));
                        // line 140
                        yield "                    ";
                        $context["class"] = ((($context["hasClass"] ?? null)) ? (((($context["class"] ?? null) . " ") . CoreExtension::getAttribute($this->env, $this->source, $context["element"], "getClass", [], "any", false, false, false, 140))) : (($context["class"] ?? null)));
                        // line 141
                        yield "                    <div class=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["class"] ?? null), "html", null, true);
                        yield " ";
                        yield (((!CoreExtension::inFilter("flex-", ($context["class"] ?? null)) && ($context["section"] != "submit"))) ? ("flex-1") : (""));
                        yield "\" ";
                        yield CoreExtension::getAttribute($this->env, $this->source, $context["element"], "getAttributeString", ["x-show"], "method", false, false, false, 141);
                        yield ">

                        ";
                        // line 143
                        if ((($context["useSaveWarning"] ?? null) && (CoreExtension::getAttribute($this->env, $this->source, $context["element"], "getAttribute", ["id"], "method", false, false, false, 143) == "Submit"))) {
                            // line 144
                            yield "                            <span x-cloak x-show=\"changed\" class=\"tag message mr-4 whitespace-nowrap\">";
                            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Unsaved Changes"), "html", null, true);
                            yield "</span>
                        ";
                        }
                        // line 146
                        yield "
                        ";
                        // line 147
                        if ((CoreExtension::getAttribute($this->env, $this->source, $context["element"], "getAttribute", ["id"], "method", false, false, false, 147) == "Submit")) {
                            // line 148
                            yield "                            <span x-cloak x-show=\"invalid\" class=\"tag error mr-4 whitespace-nowrap\">";
                            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Please Check Form"), "html", null, true);
                            yield "</span>
                        ";
                        }
                        // line 150
                        yield "
                        ";
                        // line 151
                        yield CoreExtension::getAttribute($this->env, $this->source, $context["element"], "getOutput", [], "any", false, false, false, 151);
                        yield "
                    </div>
                ";
                        ++$context['loop']['index0'];
                        ++$context['loop']['index'];
                        $context['loop']['first'] = false;
                        if (isset($context['loop']['length'])) {
                            --$context['loop']['revindex0'];
                            --$context['loop']['revindex'];
                            $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                        }
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['element'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 154
                    yield "
                </div>
            ";
                    ++$context['loop']['index0'];
                    ++$context['loop']['index'];
                    $context['loop']['first'] = false;
                    if (isset($context['loop']['length'])) {
                        --$context['loop']['revindex0'];
                        --$context['loop']['revindex'];
                        $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['num'], $context['row'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 157
                yield "
            ";
                // line 158
                if (($context["useSections"] ?? null)) {
                    // line 159
                    yield "            </section>
            ";
                }
                // line 161
                yield "
        ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['section'], $context['rows'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 163
            yield "        </div>

        ";
            // line 165
            if ((CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "hasMeta", [], "any", false, false, false, 165) && (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "getMeta", [], "any", false, false, false, 165), "getElementCount", [], "any", false, false, false, 165) > 0))) {
                // line 166
                yield "        <aside class=\"hidden xl:flex flex-col col-span-2 h-min bg-gray-50 rounded border border-gray-400 border-t-4 border-t-gray-400\">
            ";
                // line 167
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "getMeta", [], "any", false, false, false, 167), "getElements", [], "any", false, false, false, 167));
                $context['loop'] = [
                  'parent' => $context['_parent'],
                  'index0' => 0,
                  'index'  => 1,
                  'first'  => true,
                ];
                if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                    $length = count($context['_seq']);
                    $context['loop']['revindex0'] = $length - 1;
                    $context['loop']['revindex'] = $length;
                    $context['loop']['length'] = $length;
                    $context['loop']['last'] = 1 === $length;
                }
                foreach ($context['_seq'] as $context["_key"] => $context["element"]) {
                    // line 168
                    yield "                ";
                    $context["hasClass"] = (CoreExtension::getAttribute($this->env, $this->source, $context["element"], "instanceOf", ["Gibbon\\Forms\\Layout\\Element"], "method", false, false, false, 168) || CoreExtension::getAttribute($this->env, $this->source, $context["element"], "instanceOf", ["Gibbon\\Forms\\Layout\\Row"], "method", false, false, false, 168));
                    // line 169
                    yield "            
                <div class=\"p-4 ";
                    // line 170
                    yield (( !CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "last", [], "any", false, false, false, 170)) ? ("border-b") : (""));
                    yield " ";
                    ((($context["hasClass"] ?? null)) ? (yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["element"], "getClass", [], "any", false, false, false, 170), "html", null, true)) : (yield ""));
                    yield "\" 
                    ";
                    // line 171
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["element"], "getAttributeString", ["", "id,class"], "method", false, false, false, 171);
                    yield ">
                    ";
                    // line 172
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["element"], "getOutput", [], "any", false, false, false, 172);
                    yield "
                </div>
            ";
                    ++$context['loop']['index0'];
                    ++$context['loop']['index'];
                    $context['loop']['first'] = false;
                    if (isset($context['loop']['length'])) {
                        --$context['loop']['revindex0'];
                        --$context['loop']['revindex'];
                        $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['element'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 175
                yield "
            <template x-if=\"invalid\">
                <div class=\"p-4 border-t\">
                    <span class=\"tag error\">";
                // line 178
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Please check these fields"), "html", null, true);
                yield ":</span>

                    <ul class=\"ml-6\">
                    <template x-for=\"v in \$validate.data(\$refs.form)\" >
                        <template x-if=\"!v.valid && v.node.labels.length > 0\">
                        <li>
                            <span x-text=\"v.node.labels[0].ariaLabel\" :aria-label=\"v.name\" class=\"text-xs\"></span>
                        </li>
                        </template>
                    </template>
                    

                    </ul>
                </div>
            </template>
        </aside>
        ";
            }
            // line 195
            yield "
    </div>
    ";
        }
        // line 198
        yield "
    ";
        // line 199
        if (($context["postScript"] ?? null)) {
            // line 200
            yield "    <p>";
            yield ($context["postScript"] ?? null);
            yield "</p>
    ";
        }
        // line 202
        yield "
    <script type=\"text/javascript\">
        ";
        // line 204
        if ((($context["quickSave"] ?? null) && CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "getAction", [], "any", false, false, false, 204))) {
            // line 205
            yield "        \$(document).keydown(function(event) {
            if (!((String.fromCharCode(event.which).toLowerCase() == 's' || event.keyCode == 13) && event.metaKey) && !(event.which == 19)) return true;
            event.preventDefault();
            return false;
        });
        ";
        }
        // line 211
        yield "
        ";
        // line 212
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["javascript"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["code"]) {
            // line 213
            yield "            ";
            yield $context["code"];
            yield "
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['code'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 215
        yield "    </script>

";
        // line 217
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "getAction", [], "any", false, false, false, 217) != "ajax")) {
            // line 218
            yield "</form>
";
        }
        return; yield '';
    }

    // line 55
    public function block_header($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 56
        yield "        <header class=\"relative print:hidden flex justify-between items-end mb-2 ";
        yield ((($context["standardLayout"] ?? null)) ? ("") : (""));
        yield "\">
            ";
        // line 57
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "getHeader", [], "any", false, false, false, 57)) {
            // line 58
            yield "                <h2>";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "getTitle", [], "any", false, false, false, 58), "html", null, true);
            yield "</h2>
                <div class=\"linkTop flex justify-end gap-2 h-10 py-px\">
                    ";
            // line 60
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "getHeader", [], "any", false, false, false, 60));
            foreach ($context['_seq'] as $context["_key"] => $context["action"]) {
                // line 61
                yield "                        ";
                yield CoreExtension::getAttribute($this->env, $this->source, $context["action"], "getOutput", [], "any", false, false, false, 61);
                yield "
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['action'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 63
            yield "                </div>
            ";
        }
        // line 65
        yield "        </header>
    ";
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "components/form.twig.html";
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
        return array (  654 => 65,  650 => 63,  641 => 61,  637 => 60,  631 => 58,  629 => 57,  624 => 56,  620 => 55,  613 => 218,  611 => 217,  607 => 215,  598 => 213,  594 => 212,  591 => 211,  583 => 205,  581 => 204,  577 => 202,  571 => 200,  569 => 199,  566 => 198,  561 => 195,  541 => 178,  536 => 175,  519 => 172,  515 => 171,  509 => 170,  506 => 169,  503 => 168,  486 => 167,  483 => 166,  481 => 165,  477 => 163,  462 => 161,  458 => 159,  456 => 158,  453 => 157,  437 => 154,  420 => 151,  417 => 150,  411 => 148,  409 => 147,  406 => 146,  400 => 144,  398 => 143,  388 => 141,  385 => 140,  383 => 139,  380 => 138,  377 => 137,  374 => 136,  371 => 135,  368 => 134,  365 => 133,  362 => 132,  359 => 131,  356 => 130,  353 => 129,  350 => 128,  348 => 127,  345 => 126,  328 => 125,  325 => 124,  321 => 122,  319 => 121,  316 => 120,  310 => 117,  307 => 116,  305 => 115,  292 => 113,  289 => 112,  287 => 108,  284 => 107,  282 => 106,  279 => 105,  262 => 104,  259 => 103,  257 => 102,  254 => 101,  244 => 99,  242 => 98,  239 => 97,  236 => 96,  219 => 95,  214 => 93,  210 => 91,  192 => 75,  190 => 74,  185 => 73,  183 => 72,  180 => 71,  169 => 69,  165 => 68,  162 => 67,  160 => 55,  157 => 54,  151 => 52,  149 => 51,  146 => 50,  140 => 48,  138 => 47,  135 => 46,  129 => 44,  127 => 43,  124 => 42,  120 => 40,  113 => 38,  109 => 36,  107 => 35,  105 => 34,  99 => 32,  97 => 31,  92 => 30,  88 => 29,  85 => 28,  83 => 27,  80 => 26,  72 => 24,  70 => 23,  64 => 20,  55 => 17,  53 => 16,  50 => 15,  48 => 14,  46 => 13,  44 => 12,  42 => 11,  39 => 10,);
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

{% set standardLayout = \"noIntBorder\" not in form.getClass and \"form-small\" not in form.getClass and \"blank\" not in form.getClass %}
{% set smallLayout = \"form-small\" in form.getClass %}
{% set useSections = \"noIntBorder\" not in form.getClass and \"blank\" not in form.getClass %}
{% set useSaveWarning = \"noIntBorder\" not in form.getClass and \"disable-warnings\" not in form.getClass %}

{% if quickSave and form.getAction %}
    <form x-validate {{ form.getAttributeString|raw }} hx-trigger=\"quicksave, keydown[metaKey&&key=='s'] from:body\" hx-post=\"{{ form.getAction }}\" hx-target=\".formStatusReturn\" hx-select=\"#alerts\" hx-swap=\"innerHTML show:none swap:0.5s\" hx-disinherit=\"*\" hx-vals='{\"HX-QuickSave\": true}' x-data=\"{'show': true, 'saving': false, 'invalid': false, 'submitting': false, 'showTimeout': false}\" x-on:htmx:before-request=\"if (\$event.detail.requestConfig.elt.nodeName == 'FORM') { saving = true; show = true;  clearTimeout(showTimeout); }\" x-on:htmx:after-swap=\"saving = false\" x-on:htmx:after-settle=\"showTimeout = setTimeout(() => show = false, 5000); \$dispatch('saved');\" x-ref=\"form\" @submit=\"\$validate.submit; invalid = !\$validate.isComplete(\$el); if (invalid) submitting = false;\" @change.debounce.750ms=\"if (invalid) invalid = !\$validate.isComplete(\$el); \">

    <div class=\"formStatus fixed bottom-0 right-4 z-50\" x-cloak>
        <div class=\"formIndicator magic drop-shadow-md\" x-show=\"saving\" >{{ __('Saving') }} ...</div>
        <div class=\"formStatusReturn drop-shadow-md\" x-show=\"!saving && show\" ></div>
    </div>
{% elseif form.getAction != 'ajax' %}
    <form x-validate {{ form.getAttributeString|raw }} x-data=\"{'advancedOptions': {{ form.getData('advanced-options')|default('false') }}, 'invalid': false, 'submitting': false}\"  x-ref=\"form\" @submit=\"\$validate.submit; invalid = !\$validate.isComplete(\$el); if (invalid) submitting = false;\" @change.debounce.750ms=\"if (invalid) invalid = !\$validate.isComplete(\$el); \">
{% endif %}

    {% if form.hasPages %}
        <ul class=\"multiPartForm my-6\">
            {% for page in form.getPages %}
            <li class=\"step {{ page.number <= form.getCurrentPage ? 'active' : '' }}\">
                {% if page.url and page.number <= form.getMaxPage and page.number != form.getCurrentPage %}
                    <a href=\"{{ page.url }}\" class=\"-mt-10 pt-10 text-gray-800 hover:text-purple-600 hover:underline\">
                {% endif %}
                {{- page.name -}}
                {% if page.url and page.number <= form.getMaxPage and page.number != form.getCurrentPage %}
                    </a>
                {% endif %}
            </li>
            {% endfor %}
        </ul>
    {% endif %}

    {% if form.getTitle and not form.getHeader %}
        <h2>{{ form.getTitle }}</h2>
    {% endif %}

    {% if form.getDescription %}
        <p>{{ form.getDescription|raw }}</p>
    {% endif %}

    {% if introduction %}
        <p>{{ introduction|raw }}</p>
    {% endif %}

    {% block header %}
        <header class=\"relative print:hidden flex justify-between items-end mb-2 {{ standardLayout ? '' }}\">
            {% if form.getHeader %}
                <h2>{{ form.getTitle }}</h2>
                <div class=\"linkTop flex justify-end gap-2 h-10 py-px\">
                    {% for action in form.getHeader %}
                        {{ action.getOutput|raw }}
                    {% endfor %}
                </div>
            {% endif %}
        </header>
    {% endblock header %}

    {% for values in form.getHiddenValues %}
        <input type=\"hidden\" name=\"{{ values.name }}\" value=\"{{ values.value }}\">
    {% endfor %}

    {% if form.getRows|length > 0 %}
    <div id=\"form\" class=\"w-full grid grid-cols-5 xl:grid-cols-8 gap-2 sm:gap-4 font-sans text-xs text-gray-700  {{ \"noIntBorder\" in form.getClass ? 'border bg-blue-50 rounded p-4' }}\" style=\"\" cellspacing=\"0\" 
        {% if useSaveWarning %}
        x-data=\"{changed: false, 
            checkInput(formElement) {  
                document.getElementById(formElement.id).addEventListener('input', (evt) => {
                    this.changed = true;
                    window.onbeforeunload = function(event) {
                        if (event.target.activeElement.nodeName == 'INPUT' || event.target.activeElement.type=='submit' || event.target.activeElement.classList.contains('submit-button')) return;
                        return Gibbon.config.htmx.unload_confirm;
                    };
                });
            },
            afterSave() {
                this.changed = false;
                window.onbeforeunload = null;
            },
        }\" x-init=\"checkInput(\$el)\" @saved.window=\"afterSave()\"
        {% endif %}
        >

        <div class=\"{{ standardLayout and form.hasMeta ? 'col-span-6' : 'col-span-8' }}\">

        {% for section, rows in form.getRowsByHeading %}
            {% set sectionLoop = loop %}

            {% if useSections %}
            <section class=\"{{ (rows|first).class|split(' ')|first }} mb-6 pb-4 rounded bg-gray-50 border  {{ not sectionLoop.last ? 'border-t-4 focus-within:border-t-blue-500 transition' }} {{ section == 'submit' ? 'w-full sm:sticky -bottom-px -mt-px mb-px z-40' : standardLayout ? '  ' : ''}}\" >
            {% endif %}

            {% set isformTable = ((rows|first).getElements|first).isInstanceOf('Gibbon\\\\Forms\\\\Layout\\\\Table') %}

            {% for num, row in rows %}

                {% set rowLoop = loop %}

                {% set rowClass = section == 'submit' 
                    ? 'flex flex-row content-center p-0 gap-2 sm:gap-4 justify-end sm:items-center' 
                    : 'flex flex-col sm:flex-row  content-center p-0 gap-2 sm:gap-4 justify-between sm:items-start' 
                %}
                
                <div id=\"{{ row.getID }}\" class=\"{{ standardLayout and not isformTable ? ' px-4 sm:px-8 py-4' : smallLayout ? 'px-2 py-2' : \"noIntBorder\" in form.getClass ? 'py-2' }}  {{ row.getClass|replace({'standardWidth': ''}) }} {{ rowClass }}  \" {{ row.getAttributeString('', 'id,class')|raw }}>
  
                {% if quickSave and section == 'submit' %}
                    <span class=\"text-xs text-gray-600 flex-1\">
                        {{ __('Press {shortcut} to {action}', {shortcut: '<kbd class=\"bg-white\">⌘ Cmd</kbd> + <kbd class=\"bg-white\">S</kbd>', action: __('quick save')} )|raw }}
                    </span>
                {% endif %}

                {% if \"draggableRow\" in row.getClass %}
                    <div class=\"drag-handle w-2 h-6 -ml-4 px-px border-4 border-dotted cursor-move\"></div>
                {% endif %}
        
                {% for element in row.getElements %}

                    {% if element.isInstanceOf('Gibbon\\\\Forms\\\\Layout\\\\Heading') %}
                        {% set class = 'flex-grow justify-center' %}
                    {% elseif element.isInstanceOf('Gibbon\\\\Forms\\\\Layout\\\\Label') %}
                        {% set class = 'sm:w-2/5 flex flex-col justify-center sm:mb-0' %}
                    {% elseif element.isInstanceOf('Gibbon\\\\Forms\\\\Layout\\\\Column')  %}
                        {% set class = loop.last and loop.length == 2 ? 'flex-1 relative flex justify-end items-center' : '' %}
                    {% elseif loop.last and (loop.length == 2 or \"noIntBorder\" in form.getClass) %}
                        {% set class = 'flex-1 relative flex justify-end items-center' %}
                    {% else %}
                        {% set class = '' %}
                    {% endif %}

                    {% set hasClass = element.instanceOf('Gibbon\\\\Forms\\\\Layout\\\\Element') or element.instanceOf('Gibbon\\\\Forms\\\\Layout\\\\Row') %}
                    {% set class = hasClass ? class ~ ' ' ~  element.getClass : class %}
                    <div class=\"{{ class }} {{ 'flex-' not in class and section != 'submit' ? 'flex-1' }}\" {{ element.getAttributeString('x-show')|raw }}>

                        {% if useSaveWarning and element.getAttribute('id') == 'Submit' %}
                            <span x-cloak x-show=\"changed\" class=\"tag message mr-4 whitespace-nowrap\">{{ __('Unsaved Changes') }}</span>
                        {% endif %}

                        {% if element.getAttribute('id') == 'Submit' %}
                            <span x-cloak x-show=\"invalid\" class=\"tag error mr-4 whitespace-nowrap\">{{ __('Please Check Form') }}</span>
                        {% endif %}

                        {{ element.getOutput|raw }}
                    </div>
                {% endfor %}

                </div>
            {% endfor %}

            {% if useSections %}
            </section>
            {% endif %}

        {% endfor %}
        </div>

        {% if form.hasMeta and form.getMeta.getElementCount > 0 %}
        <aside class=\"hidden xl:flex flex-col col-span-2 h-min bg-gray-50 rounded border border-gray-400 border-t-4 border-t-gray-400\">
            {% for element in form.getMeta.getElements %}
                {% set hasClass = element.instanceOf('Gibbon\\\\Forms\\\\Layout\\\\Element') or element.instanceOf('Gibbon\\\\Forms\\\\Layout\\\\Row') %}
            
                <div class=\"p-4 {{ not loop.last ? 'border-b'}} {{ hasClass ? element.getClass }}\" 
                    {{ element.getAttributeString('', 'id,class')|raw }}>
                    {{ element.getOutput|raw }}
                </div>
            {% endfor %}

            <template x-if=\"invalid\">
                <div class=\"p-4 border-t\">
                    <span class=\"tag error\">{{ __('Please check these fields') }}:</span>

                    <ul class=\"ml-6\">
                    <template x-for=\"v in \$validate.data(\$refs.form)\" >
                        <template x-if=\"!v.valid && v.node.labels.length > 0\">
                        <li>
                            <span x-text=\"v.node.labels[0].ariaLabel\" :aria-label=\"v.name\" class=\"text-xs\"></span>
                        </li>
                        </template>
                    </template>
                    

                    </ul>
                </div>
            </template>
        </aside>
        {% endif %}

    </div>
    {% endif %}

    {% if postScript %}
    <p>{{ postScript|raw }}</p>
    {% endif %}

    <script type=\"text/javascript\">
        {% if quickSave and form.getAction %}
        \$(document).keydown(function(event) {
            if (!((String.fromCharCode(event.which).toLowerCase() == 's' || event.keyCode == 13) && event.metaKey) && !(event.which == 19)) return true;
            event.preventDefault();
            return false;
        });
        {% endif %}

        {% for code in javascript %}
            {{ code|raw }}
        {% endfor %}
    </script>

{% if form.getAction != 'ajax' %}
</form>
{% endif %}
", "components/form.twig.html", "/var/www/GibbonEduCore/resources/templates/components/form.twig.html");
    }
}
