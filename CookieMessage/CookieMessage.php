<?php
class CookieMessage extends plxPlugin {
 
    public function __construct($default_lang){
    # Appel du constructeur de la classe plxPlugin (obligatoire)
    parent::__construct($default_lang);
    
    # Pour accéder à une page de configuration
    $this->setConfigProfil(PROFIL_ADMIN,PROFIL_MANAGER);
    # Déclaration des hooks
    $this->addHook('ThemeEndHead', 'ThemeEndHead');
    $this->addHook('ThemeEndBody', 'ThemeEndBody');
    } 
    
    public function ThemeEndHead() { ?>
    
        <link rel="stylesheet" href="<?php echo PLX_PLUGINS ?>CookieMessage/app/cookiecuttr.min.css">

        <?php
    }

    public function ThemeEndBody(){ ?>


        <script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
        <script src="<?php echo PLX_PLUGINS ?>CookieMessage/app/cookie.js"></script>
        <script src="<?php echo PLX_PLUGINS ?>CookieMessage/app/jquery.cookiecuttr.js"></script>
        <script>

            $(document).ready(function () {
                // activate cookie cutter
                $.cookieCuttr({

                    cookieNoMessage: false, // desactiver le message et les cookie

                    cookieAnalytics: false,
                    // les boutons
                    cookieDeclineButton: <?php echo $this->getParam("cookieDeclineButton");?>,
                    cookieDeclineButtonText: "<?php echo $this->getParam("cookieDeclineButtonText");?>",

                    cookieAcceptButton: <?php echo $this->getParam("cookieAcceptButton");?>, // this will disable non essential cookies
                    cookieAcceptButtonText: "<?php echo $this->getParam("cookieAcceptButtonText");?>",

                    // le message et les liens
                    cookieCutterDeclineOnly: true, // you'd like the CookieCutter to only hide when someone has clicked declined set this to true
                    cookieMessage: "<?php echo $this->getParam('message');?> <a href='{{cookiePolicyLink}}' title='read about our cookies'><?php echo $this->getParam('info');?></a>",
                    cookiePolicyLink: '<?php echo $this->getParam("info_lien");?>', // if applicable, enter the link to your privacy policy here...

                    cookieOverlayEnabled: <?php echo $this->getParam('full');?>, // true, afficher le message sur la page
                    
                    cookieExpires: <?php echo $this->getParam('time');?>,

                    cookieNotificationLocationBottom: <?php echo $this->getParam('page');?> // true for bottom, false for top            

                });
            });      

             if (jQuery.cookie('cc_cookie_accept') == "cc_cookie_accept") {

               // placer votre code google analytics

            } 

        </script>

        <?php
    }
      
} // class CookieMessage
?>