<?php
App::uses("AppHelper", "View/Helper");
class FacebookHelper extends AppHelper {
    public $helpers = array("Html");
    var $__app_id;
    public function __construct(View $view, $settings = array()) { 
        parent::__construct($view, $settings); 
        $this->__app_id = $settings["app_id"];
    }

   public function loadJavascriptSdk() {
       return "<div id=\"fb-root\"></div>
       <script>(function(d, s, id) {
             var js, fjs = d.getElementsByTagName(s)[0];
               if (d.getElementById(id)) return;
                 js = d.createElement(s); js.id = id;
                   js.src = \"//connect.facebook.net/en_US/all.js#xfbml=1&appId=$this->__app_id\";
                     fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));</script>";
   }

   public function share($url, $width = 450, $show_faces = true) {
       return $this->Html->div("fb-like", 
                               "", 
                               array("data-href" => $url,
                                     "data-send" => true,
                                     "data-width" => $width,
                                     "data-show-faces" => $show_faces));
   }
}
