<?php 
// this key is a random generated and encoded to base64 using the following 
//   $randomkey= random_bytes(SODIUM_CRYPTO_SECRETBOX_KEYBYTES); 
//   $randomkey= base64_encode($randomkey);
//   echo $randomkey;
//
// this has to be generated on each installation and kept secret at all times.
// it is saved in the encryptionkey.php file dont forget to change it so that the key is your own and private!
// the key used in this example is considered unsafe 
// (on my mainpage torn.doomster.eu i use a newlly generated key ofc.)
//

$key= 'JgHKzZ6ZFqkUVT8xFAJs5o7g/trRh0FJI3OpyaQRMW0='; 

?>