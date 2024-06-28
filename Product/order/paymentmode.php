<?php
include("connect.php");
session_start();
?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<style>
@import url("https://fonts.googleapis.com/css2?family=Roboto&display=swap");

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

html,
body {
    height: 100vh;
    display: grid;
    font-family: "Roboto", sans-serif;
    color: #333333;
    background: #4f7cac;
    letter-spacing: 0.05em;
}

.payment-container {
    margin: auto;
    padding: 25px;
    height: 400px;
    width: 700px;
    background: #f7f7f7;
    border-radius: 15px;
    box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;
}

/* NAV BAR */

.top-nav {
    margin: 0 auto;
    height: 25px;
    display: flex;
    justify-content: center;
}

.top-nav ul {
    display: flex;
}

.top-nav ul li {
    width: 100px;
    padding-bottom: 5px;
    text-align: center;
    cursor: pointer;
}

.normal {
    color: gray;
    border-bottom: 1px solid gray;
}

.highlighted {
    font-weight: 700;
    color: #4f7cac;
    border-bottom: 2px solid #4f7cac;
}

/* MAIN PAYMENT SECTION */

.main {
    height: 325px;
    display: flex;
    align-items: center;
    justify-content: space-around;
    font-size: 14px;
}

.right-payment-info {
    margin-top: 25px;
    width: 200px;
    height: 300px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.payment-method h2 {
    margin-bottom: 10px;
    font-size: 16px;
    font-weight: 700;
}

.radio-container {
    display: flex;
    gap: 5px;
}

.radio-container label:not(:last-child) {
    margin-right: 20px;
}

.card-info-container {
    width: 200px;
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.card-info {
    display: flex;
    flex-direction: column;
    gap: 10px;
    width: 200px;
}

.card-info label {
    text-transform: uppercase;
    letter-spacing: 0.025em;
    font-size: 13px;
}

.card-info input {
    margin-top: 5px;
    border: 1px solid #333333;
    border-radius: 5px;
    letter-spacing: 0.025em;
    height: 25px;
}

.full-width {
    width: 200px;
    padding-left: 5px;
}

.expire-ccv {
    display: flex;
    justify-content: space-between;
}

.expire-ccv input {
    text-align: center;
}

.expire-ccv label {
    display: flex;
    flex-direction: column;
}

.expire-date {
    border: 1px solid #333333;
    border-radius: 5px;
    margin-top: 5px;
}

.expire-date input {
    margin: 0;
    border: none;
}

.expire-date span {
    font-size: 14px;
    font-weight: 700;
}

.save-card-info {
    display: flex;
    align-items: center;
    font-size: 13px;
    gap: 5px;
    margin-top: 15px;
    letter-spacing: 0.025em;
}

input {
    background-color: #f7f7f7;
}

input:focus {
    outline: none;
}

.button {
    width: 200px;
    height: 30px;
    text-transform: uppercase;
    font-weight: 700;
    font-size: 16px;
    font-family: "Roboto", sans-serif;
    letter-spacing: 0.05em;
    color: #f7f7f7;
    background-color: #4f7cac;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: all 0.2s ease;
}

button:hover {
    background-color: #2a94f4;
}
</style>
<div class="payment-container">
    <div class="top-nav">
        <h3>Payment We Accpected</h3>
    </div>
    <div class="main">
        <div class="left-illustration">
            <svg width="300" height="211" viewBox="0 0 300 211" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.1"
                    d="M197.327 0C163.325 0 133.186 16.3298 114.501 41.4849C104.666 37.3986 93.8629 35.1388 82.525 35.1388C36.9478 35.1388 0 71.6417 0 116.672C0 161.702 36.9478 198.205 82.525 198.205C101.734 198.205 119.412 191.72 133.435 180.847C150.97 194.636 173.174 202.878 197.327 202.878C254.031 202.878 300 157.463 300 101.44C300 45.4165 254.031 0 197.327 0Z"
                    fill="#2A94F4" />
                <path opacity="0.1"
                    d="M146.133 210.433C225.752 210.433 290.297 203.108 290.297 194.072C290.297 185.036 225.752 177.711 146.133 177.711C66.5139 177.711 1.96973 185.036 1.96973 194.072C1.96973 203.108 66.5139 210.433 146.133 210.433Z"
                    fill="#2A94F4" />
                <path
                    d="M37.5535 37.5593C37.5535 37.5593 39.3331 36.4225 38.8235 33.712C38.3159 31.0015 36.9596 27.5266 32.8086 28.3733C28.6575 29.2199 28.8261 29.9373 27.217 28.2439C25.608 26.5486 20.0595 30.39 21.3139 32.2421C21.9077 33.1182 22.1527 34.8115 19.7283 35.8287C17.3039 36.8459 17.0433 42.9646 21.7666 42.2904C22.9523 42.1219 22.8857 43.9446 22.2468 44.6403C20.8082 46.2043 24.2517 50.2319 26.878 47.3509C29.5042 44.4718 37.5535 37.5593 37.5535 37.5593Z"
                    fill="#0B4870" />
                <path
                    d="M52.427 199.983H259.254C266.715 199.983 272.765 193.935 272.765 186.472V71.9984C272.765 64.5371 266.717 58.487 259.254 58.487H52.427C44.9657 58.487 38.9155 64.5352 38.9155 71.9984V186.472C38.9155 193.935 44.9637 199.983 52.427 199.983Z"
                    fill="#4F7CAC" />
                <path d="M38.9143 110.645L272.764 110.645L272.764 77.6386L38.9143 77.6386L38.9143 110.645Z"
                    fill="#333333" />
                <path d="M50.1905 137.989L214.719 137.989L214.719 129.793L50.1905 129.793L50.1905 137.989Z"
                    fill="#F7F7F7" />
                <path d="M50.1899 151.032L170.999 151.032L170.999 144.847L50.1899 144.847L50.1899 151.032Z"
                    fill="#F7F7F7" />
                <path d="M50.1899 164.073L170.999 164.073L170.999 157.888L50.1899 157.888L50.1899 164.073Z"
                    fill="#F7F7F7" />
                <path d="M36.3775 184.547L35.5857 191.485H30.7291V183.624L36.3775 184.547Z" fill="#FCD2B1" />
                <path d="M17.4411 184.547L16.6493 191.485H11.7927V183.624L17.4411 184.547Z" fill="#FCD2B1" />
                <path
                    d="M33.1828 49.9419C33.0339 52.2604 32.0618 54.2673 31.0407 54.3634C30.0725 54.3634 29.1043 54.3634 28.1341 54.3634C27.113 54.2673 26.1429 52.2585 25.99 49.9419C25.7529 46.1181 26.2546 44.7658 26.0155 40.9421C25.8587 38.649 34.055 36.1815 33.8982 38.4746C33.661 42.2944 33.4219 46.1162 33.1828 49.9419Z"
                    fill="#FCD2B1" />
                <path
                    d="M48.474 49.1501C48.474 49.1501 53.4599 49.9399 55.4982 50.4397C61.1603 51.8312 63.2927 54.4535 64.6666 55.7118C66.0405 56.97 63.0222 57.1209 61.4955 58.2537C59.9687 59.3866 47.5587 56.1018 44.9638 54.5927C42.365 53.0816 46.7944 49.1501 48.474 49.1501Z"
                    fill="#FCD2B1" />
                <path
                    d="M30.2196 53.207C33.767 52.4466 33.1849 48.9913 33.1849 48.9913C33.1849 48.9913 41.9064 47.1118 46.6395 48.2309C51.3726 49.35 53.5109 49.9497 53.9695 50.1084C54.4281 50.2691 50.3045 50.7885 48.9306 55.7451C47.5567 60.7016 47.2137 61.5013 47.2137 61.5013L44.0446 61.0211C44.0446 61.0211 41.9416 101.046 41.1793 104.883C40.4149 108.721 24.3928 110.024 17.7664 106.24C17.7664 106.24 17.1726 90.2685 17.1726 68.4824L16.8629 50.6298C16.8629 50.6298 24.3124 49.9418 25.9921 49.9418C25.9921 49.9418 25.9274 54.1262 30.2196 53.207Z"
                    fill="#2A94F4" />
                <path
                    d="M63.8551 54.9396C62.1128 53.6421 60.5449 53.893 54.675 55.7255C46.8805 58.1597 44.2915 59.1298 43.0862 59.6531C41.8828 60.1764 41.1577 61.8717 40.556 63.8355C39.9543 65.7993 40.9793 67.0595 40.9793 67.4515C40.9793 67.6984 42.5825 68.4471 43.7761 68.4804C44.4993 68.502 44.7933 67.4397 44.1622 64.6782C43.2959 60.8761 56.4017 60.6448 58.2067 60.3841C60.0137 60.1235 67.9532 57.9911 63.8551 54.9396Z"
                    fill="#FFE3CA" />
                <path
                    d="M1.96973 83.1365C1.97169 78.3681 9.38791 63.5474 9.38791 63.5474C9.39183 63.5121 9.39967 63.4808 9.40751 63.4514C9.40947 63.4416 9.41339 63.4337 9.41731 63.4259C9.42319 63.4082 9.42906 63.3886 9.4369 63.373C9.44082 63.3632 9.4467 63.3573 9.45062 63.3494C9.45846 63.3357 9.4663 63.324 9.47414 63.3122C9.48002 63.3044 9.4859 63.3004 9.49374 63.2926C9.50354 63.2828 9.51138 63.275 9.52118 63.2671C9.52902 63.2612 9.53686 63.2593 9.5447 63.2554C9.5545 63.2495 9.5643 63.2436 9.57606 63.2397C9.5839 63.2358 9.5937 63.2358 9.60349 63.2338C9.61525 63.2318 9.62701 63.2279 9.63877 63.2279C9.64857 63.2279 9.66033 63.2279 9.67013 63.2279C9.68385 63.2279 9.69561 63.2279 9.70933 63.2299C9.72109 63.2318 9.73285 63.2338 9.74461 63.2377C9.75833 63.2416 9.77205 63.2436 9.78772 63.2495C9.79948 63.2534 9.8132 63.2593 9.82496 63.2632C9.84064 63.2691 9.85632 63.275 9.872 63.2828C9.88572 63.2887 9.89944 63.2965 9.91316 63.3024C9.92884 63.3102 9.94647 63.3181 9.96411 63.3279C9.97783 63.3357 9.99351 63.3455 10.0092 63.3534C10.0268 63.3632 10.0445 63.3749 10.0621 63.3867C10.0778 63.3965 10.0935 63.4082 10.1091 63.42C10.1268 63.4337 10.1464 63.4455 10.166 63.4612C10.1817 63.4729 10.1993 63.4866 10.215 63.4984C10.2346 63.5141 10.2542 63.5297 10.2757 63.5454C10.2934 63.5591 10.3091 63.5729 10.3267 63.5885C10.3483 63.6062 10.3698 63.6238 10.3914 63.6434C10.409 63.6591 10.4266 63.6748 10.4443 63.6905C10.4658 63.7101 10.4894 63.7316 10.5109 63.7512C10.5286 63.7689 10.5462 63.7845 10.5658 63.8022C10.5893 63.8237 10.6128 63.8473 10.6364 63.8708C10.654 63.8884 10.6736 63.908 10.6912 63.9256C10.7148 63.9511 10.7402 63.9766 10.7657 64.0021C10.7833 64.0217 10.8029 64.0413 10.8206 64.0609C10.8461 64.0883 10.8715 64.1158 10.899 64.1432C10.9166 64.1628 10.9362 64.1824 10.9539 64.204C10.9813 64.2334 11.0087 64.2647 11.0362 64.2961C11.0538 64.3157 11.0715 64.3353 11.0891 64.3568C11.1185 64.3901 11.1479 64.4235 11.1773 64.4587C11.1949 64.4783 11.2126 64.4999 11.2302 64.5195C11.2616 64.5548 11.291 64.592 11.3223 64.6292C11.338 64.6488 11.3556 64.6684 11.3713 64.688C11.4046 64.7292 11.438 64.7704 11.4713 64.8115C11.4869 64.8292 11.5007 64.8468 11.5163 64.8664C11.5516 64.9115 11.5889 64.9585 11.6261 65.0036C11.6379 65.0193 11.6516 65.0349 11.6633 65.0506C11.7045 65.1035 11.7457 65.1584 11.7888 65.2133C11.7966 65.2231 11.8045 65.2329 11.8123 65.2427C11.8593 65.3054 11.9083 65.3701 11.9554 65.4348C11.9573 65.4367 11.9593 65.4406 11.9612 65.4426C13.8408 67.9728 14.7952 70.456 14.0779 71.5829C13.1078 73.1077 7.63381 80.8473 8.88814 83.6421C10.1425 86.4389 17.788 97.8591 17.788 97.8591L16.6258 101.434C16.6258 101.438 1.96777 89.757 1.96973 83.1365Z"
                    fill="#FCD2B1" />
                <path
                    d="M18.6935 51.0355C18.6935 51.0355 16.1495 48.2446 12.5394 55.1747C10.3855 59.314 8.56871 63.5768 7.12231 67.379C7.12231 67.379 12.6747 76.7845 15.1265 72.7687C15.834 71.6084 17.6998 68.8646 18.2172 67.5848C21.3099 59.9549 18.6935 51.0355 18.6935 51.0355Z"
                    fill="#2A94F4" />
                <path
                    d="M36.0385 32.2421C36.8676 33.4847 37.2321 37.4574 36.9675 39.1331C35.9503 45.5733 33.3496 49.8811 26.1548 44.4424C24.6006 43.2665 24.4576 40.9969 24.2047 40.6579C23.9519 40.3188 22.0881 39.8112 22.2566 37.2692C22.4252 34.7272 24.1773 36.0266 24.5164 37.8337L25.4199 39.3604C25.4904 39.48 25.6159 39.5584 25.755 39.5682C26.0392 39.5878 26.2607 39.3291 26.1979 39.0527L25.5884 36.35C25.5884 36.35 28.1304 37.3829 29.0907 35.0663C30.0511 32.7497 33.1575 37.1007 34.4569 34.0491L36.0385 32.2421Z"
                    fill="#FFE3CA" />
                <path
                    d="M29.9943 190.797H30.7292C30.7292 190.797 33.4143 192.11 35.6662 190.797H36.6461L37.1537 192.281C37.1537 192.281 38.1611 194.462 42.1534 193.298C44.8306 192.516 46.2202 195.373 46.3044 198.086H29.9943V190.797V190.797Z"
                    fill="#0B4870" />
                <path
                    d="M11.0146 190.797H11.7496C11.7496 190.797 14.4347 192.11 16.6866 190.797H17.6665L18.1741 192.281C18.1741 192.281 19.1815 194.462 23.1738 193.298C25.851 192.516 27.2405 195.373 27.3248 198.086H11.0146V190.797Z"
                    fill="#0B4870" />
                <path
                    d="M41.875 99.4604C41.875 99.4604 42.1298 142.27 41.4537 152.689C40.7755 163.108 37.0537 186.083 37.0537 186.083H29.9178C29.9178 186.083 31.8796 153.957 31.8796 150.907C31.8796 147.858 29.0515 120.504 26.3547 119.965C23.8127 119.457 23.8656 141.825 23.7245 150.976C23.5834 160.127 17.7665 186.083 17.7665 186.083H11.0166C11.0166 186.083 14.6953 161.312 14.0779 149.622C13.7408 143.248 13.3293 132.82 13.4273 122.34C13.5076 113.593 17.6312 100.323 17.6312 100.323L41.875 99.4604Z"
                    fill="#0E538C" />
                <path
                    d="M17.5058 95.8522C18.1271 96.0913 18.0977 96.0404 18.0977 96.0404C18.0977 96.0404 24.0519 99.6916 20.3889 103.643C19.1267 105.003 17.3902 103.999 16.7415 102.477L16.3789 101.628C16.3789 101.628 16.8826 95.6131 17.5058 95.8522Z"
                    fill="#FFE3CA" />
            </svg>
        </div>
        <div class="right-payment-info">
            <form id="payment-form" method="POST" action="">
                <?php 
               
                    include('connect.php');
                    $uid=$_SESSION['uid'];
                    $q=mysqli_query($conn,"select * from order_master where uid=$uid");
                    $row=mysqli_fetch_array($q);
                    $oid=$row[0];
                    $_SESSION['oid']=$oid;
                    // $uname=$_SESSION['uname'];
                    // $uname=$_GET['uname'];
                    
                ?>
                <div class="card-info-container">
                    <div class="card-info">
                        <label>Name
                            
                            <input class="full-width" name="name" id="name" type="text"
                                value="<?php echo $_SESSION['name'];?>" placeholder="Enter Your Name">
                        </label>
                        <label>Total Amount
                            <input class="full-width" type="display" name="amt" id="amt"
                                value="<?php echo $_SESSION['total'];?>" readonly>
                        </label>
                    </div>
                </div>
            </form>
            <!-- <button class="button" onclick="document.getElementById('payment-form').reset()">Place Your Order</button> -->
            <input type="button" name="btn" id="btn" class="button" value="Pay Now" onclick="pay_now()" />

        </div>
    </div>
</div>
</div>
<script>
function pay_now() {
    var name = jQuery('#name').val();
    var amt = jQuery('#amt').val();
    jQuery.ajax({
        type: 'post',
        url: 'payment_process.php',
        data: "amt=" + amt + "&name=" + name,
        success: function(result) {
            var options = {
                "key": "rzp_test_bTajuEVcxNgH51",
                "amount": amt * 100,
                "currency": "INR",
                "name": "Alexander Photography",
                "description": "Test Transaction",
                "image": "../../Images/logo.jpg",
                "handler": function(response) {
                    jQuery.ajax({
                        type: 'post',
                        url: 'payment_process.php',
                        data: "payment_id=" + response.razorpay_payment_id,
                        success: function(result) {
                            window.location.href = "thank_you.php";
                        }
                    });
                }
            };
            var rzp1 = new Razorpay(options);
            rzp1.open();
        }
    });


}
</script>