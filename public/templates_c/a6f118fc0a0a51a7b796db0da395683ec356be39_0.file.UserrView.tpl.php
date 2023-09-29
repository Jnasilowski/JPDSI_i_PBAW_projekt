<?php
/* Smarty version 4.3.0, created on 2023-09-26 18:01:13
  from 'C:\xampp\htdocs\carent\app\views\UserrView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_65130049f0a002_59192804',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a6f118fc0a0a51a7b796db0da395683ec356be39' => 
    array (
      0 => 'C:\\xampp\\htdocs\\carent\\app\\views\\UserrView.tpl',
      1 => 1695744071,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65130049f0a002_59192804 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>




<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_56842188365130049ef9ff8_86418042', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'content'} */
class Block_56842188365130049ef9ff8_86418042 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_56842188365130049ef9ff8_86418042',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<h2 class="content-head is-center"></h2>

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
		<form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
userrent" method="post">
		<div style="visibility: hidden"><?php $_smarty_tpl->_assignInScope('licz2', 1);
$_smarty_tpl->_assignInScope('licz3', 1);?></div>
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list2']->value, 'item2');
$_smarty_tpl->tpl_vars['item2']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item2']->value) {
$_smarty_tpl->tpl_vars['item2']->do_else = false;
?>
				<?php if (($_smarty_tpl->tpl_vars['item2']->value['od_kiedy'] > $_smarty_tpl->tpl_vars['Od_kiedy']->value && $_smarty_tpl->tpl_vars['item2']->value['od_kiedy'] > $_smarty_tpl->tpl_vars['Do_kiedy']->value && $_smarty_tpl->tpl_vars['item']->value['id_samochodu'] == $_smarty_tpl->tpl_vars['item2']->value['id_samochodu']) || ($_smarty_tpl->tpl_vars['item2']->value['do_kiedy'] < $_smarty_tpl->tpl_vars['Od_kiedy']->value && $_smarty_tpl->tpl_vars['item2']->value['do_kiedy'] < $_smarty_tpl->tpl_vars['Do_kiedy']->value && $_smarty_tpl->tpl_vars['item']->value['id_samochodu'] == $_smarty_tpl->tpl_vars['item2']->value['id_samochodu'])) {?>
					<div style="visibility: hidden"><?php echo $_smarty_tpl->tpl_vars['licz2']->value++;?>
</div>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['item']->value['id_samochodu'] == $_smarty_tpl->tpl_vars['item2']->value['id_samochodu']) {?>
					<div style="visibility: hidden"><?php echo $_smarty_tpl->tpl_vars['licz3']->value++;?>
</div>
				<?php }?>
					
		<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?> 
		<?php if ($_smarty_tpl->tpl_vars['licz2']->value === $_smarty_tpl->tpl_vars['licz3']->value) {?>
			
			<input id="Od_kiedy2"  style="visibility: hidden" type="date"  name="Od_kiedy2" value=<?php echo $_smarty_tpl->tpl_vars['Od_kiedy']->value;?>
>
			<input id="Do_kiedy2" style="visibility: hidden" type="date"  name="Do_kiedy2" value=<?php echo $_smarty_tpl->tpl_vars['Do_kiedy']->value;?>
>
			<li> Nr samochodu:  <?php echo $_smarty_tpl->tpl_vars['licz1']->value;?>
  <input type="radio" id="html" name="Nr_samochodu2" value=<?php echo $_smarty_tpl->tpl_vars['licz1']->value;?>
> <br> Marka:<?php echo $_smarty_tpl->tpl_vars['item']->value['Marka'];?>
 <br> Model: <?php echo $_smarty_tpl->tpl_vars['item']->value['Model'];?>
 Rocznik: <?php echo $_smarty_tpl->tpl_vars['item']->value['Rocznik'];?>
 <br><img src=<?php echo $_smarty_tpl->tpl_vars['item']->value['photo_name'];?>
 width = "400" height="300"> </li>
			<div style="visibility: hidden"><?php echo $_smarty_tpl->tpl_vars['licz1']->value++;?>
</div>
			<div style="visibility: hidden"><?php $_smarty_tpl->_assignInScope('sprawdz', 1);?></div>
			
		<?php }?>
		
	<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	<input type="submit" value="Submit">
	</form>
		<?php if ($_smarty_tpl->tpl_vars['sprawdz']->value < 1) {?>
			<li> Brak dostępności w terminie: <?php echo $_smarty_tpl->tpl_vars['Od_kiedy']->value;?>
  <?php echo $_smarty_tpl->tpl_vars['Do_kiedy']->value;?>
  <?php echo $_smarty_tpl->tpl_vars['licz2']->value;?>
  <?php echo $_smarty_tpl->tpl_vars['licz3']->value;?>
</li>
		<?php }?>
	</ol>
<?php }?>

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
