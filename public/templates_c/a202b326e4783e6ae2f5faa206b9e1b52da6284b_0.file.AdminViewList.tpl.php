<?php
/* Smarty version 4.3.0, created on 2023-09-21 18:17:42
  from 'C:\xampp\htdocs\carent\app\views\AdminViewList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_650c6ca6321ad0_75425102',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a202b326e4783e6ae2f5faa206b9e1b52da6284b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\carent\\app\\views\\AdminViewList.tpl',
      1 => 1695312866,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_650c6ca6321ad0_75425102 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_271724567650c6ca63189a3_79994832', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'content'} */
class Block_271724567650c6ca63189a3_79994832 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_271724567650c6ca63189a3_79994832',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<h2 class="content-head is-center">Menu Administratora</h2>

<div class="pure-g">

<div class="l-box-lrg pure-u-1 pure-u-med-2-5" border="5">
	<form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
adminadd" method="post">
		<fieldset>
		<label for="Nr_sam">Dodawanie samochodu:</label>
		
			<label for="Marka">Marka</label>
			<input id="Marka" type="text" name="Marka" value="">

			
			<label for="Model">Model</label>
			<input id="Model" type="text" name="Model" value="">

			<label for="Rocznik">Rocznik</label>
			<input id="Rocznik" type="text" name="Rocznik" value="">

			<label for="Color">Kolor</label>
			<input id="Color" type="text" name="Color" value="">

            <label for="photo_name">Link do zdjęcia</label>
			<input id="photo_name" type="text" name="photo_name" value="">
			
			<button type="submit" class="pure-button">Dodaj</button>
		</fieldset>
	</form>
	<form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
adminlist" method="post">
		<button type="submit" class="pure-button">Lista samochodów</button>
		
	</form>
	<form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
adminree" method="post">
		<br>
		<button type="submit" class="pure-button">Lista próśb</button>
		
	</form>

	<form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
adminuserlist" method="post">
		<br>
		<button type="submit" class="pure-button">Lista użytkowników</button>
		
	</form>
	
	<form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
admindel" method="post">
		<fieldset>

			<label for="Nr_sam">Nr samochodu który chesz usunąć</label>
			<input id="Nr_sam" type="text" name="Nr_sam" value="">
			<button type="submit" class="pure-button">Usuń</button>
	</fieldset>
	</form>
	<form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
adminedit" method="post">
		<fieldset>
		<label for="Nr_sam">Edycja samochodu:</label>

			<label for="Nr_sam">Nr samochodu</label>
			<input id="Nr_sam" type="text" name="Nr_sam" value="">
		
			<label for="Marka">Marka</label>
			<input id="Marka" type="text" name="Marka" value="">

			
			<label for="Model">Model</label>
			<input id="Model" type="text" name="Model" value="">

			<label for="Rocznik">Rocznik</label>
			<input id="Rocznik" type="text" name="Rocznik" value="">

			<label for="Color">Kolor</label>
			<input id="Color" type="text" name="Color" value="">

            <label for="photo_name">Link do zdjęcia</label>
			<input id="photo_name" type="text" name="photo_name" value="">
			
			<button type="submit" class="pure-button">edytuj</button>
		</fieldset>
	</form>
</div>

<div class="l-box-lrg pure-u-1 pure-u-med-3-5">
<?php if (!empty($_smarty_tpl->tpl_vars['list']->value)) {?>
	<ol>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
		<li> Marka: <?php echo $_smarty_tpl->tpl_vars['item']->value['Marka'];?>
 <br> Model:<?php echo $_smarty_tpl->tpl_vars['item']->value['Model'];?>
 <br> Rocznik: <?php echo $_smarty_tpl->tpl_vars['item']->value['Rocznik'];?>
 <br><img src=<?php echo $_smarty_tpl->tpl_vars['item']->value['photo_name'];?>
 width = "400" height="300"> </li>
	<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</ol>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isInfo()) {?>
	<h4>Informacje: </h4>
	<ol class="inf">
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getMessages(), 'inf');
$_smarty_tpl->tpl_vars['inf']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['inf']->value) {
$_smarty_tpl->tpl_vars['inf']->do_else = false;
?>
	<li><?php echo $_smarty_tpl->tpl_vars['inf']->value;?>
</li>
	<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</ol>
<?php }?>


</div>
</div>

<?php
}
}
/* {/block 'content'} */
}
