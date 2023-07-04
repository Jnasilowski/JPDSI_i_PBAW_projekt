<?php
/* Smarty version 4.3.0, created on 2023-07-04 01:21:19
  from 'C:\xampp\htdocs\amelia\app\views\AdminView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_64a357ef874d00_31538889',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '07100edaabf870325dfb77c8de1bde195f445e5c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\amelia\\app\\views\\AdminView.tpl',
      1 => 1688426477,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64a357ef874d00_31538889 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_104015351164a357ef86cc30_93318779', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'content'} */
class Block_104015351164a357ef86cc30_93318779 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_104015351164a357ef86cc30_93318779',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<h2 class="content-head is-center">Menu Administratora</h2>

<div class="pure-g">

<div class="l-box-lrg pure-u-1 pure-u-med-2-5">
	<form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
adminadd" method="post">
		<fieldset>

			<label for="Marka">Marka</label>
			<input id="Marka" type="text" name="Marka" value="">

			
			<label for="Model">Model</label>
			<input id="Model" type="text" name="Model" value="">

			<label for="Rocznik">Rocznik</label>
			<input id="Rocznik" type="text" name="Rocznik" value="">

			<label for="Color">Kolor</label>
			<input id="Color" type="text" name="Color" value="">

            <label for="photo_name">Nazwa zdjęcia</label>
			<input id="photo_name" type="text" name="photo_name" value="">
			
			<button type="submit" class="pure-button">Stwórz</button>
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
admindel" method="post">
		<fieldset>

			<label for="Nr_sam">Nr samochodu który chesz usunąć</label>
			<input id="Nr_sam" type="text" name="Nr_sam" value="">
			<button type="submit" class="pure-button">Usuń</button>
	</fieldset>
	</form>
</div>

<div class="l-box-lrg pure-u-1 pure-u-med-3-5">

<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isError()) {?>
	<h4>Wystąpiły błędy: </h4>
	<ol class="err">
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getMessage(0), 'err');
$_smarty_tpl->tpl_vars['err']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['err']->value) {
$_smarty_tpl->tpl_vars['err']->do_else = false;
?>
	<li><?php echo $_smarty_tpl->tpl_vars['err']->value;?>
</li>
	<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</ol>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isInfo()) {?>
	<h4>Informacje: </h4>
	<ol class="inf">
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getMessage(0), 'inf');
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
