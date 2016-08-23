<?php
namespace FormHandler\Validator;

/**
 */
class WhitelistValidator extends AbstractValidator
{

    protected $whitelist = array();

    protected $required = true;

    /**
     * Create a new whitelist validator
     *
     * This validates if the field contains only characters which are in the whitelist.
     *
     * @param array|string $whitelist
     * @param boolean $required
     * @param string $message
     */
    public function __construct($whitelist, $required = true, $message = null)
    {
        if ($message === null) {
            $message = dgettext('formhandler', 'This value is incorrect.');
        }

        $this->setWhitelist($whitelist);
        $this->setRequired($required);
        $this->setErrorMessage($message);
    }

    /**
     * Check if the given field is valid or not.
     * @return bool
     * @throws \Exception
     */
    public function isValid()
    {
        $value = $this->field->getValue();

        if (is_array($value) || is_object($value)) {
            throw new \Exception("This validator only works on scalar types!");
        }

        // required but not given
        if ($this->required && $value == null) {
            return false;
        } // if the field is not required and the value is empty, then it's also valid
        elseif (! $this->required && $value == "") {
            return true;
        }

        // now, walk all chars and check if they are in the whitelist
        for ($i = 0; $i < strlen($value); $i ++) {
            if (! in_array($value[$i], $this->whitelist)) {
                // not in the whitelist!
                return false;
            }
        }

        // if here, everything is ok!
        return true;
    }

    /**
     * Set if this field is required or not.
     *
     * @param boolean $required
     */
    public function setRequired($required)
    {
        $this->required = (bool) $required;
    }

    /**
     * Get if this field is required or not.
     *
     * @return boolean
     */
    public function isRequired()
    {
        return $this->required;
    }

    /**
     * Set the whitelist of characters which are allowed for this field.
     * This can either be an array or a string.
     *
     * @param array|\ArrayObject|string $whitelist
     * @throws \Exception
     */
    public function setWhitelist($whitelist)
    {
        if (is_array($whitelist)) {
            $this->whitelist = $whitelist;
        } elseif ($whitelist instanceof \ArrayObject) {
            $this->whitelist = $whitelist->getArrayCopy();
        } elseif (is_string($whitelist)) {
            $this->whitelist = array();
            for ($i = 0; $i < strlen($whitelist); $i ++) {
                $this->whitelist[] = $whitelist[$i];
            }
        } else {
            throw new \Exception('Incorrect whitelist given. Allowed whitelist are: string, array or ArrayObject.');
        }
    }

    /**
     * Return the whitelist
     *
     * @return array
     */
    public function getWhitelist()
    {
        return $this->whitelist;
    }
}
