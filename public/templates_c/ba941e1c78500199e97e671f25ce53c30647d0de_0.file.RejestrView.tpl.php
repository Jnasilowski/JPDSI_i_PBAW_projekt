<?php
/* Smarty version 4.3.0, created on 2023-07-04 01:53:08
  from 'C:\xampp\htdocs\carent\app\views\RejestrView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_64a35f6421e9b5_08563478',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ba941e1c78500199e97e671f25ce53c30647d0de' => 
    array (
      0 => 'C:\\xampp\\htdocs\\carent\\app\\views\\RejestrView.tpl',
      1 => 1688428135,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64a35f6421e9b5_08563478 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>




<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17991677064a35f64217249_10029634', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'content'} */
class Block_17991677064a35f64217249_10029634 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_17991677064a35f64217249_10029634',
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
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->m, 'err');
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
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->m, 'inf');
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
