<?php
use Logger;
class UserAuthException extends Exception {
    
}

class TestException {

    public function __construct($name)
    {
        if ($name !== "toto") {
            throw new InvalidArgumentException("où est Toto ?");
        }
        echo 'Bonjour ' . $name;
    }
    public function authentificate($login, $pass)
{
    if($login !== 'toto' || $pass !=='1234'){
        throw new UserAuthException('Accès interdit, 403');
    }
}

}

$logFile = new Logger('log.txt',';','','','','','','');

try {
$test = new TestException('totorr',4639);
$test->authentificate('tottrtrto', '1234');

} catch (InvalidArgumentException $e) {
echo "une erreur est survenue <br>"; 
echo $e->getMessage().'<br>';
echo $e->getFile().'<br>';
echo $e->getCode().'<br>';
echo $e->getLine().'<br>';
//echo $ex->getTrace().'<br>';
} catch (InvalidArgumentException $e) {
    echo $e->getMessage();
    
    
} catch (UserAuthException $e) {
    echo $e->getMessage();
    $logFile->fillLog($logFile);
    
} catch (Exception $e) {
    echo $e->getMessage();
} finally {
    echo "Je comprends pas";
}
