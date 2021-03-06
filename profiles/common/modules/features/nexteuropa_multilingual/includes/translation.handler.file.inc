<?php

/**
 * @file
 * File translation handler for the entity translation module.
 */

/**
 * File translation handler.
 */
class EntityTranslationFileHandler extends EntityTranslationDefaultHandler {

  /**
   * Constructor.
   */
  public function __construct($entity_type, $entity_info, $entity) {
    parent::__construct('file', $entity_info, $entity);
  }

  /**
   * Override of EntityTranslationDefaultHandler::getCurrentEntityRevision.
   *
   * @see EntityTranslationDefaultHandler::getCurrentEntityRevision()
   */
  public function getCurrentEntityRevision() {
    return $this->getEntity();
  }

}
