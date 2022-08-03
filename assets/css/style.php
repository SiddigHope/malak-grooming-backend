<style>
    .navbar-default{
/*  background-color: #DEE3E9 !important;
    color: #FFFFFF !important;*/
    -webkit-box-shadow: 3px 9px 58px -17px rgba(0,0,0,1);
-moz-box-shadow: 3px 9px 58px -17px rgba(0,0,0,1);
box-shadow: 3px 9px 58px -17px rgba(0,0,0,1);
}

body {
    padding-top: 60px;
}

#login-dp {
    min-width: 250px;
    padding: 14px 14px 0;
    overflow: hidden;
    background-color: rgba(255, 255, 255, .8);
}

#login-dp .help-block {
    font-size: 12px
}

#login-dp .bottom {
    background-color: rgba(255, 255, 255, .8);
    border-top: 1px solid #ddd;
    clear: both;
    padding: 14px;
}

#login-dp .social-buttons {
    margin: 12px 0
}

#login-dp .social-buttons a {
    width: 49%;
}

#login-dp .form-group {
    margin-bottom: 10px;
}

.btn-fb {
    color: #fff;
    background-color: #3b5998;
}

.btn-fb:hover {
    color: #fff;
    background-color: #496ebc
}

.btn-tw {
    color: #fff;
    background-color: #55acee;
}

.btn-tw:hover {
    color: #fff;
    background-color: #59b5fa;
}

@media(max-width:768px) {
    #login-dp {
        background-color: inherit;
        color: #fff;
    }
    #login-dp .bottom {
        background-color: inherit;
        border-top: 0 none;
    }
}


/* Credit to bootsnipp.com for the css for the color graph */

.colorgraph {
    height: 5px;
    border-top: 0;
    background: #c4e17f;
    border-radius: 5px;
    background-image: -webkit-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
    background-image: -moz-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
    background-image: -o-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
    background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
}

.form-material {
    width: 50%;
    margin: 0 auto;
    background-color: #fff;
    padding: 16px;
    box-shadow: 0 12px 15px 0 rgba(0, 0, 0, 0.24);
}

/*sign up*/
/*#wrap{
background-repeat: no-repeat;
background-attachment: fixed;
}
legend{
    color:#141823;
    font-size:25px;
    font-weight:bold;
}*/
.signup-btn {
    background: #79bc64;
    background-image: -webkit-linear-gradient(top, #79bc64, #578843);
    background-image: -moz-linear-gradient(top, #79bc64, #578843);
    background-image: -ms-linear-gradient(top, #79bc64, #578843);
    background-image: -o-linear-gradient(top, #79bc64, #578843);
    background-image: linear-gradient(to bottom, #79bc64, #578843);
    -webkit-border-radius: 4;
    -moz-border-radius: 4;
    border-radius: 4px;
    text-shadow: 0px 1px 0px #898a88;
    -webkit-box-shadow: 0px 0px 0px #a4e388;
    -moz-box-shadow: 0px 0px 0px #a4e388;
    box-shadow: 0px 0px 0px #a4e388;
    font-family: Arial;
    color: #ffffff;
    font-size: 20px;
    padding: 10px 20px 10px 20px;
    border: solid #3b6e22  1px;
    text-decoration: none;
}

.signup-btn:hover {
    background: #79bc64;
    background-image: -webkit-linear-gradient(top, #79bc64, #5e7056);
    background-image: -moz-linear-gradient(top, #79bc64, #5e7056);
    background-image: -ms-linear-gradient(top, #79bc64, #5e7056);
    background-image: -o-linear-gradient(top, #79bc64, #5e7056);
    background-image: linear-gradient(to bottom, #79bc64, #5e7056);
    text-decoration: none;
}
.navbar-default .navbar-brand{
        color:#fff;
        font-size:30px;
        font-weight:bold;
    }
.form .form-control { margin-bottom: 10px; }
@media (min-width:768px) {
    #home{
        margin-top:50px;
    }
    #home .slogan{
        color: #0e385f;
        line-height: 29px;
        font-weight:bold;
    }
}

.navbar{
    margin-bottom: 0px !important;
}

/*admins*/
body{
    /* background: url(manager/assets/malak.png) no-repeat center center fixed; */
    -webkit-background-size: cover;
    background-color:black;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;


}
html,body{
    position: relative;
    height: 100%;
}

.login-container{
    position: relative;
    width: 300px;
    margin: 80px auto;
    padding: 20px 40px 40px;
    text-align: center;
    background: #444;
    border: 1px solid #ccc;
}

#output{
    position: absolute;
    width: 300px;
    top: -75px;
    left: 0;
    color: #fff;
}

#output.alert-success{
    background: rgb(25, 204, 25);
}

#output.alert-danger{
    background: rgb(228, 105, 105);
}


.login-container::before,.login-container::after{
    content: "";
    position: absolute;
    width: 100%;height: 100%;
    top: 3.5px;left: 0;
    background: #444;
    z-index: -1;
    -webkit-transform: rotateZ(4deg);
    -moz-transform: rotateZ(4deg);
    -ms-transform: rotateZ(4deg);
    border: 1px solid #ccc;

}

.login-container::after{
    top: 5px;
    z-index: -2;
    -webkit-transform: rotateZ(-2deg);
        -moz-transform: rotateZ(-2deg);
        -ms-transform: rotateZ(-2deg);

}

.avatar{
    width: 270px;
    height: 101px;
    /* background-image:url(manager/assets/malak.png) contain ; */
    margin: 0px auto 30px;
    border-radius: 10%;
    border: 2px solid #aaa;
    background-size: cover;
    position: relative;
    left: -25px;
}

.form-box input,.selection{
    width: 100%;
    padding: 10px;
    text-align: center;
    height:40px;
    border: 1px solid #ccc;;
    background: #fafafa;
    transition:0.2s ease-in-out;

}

.form-box input:focus{
    outline: 0;
    background: #eee;
}



.form-box input[type="password"]{
    border-radius: 0 0 5px 5px;
    border-top: 0;
}

.form-box button.login{
    margin-top:15px;
    padding: 10px 20px;
}

.animated {
    -webkit-animation-duration: 1s;
    animation-duration: 1s;
    -webkit-animation-fill-mode: both;
    animation-fill-mode: both;
}

@-webkit-keyframes fadeInUp {
    0% {
    opacity: 0;
    -webkit-transform: translateY(20px);
    transform: translateY(20px);
    }

    100% {
    opacity: 1;
    -webkit-transform: translateY(0);
    transform: translateY(0);
    }
}

@keyframes fadeInUp {
    0% {
    opacity: 0;
    -webkit-transform: translateY(20px);
    -ms-transform: translateY(20px);
    transform: translateY(20px);
    }

    100% {
    opacity: 1;
    -webkit-transform: translateY(0);
    -ms-transform: translateY(0);
    transform: translateY(0);
    }
}

.fadeInUp {
    -webkit-animation-name: fadeInUp;
    animation-name: fadeInUp;
}

/*admin end*/
</style>