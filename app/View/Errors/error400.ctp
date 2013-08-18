<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Errors
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<h2><?php echo $name; ?></h2>
  <div class="nf-container">
    <div class="nf-img">
      <img src="/candiesapi/img/404.png">
    </div>
    <div class="nf img">
      <div class="bubble_wrap">
        <div class="bubbles b0"></div>
        <div class="bubbles b1"></div>
        <div class="bubbles b2"></div>
        <!-- <div class="bubbles b3"></div> -->
        <div class="bubbles b4"></div>
        <div class="bubbles b5"></div>
      </div>
    </div>
    <div class="nf-img">
      <img class="hat" src="/candiesapi/icon.png">
    </div>
  </div>
<p class="error">
  <strong><?php echo __d('cake', 'Error'); ?>: </strong>
  <?php printf(
    __d('cake', 'The requested address %s was not found on this server.'),
    "<strong>'{$url}'</strong>"
  ); ?>
</p>
<?php
if (Configure::read('debug') > 0):
  echo $this->element('exception_stack_trace');
endif;
?>
