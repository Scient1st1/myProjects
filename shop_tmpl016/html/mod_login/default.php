<?php
defined ( '_JEXEC' ) or die ( 'Restricted access' ) ;

if ($User): ?>
<a class="loged_name_text" href="<?=$cabinet_url ?>"><span class="glyphicon glyphicon-user"></span><?=C::_('company_name', $User) ? (C::_('company_name', $User)) : (C::_('firstname', $User).' '.C::_('lastname', $User)) ?></a>
<a class="user_logout_btn" href="<?=$logout_url ?>"><span class="glyphicon glyphicon-log-out"></span><?= JText::_('LogOut') ?></a>
<?php else: ?>
<a class="user_login_btn" href="<?=$login_url ?>"><span class="glyphicon glyphicon-log-in"></span><?= JText::_('Login') ?></a>  <a class="user_registration_btn" href="<?=$registration_url ?>"><span class="glyphicon glyphicon-user"></span><?= JText::_('Register') ?></a>
<?php endif ?>
