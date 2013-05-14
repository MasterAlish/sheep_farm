<?php /* Smarty version Smarty-3.1.13, created on 2013-05-14 18:23:31
         compiled from "templates/help.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1641690695191ce33ac1964-36227227%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1235deffe6fc3e01f10ab75ae0e704ff4c4addff' => 
    array (
      0 => 'templates/help.tpl',
      1 => 1368534186,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1641690695191ce33ac1964-36227227',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5191ce33acded9_08751344',
  'variables' => 
  array (
    'help' => 0,
    'commands' => 0,
    'command' => 0,
    'local' => 0,
    'locale' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5191ce33acded9_08751344')) {function content_5191ce33acded9_08751344($_smarty_tpl) {?><div class="farm">
    <div class="align">
        <div class="clr"></div>
            <?php if (!empty($_smarty_tpl->tpl_vars['help']->value)){?><?php echo $_smarty_tpl->tpl_vars['help']->value;?>
<?php }?>
        <div class="hidden">
            <?php  $_smarty_tpl->tpl_vars['local'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['local']->_loop = false;
 $_smarty_tpl->tpl_vars['command'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['commands']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['local']->key => $_smarty_tpl->tpl_vars['local']->value){
$_smarty_tpl->tpl_vars['local']->_loop = true;
 $_smarty_tpl->tpl_vars['command']->value = $_smarty_tpl->tpl_vars['local']->key;
?>
                <input type="hidden" id="<?php echo $_smarty_tpl->tpl_vars['command']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['local']->value;?>
">
            <?php } ?>
                <input type="hidden" id="incorrect_command" value="<?php echo $_smarty_tpl->tpl_vars['locale']->value['incorrect_command'];?>
">
        </div>
        <div class="clr"></div>
    </div>
</div><?php }} ?>