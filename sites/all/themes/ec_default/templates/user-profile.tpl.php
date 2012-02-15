<?php

/**
 * @file
 * Default theme implementation to present all user profile data.
 *
 * This template is used when viewing a registered member's profile page,
 * e.g., example.com/user/123. 123 being the users ID.
 *
 * Use render($user_profile) to print all profile items, or print a subset
 * such as render($user_profile['user_picture']). Always call
 * render($user_profile) at the end in order to print all remaining items. If
 * the item is a category, it will contain all its profile items. By default,
 * $user_profile['summary'] is provided, which contains data on the user's
 * history. Other data can be included by modules. $user_profile['user_picture']
 * is available for showing the account picture.
 *
 * Available variables:
 *   - $user_profile: An array of profile items. Use render() to print them.
 *   - Field variables: for each field instance attached to the user a
 *     corresponding variable is defined; e.g., $account->field_example has a
 *     variable $field_example defined. When needing to access a field's raw
 *     values, developers/themers are strongly encouraged to use these
 *     variables. Otherwise they will have to explicitly specify the desired
 *     field language, e.g. $account->field_example['en'], thus overriding any
 *     language negotiation rule that was previously applied.
 *
 * @see user-profile-category.tpl.php
 *   Where the html is handled for the group.
 * @see user-profile-item.tpl.php
 *   Where the html is handled for each item in the group.
 * @see template_preprocess_user_profile()
 */
?>
<div class="profile"<?php print $attributes; ?>>
  <?php //print render($user_profile); ?>
  <?php 
    //list basic fields
    $basic = array('field_firstname', 'field_lastname', 'user_picture', 'summary');
    $output = '';
  ?>
  
  <fieldset>
  <legend>Basic information</legend>
    <div class="span2">
  <?php 
    print render($user_profile['user_picture']);
  ?>
    </div>
    <div class="span7">
  <?
    /*foreach ($user_profile as $key => $value) {
      if (in_array($key,$basic)) {
        print render($value);
      }
    }*/
    
  ?>
    <?php
      $output .= '<h3>' . $user_profile['field_firstname'][0]['#markup'] . ' ' . $user_profile['field_lastname'][0]['#markup'] . '</h3>';
      
      $output .= '<p><strong>' . t('Member since') . '</strong>: ' . date('d/m/Y',$user_profile['field_lastname']['#object']->created) . '</p>';
    
      $output .= l(t('Contact this user'), '', array('attributes' => array('type' => 'message')));
      
      print $output;
    ?>
    
    </div>
  </fieldset>
  
  <fieldset>
  <legend>Professional information</legend>
  <?php 
    foreach ($user_profile as $key => $value) {
      if (!in_array($key,$basic)) {
        print render($value);
      }
    }
  ?>  
  </fieldset>  
  
</div>