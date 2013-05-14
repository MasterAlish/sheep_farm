<?php /* Smarty version Smarty-3.1.13, created on 2013-05-14 16:48:27
         compiled from "templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:431352405190dbbf719ce6-26647611%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '90093ad09988b466f409a1871733c5589014713e' => 
    array (
      0 => 'templates/index.tpl',
      1 => 1368528506,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '431352405190dbbf719ce6-26647611',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5190dbbf763036_69257046',
  'variables' => 
  array (
    'killed' => 0,
    'yard' => 0,
    'lambs' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5190dbbf763036_69257046')) {function content_5190dbbf763036_69257046($_smarty_tpl) {?><div class="farm">
    <div class="align">
        <div class="clr"></div>
            <div class="lamb killed"></div>
            <span id="killed"><?php echo $_smarty_tpl->tpl_vars['killed']->value;?>
</span>
            <div id="msg" class="hidden"></div>
            <div class="pull-right">
                <input type="text" id="console" placeholder="Enter command here..">
                <a id="refresh_page" href="#">Refresh</a>
            </div>
        <div class="clr"></div>
    </div>
</div>

<div class="farm">
  <div class="align">
    <div class="clr"></div>
    <?php $_smarty_tpl->tpl_vars['yard'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['yard']->step = 1;$_smarty_tpl->tpl_vars['yard']->total = (int)ceil(($_smarty_tpl->tpl_vars['yard']->step > 0 ? 4+1 - (1) : 1-(4)+1)/abs($_smarty_tpl->tpl_vars['yard']->step));
if ($_smarty_tpl->tpl_vars['yard']->total > 0){
for ($_smarty_tpl->tpl_vars['yard']->value = 1, $_smarty_tpl->tpl_vars['yard']->iteration = 1;$_smarty_tpl->tpl_vars['yard']->iteration <= $_smarty_tpl->tpl_vars['yard']->total;$_smarty_tpl->tpl_vars['yard']->value += $_smarty_tpl->tpl_vars['yard']->step, $_smarty_tpl->tpl_vars['yard']->iteration++){
$_smarty_tpl->tpl_vars['yard']->first = $_smarty_tpl->tpl_vars['yard']->iteration == 1;$_smarty_tpl->tpl_vars['yard']->last = $_smarty_tpl->tpl_vars['yard']->iteration == $_smarty_tpl->tpl_vars['yard']->total;?>
        <div class="yard" id="yard<?php echo $_smarty_tpl->tpl_vars['yard']->value;?>
">
            <div class="name">
                Yard <?php echo $_smarty_tpl->tpl_vars['yard']->value;?>
 <b>(<span id="count_yard<?php echo $_smarty_tpl->tpl_vars['yard']->value;?>
"><?php if (!empty($_smarty_tpl->tpl_vars['lambs']->value)){?><?php echo count($_smarty_tpl->tpl_vars['lambs']->value[$_smarty_tpl->tpl_vars['yard']->value]);?>
<?php }?></span>)</b>
                <div class="pull-right"><a class="kill" id="<?php echo $_smarty_tpl->tpl_vars['yard']->value;?>
">Kill All</a></div>
            </div>
            <div class="lamb_place" id="lamb_place<?php echo $_smarty_tpl->tpl_vars['yard']->value;?>
">
                <?php if (!empty($_smarty_tpl->tpl_vars['lambs']->value)){?>
                <?php  $_smarty_tpl->tpl_vars['lamb'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['lamb']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lambs']->value[$_smarty_tpl->tpl_vars['yard']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['lamb']->key => $_smarty_tpl->tpl_vars['lamb']->value){
$_smarty_tpl->tpl_vars['lamb']->_loop = true;
?>
                    <div class="lamb"></div>
                <?php } ?>
                <?php }?>
            </div>
        </div>
    <?php }} ?>
    <div class="clr"></div>
  </div>
</div><?php }} ?>