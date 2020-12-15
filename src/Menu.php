<?php


namespace PhilipNjuguna\MenuGenerator;


use Illuminate\Support\Str;

class Menu extends MenuGenerator
{

    public static function build()
    {
        return (new self());
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

    protected function subModuleComponents()
    {
        ob_start();

        if (!is_null($this->subModule) && auth()->user()->can($this->subModulePermission)) {
            ?>
            <li class="treeview  <?php echo $this->getActiveParentRoute($this->section) ? "active" : '' ?>">
            <a href="#"><i class="fa fa-circle-o"></i> <?= $this->subModule ?>
                <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
            </a>
            <ul class="treeview-menu  ">
                <?php
                foreach ($this->subModuleMenu as $key => $menu) {
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
                }
                ?>
            </ul>
            </li>

            <?php
        }

        return ob_get_clean();
    }

    protected function htmlComponent(): string
    {
        ob_start();

        ?>

        <ul class="treeview-menu <?php echo getActiveParentRoute($this->section) ? "active" : '' ?>">
        <?php
        foreach ($this->menu as $key => $menu) {

            if (is_null($this->subModuleAfter) )
            {
                echo $this->subModuleComponents();
                /**
                 * CLEAR SUBMODULE SECTION
                 */
                $this->clearSubModuleSectionForNextItem();

            }



            if (! is_null($this->subModuleAfter) && strtolower($this->subModuleAfter) == strtolower($key) )
            {

                echo $this->subModuleComponents();
                /**
                 * CLEAR SUBMODULE SECTION
                 */
                $this->clearSubModuleSectionForNextItem();

            }

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
        }
        ?>
        </ul>
        <?php

        return ob_get_clean();

    }

    protected function sectionWithoutChildren()
    {
        ob_start();

        ?>
        <li class="<?= $this->getActiveRoute($this->uri) ? "active" : '' ?>">
            <a href="<?= $this->uri ?>">
                <i class="menu-icon <?= $this->icon ?>"></i>
                <span><?= $this->module ?></span>
            </a>
        </li>

        <?php

        return ob_get_clean();
    }

}
