<?php

namespace Tutorial\Vietnt\Api\Data;

interface FaqStoreInterface
{

    const IDTAB                 = 'id_tab';
    const ID                    = 'id';
    const STOREID               = 'store_id';



    public function getStoreid();

    public function setStoreid($store_id);
    
    public function getID();

    public function setID($id);

    public function getIdTab();


    public function setIdTab($id_tab);

}