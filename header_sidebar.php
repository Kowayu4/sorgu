<?php
ini_set("display_errors", 0);
error_reporting(0);

include "../server/security/encrypt.php";
include "../server/baglan.php";

$krolid = $_SESSION["id"];
$krolresult = $conn->query("SELECT * FROM sh_kullanici WHERE id='$krolid'");
if ($krolresult->num_rows < 1) {
    header("Location: /logout");
    exit;
}
$krolarray = mysqli_fetch_array($krolresult);
$k_rol = $krolarray["k_rol"];
$checkID = $krolarray["id"];

?>

<style>
    .page-sidebar .accordion_menu {
  margin-top: 20px;
  height: calc(100% - 141px) !important;
  padding: 10px 15px;
}

.page-sidebar .accordion_menu > li > a {
  display: block;
  color: #fff;
  -webkit-transition: all 0.1s ease-in-out;
  -moz-transition: all 0.1s ease-in-out;
  -o-transition: all 0.1s ease-in-out;
  transition: all 0.1s ease-in-out;
  line-height: 45px;
  padding: 0 15px;
  text-decoration: none;
}

.page-sidebar .accordion_menu > li.active-page > a {
  color: #83d8ae;
  font-weight: 500;
}

.page-sidebar .accordion_menu > li.active-page > a > svg {
  color: #83d8ae !important;
}

.page-sidebar .accordion_menu > li.active-page ul li a.active {
  color: #fff;
}

.page-sidebar .accordion_menu > li > a:hover svg {
  margin-left: 5px;
}

.page-sidebar .accordion_menu > li > a > svg {
  width: 21px;
  height: 21px;
  line-height: 40px;
  text-align: center;
  vertical-align: text-top;
  color: #9a9cab;
  margin-right: 15px;
  -webkit-transition: all 0.2s ease-in-out;
  -moz-transition: all 0.2s ease-in-out;
  -o-transition: all 0.2s ease-in-out;
  transition: all 0.2s ease-in-out;
}

.page-sidebar .accordion_menu li.sidebar-title {
  font-weight: 500;
  padding: 10px 15px;
  font-size: 0.875rem;
  color: #6c757d;
  opacity: 0.8;
}

.page-sidebar .accordion_menu li a .dropdown-icon {
  float: right;
  vertical-align: middle;
  line-height: 44px;
  font-size: 10px;
  -webkit-transition: all 0.2s ease-in-out;
  -moz-transition: all 0.2s ease-in-out;
  -o-transition: all 0.2s ease-in-out;
  transition: all 0.2s ease-in-out;
}

.page-sidebar .accordion_menu li.open > a > .dropdown-icon {
  visibility: visible;
  transform: rotate(90deg);
}

.page-sidebar .accordion_menu li ul {
  padding: 5px 0;
  list-style: none;
}

.page-sidebar .accordion_menu li ul li a {
  color: #9a9cab;
  display: block;
  padding: 5px 15px;
  font-size: 14px;
  position: relative;
  -webkit-transition: all 0.15s ease-in-out;
  -moz-transition: all 0.15s ease-in-out;
  -o-transition: all 0.15s ease-in-out;
  transition: all 0.15s ease-in-out;
  text-decoration: none;
}

.page-sidebar .accordion_menu li ul li a:hover {
  margin-left: 5px;
}

.page-sidebar .accordion_menu li ul li a i {
  font-size: 10px;
  padding-right: 21px;
  padding-left: 6px;
}

@media (min-width: 1350px) {


  .page-sidebar-collapsed .page-sidebar .accordion_menu {
    padding: 0;
    overflow: visible;
    position: absolute !important;
    height: auto !important;
    top: 50%;
    transform: translateY(-50%);
    margin-top: 0;
  }

  .page-sidebar-collapsed .page-sidebar .accordion_menu > li > a {
    font-size: 0;
  }

  .page-sidebar-collapsed .page-sidebar .accordion_menu > li > a {
    text-align: center;
    padding: 8px;
    width: 80px;
  }

  .page-sidebar-collapsed
    .page-sidebar
    .accordion_menu
    > li
    > a
    > .dropdown-icon {
    display: none;
  }

  .page-sidebar-collapsed .page-sidebar .accordion_menu > li > a > svg {
    margin: 0;
    vertical-align: middle;
  }

  .page-sidebar-collapsed .page-sidebar .accordion_menu > li {
    position: relative;
  }

  .page-sidebar-collapsed .page-sidebar .accordion_menu > li > a + ul {
    display: block !important;
    position: absolute;
    margin-left: 0;
    top: -15px;
    left: 110px;
    padding: 20px 0;
    background: #1f1f2b;
    box-shadow: 0 0 11px 1px rgba(0, 0, 0, 0.05);
    -webkit-box-shadow: 0 0 11px 1px rgba(0, 0, 0, 0.05);
    -moz-box-shadow: 0 0 11px 1px rgba(0, 0, 0, 0.05);
    min-width: 200px;
    opacity: 0;
    visibility: hidden;
    border-radius: 15px;
    -webkit-transition: all 0.2s ease-in-out;
    -moz-transition: all 0.2s ease-in-out;
    -o-transition: all 0.2s ease-in-out;
    transition: all 0.2s ease-in-out;
  }

  .page-sidebar-collapsed .page-sidebar .accordion_menu > li > a + ul::after {
    position: absolute;
    top: 40px;
    left: -7px;
    right: auto;
    display: inline-block !important;
    border-right: 7px solid #1f1f2b;
    border-bottom: 7px solid transparent;
    border-top: 7px solid transparent;
    content: "";
  }

  .page-sidebar-collapsed .page-sidebar .accordion_menu > li:hover > ul,
  .page-sidebar-collapsed .page-sidebar .accordion_menu > li > a:hover + ul {
    height: auto;
    visibility: visible;
    opacity: 1;
    left: 120px;
  }

  .page-sidebar-collapsed .page-sidebar .accordion_menu > li:hover {
    width: calc(100% + 30px);
  }

  .page-sidebar-collapsed .page-sidebar .accordion_menu > li:hover > a > svg {
    color: #83d8ae;
  }}

.element::-webkit-scrollbar { width: 0 !important }

.card{
            box-shadow: 20px 20px 50px rgba(0, 0, 0, 0.5);
	        border-radius: 15px;
	        background: rgba(255, 255, 255, 0.1);
	        border-top: 1px solid rgba(255, 255, 255, 0.5);
	        border-left: 1px solid rgba(255, 255, 255, 0.5);
	        backdrop-filter: blur(5px);}


            .list-unstyled ul li ul{
                color: #fff;
            }


            .white{
                color:#fff;
            }
            .MatrixLogo {
            margin-right: 0;
            width: auto;
            height: 15px;
            margin: 10px auto;
            display: block;
            text-align: center;
            font-size: 10px;
            font-weight: 100;
        }

</style>
<div class="page-container">
    <div class="page-sidebar card">
        <img style="height: 180px;"alt="image" src="../assets/images/matrix.png" class="MatrixLogo">
        <ul class="list-unstyled accordion-menu overflow-auto element">
            <li <?php if ($page_title == 'Panel') {
                    echo 'class="active-page"';
                } ?>>
                <a style="color:#fff;" href="/panel"><i style="color:#fff;" data-feather="home"></i>Anasayfa</a>
            </li>
            <li style="border-radius: 2px; margin-bottom:3px; border-top-style:solid" <?php
                if (
                    $page_title === "US CC Checker" ||
                    $page_title === "CC Derleyici"
                ) {
                    echo 'class="open"';
                }
                ?>>
                <a style="color:#fff;" <?php
                    if (
                        $page_title === "US CC Checker" ||
                        $page_title === "CC Derleyici"
                    ) {
                        echo 'style="color: white;"';
                    }
                    ?> href="#"><svg style="color: #fff;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-type">
                        <polyline points="4 7 4 4 20 4 20 7" />
                        <line x1="9" y1="20" x2="15" y2="20" />
                        <line x1="12" y1="4" x2="12" y2="20" />
                    </svg>CC Checker<i class="fas fa-chevron-right dropdown-icon"></i></a>
                <ul>
                    <li><a style="color: #fff;" <?php if ($page_title === "US CC Checker") echo 'style="color: #83d8ae !important;"' ?> href="/uschecker"> <img style="width: 15px; margin-right: 5px" src="../assets/images/matrix.png" alt=""> US CC Checker</a></li>
                    <li><a style="color: #fff;" <?php if ($page_title === "CC Derleyici") echo 'style="color: #83d8ae !important;"' ?> href="/derleyici"> <img style="width: 15px; margin-right: 5px" src="../assets/images/matrix.png" alt=""> CC Derleyici</a></li>
                </ul>
            </li>
            <li style="border-radius: 2px; margin-bottom:3px; border-top-style:solid" <?php
                if (
                    $page_title === "Ad Soyad" ||
                    $page_title === "Ad Soyad PRO" ||
                    $page_title === "TC Sorgu" ||
                    $page_title === "TC Sorgu PRO" ||
                    $page_title === "Seri No Sorgu" ||
                    $page_title === "Aile Sorgu" ||
                    $page_title === "Tapu Sorgu" ||
                    $page_title === "İşyeri Sorgu" ||
                    $page_title === "Okul Sorgu" ||
                    $page_title === "Sınıf Sorgu" ||
                    $page_title === "Vesikalık Sorgu" ||
                    $page_title === "GSM Sorgu"
                ) {
                    echo 'class="open"';
                }
                ?>>
                <a style="color:#fff;" <?php
                    if (
                        $page_title === "Ad Soyad" ||
                        $page_title === "Ad Soyad PRO" ||
                        $page_title === "TC Sorgu" ||
                        $page_title === "TC Sorgu PRO" ||
                        $page_title === "Seri No Sorgu" ||
                        $page_title === "Aile Sorgu" ||
                        $page_title === "Tapu Sorgu" ||
                        $page_title === "İşyeri Sorgu" ||
                        $page_title === "Okul Sorgu" ||
                        $page_title === "Sınıf Sorgu" ||
                        $page_title === "Vesikalık Sorgu" ||
                        $page_title === "GSM Sorgu"
                    ) {
                        echo 'style="color: white;"';
                    }
                    ?> href="#"><svg style="color: #fff;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>Sorgular<i class="fas fa-chevron-right dropdown-icon"></i></a>
                <ul>
                    <li ><a style="color: #fff" <?php if ($page_title === "Ad Soyad") echo 'style="color: #fff !important;"' ?> href="/adsoyad"><img style="width: 15px; margin-right: 5px" src="../assets/images/matrix.png" alt="">Ad Soyad</a></li>
                    <li ><a style="color: #fff" <?php if ($page_title === "Ad Soyad PRO") echo 'style="color: #fff !important;"' ?> href="/proadsoyad"><img style="width: 15px; margin-right: 5px" src="../assets/images/matrix.png" alt="">Ad Soyad PRO</a></li>
                    <li><a style="color: #fff" <?php if ($page_title === "TC Sorgu") echo 'style="color: #83d8ae !important;"' ?> href="/tcsorgu"><img style="width: 15px; margin-right: 5px" src="../assets/images/matrix.png" alt="">TC Sorgu</a></li>
                    <li><a style="color: #fff" <?php if ($page_title === "TC Sorgu Pro") echo 'style="color: #83d8ae !important;"' ?> href="/protcsorgu"><img style="width: 15px; margin-right: 5px" src="../assets/images/matrix.png" alt="">TC Sorgu Pro</a></li>
                    <li><a style="color: #fff" <?php if ($page_title === "Seri No") echo 'style="color: #83d8ae !important;"' ?> href="/serino"><img style="width: 15px; margin-right: 5px" src="../assets/images/matrix.png" alt="">Seri No Sorgu</a></li>
                    <li><a style="color: #fff" <?php if ($page_title === "Aile Sorgu") echo 'style="color: #83d8ae !important;"' ?> href="/aile"><img style="width: 15px; margin-right: 5px" src="../assets/images/matrix.png" alt="">Aile Sorgu</a></li>
                    <li><a style="color: #fff" <?php if ($page_title === "Tapu Sorgu") echo 'style="color: #83d8ae !important;"' ?> href="/tapu"><img style="width: 15px; margin-right: 5px" src="../assets/images/matrix.png" alt="">Tapu Sorgu</a></li>
                    <li><a style="color: #fff" <?php if ($page_title === "İşyeri Sorgu") echo 'style="color: #83d8ae !important;"' ?> href="/isyeri"><img style="width: 15px; margin-right: 5px" src="../assets/images/matrix.png" alt=""></i>İşyeri Sorgu</a></li>
                    <li><a style="color: #fff" <?php if ($page_title === "Okul Sorgu") echo 'style="color: #83d8ae !important;"' ?> href="/okul"><img style="width: 15px; margin-right: 5px" src="../assets/images/matrix.png" alt=""></i>Okul Sorgu</a></li>
                    <li><a style="color: #fff" <?php if ($page_title === "Sınıf Sorgu") echo 'style="color: #83d8ae !important;"' ?> href="/sinif"><img style="width: 15px; margin-right: 5px" src="../assets/images/matrix.png" alt=""></i>Sınıf Sorgu</a></li>
                    <li><a style="color: #fff" <?php if ($page_title === "Vesikalık Sorgu") echo 'style="color: #83d8ae !important;"' ?> href="/vesikalik"><img style="width: 15px; margin-right: 5px" src="../assets/images/matrix.png" alt=""></i>Vesikalık Sorgu</a></li>
                    <li><a style="color: #fff" <?php if ($page_title === "GSM Sorgu") echo 'style="color: #83d8ae !important;"' ?> href="/tcgsm"><img style="width: 15px; margin-right: 5px" src="../assets/images/matrix.png" alt=""></i>GSM Sorgu</a></li>
                </ul>
            </li>
            <li style="border-radius: 2px; margin-bottom:3px; border-top-style:solid" <?php
                if (
                        $page_title === "Ad Soyad 25M" ||
                        $page_title === "2015 Sorgu" ||
                        $page_title === "2009 Sorgu" ||
                        $page_title === "Facebook" ||
                        $page_title === "GSM TC" ||
                        $page_title === "TTnet" ||
                        $page_title === "15M GSM"
                ) {
                    echo 'class="open"';
                }
                ?>>
                <a style="color:#fff;" <?php
                    if (
                        $page_title === "Ad Soyad 25M" ||
                        $page_title === "2015 Sorgu" ||
                        $page_title === "2009 Sorgu" ||
                        $page_title === "Facebook" ||
                        $page_title === "GSM TC" ||
                        $page_title === "TTnet" ||
                        $page_title === "15M GSM"
                    ) {
                        echo 'style="color: white;"';
                    }
                    ?> href="#"><svg style="color: #fff;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-database">
                        <ellipse cx="12" cy="5" rx="9" ry="3" />
                        <path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3" />
                        <path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5" />
                    </svg>Veritabanı<i class="fas fa-chevron-right dropdown-icon"></i></a>
                <ul>
                    <li><a style="color:#fff;" <?php if ($page_title === "Ad Soyad 25M") echo 'style="color: #83d8ae !important;"' ?> href="/25madsoyad"><img style="width: 15px; margin-right: 5px" src="../assets/images/matrix.png" alt="">Ad Soyad 25M</a></li>
                    <li><a style="color:#fff;" <?php if ($page_title === "2015 Sorgu") echo 'style="color: #83d8ae !important;"' ?> href="/2015sorgu"><img style="width: 15px; margin-right: 5px" src="../assets/images/matrix.png" alt="">2015 Sorgu</a></li>
                    <li><a style="color:#fff;" <?php if ($page_title === "2009 Sorgu") echo 'style="color: #83d8ae !important;"' ?> href="/2009sorgu"><img style="width: 15px; margin-right: 5px" src="../assets/images/matrix.png" alt="">2009 Sorgu</a></li>
                    <li><a style="color:#fff;" <?php if ($page_title === "Facebook") echo 'style="color: #83d8ae !important;"' ?> href="/facebook"><img style="width: 15px; margin-right: 5px" src="../assets/images/matrix.png" alt="">Facebook</a></li>
                    <li><a style="color:#fff;" <?php if ($page_title === "GSM TC") echo 'style="color: #83d8ae !important;"' ?> href="/gsmtc"><img style="width: 15px; margin-right: 5px" src="../assets/images/matrix.png" alt="">GSM TC</a></li>
                    <li><a style="color:#fff;" <?php if ($page_title === "TTnet") echo 'style="color: #83d8ae !important;"' ?> href="/ttnet"><img style="width: 15px; margin-right: 5px" src="../assets/images/matrix.png" alt="">TTnet</a></li>
                    <li><a style="color:#fff;" <?php if ($page_title === "15M GSM") echo 'style="color: #83d8ae !important;"' ?> href="/15mgsm"><img style="width: 15px; margin-right: 5px" src="../assets/images/matrix.png" alt="">15M GSM</a></li>

                </ul>
            </li>
            <?php if ($k_rol === "1") { ?>
                <li style="border-radius: 2px; margin-bottom:3px; border-top-style:solid" <?php
                    if (
                        $page_title === "User Manager" ||
                        $page_title === "User Settings" ||
                        $page_title === "Notice Sharing" ||
                        $page_title === "Kullanıcı Ekle" ||
                        $page_title === "Duyuru Düzenle" ||
                        $page_title === "Zaman Aşımı"
                    ) {
                        echo 'class="open"';
                    }
                    ?>>
                    <a style="color:#fff;" <?php
                        if (
                            $page_title === "User Manager" ||
                            $page_title === "User Settings" ||
                            $page_title === "Notice Sharing" ||
                            $page_title === "Kullanıcı Ekle" ||
                            $page_title === "Duyuru Düzenle" ||
                            $page_title === "Zaman Aşımı"
                        ) {
                            echo 'style="color: white;"';
                        }
                        ?> href="/users"><i style="color: #fff;" data-feather="lock"></i>Admin <i class="fas fa-chevron-right dropdown-icon"></i></a>
                    <ul>
                        <li>
                            <a style="color: #fff;" <?php
                                if (
                                    $page_title === "Notice Sharing" ||
                                    $page_title === "Duyuru Düzenle"
                                ) {
                                    echo 'style="color: #83d8ae !important;"';
                                }
                                ?> href="/notice" class="active"><img style="width: 15px; margin-right: 5px" src="../assets/images/matrix.png" alt="">Duyurular</a>
                        </li>
                        <li>
                            <a style="color: #fff;" <?php
                                if (
                                    $page_title === "User Manager" ||
                                    $page_title === "User Settings"
                                ) {
                                    echo 'style="color: #83d8ae !important;"';
                                }
                                ?> href="/users" class="active"><img style="width: 15px; margin-right: 5px" src="../assets/images/matrix.png" alt="">Kullanıcılar</a>
                        </li>
                        <li>
                            <a style="color: #fff;" class="white" <?php
                                if ($page_title === "Kullanıcı Ekle") {
                                    echo 'style="color: #83d8ae !important;"';
                                }
                                ?> href="/adduser" class="active"><img style="width: 15px; margin-right: 5px" src="../assets/images/matrix.png" alt="">Kullanıcı Ekle</a>
                        </li>
                        <li>
                            <a style="color: #fff;" <?php
                                if (
                                    $page_title === "Zaman Aşımı" ||
                                    $page_title === "Timeout"
                                ) {
                                    echo 'style="color: #83d8ae !important;"';
                                }
                                ?> href="/timeout" class="active"><img style="width: 15px; margin-right: 5px" src="../assets/images/matrix.png" alt="">Zaman Aşımı</a>
                        </li>
                    </ul>
                </li>
            <?php } ?>
        </ul>
    </div>