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