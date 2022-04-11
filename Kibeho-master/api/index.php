<?php
    $serverName = "127.0.0.1";
    $serverUsername = "calmgnjh_kibehosanctuarynj";
    $serverPassword = "calmgnjh_kibehosanctuarynj";
    $serverDatabase = "calmgnjh_kibehosanctuarynj";
    $serverKey = "ÂB¢¼#ÈésY§Æ€%>{Å¡“¼Œài; ê";
    $serverRoot = "/aln_core/";
    $domainRoot = "https://kibehosanctuarynj.rw/aln_core/";
    set_error_handler(function($errno, $errstr, $errfile, $errline) {if(0 === error_reporting()) return false; if(false) throw new ErrorException($errstr, 0, $errno, $errfile, $errline);});
    $connection = new mysqli($serverName, $serverUsername, $serverPassword, $serverDatabase);
    if(!empty($_POST['query']) || !empty($_GET['query'])) {
        $queries = !empty($_POST['query']) ? ($_POST['query']) : (!empty($_GET['query']) ? $_GET['query'] : "");
        $response = "[]";
        if(!empty($queries)) {
            $queries = alnDecryptDecode($queries);
            $querySelect = "";
            foreach(explode(";", $queries) as $query) {
                if(empty($query)) continue;
                try {
                    if(str_contains("SELECT", $query)) {
                        $querySelect = $query;
                    }else {
                        $result = $connection->query($query);
                    }
                }catch (Exception $e) {
                }
            }
            $response = "[";
            try {
                if(!empty($querySelect)) {
                    $result = $connection->query($querySelect);
                    if($result !== null && $result->num_rows > 0) {
                        $index = 0;
                        while($row = $result->fetch_assoc()) {
                            if($index > 0) $response .= ", ";
                            $response .= json_encode($row);
                            $index++;
                        }
                    }
                }
            }catch(Exception $e) {
            }finally {
                $connection->close();
            }
            $response .= "]";
        }
        header('Content-type: application/json');
        echo alnEncrypt(json_encode($response));
    }else if(!empty($_FILES['uploadedfile']) && !empty($_FILES['uploadedfile']['tmp_name'])) {
        $uploadPath = !empty($_GET['path']) ? $_GET['path'] : "";
        $uploadPath = alnDecryptDecode($uploadPath);
        $domainPath = $domainRoot."uploads/".$uploadPath;
        $serverPath = "../uploads/".$uploadPath;
        if(is_dir($serverPath) === false) {
            mkdir($serverPath, 0777, true);
        }
        $domainPathName = $domainPath.basename($_FILES['uploadedfile']['name']);
        $serverPathName = $serverPath.basename($_FILES['uploadedfile']['name']);
        $isFileUploaded = move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $serverPathName);
        $response = $isFileUploaded ? $domainPathName : "";
        echo alnEncrypt(json_encode($response));
    }else if(!empty($_POST['table']) || !empty($_GET['table'])) {
        $table = !empty($_POST['table']) ? ($_POST['table']) : (!empty($_GET['table']) ? $_GET['table'] : "");
        $id = !empty($_POST['id']) ? ($_POST['id']) : (!empty($_GET['id']) ? $_GET['id'] : "");
        $uid = !empty($_POST['uid']) ? ($_POST['uid']) : (!empty($_GET['uid']) ? $_GET['uid'] : "");
        $limitStart = !empty($_POST['start']) ? ($_POST['start']) : (!empty($_GET['start']) ? $_GET['start'] : "");
        $limitEnd = !empty($_POST['end']) ? ($_POST['end']) : (!empty($_GET['end']) ? $_GET['end'] : "");
        $response = "[]";
        if(!empty($table)) {
            $sql = "SELECT * FROM $table";
            if(!empty($id) && !empty($uid)) {
                $sql .= " WHERE $uid = '$id'";
            }
            if(!empty($limitEnd) && $limitEnd > 0) {
                $sql .= " LIMIT $limitEnd";
            }
            if(!empty($limitStart) && $limitStart > 0) {
                $sql .= " OFFSET $limitStart";
            }
            try {
                $result = $connection->query($sql);
                $response = "[";
                if($result != null && $result->num_rows > 0) {
                    $index = 0;
                    while($row = $result->fetch_assoc()) {
                        if($index > 0) $response .= ", ";
                        $response .= json_encode($row);
                        $index++;
                    }
                }
            }catch(Exception $e) {
            }finally {
                $connection->close();
            }
            $response .= "]";
        }
        header('Content-type: application/json');
        echo alnEncrypt(json_encode($response));
    }else if(!empty($_POST['email-verification']) || !empty($_GET['email-verification'])) {
        $email_verification_send = !empty($_POST['email-verification']) ? ($_POST['email-verification']) : (!empty($_GET['email-verification']) ? $_GET['email-verification'] : "");
    }else if(!empty($_POST['password-reset']) || !empty($_GET['password-reset'])) {
        $password_reset = !empty($_POST['password-reset']) ? ($_POST['password-reset']) : (!empty($_GET['password-reset']) ? $_GET['password-reset'] : "");
    }else if(!empty($_POST['email-verification-send']) || !empty($_GET['email-verification-send'])) {
        $email_verification_send = !empty($_POST['email-verification-send']) ? ($_POST['email-verification-send']) : (!empty($_GET['email-verification-send']) ? $_GET['email-verification-send'] : "");
        ini_set("SMTP","smtp.gmail.com");
        ini_set("smtp_port","587");
        ini_set("sendmail_from", "alainyern.inc@gamil.com");
        $subject = "Email Verification";
        $body = "First line of text\nSecond line of text";
        $isEmailSent = false;
        try {
            $isEmailSent = mail($email_verification_send, $subject, wordwrap($body, 70));
        }catch (Exception $e) {
        }
        $response = "[".($isEmailSent ? ("status=true, error=") : ("status=false, error=".$isEmailSent))."]";
        header('Content-type: application/json');
        echo alnEncrypt(json_encode($response));
    }else if(!empty($_POST['password-reset-send']) || !empty($_GET['password-reset-send'])) {
        $password_reset_send = !empty($_POST['password-reset-send']) ? ($_POST['password-reset-send']) : (!empty($_GET['password-reset-send']) ? $_GET['password-reset-send'] : "");
    }
    function alnEncryptEncode($plain_text, $encryption_key="", $encryption_iv=""){
        return urlencode(alnEncrypt($plain_text, $encryption_key, $encryption_iv));
    }
    function alnDecryptDecode($encryption, $encryption_key="", $encryption_iv=""){
        return urldecode(alnDecrypt($encryption, $encryption_key, $encryption_iv));
    }
    function alnEncrypt($plain_text, $encryption_key="", $encryption_iv=""){
        global $serverKey;
        if(empty($encryption_key)) $encryption_key = $serverKey;
        if(strlen($encryption_key) != 32 && strlen($encryption_key) != 16) return $plain_text;
        if(empty($encryption_iv)) $encryption_iv = strlen($encryption_key) === 32 ? substr($encryption_key, 0, 16) : $encryption_key;
        return openssl_encrypt($plain_text, 'AES-256-CBC', $serverKey, 0, hex2bin(unpack('H*', $encryption_iv)[1]));
    }
    function alnDecrypt($encryption, $encryption_key="", $encryption_iv="") {
        global $serverKey;
        if(empty($encryption_key)) $encryption_key = $serverKey;
        if(strlen($encryption_key) != 32 && strlen($encryption_key) != 16) return $encryption;
        if(empty($encryption_iv)) $encryption_iv = strlen($encryption_key) === 32 ? substr($encryption_key, 0, 16) : $encryption_key;
        return openssl_decrypt($encryption, 'AES-256-CBC', $serverKey, 0, hex2bin(unpack('H*', $encryption_iv)[1]));
    }
    function str_contains($word, $str) {
        if(strpos($str, $word) != false) return true;
        foreach (preg_split('/\W+/', $str, NULL, PREG_SPLIT_NO_EMPTY) as $value) { if(strtolower($value) === strtolower($word)) return true;}
        return false;
    }
?>