<?php
namespace controllers\modules;

interface IModule {
    function indexAction();
    function setup();
}
