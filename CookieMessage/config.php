<?php if (!defined('PLX_ROOT')) exit; 
# Control du token du formulaire
plxToken::validateFormToken($_POST);

if(!empty($_POST)) {
	$plxPlugin->setParam('cookieAcceptButton', $_POST['cookieAcceptButton'], 'cdata');
	$plxPlugin->setParam('cookieAcceptButtonText', $_POST['cookieAcceptButtonText'], 'cdata');
	$plxPlugin->setParam('cookieDeclineButton', $_POST['cookieDeclineButton'], 'cdata');
	$plxPlugin->setParam('cookieDeclineButtonText', $_POST['cookieDeclineButtonText'], 'cdata');
	$plxPlugin->setParam('message', $_POST['message'], 'cdata');
	$plxPlugin->setParam("info", $_POST['info'], 'cdata');
	$plxPlugin->setParam('info_lien', $_POST['info_lien'], 'cdata');
	$plxPlugin->setParam('full', $_POST['full'], 'cdata');
	$plxPlugin->setParam('time', $_POST['time'], 'cdata');
	$plxPlugin->setParam('page', $_POST['page'], 'cdata');
	$plxPlugin->saveParams();
	header('Location: parametres_plugin.php?p=CookieMessage');
	exit;
}
?>

<style>
	input, textarea {border-radius: 5px;width: 40%}
	textarea {min-height: 50px}
	label{font-style: italic}
</style>

<?php 
	$accept  =  $plxPlugin->getParam('cookieAcceptButton');
	$decline =  $plxPlugin->getParam('cookieDeclineButton');
	$page    =  $plxPlugin->getParam('full');
	$position = $plxPlugin->getParam('page');

?>

<form action="parametres_plugin.php?p=CookieMessage" method="post">
	<fieldset>

	<p><h3>Configuration des boutons</h3></p>	

	<p>
		<label for="cookieAcceptButton">Afficher le bouton accepter ?</label>
		<select name="cookieAcceptButton" id="cookieAcceptButton">
		   <option value="true" <?php if ($accept == 'true') { echo'selected';}?>>Oui</option>
		   <option value="false" <?php if ($accept == 'false') { echo'selected';}?>>Non</option>
		</select>
	</p>

	<p>
		<label for="cookieAcceptButtonText">Texte pour le bouton accepter:</label>
		<input id="cookieAcceptButtonText" name="cookieAcceptButtonText"  maxlength="255" value="<?php echo $plxPlugin->getParam("cookieAcceptButtonText"); ?>">
	</p>

	<p>
		<label for="cookieDeclineButton">Afficher le bouton refuser ?</label>
		<select name="cookieDeclineButton" id="cookieDeclineButton">
		   <option value="true" <?php if ($decline == 'true') { echo'selected';}?>>Oui</option>
		   <option value="false" <?php if ($decline == 'false') { echo'selected';}?>>Non</option>
		</select>
	</p>

	<p>
		<label for="cookieDeclineButtonText">Texte pour le bouton refuser:</label>
		<input id="cookieDeclineButtonText" name="cookieDeclineButtonText"  maxlength="255" value="<?php echo $plxPlugin->getParam("cookieDeclineButtonText"); ?>">
	</p>

	<p>
		<h3>Configuration des messages</h3>
	</p>

	<p>
	        <label for="message">Message à afficher:</label>
	        <textarea rows="8"   name="message" value=""><?= $plxPlugin->getParam('message'); ?></textarea>
	</p>
	
	<p>
	      	<label for="info">Texte du lien plus d'info:</label>
	        <input id="info" name="info"  maxlength="255" value="<?= $plxPlugin->getParam('info'); ?>">
	</p>
	
	<p>
		<label for="info_lien">Lien plus d'info:</label>
		<input id="info_lien" name="info_lien"  maxlength="255" value="<?= $plxPlugin->getParam('info_lien'); ?>">
	</p>

	<p>
		<h3>Styliser l'affichage</h3>
	</p>

	<p>
		<label for="full">Afficher le message sur la page entière?</label>
		<select name="full" id="full">
		   <option value="true" <?php if ($page == 'true') { echo'selected';}?>>Oui</option>
		   <option value="false" <?php if ($page == 'false') { echo'selected';}?>>Non</option>
		</select>
	</p>

	<p>
		<label for="page">Position du message:</label>
		<select name="page" id="page">
		   <option value="true" <?php if ($position == 'true') { echo'selected';}?>>En bas de page</option>
		   <option value="false" <?php if ($position == 'false') { echo'selected';}?>>En haut de page</option>
		</select>
	</p>

	<p>
		<h3>Paramètres</h3>
	</p>

	<p>
		<label for="time">Durée (en jours) pour conserver le cookie:</label>
		<input id="time" name="time"  maxlength="255" value="<?= $plxPlugin->getParam('time'); ?>">
	</p>


			
	<p class="in-action-bar">
		<?php echo plxToken::getTokenPostMethod() ?>
		<input type="submit" name="submit" value="Valider" />
	</p>
	
	</fieldset>	

</form>
