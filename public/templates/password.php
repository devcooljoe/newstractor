<?php 
function getPasswordHtml($token, $route) {    
    $string = '<html> <style> a {     text-decoration: none; } .footer {     background-color: #f8f8f8;     padding: 1rem;     margin-top: 3rem;     font-size: 12px; } .reset {     background-color: #cf0000;     color: white;     padding: 1rem; } .main {     text-align: center;     padding: 1rem; } </style> <div class="main">     <img src="http://newstractor.com.ng/storage/assets/default/icon.png" style="width:50px;">     <br>     <h1>Reset Your Password.     </h1>     <br>     <h3 style="text-align:left;">         Hi there, <br>         A request has been received to change the password of your Newstractor account.     </h3>     <p style="text-align:left;">Click the Reset Password button below to reset your password.</p>     <br>     <a href="'.$route.'/password/verifyToken/?token='.$token.'" target="_blank"
class="reset">Reset Password</a>
<p style="text-align:left;"><br> If you didn\'t initiate this request, please contact us immediately at <a
        href="mailto:info@newstractor.com.ng" target="_blank">info@newstractor.com.ng</a> <br> <br> Thanks. </p> <br>
<div class="footer">
    <p><img src="http://newstractor.com.ng/storage/assets/default/logo.png" style="width:30px;"> <br> <a
            href="http://newstractor.com.ng/about" target="_blank">About us</a> | <a
            href="http://newstractor.com.ng/contact" target="_blank"> Contact </a> | <a
            href="http://newstractor.com.ng/unsubscribe" target="_blank"> Unsubscribe </a> <br> <br>Newstractor &copy; 2020 -
        2020 All rights reserved</p>
</div>
</div>

</html>';

return $string;

}