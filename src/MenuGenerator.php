<?php
namespace PhilipNjuguna\MenuGenerator;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

abstract class MenuGenerator
{

    protected array  $menu          = [];
    protected array  $subModuleMenu = [];
    protected string $module;
    protected array  $modulePermission;
    protected string $icon          = "fa fa-users";
    protected string $section;
    protected string $uri;

    protected $subModule;
    protected $subModulePermission;
    protected $subModuleAfter;



    public function output()
    {
        if (sizeof($this->menu) < 1) {

            $output = $this->sectionWithoutChildren();

        } else {
            $output = $this->htmlModule();
        }
        $this->clearSectionForNextItem();

        return $output;
    }

    public function module(string $module, array $permission)
    {
        $this->module = $module;

        $this->modulePermission = $permission;

        return $this;
    }

    protected function clearSectionForNextItem()
    {
        $this->menu = [];
        $this->module = '';
        $this->section = '';
        $this->modulePermission = [];
        $this->icon = '';
        $this->uri = '';
        $this->subModule = "";
        $this->subModulePermission = "";
        $this->subModuleAfter = "";
        $this->subModuleMenu = [];

    }
    protected function clearSubModuleSectionForNextItem()
    {
        $this->subModule = "";
        $this->subModulePermission = "";
        $this->subModuleAfter = "";
        $this->subModuleMenu = [];

    }


    public function uri(string $uri)
    {
        $this->uri = $uri;

        return $this;
    }

    public function icon(string $icon)
    {
        $this->icon = $icon;

        return $this;
    }

    public function section(string $section)
    {
        $this->section = $section;

        return $this;
    }

    public function menu(string $name, string $uri, string $permission)
    {
        $this->menu[$name] = [
            'uri' => $uri,
            'permission' => $permission
        ];
        return $this;
    }
    public function subModule($subModule, $permission, $after = null)
    {
        $this->subModule = $subModule;

        $this->subModulePermission = $permission;

        $this->subModuleAfter = $after;



        return $this;
    }

    public function childrenItems($name, $route, $permission)
    {
        $this->subModuleMenu[$name] = [
            'uri' => $route,
            'permission' => $permission
        ];
        return $this;
    }

    protected function showModule(): bool
    {
        return Gate::any($this->modulePermission);
    }

    protected function showComponent($permission): bool
    {

        return auth()->user()->can($permission);
    }

    abstract protected function htmlModule();
    abstract  protected function subModuleComponents();
    abstract  protected function htmlComponent();
    abstract  protected function sectionWithoutChildren();

    protected function getActiveParentRoute($prefix = null)
    {
        return  Str::contains(url()->current() , $prefix);

    }

    protected function getActiveRoute($route)
    {
        return Str::contains(url()->current() , $route) ? "active" : "";
    }

}
