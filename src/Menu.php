<?php


namespace PhilipNjuguna\MenuGenerator;


use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class Menu extends MenuGenerator
{


    public static function build()
    {
        return (new self());
    }

    public function subModules(array $submodules)
    {
        $this->submoduleItems = $submodules;



        return $this;
    }
    protected function htmlModule(): string
    {
        ob_start();

        if ($this->showModule()) {

            ?>
            <li class="treeview <?php echo $this->getActiveParentRoute($this->section) ? "active" : '' ?>">
                <a href="#">
                    <i class="<?= $this->icon ?>"></i>
                    <span><?= Str::ucfirst(Str::lower($this->module)) ?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>

                <?php
                echo $this->htmlComponent();
                ?>
            </li>
            <?php
        }

        return ob_get_clean();

    }

    public function endSubModule(){




        return $this;
    }

    protected function subModuleComponents()
    {
        ob_start();


        foreach ($this->submoduleItems as $submodule)
        {



            if (Gate::any($submodule['permission']))
            {
                ?>
                <li class="treeview">
                <a href="#"><i class="fa fa-circle-o"></i> <?= $submodule['name'] ?>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu ">
                    <?php
                    foreach ($submodule['children'] as $child)
                    {
                        ?>
                        <li class="<?php echo $this->getActiveRoute($child['uri']) ? "active" : '' ?>">
                            <a href="<?= Str::ucfirst(Str::lower($child['uri'])) ?>">
                                <i class="fa fa-circle-o"></i>
                                <?= Str::ucfirst(Str::lower($child['item'])) ?>
                            </a>
                        </li>
                        <?php


                        ?>

                        <?php
                    }
                    ?>
                </ul>

                <?php
            }
            ?>
            </li>
            <?php

        }


        $this->submoduleItems = [];

        return ob_get_clean();
    }

    protected function htmlComponent(): string
    {

        ob_start();

        ?>

        <ul class="treeview-menu <?php echo $this->getActiveParentRoute($this->section) ? "active" : '' ?>">
            <?php
            if (sizeof($this->submoduleItems) )
            {
                echo $this->subModuleComponents();

            }

            foreach ($this->menu as $key => $menu) {




                echo $this->outPutSingleItem($menu , $key);

            }
            ?>
        </ul>
        <?php


        return ob_get_clean();

    }


    private function  outPutSingleItem( $menu , $key)
    {
        ob_start();

        if ($this->showComponent($menu['permission'])) {
            ?>
            <li class="<?php echo $this->getActiveRoute($menu['uri']) ? "active" : '' ?>">
                <a href="<?= Str::ucfirst(Str::lower($menu['uri'])) ?>">
                    <i class="fa fa-circle-o"></i>
                    <?= Str::ucfirst(Str::lower($key)) ?>
                </a>
            </li>
            <?php
        }

        return ob_get_clean();
    }
    protected function sectionWithoutChildren()
    {
        ob_start();

        if (Gate::any($this->modulePermission)) {


            ?>
            <li class="<?= $this->getActiveRoute($this->uri) ? "active" : '' ?>">
                <a href="<?= $this->uri ?>">
                    <i class="menu-icon <?= $this->icon ?>"></i>
                    <span><?= $this->module ?></span>
                </a>
            </li>

            <?php
        }
        return ob_get_clean();
    }

}
