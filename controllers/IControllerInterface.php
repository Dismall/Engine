<?php
interface IController {
    public function indexAction($smarty, ImainFunctions $mainF);
    public function errorAction($smarty, ImainFunctions $mainF);
}
