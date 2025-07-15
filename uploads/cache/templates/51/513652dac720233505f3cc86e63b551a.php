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

/* ui/timetableItem.twig.html */
class __TwigTemplate_4aa950f3dd375ab884f1f2186f8450a0 extends Template
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
";
        // line 11
        $context["isActive"] = (((($context["isToday"] ?? null) && (($context["now"] ?? null) > CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "timeStart", [], "any", false, false, false, 11))) && (($context["now"] ?? null) <= CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "timeEnd", [], "any", false, false, false, 11))) && ( !($context["format"] ?? null) == "print"));
        // line 12
        $context["color"] = CoreExtension::getAttribute($this->env, $this->source, ($context["structure"] ?? null), "getColors", [(((CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "color", [], "any", true, true, false, 12) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "color", [], "any", false, false, false, 12)))) ? (CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "color", [], "any", false, false, false, 12)) : (CoreExtension::getAttribute($this->env, $this->source, ($context["layer"] ?? null), "getColor", [], "any", false, false, false, 12)))], "method", false, false, false, 12);
        // line 13
        $context["duration"] = ((CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "allDay", [], "any", false, false, false, 13)) ? (30) : (CoreExtension::getAttribute($this->env, $this->source, ($context["structure"] ?? null), "timeDifference", [CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "timeStart", [], "any", false, false, false, 13), CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "timeEnd", [], "any", false, false, false, 13)], "method", false, false, false, 13)));
        // line 14
        yield "
<div x-data=\"{showOverlap: false}\" class=\"";
        // line 15
        yield ((( !CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "allDay", [], "any", false, false, false, 15) &&  !($context["overlap"] ?? null))) ? ("ttItem") : (""));
        yield " flex flex-col w-full rounded outline hover:ring ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((($context["isActive"] ?? null)) ? (("relative outline-3 " . CoreExtension::getAttribute($this->env, $this->source, ($context["color"] ?? null), "outline", [], "any", false, false, false, 15))) : (("outline-1 " . CoreExtension::getAttribute($this->env, $this->source, ($context["color"] ?? null), "outlineLight", [], "any", false, false, false, 15)))), "html", null, true);
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["color"] ?? null), "outlineHover", [], "any", false, false, false, 15), "html", null, true);
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["color"] ?? null), "background", [], "any", false, false, false, 15), "html", null, true);
        yield " ";
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "style", [], "any", false, false, false, 15) == "stripe")) ? ("bg-stripe-overlay") : (""));
        yield " ";
        yield ((((($context["format"] ?? null) == "print") &&  !CoreExtension::getAttribute($this->env, $this->source, ($context["layer"] ?? null), "isActive", [], "any", false, false, false, 15))) ? ("hidden") : (""));
        yield "\" style=\"height: ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((CoreExtension::getAttribute($this->env, $this->source, ($context["structure"] ?? null), "minutesToPixels", [($context["duration"] ?? null)], "method", false, false, false, 15) - 1), "html", null, true);
        yield "px;\" :class=\"{'hidden': !";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["layer"] ?? null), "getID", [], "any", false, false, false, 15), "html", null, true);
        yield " }\"
x-tooltip.white=\"
    <div class='w-72 flex flex-col py-2 gap-1 overflow-hidden'>
        <div class='px-2 pb-1'>
            <div class='flex justify-between leading-normal'>
                <span class='font-semibold text-sm'>";
        // line 20
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((((CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "label", [], "any", true, true, false, 20) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "label", [], "any", false, false, false, 20)))) ? (CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "label", [], "any", false, false, false, 20)) : (CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "title", [], "any", false, false, false, 20))), "html", null, true);
        yield "</span>
                <span class='tag ml-2 text-xxs h-5  border-0 outline outline-1 ";
        // line 21
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["color"] ?? null), "outlineLight", [], "any", false, false, false, 21), "html", null, true);
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["color"] ?? null), "text", [], "any", false, false, false, 21), "html", null, true);
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["color"] ?? null), "background", [], "any", false, false, false, 21), "html", null, true);
        yield "'>";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "type", [], "any", false, false, false, 21), "html", null, true);
        yield "</span>
            </div>
            <div class='font-normal mt-1'>";
        // line 23
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((((CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "description", [], "any", true, true, false, 23) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "description", [], "any", false, false, false, 23)))) ? (CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "description", [], "any", false, false, false, 23)) : (CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "subtitle", [], "any", false, false, false, 23))), "html", null, true);
        yield "</div>
        </div>
        
        <div class='px-2 pt-2 border-t flex justify-between leading-relaxed'>
            <div>";
        // line 27
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('icon')->getCallable()("outline", "clock", "size-4 text-gray-600 inline align-middle mr-1", ["stroke-width" => 2.4]));
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "allDay", [], "any", false, false, false, 27)) ? ($this->env->getFunction('__')->getCallable()("All Day")) : (((Twig\Extension\CoreExtension::trim(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "timeStart", [], "any", false, false, false, 27), 0, 5), "0", "left") . " - ") . Twig\Extension\CoreExtension::trim(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "timeEnd", [], "any", false, false, false, 27), 0, 5), "0", "left")))), "html", null, true);
        yield "
                ";
        // line 28
        yield ((($context["isActive"] ?? null)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('formatUsing')->getCallable()("tag", $this->env->getFunction('__')->getCallable()("Active"), "success ml-2 text-xxs"))) : (""));
        yield "
                ";
        // line 29
        yield ((CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "hasStatus", ["absent"], "method", false, false, false, 29)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('formatUsing')->getCallable()("tag", $this->env->getFunction('__')->getCallable()("Absent"), "dull ml-2 text-xxs"))) : (""));
        yield "
            </div>
        </div>

        ";
        // line 33
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "location", [], "any", false, false, false, 33) || CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "phone", [], "any", false, false, false, 33))) {
            // line 34
            yield "        <div class='px-2 flex justify-between leading-relaxed'>
            <div>
                ";
            // line 36
            yield ((CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "location", [], "any", false, false, false, 36)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('icon')->getCallable()("solid", "map-pin", "size-4 text-gray-600 inline align-middle mr-1"))) : (""));
            yield " ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "location", [], "any", false, false, false, 36), "html", null, true);
            yield " 
                ";
            // line 37
            yield ((CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "hasStatus", ["spaceChanged"], "method", false, false, false, 37)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('formatUsing')->getCallable()("tag", $this->env->getFunction('__')->getCallable()("Changed"), "error ml-2 text-xxs"))) : (""));
            yield "
            </div>
            <div>";
            // line 39
            yield ((CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "phone", [], "any", false, false, false, 39)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('icon')->getCallable()("solid", "phone", "size-4 text-gray-600 inline align-middle mr-1"))) : (""));
            yield " ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "phone", [], "any", false, false, false, 39), "html", null, true);
            yield "</div>
        </div>
        ";
        }
        // line 42
        yield "    </div>
\">

    ";
        // line 45
        if ((($context["duration"] ?? null) >= 40)) {
            // line 46
            yield "    <div class=\"flex items-start justify-between  border-gray-500 py-1 px-1.5\">
        <span class=\"text-xxs text-gray-700 \">";
            // line 47
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((((CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "period", [], "any", true, true, false, 47) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "period", [], "any", false, false, false, 47)))) ? (CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "period", [], "any", false, false, false, 47)) : (CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "type", [], "any", false, false, false, 47))), "html", null, true);
            yield "</span>
        ";
            // line 48
            if (Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "overlap", [], "any", false, false, false, 48))) {
                // line 49
                yield "        <span class=\"inline md:hidden lg:inline text-xxs text-gray-700 \">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::trim(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "timeStart", [], "any", false, false, false, 49), 0, 5), "0", "left"), "html", null, true);
                yield " - ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::trim(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "timeEnd", [], "any", false, false, false, 49), 0, 5), "0", "left"), "html", null, true);
                yield "</span>
        ";
            }
            // line 51
            yield "    </div>
    ";
        }
        // line 53
        yield "
    
    <a href=\"";
        // line 55
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "link", [], "any", false, false, false, 55), "html", null, true);
        yield "\" class=\"flex flex-col items-center cursor-pointer h-full px-2 ";
        yield (((($context["duration"] ?? null) >= 40)) ? ("justify-start") : ("justify-center"));
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["color"] ?? null), "text", [], "any", false, false, false, 55), "html", null, true);
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["color"] ?? null), "textHover", [], "any", false, false, false, 55), "html", null, true);
        yield "\">
        ";
        // line 56
        if ((($context["duration"] ?? null) >= 15)) {
            // line 57
            yield "        <div class=\"inline-block font-bold ";
            yield ((((($context["duration"] ?? null) > 30) && (Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "title", [], "any", false, false, false, 57)) <= 20))) ? ("text-sm") : ("text-xs mt-1"));
            yield "\">
            ";
            // line 58
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((((($context["duration"] ?? null) >= 40)) ? (Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "title", [], "any", false, false, false, 58), 0, 40)) : (Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "title", [], "any", false, false, false, 58), 0, 22))), "html", null, true);
            yield "
        </div>
        ";
        }
        // line 61
        yield "
        ";
        // line 62
        if (((($context["duration"] ?? null) >= 40) && CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "subtitle", [], "any", false, false, false, 62))) {
            // line 63
            yield "        <span class=\"inline-block text-xxs rounded ";
            yield ((CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "hasStatus", ["spaceChanged"], "method", false, false, false, 63)) ? ("border border-red-700 text-red-700 px-1") : ("text-gray-700"));
            yield "\">
            ";
            // line 64
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "hasStatus", ["spaceChanged"], "method", false, false, false, 64)) {
                // line 65
                yield "                ";
                yield $this->env->getFunction('icon')->getCallable()("basic", "arrow-move", "size-3 text-red-700 inline align-sub");
                yield "
            ";
            }
            // line 67
            yield "
            ";
            // line 68
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "subtitle", [], "any", false, false, false, 68), 0, 30), "html", null, true);
            yield "
        </span>
        ";
        }
        // line 71
        yield "    </a>
    
    ";
        // line 73
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "overlap", [], "any", false, false, false, 73) && (Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "overlap", [], "any", false, false, false, 73)) > 0))) {
            // line 74
            yield "    <button class=\"block rounded absolute top-0 right-0 mt-1 mr-1 p-0.5 text-xxs leading-none bg-transparent hover:bg-gray-500/50 text-red-700 hover:text-red-800\" @click=\"showOverlap = true\">
        <span class=\"h-3 font-semibold\">
            +";
            // line 76
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "overlap", [], "any", false, false, false, 76)), "html", null, true);
            yield "
        </span>

        ";
            // line 79
            yield $this->env->getFunction('icon')->getCallable()("outline", "squares", "size-4 inline align-middle", ["stroke-width" => 2]);
            yield "
    </button>

    <div x-cloak x-transition x-show=\"showOverlap\" @click.outside=\"showOverlap = false\" class=\"absolute p-2 -ml-2 mt-8 z-20 flex flex-col gap-2 items-start justify-end rounded outline outline-1 outline-gray-400 bg-white shadow-lg\" style=\"width: calc(100% + 1rem)\">
        ";
            // line 83
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "overlap", [], "any", false, false, false, 83));
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
            foreach ($context['_seq'] as $context["_key"] => $context["overlap"]) {
                // line 84
                yield "            <div class=\"relative w-full\">
                ";
                // line 85
                yield Twig\Extension\CoreExtension::include($this->env, $context, "ui/timetableItem.twig.html", ["item" => $context["overlap"], "overlap" => true]);
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['overlap'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 88
            yield "    </div>
    ";
        }
        // line 90
        yield "
    ";
        // line 91
        if ((($context["format"] ?? null) != "print")) {
            // line 92
            yield "        ";
            $context["iconSize"] = (((($context["duration"] ?? null) >= 50)) ? ("size-6") : ((((($context["duration"] ?? null) >= 30)) ? ("size-5") : ("size-3"))));
            // line 93
            yield "
        ";
            // line 94
            if ((CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "primaryAction", [], "any", false, false, false, 94) && (($context["duration"] ?? null) >= 20))) {
                // line 95
                yield "            ";
                $context["action"] = CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "primaryAction", [], "any", false, false, false, 95);
                // line 96
                yield "            ";
                $context["iconClass"] = ((CoreExtension::getAttribute($this->env, $this->source, ($context["action"] ?? null), "iconClass", [], "any", false, false, false, 96)) ? (CoreExtension::getAttribute($this->env, $this->source, ($context["action"] ?? null), "iconClass", [], "any", false, false, false, 96)) : ("text-gray-600 hover:text-gray-800"));
                // line 97
                yield "            
            <a href=\"";
                // line 98
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["action"] ?? null), "url", [], "any", false, false, false, 98), "html", null, true);
                yield "\" class=\"absolute bottom-0 right-0 mr-1 cursor-pointer pointer-events-auto\" title=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["action"] ?? null), "label", [], "any", false, false, false, 98), "html", null, true);
                yield "\">
                ";
                // line 99
                yield $this->env->getFunction('icon')->getCallable()((((CoreExtension::getAttribute($this->env, $this->source, ($context["action"] ?? null), "iconLibrary", [], "any", true, true, false, 99) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, ($context["action"] ?? null), "iconLibrary", [], "any", false, false, false, 99)))) ? (CoreExtension::getAttribute($this->env, $this->source, ($context["action"] ?? null), "iconLibrary", [], "any", false, false, false, 99)) : ("solid")), CoreExtension::getAttribute($this->env, $this->source, ($context["action"] ?? null), "icon", [], "any", false, false, false, 99), ((($context["iconSize"] ?? null) . " ") . ($context["iconClass"] ?? null)));
                yield "
            </a>
        ";
            }
            // line 102
            yield "
        ";
            // line 103
            if ((CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "secondaryAction", [], "any", false, false, false, 103) && (($context["duration"] ?? null) >= 20))) {
                // line 104
                yield "            ";
                $context["action"] = CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "secondaryAction", [], "any", false, false, false, 104);
                // line 105
                yield "            ";
                $context["iconClass"] = ((CoreExtension::getAttribute($this->env, $this->source, ($context["action"] ?? null), "iconClass", [], "any", false, false, false, 105)) ? (CoreExtension::getAttribute($this->env, $this->source, ($context["action"] ?? null), "iconClass", [], "any", false, false, false, 105)) : ("text-gray-600 hover:text-gray-800"));
                // line 106
                yield "
            <a href=\"";
                // line 107
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["action"] ?? null), "url", [], "any", false, false, false, 107), "html", null, true);
                yield "\" class=\"absolute bottom-0 left-0 ml-1 cursor-pointer pointer-events-auto\" title=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["action"] ?? null), "label", [], "any", false, false, false, 107), "html", null, true);
                yield "\">
                ";
                // line 108
                yield $this->env->getFunction('icon')->getCallable()((((CoreExtension::getAttribute($this->env, $this->source, ($context["action"] ?? null), "iconLibrary", [], "any", true, true, false, 108) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, ($context["action"] ?? null), "iconLibrary", [], "any", false, false, false, 108)))) ? (CoreExtension::getAttribute($this->env, $this->source, ($context["action"] ?? null), "iconLibrary", [], "any", false, false, false, 108)) : ("solid")), CoreExtension::getAttribute($this->env, $this->source, ($context["action"] ?? null), "icon", [], "any", false, false, false, 108), ((($context["iconSize"] ?? null) . " ") . ($context["iconClass"] ?? null)));
                yield "
            </a>
        ";
            }
            // line 111
            yield "
        ";
            // line 112
            if ((CoreExtension::getAttribute($this->env, $this->source, ($context["item"] ?? null), "hasStatus", ["overlap"], "method", false, false, false, 112) && (($context["duration"] ?? null) >= 40))) {
                // line 113
                yield "        <div href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["action"] ?? null), "url", [], "any", false, false, false, 113), "html", null, true);
                yield "\" class=\"absolute bottom-0 left-0 ml-1\" title=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Click & drag to see overlapping items"), "html", null, true);
                yield "\">
            ";
                // line 114
                yield $this->env->getFunction('icon')->getCallable()("outline", "layers", "size-5 text-gray-500 hover:text-gray-600");
                yield "
        </div>
        ";
            }
            // line 117
            yield "    ";
        }
        // line 118
        yield "</div>
";
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "ui/timetableItem.twig.html";
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
        return array (  363 => 118,  360 => 117,  354 => 114,  347 => 113,  345 => 112,  342 => 111,  336 => 108,  330 => 107,  327 => 106,  324 => 105,  321 => 104,  319 => 103,  316 => 102,  310 => 99,  304 => 98,  301 => 97,  298 => 96,  295 => 95,  293 => 94,  290 => 93,  287 => 92,  285 => 91,  282 => 90,  278 => 88,  261 => 85,  258 => 84,  241 => 83,  234 => 79,  228 => 76,  224 => 74,  222 => 73,  218 => 71,  212 => 68,  209 => 67,  203 => 65,  201 => 64,  196 => 63,  194 => 62,  191 => 61,  185 => 58,  180 => 57,  178 => 56,  168 => 55,  164 => 53,  160 => 51,  152 => 49,  150 => 48,  146 => 47,  143 => 46,  141 => 45,  136 => 42,  128 => 39,  123 => 37,  117 => 36,  113 => 34,  111 => 33,  104 => 29,  100 => 28,  94 => 27,  87 => 23,  76 => 21,  72 => 20,  50 => 15,  47 => 14,  45 => 13,  43 => 12,  41 => 11,  38 => 10,);
    }

    public function getSourceContext()
    {
        return new Source("", "ui/timetableItem.twig.html", "/var/www/GibbonEduCore/resources/templates/ui/timetableItem.twig.html");
    }
}
