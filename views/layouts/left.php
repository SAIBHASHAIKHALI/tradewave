<style>
   /* Customize the color scheme for the sidebar */
body.skin-blue .main-sidebar {
    background-color: #1e2a38 !important; /* Darker background for a modern look */
    color: #ffffff !important; /* Text color */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Add a subtle shadow */
    border-right: 1px solid #34495e; /* Add a border for definition */
}

body.skin-blue .main-sidebar a {
    color: #ffffff !important; /* Link color */
    transition: color 0.3s ease, background-color 0.3s ease; /* Smooth transition for color changes */
}

body.skin-blue .main-sidebar .sidebar-menu a:hover,
body.skin-blue .main-sidebar .sidebar-menu li.active a {
    background-color: #34495e !important; /* Darker background for hovered and active links */
    border-radius: 4px; /* Rounded corners for a sleek appearance */
}

body.skin-blue .main-sidebar .treeview-menu {
    background-color: #1e2a38 !important; /* Match the background color for submenus */
    border-left: 3px solid #007bff; /* Add a colored border on the left for a modern touch */
}

body.skin-blue .main-sidebar .treeview-menu a {
    padding-left: 30px; /* Add padding to make submenu items stand out */
}

body.sidebar-mini.sidebar-collapse .main-sidebar {
    background-color: #1e2a38 !important; /* Maintain the background color when collapsed */
}

body.sidebar-mini.sidebar-collapse .main-sidebar a {
    color: #ffffff !important; /* Link color when collapsed */
}

body.sidebar-mini.sidebar-collapse .main-sidebar .treeview-menu {
    background-color: #1e2a38 !important; /* Maintain submenu background color */
}

/* Add a hover effect for submenu items */
body.skin-blue .main-sidebar .treeview-menu li a:hover {
    background-color: #34495e !important; /* Darker background on hover */
}

/* Style for open treeview items */
.skin-blue .sidebar-menu>li.menu-open>a {
    background: #007bff; /* Highlight open treeview items */
    color: #ffffff !important; /* Ensure text color is white */
}

</style>

<!--
1 Admin
2 Account
3 HR
4 Employee
-->

<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left info">
                <p></p>
                <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
            </div>
        </div>

        <!-- search form -->
        <!-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form> -->
        <!-- /.search form -->

        <?php 
        if (!Yii::$app->user->isGuest) { 

          if (Yii::$app->user->identity->level == 1)   
            {
            
         


            echo dmstr\widgets\Menu::widget(
                [
                    'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                    'items' => [
                        [
                            'label' => 'Dashboard',
                            'icon' => 'book',
                            'url' => ['/site/index'],
                        ],
                    ],
                ]
            );
           

            echo dmstr\widgets\Menu::widget(
                [
                    'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                    'items' => [
                        [
                            'label' => 'Configuration',
                            'icon' => 'bug',
                            'url' => '#',
                            'items' => [
                                ['label' => 'Users', 'icon' => 'circle-o', 'url' => ['/users'],],
                                ['label' => 'Clients', 'icon' => 'circle-o', 'url' => ['/client'],],
                                ['label' => 'Managers', 'icon' => 'circle-o', 'url' => ['/manager'],],
                                ['label' => 'Vendors', 'icon' => 'circle-o', 'url' => ['/vendor'],],
                            ],
                        ],
                    ],
                ]
            );

            echo dmstr\widgets\Menu::widget(
                [
                    'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                    'items' => [
                        [
                            'label' => 'HR Management',
                            'icon' => 'bug',
                            'url' => '#',
                            'items' => [
                                ['label' => 'Employees', 'icon' => 'circle-o', 'url' => ['/employee'],],
                                ['label' => 'Department', 'icon' => 'circle-o', 'url' => ['/departments'],],
                                ['label' => 'Leave Types', 'icon' => 'circle-o', 'url' => ['/leave-types'],],
                                ['label' => 'Leave Requests', 'icon' => 'circle-o', 'url' => ['/leave-requests'],],
                                ['label' => 'Salary Slips', 'icon' => 'circle-o', 'url' => ['/salary'],],
                                
                            ],
                        ],
                    ],
                ]
            );

            echo dmstr\widgets\Menu::widget(
                [
                    'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                    'items' => [
                        [
                            'label' => 'Finance',
                            'icon' => 'bug',
                            'url' => '#',
                            'items' => [
                                ['label' => 'Invoice', 'icon' => 'circle-o', 'url' => ['/invoice'],],
                                ['label' => 'Purchase', 'icon' => 'circle-o', 'url' => ['/purchase'],],
                                
                                
                            ],
                        ],
                    ],
                ]
            );

            echo dmstr\widgets\Menu::widget(
                [
                    'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                    'items' => [
                        [
                            'label' => 'Reports',
                            'icon' => 'bug',
                            'url' => '#',
                            'items' => [
                                ['label' => 'Invoice Report', 'icon' => 'circle-o', 'url' => ['/invoice/report'],],
                                ['label' => 'P/L Statement', 'icon' => 'circle-o', 'url' => ['/invoice/pl'],],
                                
                                
                            ],
                        ],
                    ],
                ]
            );

            echo dmstr\widgets\Menu::widget(
                [
                    'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                    'items' => [
                        [
                            'label' => 'Request A Services',
                            'icon' => 'bug',
                            'url' => '#',
                            'items' => [
                              
                                ['label' => 'Request', 'icon' => 'circle-o', 'url' => ['/service'],],
                                
                                
                                
                            ],
                        ],
                    ],
                ]
            );

           

            

        }

        else if (Yii::$app->user->identity->level ==2)   
            {
            
         


            echo dmstr\widgets\Menu::widget(
                [
                    'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                    'items' => [
                        [
                            'label' => 'Dashboard',
                            'icon' => 'book',
                            'url' => ['/site/index'],
                        ],
                    ],
                ]
            );
           

            echo dmstr\widgets\Menu::widget(
                [
                    'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                    'items' => [
                        [
                            'label' => 'Configuration',
                            'icon' => 'bug',
                            'url' => '#',
                            'items' => [
                              
                                ['label' => 'Clients', 'icon' => 'circle-o', 'url' => ['/client'],],
                                ['label' => 'Managers', 'icon' => 'circle-o', 'url' => ['/manager'],],
                                ['label' => 'Vendors', 'icon' => 'circle-o', 'url' => ['/vendor'],],
                            ],
                        ],
                    ],
                ]
            );

            

            echo dmstr\widgets\Menu::widget(
                [
                    'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                    'items' => [
                        [
                            'label' => 'Finance',
                            'icon' => 'bug',
                            'url' => '#',
                            'items' => [
                                ['label' => 'Invoice', 'icon' => 'circle-o', 'url' => ['/invoice'],],
                                ['label' => 'Purchase', 'icon' => 'circle-o', 'url' => ['/purchase'],],
                                
                                
                            ],
                        ],
                    ],
                ]
            );

            echo dmstr\widgets\Menu::widget(
                [
                    'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                    'items' => [
                        [
                            'label' => 'Reports',
                            'icon' => 'bug',
                            'url' => '#',
                            'items' => [
                                ['label' => 'Invoice Report', 'icon' => 'circle-o', 'url' => ['/invoice/report'],],
                                ['label' => 'P/L Statement', 'icon' => 'circle-o', 'url' => ['/invoice/pl'],],
                                
                                
                            ],
                        ],
                    ],
                ]
            );


           

            

        }

        else if (Yii::$app->user->identity->level == 3)   
            {
            
         


            echo dmstr\widgets\Menu::widget(
                [
                    'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                    'items' => [
                        [
                            'label' => 'Dashboard',
                            'icon' => 'book',
                            'url' => ['/site/index'],
                        ],
                    ],
                ]
            );
           

            echo dmstr\widgets\Menu::widget(
                [
                    'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                    'items' => [
                        [
                            'label' => 'HR Management',
                            'icon' => 'bug',
                            'url' => '#',
                            'items' => [
                                ['label' => 'Employees', 'icon' => 'circle-o', 'url' => ['/employee'],],
                                ['label' => 'Department', 'icon' => 'circle-o', 'url' => ['/departments'],],
                                ['label' => 'Leave Types', 'icon' => 'circle-o', 'url' => ['/leave-types'],],
                                ['label' => 'Leave Requests', 'icon' => 'circle-o', 'url' => ['/leave-requests'],],
                                ['label' => 'Salary Slips', 'icon' => 'circle-o', 'url' => ['/salary'],],
                                
                            ],
                        ],
                    ],
                ]
            ); 
 

            

        }

        else if (Yii::$app->user->identity->level == 4)   
            {
            
         


            echo dmstr\widgets\Menu::widget(
                [
                    'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                    'items' => [
                        [
                            'label' => 'Dashboard',
                            'icon' => 'book',
                            'url' => ['/site/index'],
                        ],
                    ],
                ]
            );
           

            echo dmstr\widgets\Menu::widget(
                [
                    'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                    'items' => [
                        [
                            'label' => 'HR Management',
                            'icon' => 'bug',
                            'url' => '#',
                            'items' => [
                              
                                ['label' => 'Apply Leaves', 'icon' => 'circle-o', 'url' => ['/leave-requests/create'],],
                                ['label' => 'Your Leave Requests', 'icon' => 'circle-o', 'url' => ['/leave-requests'],],
                                
                                
                            ],
                        ],
                    ],
                ]
            ); 

            

        }



        else if (Yii::$app->user->identity->level == 5)   
            {
            
         


            echo dmstr\widgets\Menu::widget(
                [
                    'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                    'items' => [
                        [
                            'label' => 'Dashboard',
                            'icon' => 'book',
                            'url' => ['/site/index'],
                        ],
                    ],
                ]
            );
           

            echo dmstr\widgets\Menu::widget(
                [
                    'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                    'items' => [
                        [
                            'label' => 'Request A Services',
                            'icon' => 'bug',
                            'url' => '#',
                            'items' => [
                              
                                ['label' => 'Request', 'icon' => 'circle-o', 'url' => ['/service/create'],],
                                ['label' => 'Check status', 'icon' => 'circle-o', 'url' => ['/service/user-services'],],
                                
                            ],
                        ],
                    ],
                ]
            ); 

            

        }


    }

      
       
    
        ?>

    </section>

</aside>
