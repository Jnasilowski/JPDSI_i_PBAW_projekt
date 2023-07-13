<?php
/* Smarty version 4.3.0, created on 2023-07-13 00:52:05
  from 'C:\xampp\htdocs\carent\app\views\UserrView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_64af2e9536f8e8_39820058',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a6f118fc0a0a51a7b796db0da395683ec356be39' => 
    array (
      0 => 'C:\\xampp\\htdocs\\carent\\app\\views\\UserrView.tpl',
      1 => 1689202324,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64af2e9536f8e8_39820058 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>




<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8054319764af2e95362472_31053301', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'content'} */
class Block_8054319764af2e95362472_31053301 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_8054319764af2e95362472_31053301',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<h2 class="content-head is-center">Prosty kalkulator</h2>

<div class="pure-g">
<div class="l-box-lrg pure-u-1 pure-u-med-2-5">
	<form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
usercarlist" method="post">
		<fieldset>

			<label for="Nr_samochodu">Sprawdź dostępne samochody</label>
			

            <label for="Od_kiedy">Od kiedy</label>
			<input id="Od_kiedy" type="date"  name="Od_kiedy" value="">


            <label for="Do_kiedy">Do kiedy</label>
			<input id="Do_kiedy" type="date"  name="Do_kiedy" value="">

			

			<button type="submit" class="pure-button">Sprawdź</button>
		</fieldset>
	</form>
	<form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
userrent" method="post">
		<fieldset>

			<label for="LOL">Zamów samochód</label>


			<label for="Nr_samochodu2">Numer samochodu: </label>
			<input id="Nr_samochodu2" type="text"  name="Nr_samochodu2" value="">

            <label for="Od_kiedy2">Od kiedy</label>
			<input id="Od_kiedy2" type="date"  name="Od_kiedy2" value="">


            <label for="Do_kiedy2">Do kiedy</label>
			<input id="Do_kiedy2" type="date"  name="Do_kiedy2" value="">

			

			<button type="submit" class="pure-button">Zamów</button>
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
