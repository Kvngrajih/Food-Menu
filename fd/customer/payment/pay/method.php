<!DOCTYPE html>
<html lang="en">

<head>
   
    <meta name="robots" content="noindex">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/> <!--320-->
        <!-- <link rel="shortcut icon" type="image/x-icon" href="../assets/payment/img/favicon.png" /> -->
    <link href="../assets/payment/css/pages-dependencies.css" rel="stylesheet">
    <link href="../assets/payment/css/pages.css" rel="stylesheet">
   
<title>Pay</title>



</head>

<body class="paystack-container" style="display: none">
    <div class="paystack-color-bar"></div>
                    <div id="page-okay" class="paystack-wrapper animated fadeIn" style="display: none">
            <div id="payment-page-pay" class="paystack-page">
                <div class="header">
                    <div class="company-logo">
                        <img id="company-logo-img" src="#" alt="Business Logo">
                    </div>
                    <div class="page-info">
                        <h3 id="page-name" class="page-name"></h3>
                        <p class="company-name">BY <span id="company-name"></span></p>
                    </div>
                    <div class="page-description" style="display: none">
                        <span id="page-description"></span>
                    </div>
                </div>
                <div class="body">
                    <form id="payment-form" name="payment-form" class="pament-form">
                        <div class="error-message">
                            <i class="fa fa-warning"></i><span></span>
                        </div>
                        <div class="element-pair">
                            <div class="element-pair-container">
                                <div class="element-wrap">
                                    <div class="element-label"><span>First Name</span></div>
                                    <input  type="text" class="element-is-input"  required>
                                </div>
                                <div class="element-wrap">
                                    <div class="element-label"><span>Last Name</span></div>
                                    <input  type="text" class="element-is-input">
                                </div>
                            </div>
                        </div>
                        <div class="element-wrap">
                            <div class="element-label"><span>Email Address</span></div>
                            <input type="email" class="element-is-input"  required>
                        </div>
                        <div id="phone-number" style="display: none" class="element-wrap">
                            <div class="element-label"><span>Phone Number</span></div>
                            <input type="tel" class="element-is-input"  required>
                        </div>
                        <div class="element-pair">
                            <div class="element-label"><span>Amount to charge</span></div>
                            <div class="element-pair-container">
                                <div class="element-wrap element-wrap-for-select element-wrap-on-left">
                                    <select id="payment-currency-options" class="element-is-select" disabled="true">
                                    </select>
                                </div>
                                <div class="element-wrap element-wrap-on-right">
                                    <input id="payment-amount" type="text" class="element-is-input"  required>
                                </div>
                            </div>
                        </div>
                        <div id="custom-fields"></div>
                        <div class="element-wrap element-wrap-for-submit">
                            <button type="submit"  class="button button-is-green">Pay Now</button>
                        </div>
                    </form>

                    </div>
                </div>
            </div>
           
           
        
    

<style>
    .element-helper {
        font-size: 13px;
        color: #777;
        margin-top: 5px;
    }
    .summary {
        border-top: solid 1px #e6e6e6;
        margin-top: 20px;
        padding: 20px 0 0;
    }
    .summary p {
        font-size: 14px;
        font-weight: bold;
        margin: 0;
    }
    .button-is-wide {
        width: 100%;
    }
</style>
<script src="../assets/payment/js/pages-dependencies.min.js"></script>
<script src="../assets/payment/js/pages.min.js"></script>
<script>
    init({"ref":"appeHJNb1px4CYc","id":94497,"name":"Admissionportalng For IJMBE Payment","slug":"mcts1t4fyc","description":null,"currency":"NGN","amount":5000,"domain":"live","custom_fields":[],"collect_phone":true,"type":"payment","createdAt":"2019-05-23T03:54:30.000Z","integration":{"key":"pk_live_059efa06fa8217b3648b232cafc2e3363928c90c","name":"Mapmind","logo":"https:\/\/pstk-integration-logos.s3-eu-west-1.amazonaws.com\/favicon_352403_May_20_2019_1_39_am","allowed_currencies":["NGN"]},"metadata":{"image_path":"https:\/\/pstk-integration-docs.s3-eu-west-1.amazonaws.com\/favicon_352403_May_22_2019_8_51_pm"}}, "mcts1t4fyc.html\/\/api-741.internal.paystack.co");
</script>



<!-- Mirrored from paystack.com/pay/mcts1t4fyc by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 28 Jun 2019 20:36:21 GMT -->
</html>
