<?php

require_once '../app/services/Logger.php';
require_once '../app/controllers/Controller.php';

class CancionController
{
    public function index()
    {
        include '../app/views/cancion/index.php';
    }
}
