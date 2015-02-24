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

namespace UUP\Html\Base;

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

/**
 * Abstract event class.
 *
 * @package UUP
 * @subpackage Html
 * 
 * @author Anders Lövgren (QNET/BMC CompDept)
 */
abstract class Event
{

        // 
        // Body and frameset events:
        // 
        const ON_LOAD = "onload";               // Script to be run when a document load
        const ON_UNLOAD = "onunload";           // Script to be run when a document unload
        // 
        // Form events:
        // 
        const ON_BLUR = "onblur";               // Script to be run when an element loses focus
        const ON_CHANGE = "onchange";           // Script to be run when an element change
        const ON_FOCUS = "onfocus";             // Script to be run when an element gets focus
        const ON_RESET = "onreset";             // Script to be run when a form is reset
        const ON_SELECT = "onselect";           // Script to be run when an element is selected
        const ON_SUBMIT = "onsubmit";           // Script to be run when a form is submitted
        // 
        // Image events:
        // 
        const ON_ABORT = "onabort";             // Script to be run when a form is submitted
        // 
        // Keyboard events:
        // 
        const ON_KEY_DOWN = "keydown";          // Script to be run when a key is pressed
        const ON_KEY_PRESS = "keypress";        // Script to be run when a key is pressed and released
        const ON_KEY_UP = "keyup";              // Script to be run when a key is released
        // 
        // Mouse events:
        // 
        const ON_CLICK = "onclick";             // Script to be run on a mouse click
        const ON_DBL_CLICK = "ondblclick";      // Script to be run on a mouse double-click
        const ON_DOUBLE_CLICK = "ondblclick";   // Script to be run on a mouse double-click
        const ON_MOUSE_DOWN = "onmousedown";    // Script to be run when mouse button is pressed
        const ON_MOUSE_MOVE = "onmousemove";    // Script to be run when mouse pointer moves
        const ON_MOUSE_OUT = "onmouseout";      // Script to be run when mouse pointer moves out of an element
        const ON_MOUSE_OVER = "onmouseover";    // Script to be run when mouse pointer moves over an element
        const ON_MOUSE_UP = "onmouseup";        // Script to be run when mouse button is released

}
