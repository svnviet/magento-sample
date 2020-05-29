<?php

namespace Tutorial\Vietnt\Api\Data;

interface FaqInterface
{
    /**#@+
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const ID                    = 'id';
    const TITLE                 = 'title';
    const DESCRIPTION           = 'description';
    const IMAGE                 = 'image';
    const CREATE_AT             = 'create_at';
    const UPDATE_AT             = 'update_at';
    const OBSERVER              = 'observer';

    public function getObserver();

    public function setObserver($observer);

    public function getTitle();

    /**
     * Get Content
     *
     * @return string|null
     */
    public function getDescription();

    /**
     * Get Created At
     *
     * @return string|null
     */
    public function getImage();

    // public function

    public function getCreateAt();

    public function getUpdateAt();
    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId();

    /**
     * Set Title
     *
     * @param string $title
     * @return $this
     */
    public function setTitle($title);

    /**
     * Set Content
     *
     * @param string $content
     * @return $this
     */
    public function setDescription($description);


    public function setImage($image);
    /**
     * Set Crated At
     *
     * @param int $createdAt
     * @return $this
     */
    public function setCreateAt($create_at);


    public function setUpdateAt($update_at);
    /**
     * Set ID
     *
     * @param int $id
     * @return $this
     */
    public function setId($id);
}
