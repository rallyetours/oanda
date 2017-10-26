<?php


class oandaAPI {


	
// Retrieves basic account information based on accountNumber
    
function retrieveAccount($accountNumber) {
    	
	$ch = curl_init("Authorization: Bearer db0be65f4185fd759068104aa52e88d2-098cd973394415d9c96e1f3184efddf5 https://api-sandbox.oanda.com/v1/accounts/001-004-1663663-001");
    	
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    	
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        
	$result = curl_exec($ch);
        
	$result = json_decode($result, true);

        
	// Store the values returned from cURL execution
        
	$this->accountId = $result['accountId']; 
        
	$this->accountName = $result['accountName'];
        
	$this->balance = $result['balance'];
        
	$this->unrealizedPl = $result['unrealizedPl'];
        
	$this->marginUsed = $result['marginUsed'];
        
	$this->marginAvail = $result['marginAvail'];
        
	$this->openTrades = $result['openTrades'];
        
	$this->openOrders = $result['openOrders'];
        
	$this->marginRate = $result['marginRate'];
        
	$this->homecurr = $result['accountCurrency'];
    }
    
    
// Retrieve information for Open Trades
    

/* Not implemented
function retrieveTrades($accountNumber) { 
    	$ch = curl_init("https://api-sandbox.oanda.com/v1/accounts/".$accountNumber."/trades");

						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

						curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        
						$result = curl_exec($ch);
        
						$result = json_decode($result, true);
        
        
						// Store the values returned from cURL execution
        
						$this->openTrade = $result['trades'];
    }
    
	

    
function retrieveUserProfile($username) {
	$ch = curl_init("https://api-sandbox.oanda.com/v1/accounts?username=".$username);
	    
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    
						curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	    
						$result = curl_exec($ch);
	    
						$result = json_decode($result, true);

	    
						$this->userProfile = $result;
    }
	*/

}






$api = new oandaAPI;

?>

<html>

    
<header>
        
<title>Account ID Search</title>
        
<script src="./Javascript/alertify.js/lib/alertify.js"></script>
        
<script src="./Javascript/generateAccount.js"></script>
        
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        
<script src="http://developer.oanda.com/oandajs/oanda.js"></script>
    
</header>

    
<body>
 
    	
Account ID:
                
<?php echo $api->accountId; ?>

                
<br>Account Name:
                
<?php echo ucfirst($api->accountName); ?>
                
                
<br>Account Balance:
                
<?php echo number_format($api->balance, 2, '.', ','); ?>

                
<br>Unrealized PL:
                
<?php echo number_format($api->unrealizedPl, 2, '.', ','); ?>

                
<br>Margin Used:
                
<?php echo number_format($api->marginUsed, 2, '.', ','); ?>

                
<br>Margin Available:
                
<?php echo number_format($api->marginAvail, 2, '.', ','); ?>

                
<br>Open Trades:
                
<?php echo $api->openTrades; ?>

                
<br>Open Orders:
                
<?php echo $api->openOrders; ?>

                
<br>Margin Rate:
                
<?php echo $api->marginRate; ?>

                
<br>Home Currency:
                
<?php echo $api->homecurr; ?>

                

</body>


</html>