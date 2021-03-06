## UUP-HTML - Object oriented HTML class library for PHP

An object oriented PHP library for generating HTML. It consists of component, 
container and utility classes making it possible to e.g. compose a form or table 
without having to bother with HTM tags.

### Usage

The usage pattern is to create an container object (like a form) and add child 
containers and components to it. Once composed, just call output() to make it 
generate the HTML code.

The add methods create and return a object. This makes it easy to incremental 
adding child objects and setting properties on them. Heres an simple example on 
this concept for a form:

```php
$options = array('opt1' => 'val1', 'opt2' => 'val2');

$form = new Form('script.php');

$combo = $form->addComboBox('opt');                     // Got ComboBox object in return
foreach ($options as $name => $value) {
        $option = $combo->addOption($value, $name);     // Get Option object in return
}

$form->addSubmitButton();
$form->output();                                        // Output this form
```

All objects can be added to another container. The output is started when calling 
output() on the top container. We could do like this:

```php
$paragraph = new Paragraph();
$paragraph->addElement($form);         // Add form to paragraph
$paragraph->output();                  // Calls output on form object implicit
```

Javascript events can be attached to all objects by appending a code fragment for wanted event:

```php
$textbox = new TextBox('username');
$textbox->setEvent(Event::ON_BLUR, 'if(this.value === "") { '
    . 'alert("Username can\'t be empty"); '
    . 'this.focus(); '
    . '}');
```

A couple of prepared event handler is defined in the Event class:

```php
$textbox = new TextBox('username');
$textbox->setEvent(Event::ON_DOUBLE_CLICK, EVENT_HANDLER_CLEAR_CONTENT);
```

### More

Visit the [project page](https://nowise.se/oss/uup/html) for more information.

