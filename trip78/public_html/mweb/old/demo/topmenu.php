<?php include_once("header.php");?>
<style>
.wfull {
    width: 100% !important;
}
z10 {
    z-index: 10;
}
.relative {
    position: relative !important;
}
.fonts-loaded * {
    font-family: Lato,sans-serif !important;
}
header {
    position: relative;
    box-shadow: none;
    margin: 0;
padding: 0;
border: 0;
outline: 0;
background: transparent;
font-size: 100%;
}
.homePage .header-con-transparent {
    padding: 16px 10px;
        padding-right: 10px;
        padding-left: 10px;
}
.pr5 {
    padding-right: 5px !important;
}
.pl5 {
    padding-left: 5px !important;
}
.sbcw{
    background-color: #fff;
}
.header-con-transparent {
    background: transparent;
        background-color: transparent;
    padding: 12px 10px;
    position: relative;
}
.flex {
    display: flex !important;
}
.spaceBetween {
    justify-content: space-between;
}
.header-con-first {
    height: 22px;
    padding-left: 10px;
    padding-right: 10px;
}
.burger-menu {
    width: 20px;
    height: 16px;
    float: left;
    padding-top: 2px;
}

element {

}
.fonts-loaded * {

    font-family: Lato,sans-serif !important;

}
.burger-menu-input {

    display: none;

}
.burger-menu-input + label {
    display: block;
}
.burger-menu.dark .sidenav-link {
    border-top-color: #3e3e3e;
    border-bottom-color: #3e3e3e;
}
.burger-menu .sidenav-link {
    width: 20px;
    height: 14px;
    display: block;
    border-top: 1px solid #fff;
        border-top-color: rgb(255, 255, 255);
    border-bottom: 1px solid #fff;
        border-bottom-color: rgb(255, 255, 255);
    position: relative;
}
.sidenav-blacklayer, .sidenav-container {
    height: 100%;
    left: 0;
    top: 0;
    position: fixed;
    display: none;
}
.sidenav-container {
    width: 280px;
    background: #fff;
    bottom: 0;
    z-index: 21;
    overflow: auto;
}
.alignCenter {
    align-items: center;
}
.flex {
    display: flex !important;
}
mb8 {
    margin-bottom: 8px !important;
}.pb24 {
    padding-bottom: 24px !important;
}
.pt24 {
    padding-top: 24px !important;
}
.sbc5 {
    background-color: #efefef;
}
.sfcw {
    color: #fff;
}
a, a.link-pri {
    text-decoration: none;
}
.radius100{
    border-radius: 50%;
}
.user-img-loggedin {
    width: 64px;
    height: 64px;
    background: #ccc;
    overflow: hidden;
}
</style>
<header class="wfull z10 relative">
    <div class="header-con-transparent sbcw pl5 pr5">
        <div class="header-con-first flex spaceBetween">
            <div class="burger-menu dark">
                <input type="checkbox" value="sidenav" class="burger-menu-input" id="burgerMenu" />
                <label for="burgerMenu">
                    <span class="sidenav-link at_sidenav"></span>
                    <div class="sidenav-container">
                        <div class="row row-">
                            <div class="sbc5 flex pt24 pl15 pr15 pb24 mb8 alignCenter">
                                <a href="/users/sign_in" class="sfcw">
                                    <div class="user-img-loggedin radius100">
                                        <img
                                            src="https://img.traveltriangle.com/public-product/homepage_illustrations/v2/GuestAvatar.png?tr=w-144,h-144"
                                            data-src="https://img.traveltriangle.com/public-product/homepage_illustrations/v2/GuestAvatar.png?tr=w-144,h-144"
                                            alt="user"
                                            data-defer-load="false"
                                            style="min-width: 100%; min-height: 100%;"
                                        />
                                    </div>
                                </a>
                                <div class="flex flexDColumn ml15">
                                    <a href="/users/sign_in" class="mb8"><p class="f16 ellipsis pfc3 text-capitalize fw7">Guest</p></a>
                                    <a class="at_signUp ripple border radius2 p8 pfc3" href="/users/sign_in">
                                        <div class="wave-dark"></div>
                                        Login/Sign up
                                    </a>
                                </div>
                            </div>
                            <div class="p8 booked-notification-con"></div>
                            <div class="row row-" itemscope="" itemtype="https://schema.org/SiteNavigationElement">
                                <div class="row row- mb32">
                                    <ul class="list-side-menu">
                                        <li>
                                            <div id="Packages">
                                                <div class="wfull relative flex alignCenter spaceBetween">
                                                    <div class="absolute t3 l15 css-bxm7ha">
                                                        <svg viewBox="0 0 24 24" class="icon shape-codepen"><use xlink:href="/mobile_assets/build/icons-svg-189780356f4c47427ddd341d01c8baea.svg#Desert-usage"></use></svg>
                                                    </div>
                                                    <div class="flexFull list-side-menu-title-icon"><p class="pfc3 at_menu_dynamicLinks at_menu_packages">Packages</p></div>
                                                    <div class="arrowIconContainer flex alignCenter justifyCenter mr8 css-ithvic">
                                                        <svg viewBox="0 0 10 6" class="icon shape-codepen"><use xlink:href="/mobile_assets/build/icons-svg-189780356f4c47427ddd341d01c8baea.svg#DownArrow-usage"></use></svg>
                                                    </div>
                                                </div>
                                                <div class="moduleSub hide">
                                                    <div>
                                                        <div id="Tour Packages">
                                                            <div class="wfull relative flex alignCenter spaceBetween">
                                                                <div class="flexFull list-side-menu-title">
                                                                    <span>
                                                                        <span>
                                                                            <meta itemprop="name" content="Tour Packages" />
                                                                            <a class="pfc3 at_menu_dynamicLinks at_menu_tour_packages" itemprop="url" content="/tour-packages" href="/tour-packages">Tour Packages</a>
                                                                        </span>
                                                                    </span>
                                                                </div>
                                                                <div class="arrowIconContainer flex alignCenter justifyCenter mr8 css-ithvic">
                                                                    <svg viewBox="0 0 10 6" class="icon shape-codepen"><use xlink:href="/mobile_assets/build/icons-svg-189780356f4c47427ddd341d01c8baea.svg#DownArrow-usage"></use></svg>
                                                                </div>
                                                            </div>
                                                            <div class="moduleSub hide">
                                                                <div>
                                                                    <div id="Indian Destinations">
                                                                        <div class="wfull relative flex alignCenter spaceBetween">
                                                                            <div class="flexFull list-side-menu-title">
                                                                                <span>
                                                                                    <span>
                                                                                        <meta itemprop="name" content="Indian Destinations" />
                                                                                        <a class="pfc3 at_menu_dynamicLinks at_menu_indian_destinations" itemprop="url" content="/tour-packages/india" href="/tour-packages/india">
                                                                                            Indian Destinations
                                                                                        </a>
                                                                                    </span>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="moduleSub hide"></div>
                                                                        <div class="moduleSub hide">
                                                                            <div>
                                                                                <ul>
                                                                                    <li class="pl24 pr15 pb8 pt8">
                                                                                        <span>
                                                                                            <meta itemprop="name" content="Kerala" />
                                                                                            <a class="pfc3 at_menu_dynamicLinks at_menu_kerala" itemprop="url" content="/tour-packages/kerala" href="/tour-packages/kerala">Kerala</a>
                                                                                        </span>
                                                                                    </li>
                                                                                    <li class="pl24 pr15 pb8 pt8">
                                                                                        <span>
                                                                                            <meta itemprop="name" content="Goa" />
                                                                                            <a class="pfc3 at_menu_dynamicLinks at_menu_goa" itemprop="url" content="/tour-packages/goa" href="/tour-packages/goa">Goa</a>
                                                                                        </span>
                                                                                    </li>
                                                                                    <li class="pl24 pr15 pb8 pt8">
                                                                                        <span>
                                                                                            <meta itemprop="name" content="Himachal" />
                                                                                            <a class="pfc3 at_menu_dynamicLinks at_menu_himachal" itemprop="url" content="/tour-packages/himachal" href="/tour-packages/himachal">Himachal</a>
                                                                                        </span>
                                                                                    </li>
                                                                                    <li class="pl24 pr15 pb8 pt8">
                                                                                        <span>
                                                                                            <meta itemprop="name" content="Sikkim" />
                                                                                            <a class="pfc3 at_menu_dynamicLinks at_menu_sikkim" itemprop="url" content="/tour-packages/sikkim" href="/tour-packages/sikkim">Sikkim</a>
                                                                                        </span>
                                                                                    </li>
                                                                                    <li class="pl24 pr15 pb8 pt8">
                                                                                        <span>
                                                                                            <meta itemprop="name" content="Uttarakhand" />
                                                                                            <a class="pfc3 at_menu_dynamicLinks at_menu_uttarakhand" itemprop="url" content="/tour-packages/uttarakhand" href="/tour-packages/uttarakhand">
                                                                                                Uttarakhand
                                                                                            </a>
                                                                                        </span>
                                                                                    </li>
                                                                                    <li class="pl24 pr15 pb8 pt8">
                                                                                        <span>
                                                                                            <meta itemprop="name" content="Kashmir" />
                                                                                            <a class="pfc3 at_menu_dynamicLinks at_menu_kashmir" itemprop="url" content="/tour-packages/kashmir" href="/tour-packages/kashmir">Kashmir</a>
                                                                                        </span>
                                                                                    </li>
                                                                                    <li class="pl24 pr15 pb8 pt8">
                                                                                        <span>
                                                                                            <meta itemprop="name" content="Andaman" />
                                                                                            <a class="pfc3 at_menu_dynamicLinks at_menu_andaman" itemprop="url" content="/tour-packages/andaman" href="/tour-packages/andaman">Andaman</a>
                                                                                        </span>
                                                                                    </li>
                                                                                    <li class="pl24 pr15 pb8 pt8">
                                                                                        <span>
                                                                                            <meta itemprop="name" content="Rajasthan" />
                                                                                            <a class="pfc3 at_menu_dynamicLinks at_menu_rajasthan" itemprop="url" content="/tour-packages/rajasthan" href="/tour-packages/rajasthan">
                                                                                                Rajasthan
                                                                                            </a>
                                                                                        </span>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <div id="International Destinations">
                                                                        <div class="wfull relative flex alignCenter spaceBetween">
                                                                            <div class="flexFull list-side-menu-title">
                                                                                <span>
                                                                                    <span>
                                                                                        <meta itemprop="name" content="International Destinations" />
                                                                                        <a
                                                                                            class="pfc3 at_menu_dynamicLinks at_menu_international_destinations"
                                                                                            itemprop="url"
                                                                                            content="/tour-packages/international"
                                                                                            href="/tour-packages/international"
                                                                                        >
                                                                                            International Destinations
                                                                                        </a>
                                                                                    </span>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="moduleSub hide"></div>
                                                                        <div class="moduleSub hide">
                                                                            <div>
                                                                                <ul>
                                                                                    <li class="pl24 pr15 pb8 pt8">
                                                                                        <span>
                                                                                            <meta itemprop="name" content="Thailand" />
                                                                                            <a class="pfc3 at_menu_dynamicLinks at_menu_thailand" itemprop="url" content="/tour-packages/thailand" href="/tour-packages/thailand">Thailand</a>
                                                                                        </span>
                                                                                    </li>
                                                                                    <li class="pl24 pr15 pb8 pt8">
                                                                                        <span>
                                                                                            <meta itemprop="name" content="Singapore" />
                                                                                            <a class="pfc3 at_menu_dynamicLinks at_menu_singapore" itemprop="url" content="/tour-packages/singapore" href="/tour-packages/singapore">
                                                                                                Singapore
                                                                                            </a>
                                                                                        </span>
                                                                                    </li>
                                                                                    <li class="pl24 pr15 pb8 pt8">
                                                                                        <span>
                                                                                            <meta itemprop="name" content="Sri Lanka" />
                                                                                            <a class="pfc3 at_menu_dynamicLinks at_menu_sri_lanka" itemprop="url" content="/tour-packages/sri-lanka" href="/tour-packages/sri-lanka">
                                                                                                Sri Lanka
                                                                                            </a>
                                                                                        </span>
                                                                                    </li>
                                                                                    <li class="pl24 pr15 pb8 pt8">
                                                                                        <span>
                                                                                            <meta itemprop="name" content="Europe" />
                                                                                            <a class="pfc3 at_menu_dynamicLinks at_menu_europe" itemprop="url" content="/tour-packages/europe" href="/tour-packages/europe">Europe</a>
                                                                                        </span>
                                                                                    </li>
                                                                                    <li class="pl24 pr15 pb8 pt8">
                                                                                        <span>
                                                                                            <meta itemprop="name" content="Mauritius" />
                                                                                            <a class="pfc3 at_menu_dynamicLinks at_menu_mauritius" itemprop="url" content="/tour-packages/mauritius" href="/tour-packages/mauritius">
                                                                                                Mauritius
                                                                                            </a>
                                                                                        </span>
                                                                                    </li>
                                                                                    <li class="pl24 pr15 pb8 pt8">
                                                                                        <span>
                                                                                            <meta itemprop="name" content="Maldives" />
                                                                                            <a class="pfc3 at_menu_dynamicLinks at_menu_maldives" itemprop="url" content="/tour-packages/maldives" href="/tour-packages/maldives">Maldives</a>
                                                                                        </span>
                                                                                    </li>
                                                                                    <li class="pl24 pr15 pb8 pt8">
                                                                                        <span>
                                                                                            <meta itemprop="name" content="Dubai" />
                                                                                            <a class="pfc3 at_menu_dynamicLinks at_menu_dubai" itemprop="url" content="/tour-packages/dubai" href="/tour-packages/dubai">Dubai</a>
                                                                                        </span>
                                                                                    </li>
                                                                                    <li class="pl24 pr15 pb8 pt8">
                                                                                        <span>
                                                                                            <meta itemprop="name" content="Hong Kong" />
                                                                                            <a class="pfc3 at_menu_dynamicLinks at_menu_hong_kong" itemprop="url" content="/tour-packages/hong-kong" href="/tour-packages/hong-kong">
                                                                                                Hong Kong
                                                                                            </a>
                                                                                        </span>
                                                                                    </li>
                                                                                    <li class="pl24 pr15 pb8 pt8">
                                                                                        <span>
                                                                                            <meta itemprop="name" content="Bali" />
                                                                                            <a class="pfc3 at_menu_dynamicLinks at_menu_bali" itemprop="url" content="/tour-packages/bali" href="/tour-packages/bali">Bali</a>
                                                                                        </span>
                                                                                    </li>
                                                                                    <li class="pl24 pr15 pb8 pt8">
                                                                                        <span>
                                                                                            <meta itemprop="name" content="Switzerland" />
                                                                                            <a class="pfc3 at_menu_dynamicLinks at_menu_switzerland" itemprop="url" content="/tour-packages/switzerland" href="/tour-packages/switzerland">
                                                                                                Switzerland
                                                                                            </a>
                                                                                        </span>
                                                                                    </li>
                                                                                    <li class="pl24 pr15 pb8 pt8">
                                                                                        <span>
                                                                                            <meta itemprop="name" content="Seychelles" />
                                                                                            <a class="pfc3 at_menu_dynamicLinks at_menu_seychelles" itemprop="url" content="/tour-packages/seychelles" href="/tour-packages/seychelles">
                                                                                                Seychelles
                                                                                            </a>
                                                                                        </span>
                                                                                    </li>
                                                                                    <li class="pl24 pr15 pb8 pt8">
                                                                                        <span>
                                                                                            <meta itemprop="name" content="Australia" />
                                                                                            <a class="pfc3 at_menu_dynamicLinks at_menu_australia" itemprop="url" content="/tour-packages/australia" href="/tour-packages/australia">
                                                                                                Australia
                                                                                            </a>
                                                                                        </span>
                                                                                    </li>
                                                                                    <li class="pl24 pr15 pb8 pt8">
                                                                                        <span>
                                                                                            <meta itemprop="name" content="Cambodia" />
                                                                                            <a class="pfc3 at_menu_dynamicLinks at_menu_cambodia" itemprop="url" content="/tour-packages/cambodia" href="/tour-packages/cambodia">Cambodia</a>
                                                                                        </span>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="moduleSub hide"></div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div id="Family Packages">
                                                            <div class="wfull relative flex alignCenter spaceBetween">
                                                                <div class="flexFull list-side-menu-title">
                                                                    <span>
                                                                        <span>
                                                                            <meta itemprop="name" content="Family Packages" />
                                                                            <a class="pfc3 at_menu_dynamicLinks at_menu_family_packages" itemprop="url" content="/family-packages" href="/family-packages">Family Packages</a>
                                                                        </span>
                                                                    </span>
                                                                </div>
                                                                <div class="arrowIconContainer flex alignCenter justifyCenter mr8 css-ithvic">
                                                                    <svg viewBox="0 0 10 6" class="icon shape-codepen"><use xlink:href="/mobile_assets/build/icons-svg-189780356f4c47427ddd341d01c8baea.svg#DownArrow-usage"></use></svg>
                                                                </div>
                                                            </div>
                                                            <div class="moduleSub hide">
                                                                <div>
                                                                    <div id="Indian Destinations">
                                                                        <div class="wfull relative flex alignCenter spaceBetween">
                                                                            <div class="flexFull list-side-menu-title">
                                                                                <span>
                                                                                    <span>
                                                                                        <meta itemprop="name" content="Indian Destinations" />
                                                                                        <a class="pfc3 at_menu_dynamicLinks at_menu_indian_destinations" itemprop="url" content="/family-packages/india" href="/family-packages/india">
                                                                                            Indian Destinations
                                                                                        </a>
                                                                                    </span>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="moduleSub hide"></div>
                                                                        <div class="moduleSub hide">
                                                                            <div>
                                                                                <ul>
                                                                                    <li class="pl24 pr15 pb8 pt8">
                                                                                        <span>
                                                                                            <meta itemprop="name" content="Kerala" />
                                                                                            <a class="pfc3 at_menu_dynamicLinks at_menu_kerala" itemprop="url" content="/family-packages/kerala" href="/family-packages/kerala">Kerala</a>
                                                                                        </span>
                                                                                    </li>
                                                                                    <li class="pl24 pr15 pb8 pt8">
                                                                                        <span>
                                                                                            <meta itemprop="name" content="Goa" />
                                                                                            <a class="pfc3 at_menu_dynamicLinks at_menu_goa" itemprop="url" content="/family-packages/goa" href="/family-packages/goa">Goa</a>
                                                                                        </span>
                                                                                    </li>
                                                                                    <li class="pl24 pr15 pb8 pt8">
                                                                                        <span>
                                                                                            <meta itemprop="name" content="Himachal" />
                                                                                            <a class="pfc3 at_menu_dynamicLinks at_menu_himachal" itemprop="url" content="/family-packages/himachal" href="/family-packages/himachal">
                                                                                                Himachal
                                                                                            </a>
                                                                                        </span>
                                                                                    </li>
                                                                                    <li class="pl24 pr15 pb8 pt8">
                                                                                        <span>
                                                                                            <meta itemprop="name" content="Sikkim" />
                                                                                            <a class="pfc3 at_menu_dynamicLinks at_menu_sikkim" itemprop="url" content="/family-packages/sikkim" href="/family-packages/sikkim">Sikkim</a>
                                                                                        </span>
                                                                                    </li>
                                                                                    <li class="pl24 pr15 pb8 pt8">
                                                                                        <span>
                                                                                            <meta itemprop="name" content="Uttarakhand" />
                                                                                            <a class="pfc3 at_menu_dynamicLinks at_menu_uttarakhand" itemprop="url" content="/family-packages/uttarakhand" href="/family-packages/uttarakhand">
                                                                                                Uttarakhand
                                                                                            </a>
                                                                                        </span>
                                                                                    </li>
                                                                                    <li class="pl24 pr15 pb8 pt8">
                                                                                        <span>
                                                                                            <meta itemprop="name" content="Andaman" />
                                                                                            <a class="pfc3 at_menu_dynamicLinks at_menu_andaman" itemprop="url" content="/family-packages/andaman" href="/family-packages/andaman">Andaman</a>
                                                                                        </span>
                                                                                    </li>
                                                                                    <li class="pl24 pr15 pb8 pt8">
                                                                                        <span>
                                                                                            <meta itemprop="name" content="Rajasthan" />
                                                                                            <a class="pfc3 at_menu_dynamicLinks at_menu_rajasthan" itemprop="url" content="/family-packages/rajasthan" href="/family-packages/rajasthan">
                                                                                                Rajasthan
                                                                                            </a>
                                                                                        </span>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <div id="International Destinations">
                                                                        <div class="wfull relative flex alignCenter spaceBetween">
                                                                            <div class="flexFull list-side-menu-title">
                                                                                <span>
                                                                                    <span>
                                                                                        <meta itemprop="name" content="International Destinations" />
                                                                                        <a
                                                                                            class="pfc3 at_menu_dynamicLinks at_menu_international_destinations"
                                                                                            itemprop="url"
                                                                                            content="/family-packages/international"
                                                                                            href="/family-packages/international"
                                                                                        >
                                                                                            International Destinations
                                                                                        </a>
                                                                                    </span>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="moduleSub hide"></div>
                                                                        <div class="moduleSub hide">
                                                                            <div>
                                                                                <ul>
                                                                                    <li class="pl24 pr15 pb8 pt8">
                                                                                        <span>
                                                                                            <meta itemprop="name" content="Thailand" />
                                                                                            <a class="pfc3 at_menu_dynamicLinks at_menu_thailand" itemprop="url" content="/family-packages/thailand" href="/family-packages/thailand">
                                                                                                Thailand
                                                                                            </a>
                                                                                        </span>
                                                                                    </li>
                                                                                    <li class="pl24 pr15 pb8 pt8">
                                                                                        <span>
                                                                                            <meta itemprop="name" content="Singapore" />
                                                                                            <a class="pfc3 at_menu_dynamicLinks at_menu_singapore" itemprop="url" content="/family-packages/singapore" href="/family-packages/singapore">
                                                                                                Singapore
                                                                                            </a>
                                                                                        </span>
                                                                                    </li>
                                                                                    <li class="pl24 pr15 pb8 pt8">
                                                                                        <span>
                                                                                            <meta itemprop="name" content="Sri Lanka" />
                                                                                            <a class="pfc3 at_menu_dynamicLinks at_menu_sri_lanka" itemprop="url" content="/family-packages/sri-lanka" href="/family-packages/sri-lanka">
                                                                                                Sri Lanka
                                                                                            </a>
                                                                                        </span>
                                                                                    </li>
                                                                                    <li class="pl24 pr15 pb8 pt8">
                                                                                        <span>
                                                                                            <meta itemprop="name" content="Europe" />
                                                                                            <a class="pfc3 at_menu_dynamicLinks at_menu_europe" itemprop="url" content="/family-packages/europe" href="/family-packages/europe">Europe</a>
                                                                                        </span>
                                                                                    </li>
                                                                                    <li class="pl24 pr15 pb8 pt8">
                                                                                        <span>
                                                                                            <meta itemprop="name" content="Mauritius" />
                                                                                            <a class="pfc3 at_menu_dynamicLinks at_menu_mauritius" itemprop="url" content="/family-packages/mauritius" href="/family-packages/mauritius">
                                                                                                Mauritius
                                                                                            </a>
                                                                                        </span>
                                                                                    </li>
                                                                                    <li class="pl24 pr15 pb8 pt8">
                                                                                        <span>
                                                                                            <meta itemprop="name" content="Maldives" />
                                                                                            <a class="pfc3 at_menu_dynamicLinks at_menu_maldives" itemprop="url" content="/family-packages/maldives" href="/family-packages/maldives">
                                                                                                Maldives
                                                                                            </a>
                                                                                        </span>
                                                                                    </li>
                                                                                    <li class="pl24 pr15 pb8 pt8">
                                                                                        <span>
                                                                                            <meta itemprop="name" content="Dubai" />
                                                                                            <a class="pfc3 at_menu_dynamicLinks at_menu_dubai" itemprop="url" content="/family-packages/dubai" href="/family-packages/dubai">Dubai</a>
                                                                                        </span>
                                                                                    </li>
                                                                                    <li class="pl24 pr15 pb8 pt8">
                                                                                        <span>
                                                                                            <meta itemprop="name" content="Hong Kong" />
                                                                                            <a class="pfc3 at_menu_dynamicLinks at_menu_hong_kong" itemprop="url" content="/family-packages/hong-kong" href="/family-packages/hong-kong">
                                                                                                Hong Kong
                                                                                            </a>
                                                                                        </span>
                                                                                    </li>
                                                                                    <li class="pl24 pr15 pb8 pt8">
                                                                                        <span>
                                                                                            <meta itemprop="name" content="Bali" />
                                                                                            <a class="pfc3 at_menu_dynamicLinks at_menu_bali" itemprop="url" content="/family-packages/bali" href="/family-packages/bali">Bali</a>
                                                                                        </span>
                                                                                    </li>
                                                                                    <li class="pl24 pr15 pb8 pt8">
                                                                                        <span>
                                                                                            <meta itemprop="name" content="Australia" />
                                                                                            <a class="pfc3 at_menu_dynamicLinks at_menu_australia" itemprop="url" content="/family-packages/australia" href="/family-packages/australia">
                                                                                                Australia
                                                                                            </a>
                                                                                        </span>
                                                                                    </li>
                                                                                    <li class="pl24 pr15 pb8 pt8">
                                                                                        <span>
                                                                                            <meta itemprop="name" content="Italy" />
                                                                                            <a class="pfc3 at_menu_dynamicLinks at_menu_italy" itemprop="url" content="/family-packages/italy" href="/family-packages/italy">Italy</a>
                                                                                        </span>
                                                                                    </li>
                                                                                    <li class="pl24 pr15 pb8 pt8">
                                                                                        <span>
                                                                                            <meta itemprop="name" content="Vietnam" />
                                                                                            <a class="pfc3 at_menu_dynamicLinks at_menu_vietnam" itemprop="url" content="/family-packages/vietnam" href="/family-packages/vietnam">Vietnam</a>
                                                                                        </span>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="moduleSub hide"></div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div id="Honeymoon Packages">
                                                            <div class="wfull relative flex alignCenter spaceBetween">
                                                                <div class="flexFull list-side-menu-title">
                                                                    <span>
                                                                        <span>
                                                                            <meta itemprop="name" content="Honeymoon Packages" />
                                                                            <a class="pfc3 at_menu_dynamicLinks at_menu_honeymoon_packages" itemprop="url" content="/honeymoon-packages" href="/honeymoon-packages">Honeymoon Packages</a>
                                                                        </span>
                                                                    </span>
                                                                </div>
                                                                <div class="arrowIconContainer flex alignCenter justifyCenter mr8 css-ithvic">
                                                                    <svg viewBox="0 0 10 6" class="icon shape-codepen"><use xlink:href="/mobile_assets/build/icons-svg-189780356f4c47427ddd341d01c8baea.svg#DownArrow-usage"></use></svg>
                                                                </div>
                                                            </div>
                                                            <div class="moduleSub hide">
                                                                <div>
                                                                    <div id="Indian Destinations">
                                                                        <div class="wfull relative flex alignCenter spaceBetween">
                                                                            <div class="flexFull list-side-menu-title">
                                                                                <span>
                                                                                    <span>
                                                                                        <meta itemprop="name" content="Indian Destinations" />
                                                                                        <a class="pfc3 at_menu_dynamicLinks at_menu_indian_destinations" itemprop="url" content="/honeymoon-packages/india" href="/honeymoon-packages/india">
                                                                                            Indian Destinations
                                                                                        </a>
                                                                                    </span>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="moduleSub hide"></div>
                                                                        <div class="moduleSub hide">
                                                                            <div>
                                                                                <ul>
                                                                                    <li class="pl24 pr15 pb8 pt8">
                                                                                        <span>
                                                                                            <meta itemprop="name" content="Kerala" />
                                                                                            <a class="pfc3 at_menu_dynamicLinks at_menu_kerala" itemprop="url" content="/honeymoon-packages/kerala" href="/honeymoon-packages/kerala">Kerala</a>
                                                                                        </span>
                                                                                    </li>
                                                                                    <li class="pl24 pr15 pb8 pt8">
                                                                                        <span>
                                                                                            <meta itemprop="name" content="Goa" />
                                                                                            <a class="pfc3 at_menu_dynamicLinks at_menu_goa" itemprop="url" content="/honeymoon-packages/goa" href="/honeymoon-packages/goa">Goa</a>
                                                                                        </span>
                                                                                    </li>
                                                                                    <li class="pl24 pr15 pb8 pt8">
                                                                                        <span>
                                                                                            <meta itemprop="name" content="Himachal" />
                                                                                            <a class="pfc3 at_menu_dynamicLinks at_menu_himachal" itemprop="url" content="/honeymoon-packages/himachal" href="/honeymoon-packages/himachal">
                                                                                                Himachal
                                                                                            </a>
                                                                                        </span>
                                                                                    </li>
                                                                                    <li class="pl24 pr15 pb8 pt8">
                                                                                        <span>
                                                                                            <meta itemprop="name" content="Sikkim" />
                                                                                            <a class="pfc3 at_menu_dynamicLinks at_menu_sikkim" itemprop="url" content="/honeymoon-packages/sikkim" href="/honeymoon-packages/sikkim">Sikkim</a>
                                                                                        </span>
                                                                                    </li>
                                                                                    <li class="pl24 pr15 pb8 pt8">
                                                                                        <span>
                                                                                            <meta itemprop="name" content="Uttarakhand" />
                                                                                            <a
                                                                                                class="pfc3 at_menu_dynamicLinks at_menu_uttarakhand"
                                                                                                itemprop="url"
                                                                                                content="/honeymoon-packages/uttarakhand"
                                                                                                href="/honeymoon-packages/uttarakhand"
                                                                                            >
                                                                                                Uttarakhand
                                                                                            </a>
                                                                                        </span>
                                                                                    </li>
                                                                                    <li class="pl24 pr15 pb8 pt8">
                                                                                        <span>
                                                                                            <meta itemprop="name" content="Kashmir" />
                                                                                            <a class="pfc3 at_menu_dynamicLinks at_menu_kashmir" itemprop="url" content="/honeymoon-packages/kashmir" href="/honeymoon-packages/kashmir">
                                                                                                Kashmir
                                                                                            </a>
                                                                                        </span>
                                                                                    </li>
                                                                                    <li class="pl24 pr15 pb8 pt8">
                                                                                        <span>
                                                                                            <meta itemprop="name" content="Andaman" />
                                                                                            <a class="pfc3 at_menu_dynamicLinks at_menu_andaman" itemprop="url" content="/honeymoon-packages/andaman" href="/honeymoon-packages/andaman">
                                                                                                Andaman
                                                                                            </a>
                                                                                        </span>
                                                                                    </li>
                                                                                    <li class="pl24 pr15 pb8 pt8">
                                                                                        <span>
                                                                                            <meta itemprop="name" content="Rajasthan" />
                                                                                            <a class="pfc3 at_menu_dynamicLinks at_menu_rajasthan" itemprop="url" content="/honeymoon-packages/rajasthan" href="/honeymoon-packages/rajasthan">
                                                                                                Rajasthan
                                                                                            </a>
                                                                                        </span>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <div id="International Destinations">
                                                                        <div class="wfull relative flex alignCenter spaceBetween">
                                                                            <div class="flexFull list-side-menu-title">
                                                                                <span>
                                                                                    <span>
                                                                                        <meta itemprop="name" content="International Destinations" />
                                                                                        <a
                                                                                            class="pfc3 at_menu_dynamicLinks at_menu_international_destinations"
                                                                                            itemprop="url"
                                                                                            content="/honeymoon-packages/international"
                                                                                            href="/honeymoon-packages/international"
                                                                                        >
                                                                                            International Destinations
                                                                                        </a>
                                                                                    </span>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="moduleSub hide"></div>
                                                                        <div class="moduleSub hide">
                                                                            <div>
                                                                                <ul>
                                                                                    <li class="pl24 pr15 pb8 pt8">
                                                                                        <span>
                                                                                            <meta itemprop="name" content="Thailand" />
                                                                                            <a class="pfc3 at_menu_dynamicLinks at_menu_thailand" itemprop="url" content="/honeymoon-packages/thailand" href="/honeymoon-packages/thailand">
                                                                                                Thailand
                                                                                            </a>
                                                                                        </span>
                                                                                    </li>
                                                                                    <li class="pl24 pr15 pb8 pt8">
                                                                                        <span>
                                                                                            <meta itemprop="name" content="Singapore" />
                                                                                            <a class="pfc3 at_menu_dynamicLinks at_menu_singapore" itemprop="url" content="/honeymoon-packages/singapore" href="/honeymoon-packages/singapore">
                                                                                                Singapore
                                                                                            </a>
                                                                                        </span>
                                                                                    </li>
                                                                                    <li class="pl24 pr15 pb8 pt8">
                                                                                        <span>
                                                                                            <meta itemprop="name" content="Sri Lanka" />
                                                                                            <a class="pfc3 at_menu_dynamicLinks at_menu_sri_lanka" itemprop="url" content="/honeymoon-packages/sri-lanka" href="/honeymoon-packages/sri-lanka">
                                                                                                Sri Lanka
                                                                                            </a>
                                                                                        </span>
                                                                                    </li>
                                                                                    <li class="pl24 pr15 pb8 pt8">
                                                                                        <span>
                                                                                            <meta itemprop="name" content="Europe" />
                                                                                            <a class="pfc3 at_menu_dynamicLinks at_menu_europe" itemprop="url" content="/honeymoon-packages/europe" href="/honeymoon-packages/europe">Europe</a>
                                                                                        </span>
                                                                                    </li>
                                                                                    <li class="pl24 pr15 pb8 pt8">
                                                                                        <span>
                                                                                            <meta itemprop="name" content="Mauritius" />
                                                                                            <a class="pfc3 at_menu_dynamicLinks at_menu_mauritius" itemprop="url" content="/honeymoon-packages/mauritius" href="/honeymoon-packages/mauritius">
                                                                                                Mauritius
                                                                                            </a>
                                                                                        </span>
                                                                                    </li>
                                                                                    <li class="pl24 pr15 pb8 pt8">
                                                                                        <span>
                                                                                            <meta itemprop="name" content="Maldives" />
                                                                                            <a class="pfc3 at_menu_dynamicLinks at_menu_maldives" itemprop="url" content="/honeymoon-packages/maldives" href="/honeymoon-packages/maldives">
                                                                                                Maldives
                                                                                            </a>
                                                                                        </span>
                                                                                    </li>
                                                                                    <li class="pl24 pr15 pb8 pt8">
                                                                                        <span>
                                                                                            <meta itemprop="name" content="Dubai" />
                                                                                            <a class="pfc3 at_menu_dynamicLinks at_menu_dubai" itemprop="url" content="/honeymoon-packages/dubai" href="/honeymoon-packages/dubai">Dubai</a>
                                                                                        </span>
                                                                                    </li>
                                                                                    <li class="pl24 pr15 pb8 pt8">
                                                                                        <span>
                                                                                            <meta itemprop="name" content="Seychelles" />
                                                                                            <a
                                                                                                class="pfc3 at_menu_dynamicLinks at_menu_seychelles"
                                                                                                itemprop="url"
                                                                                                content="/honeymoon-packages/seychelles"
                                                                                                href="/honeymoon-packages/seychelles"
                                                                                            >
                                                                                                Seychelles
                                                                                            </a>
                                                                                        </span>
                                                                                    </li>
                                                                                    <li class="pl24 pr15 pb8 pt8">
                                                                                        <span>
                                                                                            <meta itemprop="name" content="Bali" />
                                                                                            <a class="pfc3 at_menu_dynamicLinks at_menu_bali" itemprop="url" content="/honeymoon-packages/bali" href="/honeymoon-packages/bali">Bali</a>
                                                                                        </span>
                                                                                    </li>
                                                                                    <li class="pl24 pr15 pb8 pt8">
                                                                                        <span>
                                                                                            <meta itemprop="name" content="New Zealand" />
                                                                                            <a
                                                                                                class="pfc3 at_menu_dynamicLinks at_menu_new_zealand"
                                                                                                itemprop="url"
                                                                                                content="/honeymoon-packages/new-zealand"
                                                                                                href="/honeymoon-packages/new-zealand"
                                                                                            >
                                                                                                New Zealand
                                                                                            </a>
                                                                                        </span>
                                                                                    </li>
                                                                                    <li class="pl24 pr15 pb8 pt8">
                                                                                        <span>
                                                                                            <meta itemprop="name" content="Switzerland" />
                                                                                            <a
                                                                                                class="pfc3 at_menu_dynamicLinks at_menu_switzerland"
                                                                                                itemprop="url"
                                                                                                content="/honeymoon-packages/switzerland"
                                                                                                href="/honeymoon-packages/switzerland"
                                                                                            >
                                                                                                Switzerland
                                                                                            </a>
                                                                                        </span>
                                                                                    </li>
                                                                                    <li class="pl24 pr15 pb8 pt8">
                                                                                        <span>
                                                                                            <meta itemprop="name" content="Hong Kong" />
                                                                                            <a class="pfc3 at_menu_dynamicLinks at_menu_hong_kong" itemprop="url" content="/honeymoon-packages/hong-kong" href="/honeymoon-packages/hong-kong">
                                                                                                Hong Kong
                                                                                            </a>
                                                                                        </span>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="moduleSub hide"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="moduleSub hide"></div>
                                            </div>
                                        </li>
                                        <li>
                                            <div id="Hotels">
                                                <div class="wfull relative flex alignCenter spaceBetween">
                                                    <div class="absolute t3 l15 css-bxm7ha">
                                                        <svg viewBox="0 0 21.34 26" class="icon shape-codepen"><use xlink:href="/mobile_assets/build/icons-svg-189780356f4c47427ddd341d01c8baea.svg#HotelIcon-usage"></use></svg>
                                                    </div>
                                                    <div class="flexFull list-side-menu-title-icon"><p class="pfc3 at_menu_dynamicLinks at_menu_hotels">Hotels</p></div>
                                                    <div class="arrowIconContainer flex alignCenter justifyCenter mr8 css-ithvic">
                                                        <svg viewBox="0 0 10 6" class="icon shape-codepen"><use xlink:href="/mobile_assets/build/icons-svg-189780356f4c47427ddd341d01c8baea.svg#DownArrow-usage"></use></svg>
                                                    </div>
                                                </div>
                                                <div class="moduleSub hide">
                                                    <div>
                                                        <div id="Indian Destinations">
                                                            <div class="wfull relative flex alignCenter spaceBetween">
                                                                <div class="flexFull list-side-menu-title"><p class="pfc3 at_menu_dynamicLinks at_menu_indian_destinations">Indian Destinations</p></div>
                                                            </div>
                                                            <div class="moduleSub hide"></div>
                                                            <div class="moduleSub hide">
                                                                <div>
                                                                    <ul>
                                                                        <li class="pl24 pr15 pb8 pt8">
                                                                            <span>
                                                                                <meta itemprop="name" content="Kerala" />
                                                                                <a class="pfc3 at_menu_dynamicLinks at_menu_kerala" itemprop="url" content="/hotels/kerala" href="/hotels/kerala">Kerala</a>
                                                                            </span>
                                                                        </li>
                                                                        <li class="pl24 pr15 pb8 pt8">
                                                                            <span>
                                                                                <meta itemprop="name" content="Himachal" />
                                                                                <a class="pfc3 at_menu_dynamicLinks at_menu_himachal" itemprop="url" content="/hotels/himachal" href="/hotels/himachal">Himachal</a>
                                                                            </span>
                                                                        </li>
                                                                        <li class="pl24 pr15 pb8 pt8">
                                                                            <span>
                                                                                <meta itemprop="name" content="Andaman" />
                                                                                <a class="pfc3 at_menu_dynamicLinks at_menu_andaman" itemprop="url" content="/hotels/andaman" href="/hotels/andaman">Andaman</a>
                                                                            </span>
                                                                        </li>
                                                                        <li class="pl24 pr15 pb8 pt8">
                                                                            <span>
                                                                                <meta itemprop="name" content="Kashmir" />
                                                                                <a class="pfc3 at_menu_dynamicLinks at_menu_kashmir" itemprop="url" content="/hotels/kashmir" href="/hotels/kashmir">Kashmir</a>
                                                                            </span>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div id="International Destinations">
                                                            <div class="wfull relative flex alignCenter spaceBetween">
                                                                <div class="flexFull list-side-menu-title"><p class="pfc3 at_menu_dynamicLinks at_menu_international_destinations">International Destinations</p></div>
                                                            </div>
                                                            <div class="moduleSub hide"></div>
                                                            <div class="moduleSub hide">
                                                                <div>
                                                                    <ul>
                                                                        <li class="pl24 pr15 pb8 pt8">
                                                                            <span>
                                                                                <meta itemprop="name" content="Dubai" />
                                                                                <a class="pfc3 at_menu_dynamicLinks at_menu_dubai" itemprop="url" content="/hotels/dubai-ae" href="/hotels/dubai-ae">Dubai</a>
                                                                            </span>
                                                                        </li>
                                                                        <li class="pl24 pr15 pb8 pt8">
                                                                            <span>
                                                                                <meta itemprop="name" content="Seychelles" />
                                                                                <a class="pfc3 at_menu_dynamicLinks at_menu_seychelles" itemprop="url" content="/hotels/seychelles" href="/hotels/seychelles">Seychelles</a>
                                                                            </span>
                                                                        </li>
                                                                        <li class="pl24 pr15 pb8 pt8">
                                                                            <span>
                                                                                <meta itemprop="name" content="Singapore" />
                                                                                <a class="pfc3 at_menu_dynamicLinks at_menu_singapore" itemprop="url" content="/hotels/singapore" href="/hotels/singapore">Singapore</a>
                                                                            </span>
                                                                        </li>
                                                                        <li class="pl24 pr15 pb8 pt8">
                                                                            <span>
                                                                                <meta itemprop="name" content="Bhutan" />
                                                                                <a class="pfc3 at_menu_dynamicLinks at_menu_bhutan" itemprop="url" content="/hotels/bhutan" href="/hotels/bhutan">Bhutan</a>
                                                                            </span>
                                                                        </li>
                                                                        <li class="pl24 pr15 pb8 pt8">
                                                                            <span>
                                                                                <meta itemprop="name" content="Thailand" />
                                                                                <a class="pfc3 at_menu_dynamicLinks at_menu_thailand" itemprop="url" content="/hotels/thailand" href="/hotels/thailand">Thailand</a>
                                                                            </span>
                                                                        </li>
                                                                        <li class="pl24 pr15 pb8 pt8">
                                                                            <span>
                                                                                <meta itemprop="name" content="Bali" /><a class="pfc3 at_menu_dynamicLinks at_menu_bali" itemprop="url" content="/hotels/bali" href="/hotels/bali">Bali</a>
                                                                            </span>
                                                                        </li>
                                                                        <li class="pl24 pr15 pb8 pt8">
                                                                            <span>
                                                                                <meta itemprop="name" content="Mauritius" />
                                                                                <a class="pfc3 at_menu_dynamicLinks at_menu_mauritius" itemprop="url" content="/hotels/mauritius" href="/hotels/mauritius">Mauritius</a>
                                                                            </span>
                                                                        </li>
                                                                        <li class="pl24 pr15 pb8 pt8">
                                                                            <span>
                                                                                <meta itemprop="name" content="Sri Lanka" />
                                                                                <a class="pfc3 at_menu_dynamicLinks at_menu_sri_lanka" itemprop="url" content="/hotels/sri-lanka" href="/hotels/sri-lanka">Sri Lanka</a>
                                                                            </span>
                                                                        </li>
                                                                        <li class="pl24 pr15 pb8 pt8">
                                                                            <span>
                                                                                <meta itemprop="name" content="Maldives" />
                                                                                <a class="pfc3 at_menu_dynamicLinks at_menu_maldives" itemprop="url" content="/hotels/maldives" href="/hotels/maldives">Maldives</a>
                                                                            </span>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="moduleSub hide"></div>
                                            </div>
                                        </li>
                                        <li>
                                            <div id="Destination Guides">
                                                <div class="wfull relative flex alignCenter spaceBetween">
                                                    <div class="absolute t3 l15 css-bxm7ha">
                                                        <svg viewBox="0 0 16 21" class="icon shape-codepen"><use xlink:href="/mobile_assets/build/icons-svg-189780356f4c47427ddd341d01c8baea.svg#LocationMarkerIcon-usage"></use></svg>
                                                    </div>
                                                    <div class="flexFull list-side-menu-title-icon"><p class="pfc3 at_menu_dynamicLinks at_menu_destination_guides">Destination Guides</p></div>
                                                    <div class="arrowIconContainer flex alignCenter justifyCenter mr8 css-ithvic">
                                                        <svg viewBox="0 0 10 6" class="icon shape-codepen"><use xlink:href="/mobile_assets/build/icons-svg-189780356f4c47427ddd341d01c8baea.svg#DownArrow-usage"></use></svg>
                                                    </div>
                                                </div>
                                                <div class="moduleSub hide">
                                                    <div>
                                                        <div id="Indian Destinations">
                                                            <div class="wfull relative flex alignCenter spaceBetween">
                                                                <div class="flexFull list-side-menu-title">
                                                                    <span>
                                                                        <span>
                                                                            <meta itemprop="name" content="Indian Destinations" />
                                                                            <a class="pfc3 at_menu_dynamicLinks at_menu_indian_destinations" itemprop="url" content="/india-tourism" href="/india-tourism">Indian Destinations</a>
                                                                        </span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="moduleSub hide"></div>
                                                            <div class="moduleSub hide">
                                                                <div>
                                                                    <ul>
                                                                        <li class="pl24 pr15 pb8 pt8">
                                                                            <span>
                                                                                <meta itemprop="name" content="Kashmir" />
                                                                                <a class="pfc3 at_menu_dynamicLinks at_menu_kashmir" itemprop="url" content="/kashmir-tourism" href="/kashmir-tourism">Kashmir</a>
                                                                            </span>
                                                                        </li>
                                                                        <li class="pl24 pr15 pb8 pt8">
                                                                            <span>
                                                                                <meta itemprop="name" content="Himachal" />
                                                                                <a class="pfc3 at_menu_dynamicLinks at_menu_himachal" itemprop="url" content="/himachal-tourism" href="/himachal-tourism">Himachal</a>
                                                                            </span>
                                                                        </li>
                                                                        <li class="pl24 pr15 pb8 pt8">
                                                                            <span>
                                                                                <meta itemprop="name" content="Uttarakhand" />
                                                                                <a class="pfc3 at_menu_dynamicLinks at_menu_uttarakhand" itemprop="url" content="/uttarakhand-tourism" href="/uttarakhand-tourism">Uttarakhand</a>
                                                                            </span>
                                                                        </li>
                                                                        <li class="pl24 pr15 pb8 pt8">
                                                                            <span>
                                                                                <meta itemprop="name" content="Kerala" />
                                                                                <a class="pfc3 at_menu_dynamicLinks at_menu_kerala" itemprop="url" content="/kerala-tourism" href="/kerala-tourism">Kerala</a>
                                                                            </span>
                                                                        </li>
                                                                        <li class="pl24 pr15 pb8 pt8">
                                                                            <span>
                                                                                <meta itemprop="name" content="Sikkim - Gangtok - Darjeeling" />
                                                                                <a class="pfc3 at_menu_dynamicLinks at_menu_sikkim__gangtok__darjeeling" itemprop="url" content="/sikkim-tourism" href="/sikkim-tourism">
                                                                                    Sikkim - Gangtok - Darjeeling
                                                                                </a>
                                                                            </span>
                                                                        </li>
                                                                        <li class="pl24 pr15 pb8 pt8">
                                                                            <span>
                                                                                <meta itemprop="name" content="Andaman" />
                                                                                <a class="pfc3 at_menu_dynamicLinks at_menu_andaman" itemprop="url" content="/andaman-tourism" href="/andaman-tourism">Andaman</a>
                                                                            </span>
                                                                        </li>
                                                                        <li class="pl24 pr15 pb8 pt8">
                                                                            <span>
                                                                                <meta itemprop="name" content="Goa" /><a class="pfc3 at_menu_dynamicLinks at_menu_goa" itemprop="url" content="/goa-tourism" href="/goa-tourism">Goa</a>
                                                                            </span>
                                                                        </li>
                                                                        <li class="pl24 pr15 pb8 pt8">
                                                                            <span>
                                                                                <meta itemprop="name" content="Rajasthan" />
                                                                                <a class="pfc3 at_menu_dynamicLinks at_menu_rajasthan" itemprop="url" content="/rajasthan-tourism" href="/rajasthan-tourism">Rajasthan</a>
                                                                            </span>
                                                                        </li>
                                                                        <li class="pl24 pr15 pb8 pt8">
                                                                            <span>
                                                                                <meta itemprop="name" content="Ladakh" />
                                                                                <a class="pfc3 at_menu_dynamicLinks at_menu_ladakh" itemprop="url" content="/ladakh-tourism" href="/ladakh-tourism">Ladakh</a>
                                                                            </span>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div id="International Destinations">
                                                            <div class="wfull relative flex alignCenter spaceBetween">
                                                                <div class="flexFull list-side-menu-title"><p class="pfc3 at_menu_dynamicLinks at_menu_international_destinations">International Destinations</p></div>
                                                            </div>
                                                            <div class="moduleSub hide"></div>
                                                            <div class="moduleSub hide">
                                                                <div>
                                                                    <ul>
                                                                        <li class="pl24 pr15 pb8 pt8">
                                                                            <span>
                                                                                <meta itemprop="name" content="Cambodia" />
                                                                                <a class="pfc3 at_menu_dynamicLinks at_menu_cambodia" itemprop="url" content="/cambodia-tourism" href="/cambodia-tourism">Cambodia</a>
                                                                            </span>
                                                                        </li>
                                                                        <li class="pl24 pr15 pb8 pt8">
                                                                            <span>
                                                                                <meta itemprop="name" content="Thailand" />
                                                                                <a class="pfc3 at_menu_dynamicLinks at_menu_thailand" itemprop="url" content="/thailand-tourism" href="/thailand-tourism">Thailand</a>
                                                                            </span>
                                                                        </li>
                                                                        <li class="pl24 pr15 pb8 pt8">
                                                                            <span>
                                                                                <meta itemprop="name" content="Bali" />
                                                                                <a class="pfc3 at_menu_dynamicLinks at_menu_bali" itemprop="url" content="/indonesia-tourism/bali" href="/indonesia-tourism/bali">Bali</a>
                                                                            </span>
                                                                        </li>
                                                                        <li class="pl24 pr15 pb8 pt8">
                                                                            <span>
                                                                                <meta itemprop="name" content="Singapore" />
                                                                                <a class="pfc3 at_menu_dynamicLinks at_menu_singapore" itemprop="url" content="/singapore-tourism" href="/singapore-tourism">Singapore</a>
                                                                            </span>
                                                                        </li>
                                                                        <li class="pl24 pr15 pb8 pt8">
                                                                            <span>
                                                                                <meta itemprop="name" content="Malaysia" />
                                                                                <a class="pfc3 at_menu_dynamicLinks at_menu_malaysia" itemprop="url" content="/malaysia-tourism" href="/malaysia-tourism">Malaysia</a>
                                                                            </span>
                                                                        </li>
                                                                        <li class="pl24 pr15 pb8 pt8">
                                                                            <span>
                                                                                <meta itemprop="name" content="Mauritius" />
                                                                                <a class="pfc3 at_menu_dynamicLinks at_menu_mauritius" itemprop="url" content="/mauritius-tourism" href="/mauritius-tourism">Mauritius</a>
                                                                            </span>
                                                                        </li>
                                                                        <li class="pl24 pr15 pb8 pt8">
                                                                            <span>
                                                                                <meta itemprop="name" content="Maldives" />
                                                                                <a class="pfc3 at_menu_dynamicLinks at_menu_maldives" itemprop="url" content="/maldives-tourism" href="/maldives-tourism">Maldives</a>
                                                                            </span>
                                                                        </li>
                                                                        <li class="pl24 pr15 pb8 pt8">
                                                                            <span>
                                                                                <meta itemprop="name" content="Australia" />
                                                                                <a class="pfc3 at_menu_dynamicLinks at_menu_australia" itemprop="url" content="/australia-tourism" href="/australia-tourism">Australia</a>
                                                                            </span>
                                                                        </li>
                                                                        <li class="pl24 pr15 pb8 pt8">
                                                                            <span>
                                                                                <meta itemprop="name" content="Seychelles" />
                                                                                <a class="pfc3 at_menu_dynamicLinks at_menu_seychelles" itemprop="url" content="/seychelles-tourism" href="/seychelles-tourism">Seychelles</a>
                                                                            </span>
                                                                        </li>
                                                                        <li class="pl24 pr15 pb8 pt8">
                                                                            <span>
                                                                                <meta itemprop="name" content="Italy" />
                                                                                <a class="pfc3 at_menu_dynamicLinks at_menu_italy" itemprop="url" content="/italy-tourism" href="/italy-tourism">Italy</a>
                                                                            </span>
                                                                        </li>
                                                                        <li class="pl24 pr15 pb8 pt8">
                                                                            <span>
                                                                                <meta itemprop="name" content="Dubai" />
                                                                                <a class="pfc3 at_menu_dynamicLinks at_menu_dubai" itemprop="url" content="/united-arab-emirates-tourism/dubai" href="/united-arab-emirates-tourism/dubai">
                                                                                    Dubai
                                                                                </a>
                                                                            </span>
                                                                        </li>
                                                                        <li class="pl24 pr15 pb8 pt8">
                                                                            <span>
                                                                                <meta itemprop="name" content="South Africa" />
                                                                                <a class="pfc3 at_menu_dynamicLinks at_menu_south_africa" itemprop="url" content="/south-africa-tourism" href="/south-africa-tourism">South Africa</a>
                                                                            </span>
                                                                        </li>
                                                                        <li class="pl24 pr15 pb8 pt8">
                                                                            <span>
                                                                                <meta itemprop="name" content="Europe" />
                                                                                <a class="pfc3 at_menu_dynamicLinks at_menu_europe" itemprop="url" content="/europe-tourism" href="/europe-tourism">Europe</a>
                                                                            </span>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="moduleSub hide"></div>
                                            </div>
                                        </li>
                                        <li>
                                            <div id="Holiday Themes">
                                                <div class="wfull relative flex alignCenter spaceBetween">
                                                    <div class="absolute t3 l15 css-bxm7ha">
                                                        <svg viewBox="0 0 24 24" class="icon shape-codepen"><use xlink:href="/mobile_assets/build/icons-svg-189780356f4c47427ddd341d01c8baea.svg#Monsoon-usage"></use></svg>
                                                    </div>
                                                    <div class="flexFull list-side-menu-title-icon"><p class="pfc3 at_menu_dynamicLinks at_menu_holiday_themes">Holiday Themes</p></div>
                                                    <div class="arrowIconContainer flex alignCenter justifyCenter mr8 css-ithvic">
                                                        <svg viewBox="0 0 10 6" class="icon shape-codepen"><use xlink:href="/mobile_assets/build/icons-svg-189780356f4c47427ddd341d01c8baea.svg#DownArrow-usage"></use></svg>
                                                    </div>
                                                </div>
                                                <div class="moduleSub hide">
                                                    <div>
                                                        <div id="Top Categories">
                                                            <div class="wfull relative flex alignCenter spaceBetween">
                                                                <div class="flexFull list-side-menu-title"><p class="pfc3 at_menu_dynamicLinks at_menu_top_categories">Top Categories</p></div>
                                                            </div>
                                                            <div class="moduleSub hide"></div>
                                                            <div class="moduleSub hide">
                                                                <div>
                                                                    <ul>
                                                                        <li class="pl24 pr15 pb8 pt8">
                                                                            <span>
                                                                                <meta itemprop="name" content="Seasonal Packages" />
                                                                                <a class="pfc3 at_menu_dynamicLinks at_menu_seasonal_packages" itemprop="url" content="/seasonal-packages" href="/seasonal-packages">Seasonal Packages</a>
                                                                            </span>
                                                                        </li>
                                                                        <li class="pl24 pr15 pb8 pt8">
                                                                            <span>
                                                                                <meta itemprop="name" content="Adventure" />
                                                                                <a class="pfc3 at_menu_dynamicLinks at_menu_adventure" itemprop="url" content="/Adventure-Places" href="/Adventure-Places">Adventure</a>
                                                                            </span>
                                                                        </li>
                                                                        <li class="pl24 pr15 pb8 pt8">
                                                                            <span>
                                                                                <meta itemprop="name" content="Family" />
                                                                                <a class="pfc3 at_menu_dynamicLinks at_menu_family" itemprop="url" content="/Family-Places" href="/Family-Places">Family</a>
                                                                            </span>
                                                                        </li>
                                                                        <li class="pl24 pr15 pb8 pt8">
                                                                            <span>
                                                                                <meta itemprop="name" content="Nature" />
                                                                                <a class="pfc3 at_menu_dynamicLinks at_menu_nature" itemprop="url" content="/Nature-Places" href="/Nature-Places">Nature</a>
                                                                            </span>
                                                                        </li>
                                                                        <li class="pl24 pr15 pb8 pt8">
                                                                            <span>
                                                                                <meta itemprop="name" content="Honeymoon" />
                                                                                <a class="pfc3 at_menu_dynamicLinks at_menu_honeymoon" itemprop="url" content="/Honeymoon-Places" href="/Honeymoon-Places">Honeymoon</a>
                                                                            </span>
                                                                        </li>
                                                                        <li class="pl24 pr15 pb8 pt8">
                                                                            <span>
                                                                                <meta itemprop="name" content="Wildlife" />
                                                                                <a class="pfc3 at_menu_dynamicLinks at_menu_wildlife" itemprop="url" content="/Wildlife-Places" href="/Wildlife-Places">Wildlife</a>
                                                                            </span>
                                                                        </li>
                                                                        <li class="pl24 pr15 pb8 pt8">
                                                                            <span>
                                                                                <meta itemprop="name" content="Friends" />
                                                                                <a class="pfc3 at_menu_dynamicLinks at_menu_friends" itemprop="url" content="/Friends-Places" href="/Friends-Places">Friends</a>
                                                                            </span>
                                                                        </li>
                                                                        <li class="pl24 pr15 pb8 pt8">
                                                                            <span>
                                                                                <meta itemprop="name" content="Water Activities" />
                                                                                <a class="pfc3 at_menu_dynamicLinks at_menu_water_activities" itemprop="url" content="/Water%20Activities-Places" href="/Water Activities-Places">
                                                                                    Water Activities
                                                                                </a>
                                                                            </span>
                                                                        </li>
                                                                        <li class="pl24 pr15 pb8 pt8">
                                                                            <span>
                                                                                <meta itemprop="name" content="Religious" />
                                                                                <a class="pfc3 at_menu_dynamicLinks at_menu_religious" itemprop="url" content="/religious-places" href="/religious-places">Religious</a>
                                                                            </span>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="moduleSub hide"></div>
                                            </div>
                                        </li>
                                        <li>
                                            <div id="Holiday Deals">
                                                <div class="wfull relative flex alignCenter spaceBetween">
                                                    <div class="absolute t3 l15 css-bxm7ha">
                                                        <svg viewBox="0 0 19 19" class="icon shape-codepen"><use xlink:href="/mobile_assets/build/icons-svg-189780356f4c47427ddd341d01c8baea.svg#OffersIcon-usage"></use></svg>
                                                    </div>
                                                    <div class="flexFull list-side-menu-title-icon">
                                                        <span>
                                                            <span>
                                                                <meta itemprop="name" content="Holiday Deals" />
                                                                <a class="pfc3 at_menu_dynamicLinks at_menu_holiday_deals" itemprop="url" content="/deals-tour-packages" href="/deals-tour-packages">Holiday Deals</a>
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="moduleSub hide"></div>
                                                <div class="moduleSub hide"></div>
                                            </div>
                                        </li>
                                        <li>
                                            <div id="Luxury Holidays">
                                                <div class="wfull relative flex alignCenter spaceBetween">
                                                    <div class="absolute t3 l15 css-bxm7ha">
                                                        <svg viewBox="0 0 24 24" class="icon shape-codepen"><use xlink:href="/mobile_assets/build/icons-svg-189780356f4c47427ddd341d01c8baea.svg#BarIcon-usage"></use></svg>
                                                    </div>
                                                    <div class="flexFull list-side-menu-title-icon">
                                                        <span>
                                                            <span>
                                                                <meta itemprop="name" content="Luxury Holidays" />
                                                                <a class="pfc3 at_menu_dynamicLinks at_menu_luxury_holidays" itemprop="url" content="/luxury-tour-packages" href="/luxury-tour-packages">Luxury Holidays</a>
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="moduleSub hide"></div>
                                                <div class="moduleSub hide"></div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <ul class="list-side-menu mb24">
                                    <li class="at_menu_howItWorks">
                                        <meta itemprop="name" content="How It Works" />
                                        <a itemprop="url" content="https://traveltriangle.com/how_it_works" href="https://traveltriangle.com/how_it_works" class="ripple list-side-menu-title-icon pfc3">
                                            <div class="wave-dark"></div>
                                            <span class="sidenav-icons">
                                                <svg viewBox="0 0 20 17" class="icon shape-codepen"><use xlink:href="/mobile_assets/build/icons-svg-189780356f4c47427ddd341d01c8baea.svg#WorkIcon-usage"></use></svg>
                                            </span>
                                            How It Works
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://traveltriangle.com/offers" class="ripple list-side-menu-title-icon pfc3">
                                            <div class="wave-dark"></div>
                                            <span class="sidenav-icons">
                                                <svg viewBox="0 0 26 20" class="icon shape-codepen"><use xlink:href="/mobile_assets/build/icons-svg-189780356f4c47427ddd341d01c8baea.svg#PackageIcon-usage"></use></svg>
                                            </span>
                                            Offers
                                        </a>
                                    </li>
                                    <li class="at_menu_blog">
                                        <meta itemprop="name" content="Blog" />
                                        <a itemprop="url" content="https://traveltriangle.com/blog" href="https://traveltriangle.com/blog" class="ripple list-side-menu-title-icon pfc3">
                                            <div class="wave-dark"></div>
                                            <span class="sidenav-icons">
                                                <svg viewBox="0 0 20 15" class="icon shape-codepen"><use xlink:href="/mobile_assets/build/icons-svg-189780356f4c47427ddd341d01c8baea.svg#BlogIcon-usage"></use></svg>
                                            </span>
                                            Blog
                                        </a>
                                    </li>
                                    <li class="at_menu_testimonial">
                                        <meta itemprop="name" content="Testimonials" />
                                        <a itemprop="url" content="https://traveltriangle.com/testimonials" href="https://traveltriangle.com/testimonials" class="ripple list-side-menu-title-icon pfc3">
                                            <div class="wave-dark"></div>
                                            <span class="sidenav-icons">
                                                <svg viewBox="0 0 20 20" class="icon shape-codepen"><use xlink:href="/mobile_assets/build/icons-svg-189780356f4c47427ddd341d01c8baea.svg#TestimonailsIcon-usage"></use></svg>
                                            </span>
                                            Testimonials
                                        </a>
                                    </li>
                                    <li class="at_menu_faq">
                                        <meta itemprop="name" content="FAQ" />
                                        <a itemprop="url" content="https://traveltriangle.com/FAQs" href="https://traveltriangle.com/FAQs" class="ripple list-side-menu-title-icon pfc3">
                                            <div class="wave-dark"></div>
                                            <span class="sidenav-icons">
                                                <svg viewBox="0 0 17 19" class="icon shape-codepen"><use xlink:href="/mobile_assets/build/icons-svg-189780356f4c47427ddd341d01c8baea.svg#FAQIcon-usage"></use></svg>
                                            </span>
                                            FAQ
                                        </a>
                                    </li>
                                    <li class="at_menu_contactUS">
                                        <meta itemprop="name" content="Contact Us" />
                                        <a itemprop="url" content="https://traveltriangle.com/contact_us" href="https://traveltriangle.com/contact_us" class="ripple list-side-menu-title-icon pfc3">
                                            <div class="wave-dark"></div>
                                            <span class="sidenav-icons">
                                                <svg viewBox="0 0 20 15" class="icon shape-codepen"><use xlink:href="/mobile_assets/build/icons-svg-189780356f4c47427ddd341d01c8baea.svg#ContactIcon-usage"></use></svg>
                                            </span>
                                            Contact Us
                                        </a>
                                    </li>
                                </ul>
                                <div class="p15">
                                    <p class="f14 mb8 pfc3">For any help</p>
                                    <p class="f16 m0 fw7"><a content="tel:18001235555" class="pfc3">1800-123-5555</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sidenav-blacklayer"></div>
                </label>
            </div>
            <div class="tt-logo flexFull text-center">
                <meta itemprop="url" content="https://traveltriangle.com" /><meta itemprop="logo" content="https://traveltriangle.com/pp_static/pp_new_logo.jpg" />
                <a class="tt-logo-container" href="/">
                    <svg viewBox="0 0 140 18" class="icon shape-codepen"><use xlink:href="/mobile_assets/build/icons-svg-189780356f4c47427ddd341d01c8baea.svg#TTlogo_black-usage"></use></svg>
                </a>
            </div>
            <div>
                <input type="checkbox" id="AddToHomeButton" class="add-to-home-button" />
                <label for="AddToHomeButton">
                    <div class="add-to-screen"><span class="add-to-home"></span></div>
                    <div class="add-to-home-info">
                        <div class="transparent-cut"></div>
                        <div class="col-xs-12 pt64 mt64 pl24 ml8 pr24 mr24 pr15 pb64">
                            <p class="f14 fw7 sfcw text-left">Add <span class="text-capitalize f18">TravelTriangle </span> to</p>
                            <p class="f16 sfcw text-left fwb pt5">Homescreen for quick access</p>
                            <p class="f16 fw3 sfcw pt24 relative tap-tag-addtohome">
                                Tap <span class="addtohomeoverlay iblock"> <span class="add-to-home iblock absolute t5 l9"></span> </span> to bring up your browser menu and select <span class="fw7">"Add to home screen"</span> to pin the
                                TravelTriangle web app
                            </p>
                            <div class="btn-filled-pri mt15 ripple">
                                <div class="wave"></div>
                                Got It
                            </div>
                        </div>
                    </div>
                </label>
            </div>
        </div>
    </div>
</header>
