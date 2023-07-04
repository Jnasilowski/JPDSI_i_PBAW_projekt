<?php
/* Smarty version 4.3.0, created on 2023-07-04 00:23:25
  from 'C:\xampp\htdocs\amelia\app\views\RejestrView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_64a34a5d950171_04496423',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2da9fb3aefef921665831c27073d58671aed020f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\amelia\\app\\views\\RejestrView.tpl',
      1 => 1688423002,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64a34a5d950171_04496423 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_91591810564a34a5d945f53_00890437', 'footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_56742424364a34a5d9467f9_96844131', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'footer'} */
class Block_91591810564a34a5d945f53_00890437 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_91591810564a34a5d945f53_00890437',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
przykładowa tresć stopki wpisana do szablonu głównego z szablonu kalkulatora<?php
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_56742424364a34a5d9467f9_96844131 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_56742424364a34a5d9467f9_96844131',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<h2 class="content-head is-center">Rejestracja</h2>

<div class="pure-g">
<div class="l-box-lrg pure-u-1 pure-u-med-2-5">
	<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
rejestr" method="post" class="pure-form pure-form-stacked" >
		<fieldset>

			<label for="log">Login:</label>
			<input id="log" type="text"  name="log" value="">

			<label for="passw">Hasło:</label>
			<input id="passw" type="text"  name="passw" value="">

            <label for="imie">Imie:</label>
			<input id="imie" type="text"  name="imie" value="">

            <label for="nazwisko">Nazwisko:</label>
			<input id="nazwisko" type="text"  name="nazwisko" value="">
			
            <label for="nr_tel">Numer telefonu:</label>
			<input id="nr_tel" type="text"  name="nr_tel" value="">

            <label for="wiek">Wiek:</label>
			<input id="wiek" type="text"  name="wiek" value="">

           

			<button type="submit" class="pure-button">Stwórz</button>
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

<?php if ((isset($_smarty_tpl->tpl_vars['result']->value->result))) {?>
	<h4>Rata kredytu:</h4>
	<p class="res">
	<?php echo $_smarty_tpl->tpl_vars['result']->value->result;?>

	</p>
	<h4>Całkowita kwota spłaty:</h4>
	<p class="res">
	<?php echo $_smarty_tpl->tpl_vars['result']->value->cal;?>

	</p>
	<h4>koszt kredytu:</h4>
	<p class="res">
	<?php echo $_smarty_tpl->tpl_vars['result']->value->kk;?>

	</p>
<?php }?>

</div>
</div>

<?php
}
}
/* {/block 'content'} */
}
