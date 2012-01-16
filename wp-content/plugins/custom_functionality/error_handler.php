<?php 	function fatalErrorShutdownHandler()
	{
	  $last_error = error_get_last();
	  if ($last_error['type'] === E_ERROR) {
	    // fatal error
	    $this->error_handler(E_ERROR, $last_error['errstr'], $last_error['errfile'], $last_error['errline']);
	  }
	}


	// error handler function
public	function error_handler($errno, $errstr, $errfile, $errline)
	{
	    if (!(error_reporting() & $errno)) {
	        // This error code is not included in error_reporting
	        return;
	    }

	    switch ($errno) {
	    case E_USER_ERROR:
		$plugin = plugin_basename( __FILE__ );
		$plugin_data = get_plugin_data( __FILE__, false );
	
		if( is_plugin_active($plugin) ) {
			deactivate_plugins( $plugin );
			wp_die( "'".$plugin_data['Name']."' Something terrible happened, go <a href='".admin_url()."'> back to WordPress admin</a>." );
		}
	
	        echo "<b>My ERROR</b> [$errno] $errstr<br />\n";
	        echo "  Fatal error on line $errline in file $errfile";
	        echo ", PHP " . PHP_VERSION . " (" . PHP_OS . ")<br />\n";
	        echo "Aborting...<br />\n";
	        exit(1);
	        break;

	    case E_USER_WARNING:
	       // echo "<b>My WARNING</b> [$errno] $errstr<br />\n";
	        break;

	    case E_USER_NOTICE:
	     //   echo "<b>My NOTICE</b> [$errno] $errstr<br />\n";
	        break;

	    default:
	      //  echo "Unknown error type: [$errno] $errstr<br />\n";
	        break;
	    }

	    /* Don't execute PHP internal error handler */
	    return true;
	}

	// function to test the error handling
	function scale_by_log($vect, $scale)
	{
	    if (!is_numeric($scale) || $scale <= 0) {
	        trigger_error("log(x) for x <= 0 is undefined, you used: scale = $scale", E_USER_ERROR);
	    }

	    if (!is_array($vect)) {
	        trigger_error("Incorrect input vector, array of values expected", E_USER_WARNING);
	        return null;
	    }

	    $temp = array();
	    foreach($vect as $pos => $value) {
	        if (!is_numeric($value)) {
	            trigger_error("Value at position $pos is not a number, using 0 (zero)", E_USER_NOTICE);
	            $value = 0;
	        }
	        $temp[$pos] = log($scale) * $value;
	    }

	    return $temp;
	}
 ?>