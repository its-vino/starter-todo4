<?php

/**
 * XML-persisted collection.
 *
 * @author		Vincent Lee
 * ------------------------------------------------------------------------
 */
class XML_Model extends CSV_Model
{
//---------------------------------------------------------------------------
//  Housekeeping methods
//---------------------------------------------------------------------------

    /**
     * Constructor.
     * @param string $origin    Filename of the xml file
     * @param string $keyfield  Name of the primary key field
     * @param string $entity	Entity name meaningful to the persistence
     */
    function __construct($origin = null, $keyfield = 'id', $entity = null)
    {
        parent::__construct();

        // guess at persistent name if not specified
        if ($origin == null)
            $this->_origin = get_class($this);
        else
            $this->_origin = $origin;

        // remember the other constructor fields
        $this->_keyfield = $keyfield;
        $this->_entity = $entity;

        // start with an empty collection
        $this->_data = array(); // an array of objects
        $this->fields = array(); // an array of strings
        // and populate the collection
        $this->load();
    }

    /**
     * Load the collection state appropriately, depending on persistence choice.
     * OVER-RIDE THIS METHOD in persistence choice implementations
     */
    protected function load()
    {
        //---------------------
        if(file_exists($this->_origin)) {
            $first = true;
            $data = simplexml_load_file($this->_origin);
            foreach ($data->children() as $item)
            {
                if ($first)
                {
                    // populate field names from item children
                    foreach($item->children() as $child) {
                        array_push($this->fields, $child->getName());
                    }
                    $first = false;
                }
                // build object from a row
                $record = new stdClass();
                for ($i = 0; $i < count($this->fields); $i++) {
                    //cast as string from SimpleXMLObject
                    $record->{$this->fields[$i]} = (string)$item->{$this->fields[$i]};
                }
                $key = $record->{$this->_keyfield};
                $this->_data[$key] = $record;
            }
        }
        // --------------------
        // rebuild the keys table
        $this->reindex();
    }
}
