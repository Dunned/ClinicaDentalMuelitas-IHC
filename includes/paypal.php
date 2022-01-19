<?php


require 'paypal/autoload.php';

define('URL_SITIO', 'http://clinicadentalmuelitas-ihc.test/');

$apiContext = new \PayPal\Rest\ApiContext(
      new \PayPal\Auth\OAuthTokenCredential(
          'AfK--IQ3pbn9QZo3KtIvSgy4uln8szlEpP9EzkeuXlQzW8niTBJEy3LPCqynMrHpb9eOP3EG6PE0nqPe',  // ClienteID
          'EBjWivTU5EXu2tFPo4j9USUl_5LOjO_ggR69uHHW6uCBpNN2EQZ3shZwdEQhqPkPGglHtc2zelsuQH8p'  // Secret
      )
);

