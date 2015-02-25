<!DOCTYPE html>

<!--
Copyright (C) 2015 Anders Lövgren (QNET/BMC CompDept).

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

     http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>List Examples</title>
    </head>
    <body>
        <h1>List Examples</h1>
        <?php
        require_once __DIR__ . '/../vendor/autoload.php';

use UUP\Html\Link;
use UUP\Html\Lists\DescriptionList;
use UUP\Html\Lists\OrderedList;
use UUP\Html\Lists\UnorderedList;
use UUP\Html\Text\BR;
        
        // ========================================================
        //  Some examples on different lists.
        // ========================================================

        // 
        // A compact list:
        // 
        printf("<h4>Description list (DL):</h4>\n");        
        $dd = new DescriptionList();
        $dd->addTerm("Term 1");
        $dd->addData("Description of Term 1");
        $dd->addTerm("Term 2");
        $dd->addData("Description of Term 2");
        $dd->addTerm("Term 3");
        $dd->addData("Description of Term 3");
        $dd->output();

        // 
        // Same but with some more space:
        // 
        printf("<h4>Description list (DL) with space:</h4>\n");        
        $dd = new DescriptionList();
        $dd->addTerm("Term 1");
        $dd->addData("Description of Term 1");
        $dd->addElement(new BR());
        $dd->addTerm("Term 2");
        $dd->addData("Description of Term 2");
        $dd->addElement(new BR());
        $dd->addTerm("Term 3");
        $dd->addData("Description of Term 3");
        $dd->output();
        
        // 
        // Ordered list:
        // 
        printf("<h4>Ordered list (OL):</h4>\n");        
        $ol = new OrderedList();
        $ol->addItem("Adam");
        $ol->addItem("Bertil");
        $ol->addItem("Caesar");
        $ol->output();

        printf("<h4>Ordered list (OL) starting at 10:</h4>\n");        
        $ol->setStart(10);
        $ol->output();
        $ol->setStart(1);       // Reset start
        
        printf("<h4>Ordered list (OL) in lower alpha:</h4>\n");        
        $ol->setType(OrderedList::TYPE_LOWER_ALPHA);
        $ol->output();
        
        printf("<h4>Ordered list (OL) in upper alpha:</h4>\n");        
        $ol->setType(OrderedList::TYPE_UPPER_ALPHA);
        $ol->output();
        
        printf("<h4>Ordered list (OL) in lower roman:</h4>\n");        
        $ol->setType(OrderedList::TYPE_LOWER_ROMAN);
        $ol->output();
        
        printf("<h4>Ordered list (OL) in upper roman:</h4>\n");        
        $ol->setType(OrderedList::TYPE_UPPER_ROMAN);
        $ol->output();

        // 
        // Unordered list:
        // 
        printf("<h4>Unordered list (UL):</h4>\n");        
        $ul = new UnorderedList();
        $ul->addItem("Adam");
        $ul->addItem("Bertil");
        $ul->addItem("Caesar");
        $ul->output();
        
        printf("<h4>Unordered list (UL) using circle type:</h4>\n");        
        $ul->setType(UnorderedList::TYPE_CIRCLE);
        $ul->output();
        
        printf("<h4>Unordered list (UL) using square type:</h4>\n");        
        $ul->setType(UnorderedList::TYPE_SQUARE);
        $ul->output();
        
        printf("<h4>Unordered list (UL) using disc type:</h4>\n");        
        $ul->setType(UnorderedList::TYPE_DISC);
        $ul->output();
        
        // 
        // Nested list:
        // 
        printf("<h4>Nested unordered/ordered list:</h4>\n");        
        $o1 = $ul->addList($ol);
        $ol->setType(OrderedList::TYPE_LOWER_ALPHA);
        $ul->addItem("Next");
        $o1 = $ul->addList($ol);
        $ol->setType(OrderedList::TYPE_DECIMAL);
        $ul->output();  // Should output two ordered list in decimal type.
        
        // 
        // List with links:
        // 
        printf("<h4>List containing links:</h4>\n");        
        $list = new UnorderedList();
        $item = $list->addItem(_("RC2 - Release candidate 2"));
        $item->setLink(new Link(Link::TYPE_HREF, "rc2"));       // Explicit created link
        $item = $list->addItem(_("RC1 - Release candidate 1"));
        $item->setLink(new Link(Link::TYPE_NAME, "rc1"));       // Anchor link
        $item = $list->addItem(_("SVN - Development preview"));
        $item->setLink("svn");                                  // Implicit created link
        $list->output();
        
        ?>
    </body>
</html>
