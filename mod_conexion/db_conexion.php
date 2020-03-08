<?php

/**
	 * A class file to connect to database
	 */
	class DB_CONEXION {
	    var $con, $db;
	    // constructor
	    function __construct() {
	        // connecting to database
	        $this->connect();
	    }
	
	    // destructor
	    function __destruct() {
	        // closing db connection
	        $this->close();
	    }
	
	    /**
	     * Function to connect with database
	     */
	    function connect() {
	        // import database connection variables
	       	require_once("db_config.php");    
	        
			// Connecting to mysql database
	        $this->con = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE) or die(mysqli_error($this->con));          
	
	        // Selecing database
	        $this->db = mysqli_select_db($this->con,DB_DATABASE) or die(mysqli_error()) or die(mysqli_error($this->db));
	
	        // returing connection cursor
	        return $this->con;
	    }
	    
		    
	    /**
	     * Function to close db connection
	     */
	    function close() {
	        // closing db connection
	        mysqli_close($this->con);
	    }
	
	}

