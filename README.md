<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


## ตั้งค่า Environment

1. ให้ทำการสร้าง Database ชื่อว่า cineplus 
2. ให้ทำการสร้างไฟล์ .env ถ้ายังไม่มี สามารถไป copy มาจาก .env.example มาได้ (ถ้ามี .env อยู่เเล้ว ข้ามไปข้อ 3)
3. ทำการเพิ่มค่าต่างๆให้กับตัวแปร database environment
    - DB_DATABASE
    - DB_USERNAME
    - DB_PASSWORD


## หลังจาก Setting ENV ก็มาทำการ Boot Project

1. รันคำสั่งติดตั้ง package laraveel --> `composer install`
3. ทำการ Gen key --> `php artisan key:generate`
2. เเล้วรันคำสั่ง `php artisan migrate --seed`
3. ทำการ compile assets โดยรันคำสั่ง `npm install` หลังจากนั้น ตามด้วย `npm run dev` (ไม่ต้องทำขั้นตอนนี้ก็ได้ ถ้าไม่ได้ Dev ต่อ)

** ถ้าติดปัญหาเรื่อง webpack ให้ทำดังนี้
1. รันคำสั่ง `npm cache clean --force`
2. รันคำสั่ง `npm install --save-dev webpack-cli`
3. รันคำสั่ง `npm run dev`



## ลองทดสอบเข้าหน้าเว็บ

1. เข้าไปหน้า `https://example.local/` เพื่อเข้าชมหน้ารายการภาพยนต์ที่กำลังฉาย
2. คลิ๊กเลือกภาพยนต์ที่สนใจเเล้วดูรายละเอียด
3. จะสังเกตุว่าไม่มี ฟอร์ม สำหรับเพิ่มความคิดเห็นเเละให้คะเเนน
4. ทำการ เข้าสู่ระบบหรือลงทะเบียน โดยคลิ๊กที่ปุ่ม มุมบนขาวสุด
5. เพื่อทำการ Authenticated ได้เเล้ว ก็จะสามารถเเสดงความคิดเห็นเกี่ยวกับภาพยนต์ได้