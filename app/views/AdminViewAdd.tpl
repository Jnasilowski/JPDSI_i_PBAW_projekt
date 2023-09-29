{extends file="main.tpl"}


{block name=content}

<h2 class="content-head is-center">Menu Administratora</h2>

<div class="pure-g">

<div class="l-box-lrg pure-u-1 pure-u-med-2-5" border="5">
	<form class="pure-form pure-form-stacked" action="{$conf->action_url}adminadd" method="post">
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
	<form class="pure-form pure-form-stacked" action="{$conf->action_url}adminlist" method="post">
		<button type="submit" class="pure-button">Lista samochodów</button>
		
	</form>
	<form class="pure-form pure-form-stacked" action="{$conf->action_root}adminree" method="post">
		<br>
		<button type="submit" class="pure-button">Lista próśb</button>
		
	</form>

	<form class="pure-form pure-form-stacked" action="{$conf->action_root}adminuserlist" method="post">
		<br>
		<button type="submit" class="pure-button">Lista użytkowników</button>
		
	</form>
	
	<form class="pure-form pure-form-stacked" action="{$conf->action_root}admindel" method="post">
		<fieldset>

			<label for="Nr_sam">Nr samochodu który chesz usunąć</label>
			<input id="Nr_sam" type="text" name="Nr_sam" value="">
			<button type="submit" class="pure-button">Usuń</button>
	</fieldset>
	</form>
	<form class="pure-form pure-form-stacked" action="{$conf->action_url}adminedit" method="post">
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


{* wyświeltenie listy błędów, jeśli istnieją 

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
*}
{* wyświeltenie listy informacji, jeśli istnieją *}
{if $msgs->isInfo()}
	<h4>Informacje: </h4>
	<ol class="inf">
	{foreach $msgs->getMessages() as $inf}
	{strip}
		<li>{$inf}</li>
	{/strip}
	{/foreach}
	</ol>
{/if}


</div>
</div>

{/block}