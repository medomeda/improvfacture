<?php

	// Generer code
    
    function  setActive($path)  {
        dd(Request::RouteIs('admin.permissions.index'));
        return  Request::RouteIs('admin.permissions.index');  //in_array(Route::currentRouteName(), $path) ? 'active' :  '';
       
        
    }

    function setActiveMenu(...$allowedRoutes) {
        foreach ($allowedRoutes as $n) {
            if (Request::RouteIs($n)) { 
               return 'active';
            }
        }
        return '';
    }

    function  setOpenMenu(...$allowedRoutes)  {
        //return in_array(Route::currentRouteName(), $path) ? 'menu-open' :  '';
        foreach ($allowedRoutes as $n) {
            if (Request::RouteIs($n)) { 
               return 'menu-open';
            }
        }
        return '';
    }



    

	
