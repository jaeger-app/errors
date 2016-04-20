<?php
/**
 * Jaeger
 *
 * @copyright	Copyright (c) 2015-2016, mithra62
 * @link		http://jaeger-app.com
 * @version		1.0
 * @filesource 	./Errors.php
 */
namespace JaegerApp;

/**
 * Jaeger - Error Object
 *
 * Checks the base system to ensure everything's in place for use
 *
 * @package Errors
 * @author Eric Lamb <eric@mithra62.com>
 */
class Errors
{

    /**
     * The system settings
     * 
     * @var array
     */
    protected $settings = array();

    /**
     * Contains an array of the errors found
     * 
     * @var array
     */
    protected $errors = array();

    /**
     * The Validation object
     * 
     * @var \JaegerApp\Validate
     */
    protected $validation = null;

    /**
     * Returns the total number of errors
     * 
     * @return int
     */
    public function totalErrors()
    {
        return count($this->getErrors());
    }

    /**
     * Returns just a single error
     * 
     * @return mixed
     */
    public function getError()
    {
        $errors = $this->getErrors();
        return array_pop($errors);
    }

    /**
     * Returns all the errors found
     * 
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * Sets the settings to check
     * 
     * @param array $settings            
     * @return \JaegerApp\Errors
     */
    public function setSettings(array $settings)
    {
        $this->settings = $settings;
        return $this;
    }

    /**
     * Returns the set settings array
     * 
     * @return array
     */
    public function getSettings()
    {
        return $this->settings;
    }

    /**
     * Clears out any errors that were added
     * 
     * @return \JaegerApp\Errors
     */
    public function clearErrors()
    {
        $this->errors = array();
        return $this;
    }

    /**
     * Sets the Validation object
     * 
     * @param \JaegerApp\Validate $val            
     * @return \JaegerApp\Errors
     */
    public function setValidation(\JaegerApp\Validate $val)
    {
        $this->validation = $val;
        return $this;
    }

    /**
     * Returns an instance of the validation object
     * 
     * @return \JaegerApp\Validate
     */
    public function getValidation()
    {
        return $this->validation;
    }

    /**
     * Sets an error
     * 
     * @param string $name
     *            The key the error will be placed at in the error array
     * @param string $error
     *            The error message language key
     */
    public function setError($name, $error)
    {
        $this->errors[$name] = $error;
    }

    /**
     * Verifies the license key is valid
     * 
     * @param string $license_key            
     * @param \JaegerApp\License $license            
     * @return \JaegerApp\Errors
     */
    public function licenseCheck($license_key, \JaegerApp\License $license)
    {
        if ($license_key == '') {
            $this->setError('license_number', 'missing_license_number');
        } else {
            if (! $license->validLicense($license_key)) {
                $this->setError('license_number', 'invalid_license_number');
            }
        }
        
        return $this;
    }
}