<!DOCTYPE html>
<html lang="en">
    <?php
    session_start();
    include('admin/db_connect.php');
    ob_start();
        $query = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
         foreach ($query as $key => $value) {
          if(!is_numeric($key))
            $_SESSION['system'][$key] = $value;
        }
    ob_end_flush();
    include('header.php');

	
    ?>

    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mentii</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/styles.css">
</head>
<style>
    	header.masthead {
		  background: url(admin/assets/uploads/<?php echo $_SESSION['system']['cover_img'] ?>);
		  background-repeat: no-repeat;
		  background-size: cover;
		}
    
  #viewer_modal .btn-close {
    position: absolute;
    z-index: 999999;
    /*right: -4.5em;*/
    background: unset;
    color: white;
    border: unset;
    font-size: 27px;
    top: 0;
}
#viewer_modal .modal-dialog {
        width: 80%;
    max-width: unset;
    height: calc(90%);
    max-height: unset;
}
  #viewer_modal .modal-content {
       background: black;
    border: unset;
    height: calc(100%);
    display: flex;
    align-items: center;
    justify-content: center;
  }
  #viewer_modal img,#viewer_modal video{
    max-height: calc(100%);
    max-width: calc(100%);
  }
 /* body, footer {
    background: #000000e6 !important;
}*/
 

.header {
	text-align: center;
	margin-bottom: 50px;
}
.header h2 {
    font-weight: 400;
    color: #fff;
}
.main-content {
	width: 100%;
	height: 300px;
	padding: 50px 40px;
	background-color: #fff;
	border-radius: 15px;
	box-shadow: 0 25px 31px 0 rgba(0,0,0,0.5);
}

.text-area {
	text-align: center;
	font-size: 25px;
	color: #262626;
	line-height: 1.5;
    
}
.text-area .icon {
    margin-right: 5px;
}
.main-content .writer {
    text-transform: uppercase;
	letter-spacing: 5px;
	color: red;
	text-align: center;
	margin-top: 20px;
	font-size: 25px;
	
}
.main-content .button-area {
	display: grid;
	place-items: center;
	margin-top: 20px;
	padding: 10px 0;
}
.button-area .btn button {
    background-color: #262626;
    color: #fff;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    border: none;
    outline: none;
    padding: 10px 15px;
    
}
.button-area button:active {
    background-color: deepskyblue;
}



#portfolio .img-fluid{
    width: calc(100%);
    height: 30vh;
    z-index: -1;
    position: relative;
    padding: 1em;
}
.event-list{
cursor: pointer;
}
span.hightlight{
    background: yellow;
}
.banner{
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 26vh;
        width: calc(30%);
    }
    .banner img{
        width: calc(60%);
        height: calc(90%);
        cursor :pointer;
    }
.event-list{
cursor: pointer;
border: unset;
flex-direction: inherit;
}

.event-list .banner {
    width: calc(50%)
}
.event-list .card-body {
    width: calc(60%)
}
.event-list .banner img {
    border-top-left-radius: 5px;
    border-bottom-left-radius: 5px;
    min-height: 50vh;
}
span.hightlight{
    background: yellow;
}
.banner{
   min-height: calc(100%)
}

    </style>
<body theme="black">

    
    

   <div class="main w-full relative">
     <div data-color="black" class="home section w-full h-[200vh] relative">
        <div class="w-full sticky top-0 left-0">


            <div class="nav" style="opacity: 1; visibility: inherit;">
            <div class="container"><div class="nav__body"><div class="nav__left"><div class="nav__burger"><div class="nav__burger--line is--top"></div><div class="nav__burger--line is--middle"></div><div class="nav__burger--line is--bottom"></div></div><a href="/" aria-current="page" class="nav__logo w-inline-block w--current" style="opacity: 1;">
                <!--<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 141 41" fill="none">
                <g clip-path="url(#clip0_511_410)">
                    <path d="M-0.43052 20.9465C0.652448 20.9465 1.68707 20.941 2.72169 20.9588C2.79352 20.9588 2.91508 21.1241 2.92475 21.2211C3.02144 22.1886 3.23002 23.1274 3.61541 24.0225C4.50638 26.0928 6.05623 27.4402 8.25256 27.995C10.6602 28.6031 13.043 28.4213 15.3402 27.4989C16.8251 26.9031 17.9261 25.8687 18.3391 24.2903C18.7991 22.533 18.6223 20.8699 17.2382 19.5253C16.4757 18.7846 15.5156 18.3282 14.4907 18.0973C12.6576 17.686 10.8094 17.3416 8.9598 17.0054C7.32016 16.7075 5.68189 16.4124 4.14723 15.7332C2.00201 14.7835 0.666261 13.2243 0.395519 10.8616C0.177268 8.95665 0.428671 7.14329 1.45915 5.48297C2.13186 4.40069 3.07255 3.59718 4.19143 2.99591C5.71228 2.17873 7.35884 1.80704 9.07169 1.67312C10.2514 1.5802 11.4338 1.56107 12.6079 1.71412C14.7932 2.00109 16.7644 2.78273 18.346 4.34603C19.5574 5.54446 20.3669 6.9916 20.7647 8.63962C20.9678 9.47593 21.0755 10.3341 21.2219 11.1841C21.233 11.2483 21.2109 11.3166 21.2012 11.43C20.8517 11.43 20.5092 11.43 20.1666 11.43C19.5339 11.43 18.8999 11.4109 18.2673 11.4382C17.9122 11.4533 17.8183 11.3043 17.7948 10.99C17.6926 9.65221 17.3197 8.40048 16.5585 7.27584C15.5405 5.76994 14.0859 4.93363 12.3109 4.62753C10.5718 4.3269 8.8493 4.42255 7.1765 4.99786C5.46917 5.58546 4.2453 6.67184 3.8903 8.4893C3.48833 10.5459 4.06573 12.2267 6.34079 13.2147C7.65859 13.7873 9.06617 14.021 10.4737 14.2574C12.0899 14.5293 13.7157 14.7657 15.314 15.1196C16.8873 15.4681 18.4012 16.0065 19.6804 17.0437C20.7951 17.9483 21.5452 19.0784 21.7979 20.4859C21.9361 21.2526 22.0604 22.0383 22.0424 22.8118C21.9844 25.3029 21.0672 27.4169 19.0104 28.9461C17.6926 29.9258 16.18 30.4902 14.5736 30.8154C13.206 31.0928 11.8233 31.2117 10.4309 31.1776C7.97077 31.1174 5.65012 30.5872 3.60713 29.1428C2.0103 28.0127 0.95496 26.4932 0.280868 24.6907C-0.103144 23.6617 -0.3062 22.5945 -0.427757 21.5095C-0.445715 21.3428 -0.43052 21.1733 -0.43052 20.9478V20.9465Z" fill="currentColor"></path>
                    <path d="M30.9936 32.9602H34.0202C34.1583 33.407 34.2688 33.8675 34.4387 34.3062C35.0423 35.8613 36.2344 36.7755 37.8188 37.195C38.4556 37.3644 39.127 37.4874 39.7817 37.4888C41.4642 37.4929 43.061 37.1362 44.307 35.92C45.0018 35.2422 45.4811 34.395 45.6759 33.4398C45.8099 32.7866 45.8955 32.1143 45.9052 31.4502C45.9314 29.5261 45.9107 27.6007 45.9052 25.6766C45.9052 25.4156 45.8762 25.1546 45.8624 24.9114C45.8071 26.1508 45.4908 27.3233 44.7752 28.381C43.9202 29.6464 42.7005 30.3856 41.2515 30.7888C40.2251 31.0744 39.1684 31.1714 38.1089 31.0962C34.8614 30.8653 32.5546 29.2924 31.3196 26.2861C30.5047 24.3005 30.3361 22.2139 30.448 20.0917C30.5116 18.8727 30.7188 17.6839 31.0986 16.5196C32.1015 13.4422 34.5092 11.3952 37.8934 11.1711C39.2568 11.0809 40.5843 11.1752 41.8606 11.6357C44.4976 12.5854 45.6634 14.5874 45.9162 17.2521C45.9162 15.477 45.9231 13.7005 45.9093 11.9254C45.9066 11.6165 45.9867 11.5086 46.3127 11.5154C47.1636 11.5359 48.0159 11.5305 48.8681 11.5182C49.1251 11.5141 49.201 11.5974 49.201 11.8516C49.1955 18.4915 49.2259 25.1314 49.1776 31.7713C49.1624 33.7719 48.5712 35.6426 47.2395 37.2237C46.2035 38.4522 44.8775 39.2393 43.3442 39.6739C41.2722 40.2601 39.1656 40.2656 37.0715 39.816C34.9995 39.3719 33.277 38.362 32.1001 36.5568C31.4592 35.5729 31.1345 34.4825 30.966 33.3387C30.9564 33.2717 30.9605 33.202 30.9646 33.1337C30.9674 33.0886 30.9785 33.0449 30.9936 32.9629V32.9602ZM46.1883 21.1822C46.169 19.9906 46.0405 18.8891 45.6759 17.826C45.3153 16.7792 44.7918 15.8199 43.9202 15.1012C42.5568 13.9765 40.9697 13.6199 39.2223 13.7961C36.9127 14.0298 35.331 15.2064 34.4263 17.3081C33.8986 18.5339 33.7605 19.8279 33.7563 21.1357C33.7522 22.3287 33.9055 23.508 34.3323 24.6394C34.7923 25.8556 35.5092 26.8641 36.6378 27.5611C37.7788 28.2648 39.0247 28.4821 40.3522 28.4165C42.5568 28.3085 44.1992 27.3301 45.2366 25.3924C45.9535 24.0532 46.1455 22.5979 46.1883 21.1835V21.1822Z" fill="currentColor"></path>
                    <path d="M97.7093 0.874634C97.7093 1.62075 97.7093 2.32314 97.7093 3.0269C97.7093 3.54071 97.4483 3.79761 96.9261 3.79761C94.727 3.79761 92.5293 3.80308 90.3302 3.79214C90.0567 3.79214 89.8841 3.87414 89.7294 4.09278C89.1423 4.91815 88.8094 5.85422 88.6008 6.82034C88.279 8.31805 88.0317 9.83078 87.7554 11.338C87.7485 11.379 87.7665 11.4255 87.7789 11.5171C87.9405 11.5171 88.098 11.5171 88.2555 11.5171C91.2488 11.5171 94.2422 11.5171 97.2342 11.5171C97.7066 11.5171 97.708 11.5184 97.708 11.9817C97.708 18.1091 97.7052 24.2366 97.7149 30.3654C97.7149 30.7029 97.6375 30.8232 97.2756 30.8109C96.4827 30.7836 95.6871 30.7863 94.8928 30.8109C94.5668 30.8205 94.4908 30.7098 94.4908 30.4037C94.4991 24.857 94.4964 19.3103 94.4964 13.7636C94.4964 13.3965 94.3085 13.2129 93.9328 13.2129C91.8953 13.2129 89.8578 13.2197 87.8204 13.2061C87.5026 13.2047 87.3977 13.2976 87.3452 13.6147C87.0413 15.4253 86.7042 17.2305 86.3851 19.0384C86.0812 20.7561 85.7884 22.4765 85.4831 24.1942C85.0674 26.5378 84.6543 28.8814 84.2192 31.2222C84.0686 32.0353 83.8794 32.8429 83.6625 33.6409C83.4084 34.577 82.8282 35.3054 82.0284 35.8506C80.2037 37.0955 78.3693 38.3267 76.5376 39.5648C76.5003 39.5908 76.452 39.6058 76.4216 39.6372C75.8069 40.2918 75.0181 40.177 74.2045 40.1401C74.1962 39.9638 74.1824 39.7971 74.1824 39.6318C74.1797 38.8692 74.1907 38.1054 74.1769 37.3428C74.1728 37.0846 74.2625 37.0135 74.5153 37.0149C75.9892 37.0244 77.4617 37.0094 78.9356 37.0285C79.2367 37.0326 79.4246 36.9411 79.5199 36.6773C79.7754 35.9736 80.1111 35.2849 80.2534 34.5579C80.7576 31.9738 81.1982 29.3788 81.6555 26.7865C82.0588 24.499 82.4483 22.2087 82.8544 19.9198C83.2246 17.8331 83.6073 15.7492 83.9844 13.6625C84.0631 13.2266 84.0521 13.2129 83.6156 13.2129C82.5796 13.2129 81.5436 13.2047 80.5076 13.217C80.2341 13.2211 80.1415 13.1336 80.1595 12.8644C80.1802 12.5351 80.1829 12.203 80.1595 11.8737C80.1387 11.5786 80.2603 11.5102 80.5366 11.513C81.6872 11.5253 82.8393 11.5102 83.9899 11.5225C84.2662 11.5253 84.385 11.4569 84.4499 11.1659C84.7096 10.003 84.9693 8.83596 85.298 7.69081C85.6807 6.35983 86.5164 5.34724 87.6919 4.59292C89.5719 3.38766 91.4381 2.16326 93.3112 0.949793C93.3733 0.908797 93.4576 0.8801 93.5308 0.8801C94.8997 0.876 96.2686 0.877367 97.7066 0.877367L97.7093 0.874634Z" fill="currentColor"></path>
                    <path d="M140.393 21.0457C140.302 22.8358 140.115 24.4879 139.44 26.0457C138.527 28.1556 137.01 29.6574 134.832 30.4842C133.291 31.0691 131.697 31.2385 130.059 31.1483C128.783 31.0786 127.556 30.8258 126.387 30.3161C124.518 29.5017 123.165 28.1638 122.303 26.3409C121.643 24.9443 121.303 23.463 121.303 21.9271C121.303 20.8311 121.323 19.7229 121.488 18.642C121.884 16.0374 123.101 13.8947 125.409 12.4694C126.72 11.6591 128.189 11.3133 129.719 11.1685C130.92 11.0551 132.103 11.1316 133.279 11.3666C136.529 12.0144 138.673 13.9138 139.733 17.0103C140.068 17.9929 140.253 19.0082 140.299 20.0481C140.315 20.4198 140.369 20.7888 140.394 21.0443L140.393 21.0457ZM137.05 20.6316C137.058 19.9811 136.901 18.8729 136.54 17.7975C136.116 16.5321 135.41 15.4525 134.272 14.7132C133.005 13.8892 131.598 13.6432 130.092 13.7881C127.45 14.0436 125.785 15.5987 125.054 17.945C124.412 20.0071 124.408 22.1143 125.012 24.1955C125.539 26.017 126.617 27.4095 128.455 28.1037C129.78 28.6039 131.153 28.6503 132.523 28.3114C134.11 27.9192 135.296 26.9996 136.066 25.5579C136.812 24.164 137.043 22.665 137.053 20.6316H137.05Z" fill="currentColor"></path>
                    <path d="M70.1691 30.8002C69.1331 30.8002 68.1219 30.8043 67.1122 30.792C67.0417 30.792 66.945 30.6759 66.9133 30.5939C66.8787 30.5051 66.905 30.3917 66.905 30.2892C66.905 26.452 66.9091 22.6148 66.9036 18.7776C66.9022 17.597 66.6522 16.4805 65.9422 15.498C65.2847 14.5865 64.3578 14.1042 63.2817 13.8787C61.9004 13.5903 60.5688 13.7311 59.2993 14.3761C58.3379 14.8639 57.6873 15.6346 57.2232 16.5721C56.7259 17.5765 56.5104 18.6464 56.5063 19.7643C56.4911 23.3035 56.4621 26.8414 56.4579 30.3807C56.4579 30.7415 56.3474 30.818 56.0104 30.8084C55.2175 30.7866 54.4218 30.8016 53.629 30.8002C53.506 30.8002 53.3831 30.7879 53.2422 30.7811V11.5433C53.3928 11.5337 53.5267 11.5201 53.6607 11.5187C54.4205 11.516 55.1802 11.516 55.9399 11.5187C56.527 11.5201 56.4469 11.49 56.4483 12.0065C56.4552 13.9074 56.4579 15.8096 56.4621 17.7104C56.4621 17.8006 56.4621 17.8894 56.4621 18.0315C56.556 17.3264 56.6016 16.6677 56.7356 16.0268C57.3199 13.2337 59.3035 11.4094 62.3065 11.1675C63.5898 11.0637 64.8288 11.1839 66.0292 11.6171C67.7656 12.2443 68.8983 13.4797 69.5599 15.1618C69.9218 16.0788 70.1221 17.0312 70.129 18.0165C70.1553 22.2144 70.1746 26.4137 70.1953 30.6117C70.1953 30.6554 70.1843 30.6991 70.1705 30.7989L70.1691 30.8002Z" fill="currentColor"></path>
                    <path d="M119.492 23.9576C119.119 25.9609 118.315 27.68 116.821 29.0205C115.616 30.1014 114.171 30.7232 112.571 30.9965C110.789 31.2999 109.019 31.2548 107.281 30.7574C104.445 29.9443 102.575 28.1254 101.639 25.3569C101.217 24.1093 101.034 22.8275 101.006 21.5129C100.976 20.0056 101.114 18.5257 101.578 17.0854C102.295 14.8607 103.642 13.1348 105.777 12.0962C106.937 11.5318 108.192 11.2613 109.494 11.1629C110.865 11.059 112.203 11.1629 113.518 11.5209C116.279 12.2725 118.094 14.0298 119.034 16.6891C119.165 17.0608 119.263 17.4448 119.389 17.8656C119.242 17.882 119.144 17.9012 119.048 17.9012C118.173 17.9039 117.297 17.8943 116.423 17.9094C116.184 17.9135 116.089 17.8233 116.006 17.6115C115.488 16.2682 114.703 15.134 113.385 14.433C111.286 13.3151 108.246 13.5215 106.451 15.175C105.517 16.0359 104.973 17.1291 104.664 18.3453C104.327 19.6694 104.233 21.0141 104.382 22.3669C104.541 23.8127 104.905 25.1956 105.82 26.3845C106.635 27.4436 107.701 28.1008 109.016 28.3591C110.475 28.6447 111.892 28.5586 113.25 27.8986C114.656 27.214 115.503 26.0661 116.014 24.6463C116.259 23.9658 116.237 23.9576 116.96 23.9576C117.788 23.9576 118.614 23.9576 119.49 23.9576H119.492Z" fill="currentColor"></path>
                    <path d="M77.4364 21.1702C77.4364 24.2435 77.4309 27.3168 77.4433 30.3901C77.4433 30.7153 77.3618 30.8233 77.0234 30.8123C76.207 30.7891 75.3893 30.7932 74.5729 30.8123C74.2745 30.8192 74.1737 30.7358 74.1779 30.4311C74.1944 29.3051 74.1834 28.1777 74.1834 27.0503C74.1834 22.0311 74.1834 17.0105 74.1834 11.9913C74.1834 11.524 74.1834 11.5226 74.653 11.5226C75.4473 11.5226 76.2416 11.5349 77.0345 11.5158C77.348 11.5076 77.4447 11.5978 77.4433 11.9175C77.4309 15.0017 77.4364 18.0873 77.4364 21.1716V21.1702Z" fill="currentColor"></path>
                    <path d="M24.8267 21.1653C24.8267 18.092 24.8336 15.0173 24.8184 11.944C24.817 11.5915 24.9192 11.4985 25.2645 11.5081C26.0574 11.5313 26.8531 11.53 27.646 11.5081C27.9651 11.4999 28.0548 11.5997 28.0535 11.9126C28.0438 16.239 28.0466 20.5654 28.0466 24.8904C28.0466 26.7229 28.0383 28.5567 28.0535 30.3892C28.0562 30.7227 27.9526 30.8156 27.6239 30.806C26.8185 30.7842 26.0132 30.7855 25.2079 30.806C24.9013 30.8129 24.8198 30.7199 24.8198 30.4193C24.8308 27.3337 24.8267 24.2495 24.8267 21.1639V21.1653Z" fill="currentColor"></path>
                    <path d="M24.8574 0.891626H28.0151C28.0262 0.991381 28.0455 1.0884 28.0455 1.18543C28.0483 2.35653 28.04 3.529 28.0524 4.7001C28.0552 4.96931 27.9695 5.0513 27.6988 5.04583C26.8368 5.0308 25.9749 5.03627 25.1129 5.0431C24.914 5.04447 24.8229 4.99254 24.8242 4.77663C24.8325 3.5372 24.8284 2.29777 24.8311 1.05697C24.8311 1.01325 24.845 0.969517 24.8588 0.890259L24.8574 0.891626Z" fill="currentColor"></path>
                    <path d="M74.1854 0.890259H77.4357C77.4357 1.15536 77.4357 1.4027 77.4357 1.65004C77.4357 2.66263 77.4288 3.67385 77.4412 4.68644C77.444 4.94471 77.3818 5.0472 77.0986 5.04173C76.2256 5.02397 75.3512 5.03353 74.4782 5.03627C74.3166 5.03627 74.1826 5.03217 74.1826 4.81216C74.1868 3.5167 74.1854 2.22124 74.1854 0.891625V0.890259Z" fill="currentColor"></path>
                </g>-->
                <defs>
                    <clipPath id="clip0_511_410">
                    <rect width="141" height="40" fill="currentColor" transform="translate(0 0.593384)"></rect>
                    </clipPath>
                </defs>
                </svg>
                </a></div>
                <nav class="nav__list">
                    <!--<a this-style="" href="/solutions" class="link-hover w-inline-block" style="position: relative; overflow: hidden; opacity: 1"><div class="link-text"><div class="f-14" style=""><div style="display: block; text-align: start; position: relative;"><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, -100%);">S</div><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, -100%);">o</div><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, -100%);">l</div><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, -100%);">u</div><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, -100%);">t</div><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, -100%);">i</div><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, -100%);">o</div><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, -100%);">n</div><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, -100%);">s</div></div></div><div class="f-14" style="width: 100%; left: 0px; top: 100%; position: absolute;"><div style="display: block; text-align: start; position: relative;">
                        <div style="relative inline-block translate-none rotate-none scale-none transform-translate(0%, -100%)">S</div><div style="relative inline-block translate-none rotate-none scale-none transform-translate(0%, -100%)">o</div><div style="relative inline-block translate-none; rotate: none; scale: none; transform: translate(0%, -100%);">l</div><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, -100%);">u</div><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, -100%);">t</div><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, -100%);">i</div><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, -100%);">o</div><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, -100%);">n</div><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, -100%);">s</div></div></div></div></a>
                        <a this-style="" href="/about" class="link-hover w-inline-block" style="relative overflow-hidden opacity-1"><div class="link-text"><div class="f-14" style=""><div style="block text-align-start relative"><div style="relative inline-block translate-none rotate-none scale: none; transform: translate(0%, -100%);">A</div><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, -100%);">b</div><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, -100%);">o</div><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, -100%);">u</div><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, -100%);">t</div></div></div><div class="f-14" style="width: 100%; left: 0px; top: 100%; position: absolute;"><div style="display: block; text-align: start; position: relative;">
                        <div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, -100%);">A</div><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, -100%);">b</div><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, -100%);">o</div><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, -100%);">u</div><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, -100%);">t</div></div></div></div></a>
                        <a this-style="" href="/insights" class="link-hover w-inline-block" style="position: relative; overflow: hidden; opacity: 1;"><div class="link-text"><div class="f-14" style=""><div style="display: block; text-align: start; position: relative;"><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, -100%);">I</div><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, -100%);">n</div><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, -100%);">s</div><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, -100%);">i</div><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, -100%);">g</div><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, -100%);">h</div><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, -100%);">t</div><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, -100%);">s</div></div></div><div class="f-14" style="width: 100%; left: 0px; top: 100%; position: absolute;"><div style="display: block; text-align: start; position: relative;">
                        <div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, -100%);">I</div><div style="relative inline-block translate-none rotate-none scale-none transform-translate(0%, -100%);">n</div><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, -100%);">s</div><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, -100%);">i</div><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, -100%);">g</div><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, -100%);">h</div><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, -100%);">t</div><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, -100%);">s</div></div></div></div></a>
                        <a this-style="" href="/team" class="link-hover w-inline-block" style="position: relative; overflow: hidden; opacity: 1;"><div class="link-text"><div class="f-14" style=""><div style="display: block; text-align: start; position: relative;"><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, -100%);">T</div><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, -100%);">e</div><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, -100%);">a</div><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, -100%);">m</div></div></div><div class="f-14" style="width: 100%; left: 0px; top: 100%; position: absolute;"><div style="display: block; text-align: start; position: relative;">
                        <div style="relative inline-block translate-none rotate-none scale-none transform-translate(0%, -100%)">T</div><div style="relative inline-block translate-none rotate-none scale-none transform-translate(0%, -100%)">e</div><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, -100%);">a</div><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, -100%);">m</div></div></div></div></a>
                        <a this-style="" href="/careers" class="link-hover w-inline-block" style="position: relative; overflow: hidden; opacity: 1;"><div class="link-text"><div class="f-14" style=""><div style="display: block; text-align: start; position: relative;"><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, -100%);">C</div><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, -100%);">a</div><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, -100%);">r</div><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, -100%);">e</div><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, -100%);">e</div><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, -100%);">r</div><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, -100%);">s</div></div></div><div class="f-14" style="width: 100%; left: 0px; top: 100%; position: absolute;"><div style="display: block; text-align: start; position: relative;">
                       <div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, -100%);">C</div><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, -100%);">a</div><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, -100%);">r</div><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, -100%);">e</div><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, -100%);">e</div><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, -100%);">r</div><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0%, -100%);">s</div></div></div></div></a>
                        <a this-style="contact" href="/contact" class="link-hover w-inline-block" style="position: relative; overflow: hidden; opacity: 1;"><div class="link-text"><div class="f-14" style=""><div style="display: block; text-align: start; position: relative;"><div style="position:relative;display:inline-block;">C</div><div style="position:relative;display:inline-block;">o</div><div style="position:relative;display:inline-block;">n</div><div style="position:relative;display:inline-block;">t</div><div style="position:relative;display:inline-block;">a</div><div style="position:relative;display:inline-block;">c</div><div style="position:relative;display:inline-block;">t</div> <div style="position:relative;display:inline-block;">U</div><div style="position:relative;display:inline-block;">s</div></div></div><div class="f-14" style="width: 100%; left: 0px; top: 100%; position: absolute;"><div style="display: block; text-align: start; position: relative;">
                        <div style="position:relative;display:inline-block;">C</div><div style="position:relative;display:inline-block;">o</div><div style="position:relative;display:inline-block;">n</div><div style="position:relative;display:inline-block;">t</div><div style="position:relative;display:inline-block;">a</div><div style="position:relative;display:inline-block;">c</div><div style="position:relative;display:inline-block;">t</div> <div style="position:relative;display:inline-block;">U</div><div style="position:relative;display:inline-block;">s</div></div></div></div></a>-->
                        <div id="nav-main">
                            <div id="nav">
                                <h1>Mentii</h1>
                                <div id="part2">
                                    <a href="knowyourself.html">Know Yourself</a>
                                    <a href="calmzone.html">Calm Zone</a>
                                    <a href="colorp.html">Color</a>
                                    <a href="journal.html">Journal</a>
                                    <a href="userdashboard.php">Dashboard</a>
                                    <a href="#csection">Community</a>
                                    <a href="about.html">About Us</a>
                                    <a href="register.html">Register</a>

                                </div>
                            </div>
                       </div>
                    </nav></div></div></div>
            
            

            <div class="btmtext absolute z-[4] bottom-[7%] left-[3%] w-52">
                <h1>Your Mental Health buddy....</h1>
            </div>
         <!--
            <div id="nav-main">
                <div id="nav">
                    <h1>Mentii</h1>
                    <div id="part2">
                        <a href="knowyourself.html">Know Yourself</a>
                        <a href="games.html">Calm Zone</a>
                        <a href="team section">Community</a>
                        <a href="about.html">About Us</a>
                    </div>
                </div>
            </div>
           -->

            

            <div style="--clip: 100%" class="vdodiv w-full h-screen absolute z-[3] top-0 left-0 bg-black overflow-hidden " >
                <video autoplay loop muted="absolute w-full top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2" src="assets/video1.mp4"></video>
            </div>
            <div class="marqueecontainer w-full h-screen relative overflow-hidden">
                <div class="heading absolute top-[16%] left-1/2 -translate-x-1/2 w-60 text-center ">
                    <h1 class="text-xl font-regular"> Crafting a new Paradigm of Health Care</h1>
                </div>
                
                <div class="slidesm absolute scale-[1]    w-[90%] top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                     <div class="row lft -translate-x-1/2 py-2 w-full flex items-center gap-10 whitespace-norap">
                        <div class="elem flex items-center gap-10">
                            <h1 class="font-regular font-['Pp_New_Machina'] text-8xl">Guilty</h1>
                            <div class="image w-[3.5rem] h-[3.5rem] overflow-hidden rounded-full bg-yellow-500">
                                <img class="w-full h-full object-cover" src="assets/s.png" alt="">
                            </div>
                        </div>
                        <div class="elem flex items-center gap-10">
                            <h1 class="font-regular font-['Pp_New_Machina'] text-8xl">Sad</h1>
                            <div class="image w-[3.5rem] h-[3.5rem] rounded-full bg-yellow-500">
                            <a href="sad.html">
                                <img class="w-full h-full object-cover" src="assets/j.png" alt="">
                                </a>  
                            </div>
                        </div>
                        <div class="elem flex items-center gap-10">
                            <h1 class="font-regular font-['Pp_New_Machina'] text-8xl">Depressed</h1>
                            <div class="image w-[3.5rem] h-[3.5rem] rounded-full bg-yellow-500">
                                <img class="w-full h-full object-cover" src="assets/j.png" alt="">
                            </div>
                        </div>
                        <div class="elem flex items-center gap-10">
                            <h1 class="font-regular font-['Pp_New_Machina'] text-8xl">Anxiety</h1>
                            <div class="image w-[3.5rem] h-[3.5rem] rounded-full bg-yellow-500">
                                <img class="w-full h-full object-cover" src="assets/an.png" alt="">
                            </div>
                        </div>
                        <div class="elem flex items-center gap-10">
                            <h1 class="font-regular font-['Pp_New_Machina'] text-8xl">Lonely</h1>
                            <div class="image w-[3.5rem] h-[3.5rem] rounded-full bg-yellow-500">
                                <img class="w-full h-full object-cover" src="assets/h.png" alt="">
                            </div>
                        </div>
                        <div class="elem flex items-center gap-10">
                            <h1 class="font-regular font-['Pp_New_Machina'] text-8xl">Stressed</h1>
                            <div class="image w-[3.5rem] h-[3.5rem] rounded-full bg-yellow-500">
                            <a href="sad.html">
                                <img class="w-full h-full object-cover" src="assets/f.png" alt="">
                                </a>   
                            </div>
                        </div>
                     </div>
                     <div class="row rgt -translate-x-1/3 py-2 w-full flex items-center gap-10 whitespace-norap">
                        <div class="elem flex items-center gap-10">
                            <h1 class="font-regular font-['Pp_New_Machina'] text-8xl">Fear</h1>
                            <div class="image w-[3.5rem] h-[3.5rem] rounded-full bg-yellow-500">
                                <a href="sad.html">
                                <img class="w-full h-full object-cover" src="assets/p.png" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="elem flex items-center gap-10">
                            <h1 class="font-regular font-['Pp_New_Machina'] text-8xl">Frustrated</h1>
                            <div class="image w-[3.5rem] h-[3.5rem] rounded-full bg-yellow-500">
                                <a href="sad.html">
                                <img class="w-full h-full object-cover" src="assets/d.png" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="elem flex items-center gap-10">
                            <h1 class="font-regular font-['Pp_New_Machina'] text-8xl">Exhausted</h1>
                            <div class="image w-[3.5rem] h-[3.5rem] rounded-full bg-yellow-500">
                                <img class="w-full h-full object-cover" src="assets/d.png" alt="">
                            </div>
                        </div>
                        <div class="elem flex items-center gap-10">
                            <h1 class="font-regular font-['Pp_New_Machina'] text-8xl">Hopeless</h1>
                            <div class="image w-[3.5rem] h-[3.5rem] rounded-full bg-yellow-500">
                                <img class="w-full h-full object-cover" src="assets/h.png" alt="">
                            </div>
                        </div>
                        <div class="elem flex items-center gap-10">
                            <h1 class="font-regular font-['Pp_New_Machina'] text-8xl">Confused</h1>
                            <div class="image w-[3.5rem] h-[3.5rem] rounded-full bg-yellow-500">
                                <img class="w-full h-full object-cover" src="assets/g.png" alt="">
                            </div>
                        </div>
                        <div class="elem flex items-center gap-10">
                            <h1 class="font-regular font-['Pp_New_Machina'] text-8xl">Cry</h1>
                            <div class="image w-[3.5rem] h-[3.5rem] rounded-full bg-yellow-500">
                                <img class="w-full h-full object-cover" src="assets/u.png" alt="">
                            </div>
                        </div>
                     </div>
                     <div class="row lft -translate-x-2/3 py-2 w-full flex items-center gap-10 whitespace-norap">
                        <div class="elem flex items-center gap-10">
                            <h1 class="font-regular font-['Pp_New_Machina'] text-8xl">Despair</h1>
                            <div class="image w-[3.5rem] h-[3.5rem] rounded-full bg-yellow-500">
                                <img class="w-full h-full object-cover" src="assets/a.png" alt="">
                            </div>
                        </div>
                        <div class="elem flex items-center gap-10">
                            <h1 class="font-regular font-['Pp_New_Machina'] text-8xl">Angry</h1>
                            <div class="image w-[3.5rem] h-[3.5rem] rounded-full bg-yellow-500">
                                <img class="w-full h-full object-cover" src="assets/t.png" alt="">
                            </div>
                        </div>
                        <div class="elem flex items-center gap-10">
                            <h1 class="font-regular font-['Pp_New_Machina'] text-8xl">Shameful</h1>
                            <div class="image w-[3.5rem] h-[3.5rem] rounded-full bg-yellow-500">
                                <img class="w-full h-full object-cover" src="assets/k.png" alt="">
                            </div>
                        </div>
                        <div class="elem flex items-center gap-10">
                            <h1 class="font-regular font-['Pp_New_Machina'] text-8xl">Apathy</h1>
                            <div class="image w-[3.5rem] h-[3.5rem] rounded-full bg-yellow-500">
                                <img class="w-full h-full object-cover" src="assets/w.png" alt="">
                            </div>
                        </div>
                        <div class="elem flex items-center gap-10">
                            <h1 class="font-regular font-['Pp_New_Machina'] text-8xl">Happy</h1>
                            <div class="image w-[3.5rem] h-[3.5rem] rounded-full bg-yellow-500">
                                <img class="w-full h-full object-cover" src="assets/r.png" alt="">
                            </div>
                        </div>
                        <div class="elem flex items-center gap-10">
                            <h1 class="font-regular font-['Pp_New_Machina'] text-8xl">Confident</h1>
                            <div class="image w-[3.5rem] h-[3.5rem] rounded-full bg-yellow-500">
                                <img class="w-full h-full object-cover" src="assets/l.png" alt="">
                            </div>
                        </div>
                     </div>
                </div>
            </div>
        </div>
       
     </div>

     
     

     <div data-color="salmon" class="craft section w-full flex gap-10 justify-between items-start px-10 py-10 relative">
         <div class="ltext w-[40%] sticky top-0 left-0">
            <p class="text-3xl font-light leading-[3rem]">Have a Great Day </p>
            <h1 class="text-[5rem] leading-[6.5rem] mt-20 font-['Poppins'] mb-10">Quotes</h1>
            <div class="w-fit px-10 py-5 border-[1px] border-[--dcyan]">
                <div class="masker overflow-hidden">
                <span class="inline-block align-center"> 
                    <div class="header">
        <h2></h2>
      </div>
  
      <div class="main-content">
       
        <div class="text-area">
          <span class="quote">"Life is what happens when you're busy making other plans"</span>
        </div>
        
       <!-- <div class="writer">– John Lennon</div>-->
  
        <div class="button-area">  
          <div class="btn">
            <button id="Qbtn">Tell me</button>
          </div>
        </div>
      </div>
        </span>

                    
                </div>
            </div>
         </div>
         <div class="cards w-1/2">
            <h1 class="text-6xl">At any one time, a diverse set of individual, family, community and structural factors may combine to protect or undermine mental health. Although most people are resilient, people who are exposed to adverse circumstances – including poverty, violence, disability and inequality – are at higher risk of developing a mental health condition.</h1>
         </div>
     </div>

     

   <!-- <div data-color="yellow" class="craft section w-full flex gap-10 justify-between items-start px-10 py-10 relative">
         <div class="ltext w-[40%] sticky top-0 left-0">
            <p class="text-3xl font-light leading-[3rem]">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit quia eum tenetur molestiae hic porro nostrum similique minima corrupti ipsum, quasi, veniam est architecto numquam?</p>
            <h1 class="text-[5rem] leading-[6.5rem] mt-20 font-['Poppins'] mb-10">We Craft Experiences</h1>
            <div class="w-fit px-10 py-5 border-[1px] border-[--dcyan]">
                <div class="masker overflow-hidden">
                    <span class="inline-block ">Our Solutions</span>
                </div>
            </div>
         </div>
         <div class="cards w-1/2">
            <h1 class="text-6xl">Lorem ipsuisis incidunttaiciendis ut necessitatibus maxime quisquam saepe voluptatum dolores ea, exercitationem ratione? Corrupti incidunt, sit reprehenderit iure officiis nam nemo assumenda deleniti harum ea obcaecati natus, asperiore sed molesiciorllam. Nemo dignissimos animi incidunt est dolorum euea. Tenetur, eius incidunt molestiae, necessitatibus aliquid quisquam, ipsa corrupti nihil consequuntur facilis voluptatem inventore ipsam dolorem unde perspiciatis. Enim voluptatem atque, numquam aliquam natus, sed, doloremque ducimus laborum mollitia pariatur blanditiis magnam.</h1>
         </div>
     </div>-->
        

    
       <header class="masthead">
            <div class="container-fluid h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-8 align-self-end mb-4 page-title">
                    	<h3 class="text-white">Welcome to <?php echo $_SESSION['system']['name']; ?></h3>
                        <hr class="divider my-4" />

                    <div class="col-md-12 mb-2 justify-content-center">
                    </div>                        
                    </div>
                    
                </div>
            </div>
        </header>
            <div class="container mt-3 pt-2">
                <h4 class="text-center text-white">Upcoming Events</h4>
                <hr class="divider">
                <?php
                $event = $conn->query("SELECT e.*,v.venue FROM events e inner join venue v on v.id=e.venue_id where date_format(e.schedule,'%Y-%m%-d') >= '".date('Y-m-d')."' and e.type = 1 order by unix_timestamp(e.schedule) asc");
                while($row = $event->fetch_assoc()):
                    $trans = get_html_translation_table(HTML_ENTITIES,ENT_QUOTES);
                    unset($trans["\""], $trans["<"], $trans[">"], $trans["<h2"]);
                    $desc = strtr(html_entity_decode($row['description']),$trans);
                    $desc=str_replace(array("<li>","</li>"), array("",","), $desc);
                ?>
                <div class="card event-list" data-id="<?php echo $row['id'] ?>">
                     <div class='banner'>
                        <?php if(!empty($row['banner'])): ?>
                            <img src="admin/assets/uploads/<?php echo($row['banner']) ?>" alt="">
                        <?php endif; ?>
                    </div>
                    <div class="card-body">
                        <div class="row  align-items-center justify-content-center text-center h-100">
                            <div class="">
                                <h3><b class="filter-txt"><?php echo ucwords($row['event']) ?></b></h3>
                                <div><small><p><b><i class="fa fa-calendar"></i> <?php echo date("F d, Y h:i A",strtotime($row['schedule'])) ?></b></p></small></div>
                                <hr>
                                <larger class="truncate filter-txt"><?php echo strip_tags($desc) ?></larger>
                                <br>
                                <hr class="divider"  style="max-width: calc(80%)">
                                <button class="btn btn-primary float-right read_more" data-id="<?php echo $row['id'] ?>">Read More</button>
                            </div>
                        </div>
                        

                    </div>
                </div>
                <br>
                <?php endwhile; ?>
                
            </div>

     



		
		


     <div data-color="black" class="real section w-full">
        <div class="cont h-[400vh] relative">
            <div class="slides sticky top-0 left-0 flex gap-20 w-full h-[100vh]">
                <div class="slide w-full flex items-center justify-center h-screen flex-shrink-0 ">
                    <div class="text font-['Poppins']">
                        <h1 class="text-8xl">Real Talk</h1>
                        <h1 class="text-8xl">Real impact</h1>
                    </div>
                    <div class="image absolute top-1/2 rounded-full overflow-hidden -translate-y-1/2 right-0 translate-x-1/2 w-[20rem] h-[20rem] bg-red-600">
                        <img class="w-full h-full object-cover" src="assets/ly2.jpeg" alt="">
                    </div>
                </div>
              
                <div class="slide w-full h-screen flex justify-center items-center flex-shrink-0 relative ">
                    <div class="img1 absolute z-[3] left-[15%] top-2/3 -translate-y-1/3 rounded-full overflow-hidden w-[15rem] h-[15rem]">
                        <img class="w-full h-full object-cover" src="asset/calm.png" alt="">
                    </div>
                    <div class="img1 absolute z-[3] left-1/2 top-0 -translate-y-1/2 -translate-x-1/2 rounded-full overflow-hidden w-[25rem] h-[25rem]">
                        <img class="w-full h-full object-cover" src="img/c3.png" alt="">
                    </div>

                    <div class="w-[60%] font-['Poppins'] text-center relative">
                        <h3 class="w-1/3 text-left font-regular top-0 left-0 leading-7 text-[1.3rem] tracking-tight -translate-y-1/2 -translate-x-1/2">WE are normal WE are perfect.Our imperfections make up perfect.</h3>
                        <h1 class="font-semibold text-[12rem] leading-none  text-white">280M</h1>
                        <h3 class="text-5xl leading-none tracking-tight">Real people ---real lives--Are facing depression.</h3>
                    </div>
                    <div class="image absolute top-1/2 rounded-full overflow-hidden -translate-y-1/2 right-0 translate-x-1/2 w-[20rem] h-[20rem] bg-red-600">
                        <img class="w-full h-full object-cover" src="assets/ly.jpeg" alt="">
                    </div>
                </div>
                <div class="slide w-full h-screen flex justify-center items-center flex-shrink-0 relative">
                    <div class="w-[60%] font-['Poppins'] text-center relative">
                        <h3 class="w-1/3 text-left font-regular top-0 left-0 leading-7 text-[1.3rem] tracking-tight -translate-y-1/2 -translate-x-1/2">Lets just focus on good. We can overcome this too and we are there to help you.</h3>
                        <h1 class="font-semibold text-[12rem] leading-none  text-white">4.5%</h1>
                        <h3 class="text-5xl leading-none tracking-tight">People in India are suffering from depression.</h3>
                    </div>
                </div>
                
            </div>
        </div>
     </div>

     <div class="csection" id="csection">
     <div data-color="white" class="team section font-['Pp_New_Machina'] py-20">
        <h1 class="text-center semibold  text-8xl tracking-tight">Our Communities</h1>
        <div class="list w-full mt-10 px-10">
            <div class="listelem border-b-2 border-black w-full py-[3rem] relative">
                <div class="relative flex item-center justify-between z-[3]">
                <div class="left flex gap-20">
                    <h3 class="text-5xl">01</h3>
                    <h1 class="text-5xl"><a href="art.html">Art Community </a></h1>
                    
                </div>
                <h3 class="text-3xl"><a href="art.html">Join us</a></h3>
                </div>
                <div class="picture opacity-0 absolute z-[4] top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[15rem] h-[15rem] overflow-hidden rounded-full bg-red-600"></div>
                <div class="bluelayer absolute z[2] bottom-0 left-0 w-full h-[0%] bg-blue-500"></div>
            </div>
              
            <div class="listelem border-b-2 border-black w-full py-[3rem] relative">
                <div class="relative flex item-center justify-between z-[3]">
                <div class="left flex gap-20">
                    <h3 class="text-5xl">02</h3>
                    <h1 class="text-5xl"><a href="art.html">Health Community</a></h1>
                </div>
                <h3 class="text-3xl">Join us</h3>
                </div>
                <div class="picture opacity-0 absolute z-[4] top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[15rem] h-[15rem] overflow-hidden rounded-full bg-red-600"></div>
                <div class="bluelayer absolute z[2] bottom-0 left-0 w-full h-[0%] bg-blue-500"></div>
            </div>
            
            <div class="listelem border-b-2 border-black w-full py-[3rem] relative">
                <div class="relative flex item-center justify-between z-[3]">
                <div class="left flex gap-20">
                    <h3 class="text-5xl">03</h3>
                    <h1 class="text-5xl">Meditation Community</h1>
                </div>
                <h3 class="text-3xl">Join us</h3>
                </div>
                <div class="picture opacity-0 absolute z-[4] top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[15rem] h-[15rem] overflow-hidden rounded-full bg-red-600"></div>
                <div class="bluelayer absolute z[2] bottom-0 left-0 w-full h-[0%] bg-blue-500"></div>
            </div>

            <div class="listelem border-b-2 border-black w-full py-[3rem] relative">
                <div class="relative flex item-center justify-between z-[3]">
                <div class="left flex gap-20">
                    <h3 class="text-5xl">04</h3>
                    <h1 class="text-5xl">Dance Community</h1>
                </div>
                <h3 class="text-3xl">Join us</h3>
                </div>
                <div class="picture opacity-0 absolute z-[4] top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[15rem] h-[15rem] overflow-hidden rounded-full bg-red-600"></div>
                <div class="bluelayer absolute z[2] bottom-0 left-0 w-full h-[0%] bg-blue-500"></div>
            </div>
        </div>

            <!-- <div class="listelem border-b-2 border-black w-full py-[3rem] relative">
                <div class="relative flex item-center justify-between z-[3]">
                <div class="left flex gap-20">
                    <h3 class="text-5xl">05</h3>
                    <h1 class="text-5xl">Dr.Rick Mac</h1>
                </div>
                <h3 class="text-3xl">CEO</h3>
                </div>
                <div class="picture hidden absolute z-[4] top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[15rem] h-[15rem] overflow-hidden rounded-full bg-red-600"></div>
                <div class="bluelayer absolute z[2] bottom-0 left-0 w-full h-[0%] bg-blue-500"></div>
            </div> -->

           
        </div>


   </div> 
   <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js" 
   integrity="sha512-7eHRwcbYkK4d9g/6tD/mhkf++eoTHwpNM9woBxtPUBWm67zeAfFC+HrdoE2GanKeocly/VxeLvIqwvCdk7qScg=="
   crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js" 
   integrity="sha512-onMTRKJBKz8M1TnqqDuGBlowlH0ohFzMXYRNebz+yOcc5TQr/zAKsthzhuv0hiyUKEiQEQXEynnXCvNTOk50dg==" 
   crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <script src="https://cdn.jsdelivr.net/npm/locomotive-scroll@beta/bundled/locomotive-scroll.min.js"></script>
   <script src="js/script.js"></script>
   <script src="js/custom.js"></script>
<script>
     $('.read_more').click(function(){
         location.href = "index.php?page=view_event&id="+$(this).attr('data-id')
     })
     $('.banner img').click(function(){
        viewer_modal($(this).attr('src'))
    })
    $('#filter').keyup(function(e){
        var filter = $(this).val()

        $('.card.event-list .filter-txt').each(function(){
            var txto = $(this).html();
            txt = txto
            if((txt.toLowerCase()).includes((filter.toLowerCase())) == true){
                $(this).closest('.card').toggle(true)
            }else{
                $(this).closest('.card').toggle(false)
               
            }
        })
    })
</script>
</body>
</html>