<?php
return array(
    // set your paypal credential
    'client_id' => 'AXGFPNkCyY2cPnfzIBcmZc34K9BYpByNyV5dZTfKa_ila3nwqyl0PlVrTV6daPEKqjE-tRPsvcKpCURh',
    'secret' => 'EAXkjABWnAHBGCSNAXYijv_813DjtSJa_51byuQ_ExbD5HE8SvDD_8yZajh5rpYf0shw7gNFDQpV9iqR',
    /**
     * SDK configuration 
     */
    'settings' => array(
        /**
         * Available option 'sandbox' or 'live'
         */
        'mode' => 'sandbox',
        /**
         * Specify the max request time in seconds
         */
        'http.ConnectionTimeOut' => 30,
        /**
         * Whether want to log to a file
         */
        'log.LogEnabled' => true,
        /**
         * Specify the file that want to write on
         */
        'log.FileName' => storage_path() . '/logs/paypal.log',
        /**
         * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
         *
         * Logging is most verbose in the 'FINE' level and decreases as you
         * proceed towards ERROR
         */
        'log.LogLevel' => 'FINE'
    ),
);