<?php /* Smarty version Smarty-3.1.13, created on 2013-05-14 17:47:06
         compiled from "templates/main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19062758605190fb0be2dd16-47347584%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '88c6baab8db5b147146df4d4d7f083fab98802ca' => 
    array (
      0 => 'templates/main.tpl',
      1 => 1368532020,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19062758605190fb0be2dd16-47347584',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5190fb0be80c41_09182500',
  'variables' => 
  array (
    'locale' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5190fb0be80c41_09182500')) {function content_5190fb0be80c41_09182500($_smarty_tpl) {?><html>
<head>
    <title><?php echo $_smarty_tpl->tpl_vars['locale']->value['title'];?>
</title>
    <meta charset="utf-8">
    <link href="/assets/stylesheets/application.css" media="all" rel="stylesheet" type="text/css" />
    <link href="/assets/stylesheets/bootstrap.css" media="all" rel="stylesheet" type="text/css" />
    <script src="/assets/javascripts/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="/assets/javascripts/application.js" type="text/javascript"></script>
    <script src="/assets/javascripts/bootstrap.min.js" type="text/javascript"></script>
    <script src="/assets/javascripts/console.js" type="text/javascript"></script>
</head>
<body>
    <div class="container">
    <?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['template']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <?php echo $_smarty_tpl->getSubTemplate ('help.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    </div>
</body>
</html><?php }} ?>