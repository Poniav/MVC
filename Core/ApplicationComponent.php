<?php

namespace Core;

/**
 * Class Application Component
 */
abstract class ApplicationComponent
 {

   protected $app;

   public function __construct(Application $app)
   {
     $this->app = $app;
   }

   public function app()
   {
     return $this->app;
   }
 }
