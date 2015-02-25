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
        <title>Tree Builder Demo</title>
    </head>
    <body>
        <style>
            span.links {
                    width: 600px;
                    float: right;
            }
        </style>
        <h1>Tree Builder Demo</h1>
        <?php
        require_once __DIR__ . '/../vendor/autoload.php';

        use UUP\Html\Utility\TreeBuilder;

        // ========================================================
        //  Use tree builder for displaying nested data.
        // ========================================================
        // 
        // Hierarcic data to be displayed.
        // 
        $data = array(
                'k1'  => 'v1',
                'k2'  => array(
                        'k3' => 'v3',
                        'k4' => 'v4',
                        'k5' => array(
                                'k6' => 'v6'
                        ),
                        'k7' => 'v7',
                        'k8' => array(
                                'k9'  => 'v9',
                                'k10' => 'v10'
                        )
                ),
                'k11' => 'v11',
                'k12' => 'v12',
                'k13' => array(
                        'k14' => 'v14',
                        'k15' => 'v15'
                ),
                'k16' => 'v16'
        );

        // 
        // Insert helper function:
        // 
        function insert(&$node, $data)
        {
                foreach ($data as $k1 => $v1) {
                        $n1 = $node->addChild($k1);
                        if (is_array($v1)) {
                                insert($n1, $v1);
                        } else {
                                $n1->addLink($v1, "http://localhost/tree/?node=$k1");
                        }
                }
        }

        // 
        // Create tree builder object:
        // 
        $builder = new TreeBuilder('root');
        $root = $builder->getRoot();

        // 
        // Add data to tree:
        // 
        insert($root, $data);

        // 
        // Output tree:
        // 
        $builder->output();

        ?>
    </body>
</html>
