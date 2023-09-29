{extends file="main.tpl"}



{block name=content}

<h2 class="content-head is-center"></h2>

<div class="pure-g">
<div class="l-box-lrg pure-u-1 pure-u-med-2-5">
	<form class="pure-form pure-form-stacked" action="{$conf->action_root}usercarlist" method="post">
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
{if not empty($list)}
	<ol>
	{foreach $list as $item}
		<form class="pure-form pure-form-stacked" action="{$conf->action_root}userrent" method="post">
		<div style="visibility: hidden">{$licz2=1}{$licz3=1}</div>
		{foreach $list2 as $item2}
				{if ($item2['od_kiedy'] > $Od_kiedy && $item2['od_kiedy']>$Do_kiedy && $item['id_samochodu']==$item2['id_samochodu']) || ($item2['do_kiedy']<$Od_kiedy && $item2['do_kiedy']<$Do_kiedy && $item['id_samochodu']==$item2['id_samochodu'])}
					<div style="visibility: hidden">{$licz2++}</div>
				{/if}
				{if $item['id_samochodu']==$item2['id_samochodu']}
					<div style="visibility: hidden">{$licz3++}</div>
				{/if}
					
		{/foreach} 
		{if $licz2===$licz3}
			
			<input id="Od_kiedy2"  style="visibility: hidden" type="date"  name="Od_kiedy2" value={$Od_kiedy}>
			<input id="Do_kiedy2" style="visibility: hidden" type="date"  name="Do_kiedy2" value={$Do_kiedy}>
			<li> Nr samochodu:  {$licz1}  <input type="radio" id="html" name="Nr_samochodu2" value={$licz1}> <br> Marka:{$item['Marka']} <br> Model: {$item['Model']} Rocznik: {$item['Rocznik']} <br><img src={$item['photo_name']} width = "400" height="300"> </li>
			<div style="visibility: hidden">{$licz1++}</div>
			<div style="visibility: hidden">{$sprawdz = 1}</div>
			
		{/if}
		
	{/foreach}
	<input type="submit" value="Submit">
	</form>
		{if $sprawdz < 1 }
			<li> Brak dostępności w terminie: {$Od_kiedy}  {$Do_kiedy}  {$licz2}  {$licz3}</li>
		{/if}
	</ol>
{/if}

{* wyświeltenie listy błędów, jeśli istnieją *}
{if $msgs->isError()}
	<h4>Wystąpiły błędy: </h4>
	<ol class="err">
	{foreach $msgs->m as $err}
	{strip}
		<li>{$err}</li>
	{/strip}
	{/foreach}
	</ol>
{/if}

{* wyświeltenie listy informacji, jeśli istnieją *}
{if $msgs->isInfo()}
	<h4>Informacje: </h4>
	<ol class="inf">
	{foreach $msgs->m as $inf}
	{strip}
		<li>{$inf}</li>
	{/strip}
	{/foreach}
	</ol>
{/if}



</div>
</div>

{/block}