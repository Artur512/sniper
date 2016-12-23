

    <?php
     
    // samo logowanie do nowego WSDL wraz z przykładem prawidłowego podania parametrów. W przeciwieństwie do starego WSDL, tutaj należy podawać tablicę asocjacyjną z parametrami, a nie argumenty jeden za drugim
     
    define('LINK', "https://webapi.allegro.pl/service.php?wsdl"); //nowy wsdl
    define('LOGIN', 'garage-smi');
    define('PASSWORD', 'garage404');
    define('KEY', 'de6ba3ce');
    define('COUNTRY', 1);
    define('SYSVAR', 1);
     
    try {
          $client = new SoapClient(LINK);
          $version_params = array('sysvar' => SYSVAR, 'countryId' => COUNTRY, 'webapiKey' => KEY);
          $version = (array)($client->doQuerySysStatus($version_params));
          $session_params = array('userLogin' => LOGIN, 'userPassword' => PASSWORD, 'countryCode' => COUNTRY, 'webapiKey' => KEY, 'localVersion' => $version['verKey']);
          $session = $client->doLogin($session_params);
          echo 'Zalogowano poprawnie jako: ', LOGIN;
    }
    catch(SoapFault $error) {
          echo 'Błąd ', $error->faultcode, ': ', $error->faultstring;
    }
     
    ?>

