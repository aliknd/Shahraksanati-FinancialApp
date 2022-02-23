<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Shahraksanati Project

Shahraksanati is a financial application (<a href="https://shahraksanatishk.ir/">https://shahraksanatishk.ir/</a>), that has been made from scratch based on a Restful API system from Laravel framework. It has been designed for a major company with more than 700 companies to be managed financially in an industrial region. This system issues water bills in an incremental manner according to the amount of the consumption. Each company also will be assigned in a group based on their specification, and other services will be charged upon the group, and even individually. This system also has a comprehensive report feature, which makes the financial management of this service easy for both the major company and its users.

Here is the graphic representation of the application:
1) Live search through the companies with the capability of editing users (companies) and their specifications, issuing and calling bills (both consumption and payments), and the ability to see how many bills have not been paid so far.
   <br><br> <img src="https://shahraksanatishk.ir/img/1.png"> <br><br>
2) This is an example of issuing consumption bills, that is receiving all required fields automatically from the previous registered records specific to the company to make issuing the new bills very easy for the operator. The operator only needs to enter the current amount of water consumption that has been recorded newly, and then the system takes care of all other processes to issue the final bill (specific to the company with the specific features this company has, that has been predefined by the system administrator – for example one feature is when the company is larger the amount of water consumption and the taxes that will be charges are also in a bigger amount!)
   <br><br> <img src="https://shahraksanatishk.ir/img/2.png"> <br><br>
3) The issued bills samples are as follows, that the first one is regular bill that will be sent to the user profile as well, that the user can see their new bills in order to pay. The first image is a bill without warning, because the user has already paid all of the previous bills:
   <br><br> <img src="https://shahraksanatishk.ir/img/6.png"> <br><br>
   While the following bill is for that user when they have not paid the previous issued 3 bills and now, they are given with a warning (red text) to curtail their service if they are not going no pay the new bill and all the unpaid previous ones due a specific deadline!
   <br><br> <img src="https://shahraksanatishk.ir/img/7.png"> <br><br>
4) This is also a representation of the user profile which has the capabilities of editing their information, checking their recent consumption bills and their payment based on a specific year and month, manage theirselves financially and pay them in a right time!
   <br><br> <img src="https://shahraksanatishk.ir/img/bill.jpg"> <br><br>
5) This system has also a comprehensive report system which following feature are a few samples:
   This is the list of bills that have been issued for a user, and there is a column that shows either a user has paid that specific record (green payment status), and has not paid (red payment status) considering their payments records unique number, with the ability of deleting or changing it manually by the operator if it is necessary!
   <br><br> <img src="https://shahraksanatishk.ir/img/5.png"> <br><br>
   The following image also shows another feature of the report system of this application that has the ability of showing water consumption for a company, phase or section in bar charts that makes this very easy for the financial managers to have an estimation of the consumptions amount, and even the revenues they are receiving each month!
   <br><br> <img src="https://shahraksanatishk.ir/img/3.png"> <br><br>
   This is also another picture that shows the capability of showing companies based on their consumptions through different amounts, for example this picture is showing companies that had a consumption of over 1000 liters for a specific month and year!
   <br><br> <img src="https://shahraksanatishk.ir/img/4.png"> <br><br>
## Implementation Instructions

The default IDE used for this project is phpstorm. For implementing this project you need to just clone this repository into your local IDE, edit .env file and put your DB information in it, and run the following commands:

1) php artisan key:generate
2) php artisan serve

To make this even easier I also put a sample sql file that you can use!



## License

You are free to use and develop this project for similar usage. Just email me in this address: alkarg@utu.fi before and describe briefly what you are going to do!
