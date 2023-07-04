{extends file="main.tpl"}



{block name=content}

<h2 class="content-head is-center">Rejestracja</h2>

<div class="pure-g">
<div class="l-box-lrg pure-u-1 pure-u-med-2-5">
	<form action="{$conf->action_url}rejestr" method="post" class="pure-form pure-form-stacked" >
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