<!DOCTYPE HTML>
<html>
   <head>
      <title>IPG Connect Sample for PHP</title>
   </head>
   <body>
      <h1>Order Form</h1>
      <form method="post" action="https://test.ipg-online.com/connect/gateway/processing">
         <fieldset>
            <legend>IPG Connect Request Details</legend>
            <p>
               <label for="storename">Store ID:</label>
               <input type="text" name="storename" value="2206474139" readonly="readonly" />
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
               <?php
                  $currentDateTime = date("Y-m-d H:i:s");
               ?>
               <input type="text" name="txndatetime" value="<?php echo $currentDateTime; ?>"/>
            </p>
            <p>
               <label for="hashExtended">Hash Extended:</label>
               <input type="text" name="hashExtended" value="<?php echo createExtendedHash('13.00', '978'); ?>"
                  readonly="readonly" />
            </p>
            <p>
               <label for="hash_algorithm">Hash Algorithm:</label>
               <input type="text" name="hash_algorithm" value="HMACSHA256" readonly="readonly" />
            </p>
            <p>
               <label for="checkoutoption">Checkout option:</label>
               <input type="text" name="checkoutoption" value="combinedpage" readonly="readonly" />
            </p>
            <p>
               <label for="responseSuccessURL">Response Success URL:</label>
               <input type="text" name="responseSuccessURL" value="https://mebany.com" required />
            </p>
            <p>
               <label for="responseFailURL">Response Fail URL:</label>
               <input type="text" name="responseFailURL" value="https://easelowmarket.com" required />
            </p>
            <p>
               <input type="submit" id="submit" value="Submit" />
            </p>
         </fieldset>
      </form>
      <?php
         function getDateTime() {
            return date("Y-m-d H:i:s");
         }
         function createExtendedHash($chargetotal, $currency) {
            $sharedSecret = "AoGvdRPcwizTIJDX6WGCoGK53RR4VnItuXA7Mj6UN2G"; // Consider moving to a secure location
            $separator = "|";
            $storeId = "2206474139";
            $timezone = "Europe/London";
            $txntype = "sale";
            $checkoutoption = "combinedpage";
            $currentDateTime = date("Y-m-d H:i:s");
            $stringToHash = $chargetotal . $separator . $checkoutoption . $separator . $currency . $separator
            . "HMACSHA256" . $separator . $storeId . $separator . $timezone . $separator . $currentDateTime .
            $separator . $txntype;
            $hash = base64_encode(hash_hmac('sha256', $stringToHash, $sharedSecret, true));
            return $hash;
         }
      ?>
   </body>
</html>
