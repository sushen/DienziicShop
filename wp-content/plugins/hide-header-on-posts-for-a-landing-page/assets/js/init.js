// http://stackoverflow.com/questions/2420970/how-can-i-get-selector-from-jquery-object/15623322#15623322
!function (e, t) {
    var n = function (e) {
        var n = [];
        for (; e && e.tagName !== t; e = e.parentNode) {
            if (e.className) {
                var r = e.className.split(" ");
                for (var i in r) {
                    if (r.hasOwnProperty(i) && r[i]) {
                        n.unshift(r[i]);
                        n.unshift(".")
                    }
                }
            }
            if (e.id && !/\s/.test(e.id)) {
                n.unshift(e.id);
                n.unshift("#")
            }
            n.unshift(e.tagName);
            n.unshift(" > ")
        }
        return n.slice(1).join("")
    };
    e.fn.getSelector = function (t) {
        if (true === t) {
            return n(this[0])
        } else {
            return e.map(this, function (e) {
                return n(e)
            })
        }
    }
}(window.jQuery)


/**
 * Find content column and sidebars
 * @param obj $entryContent parent of placeholder.
 * @returns obj jQuery elements for left, right sidebars, and content column
 */
function vgplFindContentColumns($entryContent, allowForPadding) {

//		var entryContentWidth = $entryContent.innerWidth() - parseInt($entryContent.css('padding-left').replace('px')) - parseInt($entryContent.css('padding-right').replace('px') );
    var entryContentWidth = $entryContent.width();
    var $parents = $entryContent.parents();
    var $parent, $inmediateParent;

    var padding = (allowForPadding) ? 50 : 0;

    // Find entryContent column and columns container
    $parents.each(function () {
        var parentWidth = jQuery(this).outerWidth();
        if (parentWidth > (entryContentWidth + padding)) {
            $parent = jQuery(this);
            return false;
        } else {
            $inmediateParent = null;
            $inmediateParent = jQuery(this);
        }
    });

    if (!$inmediateParent || !$inmediateParent.length) {
        $inmediateParent = $entryContent;
    }

    var $parentChildren = $parent.children();
    var $siblings = $parentChildren.not($inmediateParent);
    var inmediateParentLeft = $inmediateParent.offset().left;
    var inmediateParentRight = inmediateParentLeft + $inmediateParent.outerWidth();

    // Find theme sidebars
    var $firstLeft, $lastRight;
    $siblings.each(function () {
        var $column = jQuery(this);
        var columnLeft = $column.offset().left;

        if (columnLeft < inmediateParentLeft) {
            $firstLeft = $column;
        } else if (columnLeft > inmediateParentRight) {
            $lastRight = $column;
        }
    });


    if ((!$firstLeft || !$firstLeft.length) && (!$lastRight || !$lastRight.length)) {
        var $possibleSidebarElements = jQuery('.widget, .widget-area, .sidebar, #secondary, .secondary');
        var parentLeft = $parent.offset().left;
        var parentRight = parentLeft + $parent.width();

        $leftSidebarElements = $possibleSidebarElements.filter(function () {
            return jQuery(this).offset().left < parentLeft && !jQuery(this).parents('.vg-page-layout-sidebar').length;
        });
        $rightSidebarElements = $possibleSidebarElements.filter(function () {
            return  jQuery(this).offset().left > parentRight && !jQuery(this).parents('.vg-page-layout-sidebar').length;
        });

        var $firstLeftSidebarElement = $leftSidebarElements.first();
        var $firstLeftSidebarElementParents = $firstLeftSidebarElement.parents();
        var $leftSidebarInmediateParent = null, $leftSidebarParent = null;

        $firstLeftSidebarElementParents.each(function () {
            var parentWidth = jQuery(this).outerWidth();
            var parentLeft = jQuery(this).offset().left;
            if ((parentLeft + parentWidth) > parentLeft) {
                $leftSidebarParent = jQuery(this);

                if (!$leftSidebarInmediateParent || !$leftSidebarInmediateParent.length) {
                    $leftSidebarInmediateParent = $firstLeftSidebarElement;
                }
                return false;
            } else {
                $leftSidebarInmediateParent = null;
                $leftSidebarInmediateParent = jQuery(this);
            }
        });

        var $firstRightSidebarElement = $rightSidebarElements.first();
        var $firstRightSidebarElementParents = $firstRightSidebarElement.parents();
        var $rightSidebarInmediateParent = null, $rightSidebarParent = null;

        $firstRightSidebarElementParents.each(function () {
            var parentWidth = jQuery(this).outerWidth();
            var parentLeft = jQuery(this).offset().left;
            if (parentLeft < parentRight) {
                $rightSidebarParent = jQuery(this);
                if (!$rightSidebarInmediateParent || !$rightSidebarInmediateParent.length) {
                    $rightSidebarInmediateParent = $firstRightSidebarElement;
                }
                return false;
            } else {
                $rightSidebarInmediateParent = null;
                $rightSidebarInmediateParent = jQuery(this);
            }
        });

        $firstLeft = $leftSidebarInmediateParent,
                $lastRight = $rightSidebarInmediateParent;

        $sidebars = jQuery().add($firstLeft).add($lastRight);
        $possibleInmediateParent = $sidebars.first().siblings().first();

        if ($possibleInmediateParent.length) {
            $inmediateParent = $possibleInmediateParent;
        }
    }

    return {
        $firstLeft: $firstLeft,
        $lastRight: $lastRight,
        $inmediateParent: $inmediateParent,
        $parent: $parent
    };
}
function vgplFindHeader(selector, contentColumns) {
    if (!selector) {
        var selector = '.logo, #logo, .menu-item, .site-title, .site-branding, .custom-header, .site-header, #masthead, .header';
    }
    if (typeof selector === 'string') {
        var $headerElements = jQuery('body').find(selector);
    } else {
        var $headerElements = selector;
    }
    var $header, $headerParent;

    if ($headerElements.length) {
        var $firstHeaderElement = $headerElements.first();
        var firstHeaderElementHeight = $firstHeaderElement.height();
        var $headerParents = $firstHeaderElement.parents();

        $headerParents.each(function (index, element) {
            var $headerElementParent = jQuery(this);
            var headerElementParentHeight = $headerElementParent.height();
            var headerElementParentSelector = $headerElementParent.getSelector(true);
            var bodySelector = jQuery('body').getSelector(true);

            if (headerElementParentSelector == bodySelector && index == 0) {
                $header = $firstHeaderElement;
                $headerParent = jQuery('body');
                return false;
            } else {

                if (firstHeaderElementHeight <= headerElementParentHeight && headerElementParentHeight < (jQuery('body').height() / 2)) {
                    $header = jQuery(this);
                } else {
                    $headerParent = jQuery(this);

                    if (!$header) {
                        $header = $firstHeaderElement;
                    }
                    return false;
                }
            }

        });

    }
    return $header;
}

function vgplFindSecondaryHeader($header, contentColumns) {
    if (!contentColumns.$parent || !contentColumns.$parent.length) {
        return false;
    }
    var $headerSiblings = $header.siblings();
    var parentTopPosition = contentColumns.$parent.offset().top;

    var secondaryHeader = [];

    $headerSiblings.each(function () {
        var siblingBottomPosition = jQuery(this).offset().top + jQuery(this).height();

        if (siblingBottomPosition < parentTopPosition) {
            secondaryHeader.push(jQuery(this));
        }
    });

    var $secondaryHeader = jQuery();
    jQuery.each(secondaryHeader, function (index, element) {
        $secondaryHeader = $secondaryHeader.add(element);
    });

    return $secondaryHeader;

}

jQuery(document).ready(function () {


    var $marker = jQuery('.vg-page-layout-placeholder');

    if (!$marker.length) {
        return;
    }
    var contentColumnSelector = $marker.data('content-column-selector');



    var $entryContent = $marker.parent();
    contentColumns = vgplFindContentColumns($entryContent, false);

    if (!contentColumns.$inmediateParent || !contentColumns.$inmediateParent.length) {
        contentColumns = vgplFindContentColumns($entryContent, true);
    }

    // Use settings element if available
    if (contentColumnSelector) {
        var $inmediateParent = jQuery(contentColumnSelector);
        if ($inmediateParent.length) {
            contentColumns.$inmediateParent = $inmediateParent;
        }
    }

    window.vgplContentColumns = contentColumns;

    var hideHeader = $marker.data('hide-header');

    var headerSelector = $marker.data('header-selector');


    // Hide header
    $header = false;
    if (hideHeader) {
        $header = false;
        if (headerSelector) {
            $header = jQuery(headerSelector);
        }
        if (!$header || !$header.length) {
            $header = vgplFindHeader(null, contentColumns);
        }
        if ($header && $header.length) {
            $header.hide();

            $secondaryHeader = vgplFindSecondaryHeader($header, contentColumns);
            if ($secondaryHeader && $secondaryHeader.length) {
                $secondaryHeader.hide();
            }
        }
    }
});