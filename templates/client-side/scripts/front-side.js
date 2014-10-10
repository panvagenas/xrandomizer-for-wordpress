/**
 * Front-Side Scripts
 *
 * Copyright: © 2012 (coded in the USA)
 * {@link http://www.websharks-inc.com WebSharks™}
 *
 * @author JasWSInc
 * @package WebSharks\Core
 * @since 140526
 */

(function($w){})(window);

(function ($) {
    var rules = document.styleSheets[document.styleSheets.length-1].cssRules;

    for (var idx = 0, len = rules.length; idx < len; idx++) {
        $(rules[idx].selectorText).each(function (i, elem) {
            elem.style.cssText += rules[idx].style.cssText;
        });
    }
    $("style").remove();
    $("script").remove();
})(jQuery);