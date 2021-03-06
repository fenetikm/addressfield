<?php

/**
 * @file
 * Contains \Drupal\telephone\AddressFieldFieldTest.
 */

namespace Drupal\addressfield\Tests;

use Drupal\simpletest\WebTestBase;

/**
 * Tests the creation of addressfield fields.
 *
 * @group field_types
 */
class AddressFieldFieldTest extends WebTestBase {

  /**
   * Modules to enable.
   *
   * @var array
   */
  public static $modules = array(
    'field',
    'node',
    'addressfield'
  );

  protected $instance;
  protected $web_user;

  function setUp() {
    parent::setUp();

    $this->drupalCreateContentType(array('type' => 'article'));
    $this->article_creator = $this->drupalCreateUser(array('create article content', 'edit own article content'));
    $this->drupalLogin($this->article_creator);
  }

  // Test fields.

  /**
   * Helper function for testAddressFieldField().
   */
  function testAddressFieldField() {

    // Add the addressfield field to the article content type.
    entity_create('field_entity', array(
      'name' => 'field_addressfield',
      'entity_type' => 'node',
      'type' => 'addressfield',
    ))->save();
    entity_create('field_instance', array(
      'field_name' => 'field_addressfield',
      'label' => 'Postal address',
      'entity_type' => 'node',
      'bundle' => 'article',
    ))->save();

    // TODO

    /*entity_get_form_display('node', 'article', 'default')
      ->setComponent('field_addressfield', array(
        'type' => 'addressfield_default',
        'settings' => array(
          'placeholder' => '123-456-7890',
        ),
      ))
      ->save();

    entity_get_display('node', 'article', 'default')
      ->setComponent('field_telephone', array(
        'type' => 'telephone_link',
        'weight' => 1,
      ))
      ->save();

    // Display creation form.
    $this->drupalGet('node/add/article');
    $this->assertFieldByName("field_telephone[0][value]", '', 'Widget found.');
    $this->assertRaw('placeholder="123-456-7890"');

    // Test basic entery of telephone field.
    $edit = array(
      "title" => $this->randomName(),
      "field_telephone[0][value]" => "123456789",
    );

    $this->drupalPostForm(NULL, $edit, t('Save'));
    $this->assertRaw('<a href="tel:123456789">', 'A telephone link is provided on the article node page.');

    // Add number with a space in it. Need to ensure it is stripped on output.
    $edit = array(
      "title" => $this->randomName(),
      "field_telephone[0][value]" => "1234 56789",
    );

    $this->drupalPostForm('node/add/article', $edit, t('Save'));
    $this->assertRaw('<a href="tel:123456789">', 'Telephone link is output with whitespace removed.');*/
  }
}
