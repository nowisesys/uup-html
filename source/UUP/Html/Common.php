<?php

/*
 * Copyright (C) 2010-2015 Anders Lövgren
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/**
 * Common HTML classes. These classes should give more structured code by
 * providing a object oriented approach to i.e. form and tables.
 *
 * The Component class represent some kind of non-containing tag, for
 * example, it could be a input tag. The Container class can contain other
 * containers or components.
 *
 * Notes:
 *
 * 1. Perhaps should we return the cdata object from the container class, so
 *    that this code is possible:
 *
 *    $data = $row->addData($text);
 *    $link = $data->getText()->addLink($url);
 *
 *      // or maybe:
 *
 *    $data = $row->addData($text);
 *    $data->addLink($data->getText(), $url);
 *
 *    However, this opens up for invalid (or at least unwanted) code like:
 *
 *    $area = new TextArea(...);
 *    $area->getText()->addLink($url);   // This is no good
 *
 * 2. Disclaimer: Not all HTML tags are implemented, and those that are might
 *    have missing attributes. This is intentional, as the goal was to provide
 *    an object oriented framework for the most commonly used HTML tags in a
 *    page body.
 *
 *
 * The javascript events. Note that not all events are supported by all HTML
 * tags. See http: *www.w3schools.com/tags/ref_eventattributes.asp.
 *
 * Using defined contants instead of string helps to detect misspelled event
 * attributes that would be silently ignored by browers.
 *
 * Event handlers:
 * ----------------------
 * 
 * A few common case event handlers exist (named EVENT_HANDLER_XXX). One of 
 * them serves a deeper discussion, namely the EVENT_HANDLER_CHECK_EMPTY. 
 * 
 * This event handler should be connected with a form like this to perform a 
 * check of empty fields on form submit.
 * 
 * <code>
 * <?php
 * $form = new Form('script.php');
 * $form->setEvent(EVENT_ON_SUBMIT, EVENT_HANDLER_CHECK_EMPTY);
 * ?>
 * </code>
 * 
 * It depends on a pre-defined javascript function. An simple implementation 
 * to be added to an javascript file included in each script might look like 
 * this:
 * 
 * <code>
 * // 
 * // Validate input elements (of type text) and textareas:
 * // 
 * function check_form(form, message) {
 *     for(i = 0; i < form.children.length; i++) {
 *         if(form.children[i].type == 'text' || form.children[i].tagName == 'TEXTAREA') {
 *             if(form.children[i].value == "") {
 *                 form.children[i].value = message;
 *                 form.children[i].focus();
 *                 return false;
 *             }
 *         }
 *     }
 *     return true;
 * }
 * </code>
 *
 * @author Anders Lövgren (QNET/BMC CompDept)
 * @package UUP
 * @subpackage Html
 */

namespace UUP\Html;

// 
// Body and frameset events:
// 
if (!defined('EVENT_ON_LOAD')) {
        define('EVENT_ON_LOAD', "onload");              // Script to be run when a document load
}
if (!defined('EVENT_ON_UNLOAD')) {
        define('EVENT_ON_UNLOAD', "onunload");          // Script to be run when a document unload
}
// 
// Form events:
// 
if (!defined('EVENT_ON_BLUR')) {
        define('EVENT_ON_BLUR', "onblur");              // Script to be run when an element loses focus
}
if (!defined('EVENT_ON_CHANGE')) {
        define('EVENT_ON_CHANGE', "onchange");          // Script to be run when an element change
}
if (!defined('EVENT_ON_FOCUS')) {
        define('EVENT_ON_FOCUS', "onfocus");            // Script to be run when an element gets focus
}
if (!defined('EVENT_ON_RESET')) {
        define('EVENT_ON_RESET', "onreset");            // Script to be run when a form is reset
}
if (!defined('EVENT_ON_SELECT')) {
        define('EVENT_ON_SELECT', "onselect");          // Script to be run when an element is selected
}
if (!defined('EVENT_ON_SUBMIT')) {
        define('EVENT_ON_SUBMIT', "onsubmit");          // Script to be run when a form is submitted
}
// 
// Image events:
// 
if (!defined('EVENT_ON_ABORT')) {
        define('EVENT_ON_ABORT', "onabort");            // Script to be run when a form is submitted
}
// 
// Keyboard events:
// 
if (!defined('EVENT_ON_KEY_DOWN')) {
        define('EVENT_ON_KEY_DOWN', "keydown");         // Script to be run when a key is pressed
}
if (!defined('EVENT_ON_KEY_PRESS')) {
        define('EVENT_ON_KEY_PRESS', "keypress");       // Script to be run when a key is pressed and released
}
if (!defined('EVENT_ON_KEY_UP')) {
        define('EVENT_ON_KEY_UP', "keyup");             // Script to be run when a key is released
}
// 
// Mouse events:
// 
if (!defined('EVENT_ON_CLICK')) {
        define('EVENT_ON_CLICK', "onclick");            // Script to be run on a mouse click
}
if (!defined('EVENT_ON_DBL_CLICK')) {
        define('EVENT_ON_DBL_CLICK', "ondblclick");     // Script to be run on a mouse double-click
}
if (!defined('EVENT_ON_DOUBLE_CLICK')) {
        define('EVENT_ON_DOUBLE_CLICK', "ondblclick");  // Script to be run on a mouse double-click
}
if (!defined('EVENT_ON_MOUSE_DOWN')) {
        define('EVENT_ON_MOUSE_DOWN', "onmousedown");   // Script to be run when mouse button is pressed
}
if (!defined('EVENT_ON_MOUSE_MOVE')) {
        define('EVENT_ON_MOUSE_MOVE', "onmousemove");   // Script to be run when mouse pointer moves
}
if (!defined('EVENT_ON_MOUSE_OUT')) {
        define('EVENT_ON_MOUSE_OUT', "onmouseout");     // Script to be run when mouse pointer moves out of an element
}
if (!defined('EVENT_ON_MOUSE_OVER')) {
        define('EVENT_ON_MOUSE_OVER', "onmouseover");   // Script to be run when mouse pointer moves over an element
}
if (!defined('EVENT_ON_MOUSE_UP')) {
        define('EVENT_ON_MOUSE_UP', "onmouseup");       // Script to be run when mouse button is released
}

// 
// Table frame attribute constants:
// 
if (!defined('TABLE_FRAME_VOID')) {
        define('TABLE_FRAME_VOID', "void");
}
if (!defined('TABLE_FRAME_ABOVE')) {
        define('TABLE_FRAME_ABOVE', "above");
}
if (!defined('TABLE_FRAME_BELOW')) {
        define('TABLE_FRAME_BELOW', "below");
}
if (!defined('TABLE_FRAME_HSIDES')) {
        define('TABLE_FRAME_HSIDES', "hsides");
}
if (!defined('TABLE_FRAME_LHS')) {
        define('TABLE_FRAME_LHS', "lhs");
}
if (!defined('TABLE_FRAME_RHS')) {
        define('TABLE_FRAME_RHS', "rhs");
}
if (!defined('TABLE_FRAME_VSIDES')) {
        define('TABLE_FRAME_VSIDES', "vsides");
}
if (!defined('TABLE_FRAME_BOX')) {
        define('TABLE_FRAME_BOX', "box");
}
if (!defined('TABLE_FRAME_BORDER')) {
        define('TABLE_FRAME_BORDER', "border");
}

// 
// Table rules attribute constants:
// 
if (!defined('TABLE_RULES_NONE')) {
        define('TABLE_RULES_NONE', "none");
}
if (!defined('TABLE_RULES_GROUPS')) {
        define('TABLE_RULES_GROUPS', "groups");
}
if (!defined('TABLE_RULES_ROWS')) {
        define('TABLE_RULES_ROWS', "rows");
}
if (!defined('TABLE_RULES_COLS')) {
        define('TABLE_RULES_COLS', "cols");
}
if (!defined('TABLE_RULES_ALL')) {
        define('TABLE_RULES_ALL', "all");
}

// 
// Constants for TBody and TableItem (base class of TableRow, TableHeader 
// and TableData) align and valign attributes:
// 
if (!defined('TABLE_ALIGN_RIGHT')) {
        define('TABLE_ALIGN_RIGHT', "right");
}
if (!defined('TABLE_ALIGN_LEFT')) {
        define('TABLE_ALIGN_LEFT', "left");
}
if (!defined('TABLE_ALIGN_CENTER')) {
        define('TABLE_ALIGN_CENTER', "center");
}
if (!defined('TABLE_ALIGN_JUSTIFY')) {
        define('TABLE_ALIGN_JUSTIFY', "justify");
}
if (!defined('TABLE_ALIGN_CHAR')) {
        define('TABLE_ALIGN_CHAR', "char");
}

if (!defined('TABLE_VALIGN_TOP')) {
        define('TABLE_VALIGN_TOP', "top");
}
if (!defined('TABLE_VALIGN_MIDDLE')) {
        define('TABLE_VALIGN_MIDDLE', "middle");
}
if (!defined('TABLE_VALIGN_BOTTOM')) {
        define('TABLE_VALIGN_BOTTOM', "bottom");
}
if (!defined('TABLE_VALIGN_BASELINE')) {
        define('TABLE_VALIGN_BASELINE', "baseline");
}

// 
// Constants for the scope attribute of TableCell:
// 
if (!defined('TABLE_SCOPE_COL')) {
        define('TABLE_SCOPE_COL', "col");
}
if (!defined('TABLE_SCOPE_ROW')) {
        define('TABLE_SCOPE_ROW', "row");
}
if (!defined('TABLE_SCOPE_COLGROUP')) {
        define('TABLE_SCOPE_COLGROUP', "colgroup");
}
if (!defined('TABLE_SCOPE_ROWGROUP')) {
        define('TABLE_SCOPE_ROWGROUP', "rowgroup");
}

// 
// Link types:
// 
if (!defined('LINK_TYPE_HREF')) {
        define('LINK_TYPE_HREF', "href");
}
if (!defined('LINK_TYPE_NAME')) {
        define('LINK_TYPE_NAME', "name");
}

// 
// Link attributes:
// 
if (!defined('LINK_SHAPE_DEFAULT')) {
        define('LINK_SHAPE_DEFAULT', "default");
}
if (!defined('LINK_SHAPE_RECT')) {
        define('LINK_SHAPE_RECT', "rect");
}
if (!defined('LINK_SHAPE_CIRCLE')) {
        define('LINK_SHAPE_CIRCLE', "circle");
}
if (!defined('LINK_SHAPE_POLY')) {
        define('LINK_SHAPE_POLY', "poly");
}

if (!defined('LINK_TARGET_BLANK')) {
        define('LINK_TARGET_BLANK', "_blank");
}
if (!defined('LINK_TARGET_PARENT')) {
        define('LINK_TARGET_PARENT', "_parent");
}
if (!defined('LINK_TARGET_SELF')) {
        define('LINK_TARGET_SELF', "_self");
}
if (!defined('LINK_TARGET_TOP')) {
        define('LINK_TARGET_TOP', "_top");
}

// 
// Constants for button types.
// 
if (!defined('BUTTON_SUBMIT')) {
        define('BUTTON_SUBMIT', "submit");
}
if (!defined('BUTTON_RESET')) {
        define('BUTTON_RESET', "reset");
}
if (!defined('BUTTON_STANDARD')) {
        define('BUTTON_STANDARD', "standard");
}

// 
// Some handy inline event handlers:
// 
if (!defined('EVENT_HANDLER_CLEAR_CONTENT')) {
        define('EVENT_HANDLER_CLEAR_CONTENT', "javascript:this.value=''");
}
if (!defined('EVENT_HANDLER_CONFIRM_DELETE')) {
        define('EVENT_HANDLER_CONFIRM_DELETE', sprintf("javascript:return confirm('%s');", _("Are you really sure?")));
}
if (!defined('EVENT_HANDLER_CANCEL_BUBBLE')) {  // Stop event propagation
        define('EVENT_HANDLER_CANCEL_BUBBLE', "javascript:this.cancelBubble = true; event.stopPropagation();");
}
if (!defined('EVENT_HANDLER_CHECK_EMPTY')) {
        define('EVENT_HANDLER_CHECK_EMPTY', sprintf("return check_form(this, '%s');", _("This field must be filled in.")));
}
// 
// Output mode for HTML element:
// 
if (!defined('ELEMENT_OUTPUT_COMPONENT')) {
        define('ELEMENT_OUTPUT_COMPONENT', 1);
}
if (!defined('ELEMENT_OUTPUT_CONTAINER_START')) {
        define('ELEMENT_OUTPUT_CONTAINER_START', 2);
}
if (!defined('ELEMENT_OUTPUT_CONTAINER_END')) {
        define('ELEMENT_OUTPUT_CONTAINER_END', 3);
}

//
// Constants for the FORM action:
//
if (!defined('FORM_ACTION_GET')) {
        define('FORM_ACTION_GET', 'GET');
}
if (!defined('FORM_ACTION_POST')) {
        define('FORM_ACTION_POST', 'POST');
}
//
// Allows easy switch between development and production mode:
//
if (!defined('FORM_ACTION_DEFAULT')) {
        define('FORM_ACTION_DEFAULT', FORM_ACTION_GET);
}
