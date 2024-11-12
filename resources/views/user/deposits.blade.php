<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://coinremitter.com/assets/img/favicon.ico" type="img/x-icon" />
    <title>
            Deposit Fund
    </title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <style>
  .mytext {
    width: 250px;
}
  </style>
  <body onload="startTime()" >


        
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">DEPOSIT FUND</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
         
                          <div>
                            <sub style="color: red;">*Kindly choose your payment mode, by clicking on the buttons below.</sub><br>
                          </div>
                        <center>
                          <br>
                          <button type="button" class="btn btn-dark" onclick="btc()" >BTC</button>
                          <button type="button" class="btn btn-dark" onclick="eth()">ETH</button>
                          <button type="button" class="btn btn-dark" onclick="usdt()">USDT</button>
                          <button type="button" class="btn btn-dark" onclick="bnb()">TRX</button>
                          <br>
                          <br>
                          <p class="text-gray" id="btc_text">Please scan or copy the address below to deposit Bitcoin.</p>
                          <div>
                            <img id="logo" height="100" width="100" style="border-radius: 50px;" src="https://media.istockphoto.com/id/1139020309/vector/bitcoin-internet-money-icon-vector.jpg?s=612x612&w=0&k=20&c=vcRUEDzhndMOctdM7PN1qmipo5rY_aOByWFW0IkW8bs=">
                          </div>
                          <div>
                            <img height="250" width="250" id="qr" src="https://api.qrserver.com/v1/create-qr-code/?data=bc1qc3sff0g978x36amkgcazw0adye9fq33psuq5q9" style="padding: 10px; background: #fff;">
                          </div>
                          <h4>OR</h4>
                          <input type="text"  value="bc1qc3sff0g978x36amkgcazw0adye9fq33psuq5q9" disabled id="myInput" class="h-25 w-100 text-dark bg-light"><br>
                          <button type="button" onclick="copyAddress()" class="btn btn-danger btn-block">Copy address</button>
                          
                          <br>
                        </center>
                      </div>
                                
                       <center>
					   <form method="post" action="javascript:window.location.reload(true)" enctype="multipart/form-data">
						<input type="submit" class="btn btn-primary btn-lg btn-block" value="Confirm Deposit"  /></form>
						                             <sub style="color: red;">*Once we confirm your payment and its verified, your account will be funded.</sub><br>
					   </center>
		<br><input type="button" class="btn btn-danger btn-lg btn-block" value="Back to Home" onclick="history.back(-1)" />
</div>
                      </div>
                    </div>
                  </div>
                
    <script>         
      function btc() {
        document.getElementById("btc_text").innerHTML = 'Please scan or copy the address below to deposit Bitcoin.';

        var x = document.getElementById("qr");
        x.setAttribute("src", "https://api.qrserver.com/v1/create-qr-code/?data=bc1qc3sff0g978x36amkgcazw0adye9fq33psuq5q9");
        x.setAttribute("alt", "QR code");

        var x = document.getElementById("myInput");
        x.setAttribute("type", "text");
        x.setAttribute("value", "bc1qc3sff0g978x36amkgcazw0adye9fq33psuq5q9");

        var y = document.getElementById("logo");
        y.setAttribute("src", "https://media.istockphoto.com/id/1139020309/vector/bitcoin-internet-money-icon-vector.jpg?s=612x612&w=0&k=20&c=vcRUEDzhndMOctdM7PN1qmipo5rY_aOByWFW0IkW8bs=");
        y.setAttribute("alt", "BTC");

        var p =document.getElementById('p_meth');
        p.setAttribute('value', 'BTC');
        // alert(amt);
        var a = document.getElementById("Inpwall");
        a.setAttribute("type", "text");
        a.setAttribute("value", "bc1qc3sff0g978x36amkgcazw0adye9fq33psuq5q9");

      }
      function usdt() {
        document.getElementById("btc_text").innerHTML = 'Please scan or copy the address below to deposit specifically USDT(TRC20).</font>';

        var x = document.getElementById("qr");
        x.setAttribute("src", "https://api.qrserver.com/v1/create-qr-code/?data=TTqwc7wsMyMqxcKD9Dzn4wP1dp1kUSpqqz");
        x.setAttribute("alt", "QR code");

        var x = document.getElementById("myInput");
        x.setAttribute("type", "text");
        x.setAttribute("value", "TTqwc7wsMyMqxcKD9Dzn4wP1dp1kUSpqqz");

        var y = document.getElementById("logo");
        y.setAttribute("src", "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRq_PO2Fh1JHV6i__aY_CLBwiaTFM34h-4Wsg&s");
        y.setAttribute("alt", "usdt");

        var p =document.getElementById('p_meth');
        p.setAttribute('value', 'USDT');
        
        var a = document.getElementById("Inpwall");
        a.setAttribute("type", "text");
        a.setAttribute("value", "TTqwc7wsMyMqxcKD9Dzn4wP1dp1kUSpqqz");


      }
      function eth() {
        document.getElementById("btc_text").innerHTML = 'Please scan or copy the address below to deposit Ethereum.';

        var x = document.getElementById("qr");
        x.setAttribute("src", "https://www.bitcoinqrcodemaker.com/api/?style=ethereum&address=0xAfFb81B3A1dF228eBEC533c37356aE3Bd8b5e21B");
        x.setAttribute("alt", "QR code");

        var x = document.getElementById("myInput");
        x.setAttribute("type", "text");
        x.setAttribute("value", "0xAfFb81B3A1dF228eBEC533c37356aE3Bd8b5e21B");

        var y = document.getElementById("logo");
        y.setAttribute("src", "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSNsZw6OZoLvHa9ptuKaN_tH7fpLqxBRWZXew&s");
        y.setAttribute("alt", "ETH");

        var p =document.getElementById('p_meth');
        p.setAttribute('value', 'ETH');
        
        var a = document.getElementById("Inpwall");
        a.setAttribute("type", "text");
        a.setAttribute("value", "0xAfFb81B3A1dF228eBEC533c37356aE3Bd8b5e21B");


      }
      
       function bnb() {
        document.getElementById("btc_text").innerHTML = 'Please scan or copy the address below to deposit Tron.';

        var x = document.getElementById("qr");
        x.setAttribute("src", "https://api.qrserver.com/v1/create-qr-code/?data=TTqwc7wsMyMqxcKD9Dzn4wP1dp1kUSpqqz");
        x.setAttribute("alt", "QR code");

        var x = document.getElementById("myInput");
        x.setAttribute("type", "text");
        x.setAttribute("value", "TTqwc7wsMyMqxcKD9Dzn4wP1dp1kUSpqqz");

        var y = document.getElementById("logo");
        y.setAttribute("src", "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRYNlmNFZmstmM9UKk7hzPWGphYolYla8Fw1g&s");
        y.setAttribute("alt", "bnb");

        var p =document.getElementById('p_meth');
        p.setAttribute('value', 'BNB');
        
        var a = document.getElementById("Inpwall");
        a.setAttribute("type", "text");
        a.setAttribute("value", "TTqwc7wsMyMqxcKD9Dzn4wP1dp1kUSpqqz");
      }

    
      function copyAddress() {
      /* Get the text field */
      var copyText = document.getElementById("myInput");

      /* Select the text field */
      copyText.select();
      copyText.setSelectionRange(0, 99999); /* For mobile devices */

      /* Copy the text inside the text field */
      navigator.clipboard.writeText(copyText.value);
      
      /* Alert the copied text */
      alert("Copied");
      }
  </script>
<!-- Smartsupp Live Chat script -->
<script type="text/javascript">
var _smartsupp = _smartsupp || {};
_smartsupp.key = '1a1073f96c43f3d82c1f24b4ac87fe6a9986ea8f';
window.smartsupp||(function(d) {
  var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
  s=d.getElementsByTagName('script')[0];c=d.createElement('script');
  c.type='text/javascript';c.charset='utf-8';c.async=true;
  c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
})(document);
</script>
<noscript> Powered by <a href=“https://www.smartsupp.com” target=“_blank”>Smartsupp</a></noscript>
