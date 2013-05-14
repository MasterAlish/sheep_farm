<?php /* Smarty version Smarty-3.1.13, created on 2013-05-14 18:18:19
         compiled from "templates/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10344171755190fdcad8afa0-50748268%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'be439f82a4dbec61746f62a0df07c19a7eecd966' => 
    array (
      0 => 'templates/header.tpl',
      1 => 1368533897,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10344171755190fdcad8afa0-50748268',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5190fdcadd4164_50454715',
  'variables' => 
  array (
    'locale' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5190fdcadd4164_50454715')) {function content_5190fdcadd4164_50454715($_smarty_tpl) {?><header class="navbar navbar-fixed-top navbar-inverse">
    <div class="navbar-inner">
        <div class="container">
            <a href="/"><img class="logo" src="/assets/images/logo.png"><span class="title"><?php echo $_smarty_tpl->tpl_vars['locale']->value['title'];?>
</span></a>
            <nav>
                <ul class="nav pull-right">
                    <li><a href="/?lang=ru">Русский</a></li>
                    <li><a href="/?lang=en">English</a></li>
                    <li><a href="/sheep/createDB" id="init_db"><?php echo $_smarty_tpl->tpl_vars['locale']->value['init_db'];?>
</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header><?php }} ?>