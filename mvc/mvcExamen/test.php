<?php

require "models/db.php";

#$passwordAdmin = password_hash("admin123", PASSWORD_DEFAULT);
#$passwordUser  = password_hash("user123", PASSWORD_DEFAULT);
#$passwordObserver = password_hash("obs123", PASSWORD_DEFAULT);
$passwordSup = password_hash("sup123", PASSWORD_DEFAULT);

$db = conectar();
#$stmt = $db->prepare("INSERT INTO usuarios (usuario, password, rol)
#VALUES ('admin', '$passwordAdmin' , 'admin');
#");
#$stmt->execute();
$stmt2 = $db->prepare("INSERT INTO usuarios (usuario, password, rol)
VALUES ('super', '$passwordSup', 'supervisor');
");
$stmt2->execute();

