<?php

namespace Application\Models\Cms\Components\Navigation;

use DOMDocument;

class NavigationComponent extends \Alien\Mvc\Component\NavigationComponent {

    public function cmsRender()
    {
        ?>
            <nav ng-controller="navbarCtrl">
                <div>
                    <button class="btn btn-primary" ng-show="!isEditing" ng-click="setToEditMode();">
                        <i class="fa fa-pencil"></i> Začať úpravy
                    </button>
                    <button class="btn btn-success" ng-show="isEditing" ng-click="saveEditing();">
                        <i class="fa fa-save"></i> Zapísať zmeny
                    </button>
                    <button class="btn btn-danger" ng-show="isEditing" ng-click="cancelEditMode();">
                        <i class="fa fa-ban"></i> Zrušiť
                    </button>
                    <button class="btn btn-primary" ng-show="isEditing" ng-click="createNewLink();">
                        <i class="fa fa-plus-circle"></i> Pridať link
                    </button>
                </div>
                <ul class="nav nav-justified editable">
                    <li ng-repeat="link in links">
                        <a href="{{link.link}}" ng-show="!isEditing">{{link.label}}</a>
                        <a href="#" ng-show="isEditing" ng-click="editLink(link);"><i class="fa fa-pencil"></i> {{link.label}}</a>
                    </li>
                </ul>
                <div ng-show="isLinkEditing">
                    <form>
                        <fieldset>
                            <label>
                                Text: <input type="text" ng-model="editingLink.label">
                            </label>
                            <label>
                                Link: <input type="text" ng-model="editingLink.link">
                            </label>
                            <button class="btn btn-primary" ng-click="deleteLink();">
                                <i class="fa fa-trash"></i> Zmazať
                            </button>
                            <button class="btn btn-success" ng-click="saveLinkEdit();">
                                <i class="fa fa-check"></i> Potvrdiť
                            </button>
                            <button class="btn btn-danger" ng-click="cancelLinkEdit();">
                                <i class="fa fa-ban"></i> Zrušiť
                            </button>
                        </fieldset>
                    </form>
                </div>
            </nav>
        <?
    }

    public function render()
    {
        return $this->cmsRender();
    }

    public function baseRender()
    {
        $doc = new DOMDocument('1.0');
        $ul = $doc->createElement('ul');
        $ul->setAttribute('class', 'nav nav-justified');
        $ul->setAttribute('ng-model', 'cms');
        foreach($this->links as $name => $link) {
            $li = $doc->createElement('li');
            $a = $doc->createElement('a', $name);
            $a->setAttribute('href', $link);
            $li->appendChild($a);
            $ul->appendChild($li);
        }
        $doc->appendChild($ul);
        return $doc->saveHTML();
    }


} 