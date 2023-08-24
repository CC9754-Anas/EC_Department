<?php

class WDSControllerWDSExport {
  ////////////////////////////////////////////////////////////////////////////////////////
  // Events                                                                             //
  ////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////
  // Constants                                                                          //
  ////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////
  // Variables                                                                          //
  ////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////
  // Constructor & Destructor                                                           //
  ////////////////////////////////////////////////////////////////////////////////////////
  public function __construct() {
  }
  ////////////////////////////////////////////////////////////////////////////////////////
  // Public Methods                                                                     //
  ////////////////////////////////////////////////////////////////////////////////////////
  public function execute() {
    // $task = WDW_S_Library::get('task');
    // $id = WDW_S_Library::get('slider_id', 0);
    $this->display();
  }

  public function display() {
    require_once WDS()->plugin_dir . "/admin/models/WDSModelWDSExport.php";
    $model = new WDSModelWDSExport();

    require_once WDS()->plugin_dir . "/admin/views/WDSViewWDSExport.php";
    $view = new WDSViewWDSExport($model);
    $slider_id = WDW_S_Library::get('current_id');
    $view->display($slider_id);
  }

  ////////////////////////////////////////////////////////////////////////////////////////
  // Getters & Setters                                                                  //
  ////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////
  // Private Methods                                                                    //
  ////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////
  // Listeners                                                                          //
  ////////////////////////////////////////////////////////////////////////////////////////
}