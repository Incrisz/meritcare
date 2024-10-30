<!DOCTYPE HTML>
<html>
   <head>
      <title>IPG Connect Sample for PHP</title>
   </head>
   <body>
      <p>
      <h1>Order Form</h1>
      <form method="post" action="https://test.ipg-online.com/connect/gateway/processing">
         <fieldset>
            <legend>IPG Connect Request Details</legend>
            <p>
               <label for="storename">Store ID:</label>
               <input type="text" name="storename" value="2220541904" readonly="readonly" />
            </p>
            <p>
               <label for="timezone">Timezone:</label>
               <input type="text" name="timezone" value="Europe/London" readonly="readonly"/>
            </p>
            <p>
               <label for="chargetotal">Transaction Type:</label>
               <input type="text" name="txntype" value="sale" readonly="readonly" />
            </p>
            <p>
               <label for="chargetotal">Transaction Amount:</label>
               <input type="text" name="chargetotal" value="13.00" readonly="readonly" />
            </p>
            <p>
               <label for="currency">Currency (see ISO4217):</label>
               <input type="text" name="currency" value="978" readonly="readonly" />
            </p>
            <p>
               <label for="txndatetime">Transaction DateTime:</label>
               <input type="text" name="txndatetime" value="<?php echo getDateTime(); ?>"/>
            </p>
            <p>
               <label for="hashExtended">Hash Extended:</label>
               <input type="text" name="hashExtended" value="<?php echo createExtendedHash('13.00', '978'); ?>"
                  readonly="readonly" />
            </p>
            <p>
               23
               <label for="hashExtended">Hash Algorithm :</label>
               <input type="text" name="hash_algorithm" value="HMACSHA256" readonly="readonly" />
            </p>
            <p>
               <label for="hashExtended">Checkout option :</label>
               <input type="text" name="checkoutoption" value="combinedpage" readonly="readonly" />
            </p>
            <p>
               <input type="submit" id="submit" value="Submit" />
            </p>
         </fieldset>
      </form>
      <?php
         function getDateTime() {
         return date("Y:m:d-H:i:s");
         }
         function createExtendedHash($chargetotal, $currency) {
         // Please change the store Id to your individual Store ID
         // NOTE: Please DO NOT hardcode the secret in that script. For example read it from a database.
         $sharedSecret = "AoGvdRPcwizTIJDX6WGCoGK53RR4VnItuXA7Mj6UN2G";
         $separator = "|";
         $storeId= "2220541904";
         $timezone= "Europe/London";
         $txntype= "sale";
         $checkoutoption = "combinedpage";
         $stringToHash = $chargetotal . $separator . $checkoutoption . $separator . $currency . $separator
         . "HMACSHA256" . $separator . $storeId . $separator . $timezone. $separator . date("Y:m:d-H:i:s") .
         $separator . $txntype;
         $hash = base64_encode(hash_hmac('sha256', $stringToHash, $sharedSecret, true));
         return $hash;
         }
         ?>
   </body>
</html>